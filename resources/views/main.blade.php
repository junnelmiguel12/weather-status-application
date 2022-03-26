@extends('layout')

@section('custom-css')
<style>
    .container, th {
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Weather Status App</h1>
    <table id="country_list" class="table table-bordered">
        <thead>
            <tr>
                <th>Common Country name</th>
                <th>Official Country name</th>
                <th>Capital</th>
                <th>View Weather Status</th>
            </tr>
        </thead>
        <tbody>
            @if (empty($aData) === true)
                <tr>
                    <td colspan="4">No country available.</td>
                </tr>
            @else
                @foreach ($aData as $aCountry)
                    <tr>
                        <td>{{ $aCountry['name']['common'] }}</td>
                        <td>{{ $aCountry['name']['official'] }}</td>
                        <td>
                            @if (array_key_exists('capital', $aCountry) === true)
                                {{ $aCountry['capital'][0] }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-lang="{{ $aCountry['latlng'][0] }}" data-long="{{ $aCountry['latlng'][1] }}">View</button>
                        </td>
                    </tr>
                @endforeach    
            @endif
        </tbody>
    </table>
    @if (empty($aData) === false)
        {{ $aData->links() }}
    @endif
</div>
@endsection

@section('main-script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
