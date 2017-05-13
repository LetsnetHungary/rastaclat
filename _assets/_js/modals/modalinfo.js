$(function() {
    $(".show_modal_info").click(function() {
        $(".info_header").html($(this).data("info-header"));
        $(".info_text").html($(this).data("info-text"));
        $("#modal_info").modal("show");
    });
});
