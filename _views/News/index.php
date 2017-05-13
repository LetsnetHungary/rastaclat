<?php

require_once("_views/_includes/_navbar.php");
require_once("_views/_includes/_modals/_modal_clatography.php");

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1 class="page_header">CLATOGRAPHY</h1>
        </div>
    </div>
</div>
<section id="about">
    <div class="container-fluid">
        <p>
            Kalandozz te is velünk!<br>
            Éld meg a szerelmet, barátságot, a boldog, felemelő pillanatokat.<br>
            A Rastaclat csapata minden héten válogat a legjobb képek közül.<br>
            A lényeg, hogy a Facebook vagy Instagram oldalakra feltöltött fotókat<br>
            az alábbi hashtagekkel lássátok el.<br>
        </p>
        <h2>#rastaclathungary</h2>
        <h2>#seekthepositive</h2>
    </div>
</section>
<section id="news">
    <div id="news-container" class="container">
        <div id="news-row" class="row">
            <?php for($i=0; $i<=$pictures; $i++) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div id="pic<?php echo $i; ?>"  class="news_item" data-toggle="modal" data-target="#news_modal">
                    <div class="news-caption">
                        <a class="news-button" href="/shop">Nekem is kell!</a>
                    </div>
                        <img src="/_assets/img/news/IMG_<?php echo $i; ?>.JPG" class="news_item_img">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php require_once("_views/_includes/_footers/footer.php");  ?>
