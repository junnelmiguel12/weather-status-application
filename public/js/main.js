$(document).ready(function(){
    $('#country_list').on('click', '#viewBtn', function () {
        let fLatitude = $(this).attr('data-lang');
        let fLongitude = $(this).attr('data-long');
        
        displayWeatherStatus(fLatitude, fLongitude);
    })

    function displayWeatherStatus(fLatitude, fLongitude) {
        let bCheckLocator = $.isNumeric(fLatitude) && $.isNumeric(fLongitude);

        if (bCheckLocator) {
            $.ajax({
                'url': '/get/weather/status',
                'type': 'GET',
                'dataType': 'JSON',
                'data': {
                    latitude: fLatitude,
                    longitude: fLongitude
                },
                success: function (mResponse) {
                    Swal.fire({
                        html: '<div><p>Country Name:</p><b> ' + mResponse.data.name + '</b><br><p>Weather Status: </p><b>' 
                        + mResponse.data.weather[0]['main'] + '</b><br><p>Weather Description: </p><b>' 
                        + mResponse.data.weather[0]['description'] +'</b><br></div>',
                        showConfirmButton: false
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong. Please try again.',
                        showConfirmButton: false
                    });
                }
            });
        }
    }
});