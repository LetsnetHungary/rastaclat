$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation)
    }
});

var lalo = 0

$(function () {
    $("#l").click(function() {
        var e = $("#me").val()
        var p = $("#mp").val()
        sendingLoginRequest(e, p)
    });
})

function showLocation(position) {
    var latitude = position.coords.latitude
    var longitude = position.coords.longitude
    lalo = latitude + "," + longitude
    $.ajax({
        type:'POST',
        url:'Auth/getLocation',
        data: { lattitude : latitude, longitude : longitude},
        success:function(msg){
            if(msg){
                $("#location").val(msg)
            }
        }
    });
}

function sendingLoginRequest(e, p) {
    $.ajax({
        url: "../Auth/login",
        type: "POST",
        data: {
            l : true,
            ema : e,
            passw : p,
            d : {
                lalo : lalo
            }
        },
        success: function(result) {
            console.log(result)
            $(location).attr('href','/Index');
        },
        error: function(xhr, resp, text) {
        }
    });
}
