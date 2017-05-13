<?php
    require_once("_views/_includes/_navbar.php");
    $collections = $this->collections;
?>

<div id="slider_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body paddingnone">
                <!-- Hero Slider -->
                <div class="container_fluid">
                    <div class="row">
                        <div id="header-slider" class="carousel slide" data-ride="carousel carousel-fade">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" id="imageHolder">
                            </div>
                            <button class="vm-pop-up-button" id="collection_shop">Nekem is kell!</button>
                            <!-- end carousel-inner -->

                            <!-- Left and right controls -->
                            <a id="left-slider-control" class="left carousel-control" href="#header-slider" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="right-slider-control" class="right carousel-control" href="#header-slider" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!-- end carousel -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<section class = "collection" style="padding-top:69px;">
    <div class = "container">
        <div class="row">
            <div class = "col-sm-12">
                <h1 class="page_header">Kollekciók</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="about">
        <p>
            Minden RASTACLAT karkötő unisex.
        </p>
        <p>
            Katalógusunkban nem szerepel az összes modellünk, mindig vannak szezonális szériáink, ezért nézz körül a shopban, ott több RASTACLAT karkötő közül választhatsz! 
        </p>
    </div>
    <div class="container-fluid">
        <div class = "row">
            <?php
                for ($i=0; $i<count($collections);$i++) {
            ?>
                <div class="col-xs-4">
                    <div class="collection_item fadeimg" id="<?php echo $collections[$i]['type'].$collections[$i]["name"];?>"
                         data-pic-num="<?php echo $collections[$i]["picnum"];?>"
                         data-src="_assets/img/collection/<?php echo $collections[$i]['type'].$collections[$i]["name"];?>/1.jpg"
                         <?php
                            for($j = 2; $j <= $collections[$i]["picnum"]; $j++) {
                         ?>
                            data-alt<?php echo $j;?>="_assets/img/collection/<?php echo $collections[$i]['type'].$collections[$i]["name"];?>/<?php echo $j;?>.jpg"
                        <?php
                            }
                         ?>
                    >
                    <div class="collection_item_overlay text-center">
                        <div class="collection_item_overlay_content_container">
                            <p><?php echo $collections[$i]["name"];?></p>
                            <button class="collection_item_button" id="collection_item_button_'.$i.'">Nagyítás
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<?php require_once("_views/_includes/_footers/footer.php"); ?>
