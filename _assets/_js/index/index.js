$(function() {
    $("#clatography .carousel-inner .item img").css("height", $("#clatography .carousel-inner .item.active img").width());
    $(window).resize(function() {
        $("#clatography .carousel-inner .item img").css("height", $("#clatography .carousel-inner .item.active img").width());
    });
    $(".news_item").click(function() {
        $("#news_modal .active").toggleClass("active");
        $("#slider_pic"+$(this).attr("data-slider")).toggleClass("active");
        $("#news_modal").modal("toggle");
    });
})
