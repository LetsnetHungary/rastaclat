$(function(){
   pageNameAjax();
    
    $('.pn').on('click', function (e) {

     alert("Changing the page")

    })
});

function pageNameAjax() 
{
    $.ajax({
        url: "../Page/getPageNames",
        type: "POST",
        datatype: JSON,
        success: function(result) {
            var r = jQuery.parseJSON(result)
            renderingPageNames(r)
        },
        error: function(xhr, resp, text) {
        }
    });
}

function renderingPageNames(data) 
{
    $.each(data, function( index, value ) {
      $("#pageNameDropdown").append("<li class = \"pn\"><a>"+value.name+"</a></li>")
    });
}