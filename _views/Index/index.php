		<?php
    require_once("_views/_includes/_navbar.php");
		$featuredItems = $this->featuredItems;
		$promotion = $this->promotion;
    include '_views/_includes/_modals/_view-more.php';
    include '_views/_includes/_modals/_modal_clatography.php';
?>
<section class="backimg">
	<img src="/_assets/img/index/backimg.jpg" alt="">
</section>

<section id="slider">
    <div class="container-fluid">
			<div id="slider-main" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li class="active" data-target="#slider-main" data-slide-to="0"></li>
							<li class="" data-target="#slider-main" data-slide-to="1"></li>
							<li class="" data-target="#slider-main" data-slide-to="2"></li>
							<li class="" data-target="#slider-main" data-slide-to="3"></li>
							<li class="" data-target="#slider-main" data-slide-to="4"></li>
							<li class="" data-target="#slider-main" data-slide-to="5"></li>
							<li class="" data-target="#slider-main" data-slide-to="6"></li>
							<li class="" data-target="#slider-main" data-slide-to="7"></li>
							<li class="" data-target="#slider-main" data-slide-to="8"></li>
							<li class="" data-target="#slider-main" data-slide-to="9"></li>
							<li class="" data-target="#slider-main" data-slide-to="10"></li>
							<li class="" data-target="#slider-main" data-slide-to="11"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
								<img src="/_assets/img/hslider/1.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/2.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/3.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/4.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/5.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/6.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/7.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/8.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/9.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/10.jpg" />
						</div>
						<div class="item">
								<img src="/_assets/img/hslider/11.jpg" />
						</div>
					</div>
					<a class="left carousel-control" href="#slider-main" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">&lt;</span>
					</a>
					<a class="right carousel-control" href="#slider-main" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">&gt;</span>
					</a>
			</div>
    </div>
</section>
<section id="featured_items">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 featured_items_header">
                <h3>Tökéletes kidolgozottság</h3>
            </div>
        </div>
        <div class="row">
        <?php
            for($i=1; $i <= count($featuredItems); $i++) {
        ?>
                <div class="col-sm-4">
                    <div
                        class="featured_item"
                        data-prodid="<?php echo $featuredItems[$i][0]["prod_id"]?>"
                    <?php
                        if($featuredItems[$i][0]["webshop_stock"] > 1)
                        {
                    ?>
                            data-on_stock="1"
                    <?php
                        }
                        else
                        {
                    ?>
                            data-on_stock="0"
                    <?php
                        }
                    ?>
                        >
                        <div class="featured_item_img_cont">
                            <img src="_assets/img/shop/<?php echo $featuredItems[$i][0]["prod_id"];?>.jpg" class="featured_item_img" />
                        </div>
                        <h5><?php echo $featuredItems[$i][0]["type"];?> : <?php echo $featuredItems[$i][0]["name"];?></h5>
                        <div class="featured_item_overlay">
                            <h1><?php echo $featuredItems[$i][0]["price"];?> Ft</h1>
                            <?php
                                if($featuredItems[$i][0]["webshop_stock"] > 1)
                                {
                            ?>
                                <button class="button_back add_to_cart"
                                data-prodid="<?php echo $featuredItems[$i][0]["prod_id"]?>"
                                >Megveszem!</button>
                            <?php
                                }
                                else
                                {
                            ?>
                                <button class="button_back">Elfogyott!
                                <h6>Hamarosan újra rendelhető!</h6></button>
                            <?php
                                }
                            ?>
                            <hr class="hidden-xs hidden-sm hidden-md"/>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
        </div>
    </div>
</section>
<section id="about">
    <div class="about__container">
        <h1>RASTACLAT</h1>
        <p>A BECSÜLETESSÉG SZIMBÓLUMA, A LÉNYEG, HOGY TEGYÉL JÓT MAGADDAL ÉS MÁSOKKAL. HISSZÜK, HOGY A POZITÍV TETTEK MEGVÁLTOZTATJÁK AZ ÉLETET ÉS MAGABIZTOSSÁGRA ÖSZTÖNÖZNEK. <strong>#RASTACLAT</strong> <strong>#SEEKTHEPOSITIVE</strong> </p>
				<p>AZ ÉKSZEREK KÖZVETLENÜL A KÖZPONTUNKBÓL, CALIFORNIÁBÓL ÉRKEZNEK. A BRAND 2010-BEN INDULT ÉS NAGYON GYORSAN AMERIKA EGYIK LEGKEDVELTEBB KIEGÉSZÍTŐJE LETT. SZÁMOS VILÁGSZTÁR TARTOZIK A CLATLIFEREK TÁBORÁBA ÉS HAZÁNKBAN IS RENGETEG KÖZÉLETI SZEMÉLYISÉG, ELISMERT SPOTOLÓ, VÉLEMÉNYVEZÉR CSATLAKOZOTT A  <strong>#RASTACLATHUNGARY</strong> NAGYKÖVETEI KÖZÉ.</p>
				<p>VISELD KARKÖTŐINKET, TARTOZZ KÖZÉNK, CSAPASSUK KÖZÖSEN AZ IGÉT! </p>
        <h2>#SPREADINGPOSITIVEVIBRATIONS</h2>
    </div>
</section>
<section id="social">
	<div class="define">
		<h3 style="text-align: center;">RASTACLAT</h3>
		<br>
		<p style="text-align: center;"><strong>__</strong></p>
		<br>
		<p class="define" style="text-align: center;"><span style="color: #999999;">( rah-stuh-claht )</span></p>
		<br>
		<p class="define" style="text-align: center;"><strong>The cloth of the righteous</strong></p>
		<br>
		<br>
	</div>
			<div id="social_video">
					<iframe id="social_youtube_video" src="https://www.youtube.com/embed/TtW3BU62Knw" frameborder="0" allowfullscreen=""></iframe>
			</div>
</section>
<section id="clatography">
    <div class="container-fluid">
        <h1 class="page_header">Clatographyy</h1>
        <div id="clatography_slider_buttons" class="text-center">
            <a href="#clatography_slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left slider_button" aria-hidden="true"></span>
            </a>
            <button class="button_back" onclick="window.location.href='/Shop'">#legyelteisCLATLIFER</button>
            <a href="#clatography_slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right slider_button" aria-hidden="true"></span>
            </a>
        </div>
        <div id="clatography_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <img class="news_item" src="_assets/img/news/1.JPG" alt="gallery01" data-slider="1">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/2.JPG" alt="gallery02" data-slider="2">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/3.JPG" alt="gallery03" data-slider="3">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/4.JPG" alt="gallery04" data-slider="4">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/5.JPG" alt="gallery05" data-slider="5">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/6.JPG" alt="gallery06" data-slider="6">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <img class="news_item" src="_assets/img/news/7.JPG" alt="gallery07" data-slider="7">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/8.JPG" alt="gallery08" data-slider="8">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/9.JPG" alt="gallery9" data-slider="9">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/10.JPG" alt="gallery10" data-slider="10">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/11.JPG" alt="gallery11" data-slider="11">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/12.JPG" alt="gallery12" data-slider="12">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <img class="news_item" src="_assets/img/news/13.JPG" alt="gallery13" data-slider="13">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/14.JPG" alt="gallery14" data-slider="14">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs">
                            <img class="news_item" src="_assets/img/news/15.JPG" alt="gallery15" data-slider="15">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/16.JPG" alt="gallery16" data-slider="16">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/17.JPG" alt="gallery17" data-slider="17">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <img class="news_item" src="_assets/img/news/18.JPG" alt="gallery18" data-slider="18">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once("_views/_includes/_footers/footer.php");
?>
