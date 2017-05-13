<?php
$pictures = 18;
?>
<div id="news_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body clear">
                <div class="container_fluid">
                        <div id="news_slider" class="carousel slide" data-ride="carousel carousel-fade">
                            <div class="carousel-inner news-slider" role="listbox">
                                <div id="slider_pic1"  class="item active">
                                    <img src="_assets/img/news/1.JPG" class="news_item_img">
                                </div>
                                <?php for($i=1; $i<=$pictures; $i++) { ?>
                                    <div id="slider_pic<?php echo $i; ?>"  class="item">
                                        <img src="_assets/img/news/<?php echo $i; ?>.JPG" class="news_item_img">
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="news-button news-button-slider" href="/shop">Nekem is kell!</a>
                            <a id="left-slider-control" class="left carousel-control" href="#news_slider" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="right-slider-control" class="right carousel-control" href="#news_slider" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
