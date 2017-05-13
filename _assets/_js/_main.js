$(function() {
    $("#partners_link").click(function() {
        $("#partners").slideToggle(500);
        $("html, body").animate({ scrollTop: $(document).height() }, 500);
    });
    $("#cookie-button").click(function () {
        document.cookie = "cookie-accept=true; expires=Thu, 1 Jan 2026 12:00:00 UTC";
    });
    var cookies = (document.cookie).split(";");
    var cookieAcceptCookie = cookies.find(function (str) {
        return (str.trim()) == "cookie-accept=true";
    });
    if (!cookieAcceptCookie) {
        $("#cookie-alert").css("display", "inherit");
    }

    $("#partners_button").click(function() {
        $("#partners").toggle("slow");
    });
})
