<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Services\MainService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class mainController
 * @package App\Controllers
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class MainController extends BaseController
{
    /**
     * Instantiate mainService
     * @param $oService
     */
    public function __construct(MainService $oService)
    {
        $this->oService = $oService;
    }

    /**
     * Function to display country list
     * @return Factory/view
     */
    public function index()
    {
        $mResult = $this->oService->index();
        $aData = empty($mResult) === false ? $this->paginate($mResult) : [];

        return view('main', compact('aData'));
    }

    /**
     * Function to paginate country list
     * @param $items
     * @param $perPage
     * @param $page
     * @param $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
