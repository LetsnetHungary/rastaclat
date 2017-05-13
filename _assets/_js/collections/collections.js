$(document).ready(function() {
    //preload
    $('.fadeimg').each(function() {
        var n = $(this).data("pic-num");
        for (var i = 2; i <=n; i++)(new Image()).src = $(this).data("alt"+i);
    });
	
    $('.fadeimg').on('click', function() {
        $('#imageHolder').empty();
        var id = $(this).attr('id');
        var images = [];
        var picnum = $(this).attr('data-pic-num');
        images.push($(this).attr('data-src'));
        for (i = 2; i <= picnum; i++) {
            images.push($(this).attr('data-alt' + i));
        }
        for (i = 0; i < images.length; i++) {
            if (i == 0) {
                var imageText = "<div class=\"item active\"><img class='img-responsive' src='" + images[i] + "' alt='pic0" + (i + 1) + "'></div><!-- end item " + (i + 1) + " -->";
            } else {
                var imageText = "<div class=\"item\"><img class='img-responsive' src='" + images[i] + "' alt='pic0" + (i + 1) + "'></div><!-- end item " + (i + 1) + " -->";
            }
            $('#imageHolder').append(imageText);
        }
        $('#slider_modal').modal('show');
    });
    //collection ful to shop -> nekem is kell gomb
    $("#collection_shop").on('click', function() {

        window.location.href = "/shop";
    });

    $('.fadeimg').each(function() {
            $(this).css('background-image', 'url("' + $(this).attr('data-src') + '")');
        })
        //hover collections image
    var timer;
    var baseimg;
    var $this;
    $('.fadeimg').hover(function() {
        $this = $(this);
        baseimg = $this.attr('data-src');
        var alt = []
        var picnum = $this.attr('data-pic-num');
        for (i = 2; i <= picnum; i++) {
            alt.push($this.attr('data-alt' + i));
        }
        var pos = 0;

        $this.css('background-image', 'url("' + alt[pos] + '")');
        timer = setInterval(function() {
            pos += 1;
            if (pos >= alt.length) pos = 0;
            $this.css('background-image', 'url("' + alt[pos] + '")');
        }, 3000);
    }, function() {
        $this.css('background-image', 'url("' + baseimg + '")');
        clearInterval(timer);
    });
});
