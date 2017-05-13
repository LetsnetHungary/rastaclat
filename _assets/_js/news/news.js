$(function () {
    $(".news_item").click(function() {
        $(".active").toggleClass("active");
        $("#slider_"+$(this).attr("id")).toggleClass("active");
    });
});
