$(document).ready(function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude, long = position.coords.longitude;
            $('#long').attr('value', long);
            $('#lat').attr('value', lat);
            $('#longConfirm').html('Collected');
            $('#latConfirm').html('Collected');
        })
    }
})