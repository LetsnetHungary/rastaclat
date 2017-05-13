<?php
    require_once("_views/_includes/_navbar.php");
    $products = $this->products;
    include '_views/_includes/_modals/_view-more.php';
?>

<section id="products" style="padding-top:69px;">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
        <div class="col-md-12 promotionslider__holder">

            <div id="promotionslider" data-interval="2500" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                      <img src="/_assets/img/logos/CLASSIC.png" />
                  </div>
                  <div class="item">
                      <img src="/_assets/img/logos/MINICLAT.png" />
                  </div>
                  <div class="item">
                      <img src="/_assets/img/logos/KNOTACLAT.png" />
                  </div>
                </div>
            <!--    <a class="left carousel-control" href="#promotionslider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">&lt;</span>
                </a>
                <a class="right carousel-control" href="#promotionslider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">&gt;</span>
                </a>
              -->
            </div>
        </div>
<!--
        <div class="row">
          <div class="col-md-12 categorybar">
            <div class="product-nav">
              <div class="cat-top-bar">
                <div class="cat-menu left">
                <span>Category</span>
                </div>
                  <div class="PageMenu cat-menu-list" style="display: none;">
                    <div class="inner">
                      <div class="CategoryList" id="SideCategoryList">
                          <ul class = "categoryholder">
                            <li class="categoryheader"><a href="/Shop">Összes</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader">
                              <a href="/Shop/Miniclat">Miniclat</a>
                              <ul class = "miniheader">
                                <li class="minisort"><a href="/Shop/Miniclat">New Arrivals</a></li>
                                <li class="minisort"><a href="/Shop/Miniclat">Recommended</a></li>
                              </ul>
                            </li>

                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                            <li class="categoryheader"><a href="/Shop/Classic">Classic</a></li>
                          </ul>
                      </div>
                    </div>
                  </div>
              </div>

              <span><?php if(isset($_GET["c"])) {echo $_GET["c"];}?></span>
            </div>
          </div>
        </div> -->
        <div class="row" style = " margin: 0; margin-bottom: 60px;">
          <ul class = "testcategory">
          <a class="testa <?php if($_GET['c'] == 'ÖSSZES') { echo 'active';}?>" href="/Shop/Összes"><li>Összes</li></a>
<!--
          <a class="testa <?php if($_GET['c'] == 'CLASSIC') { echo 'active';}?>" href="/Shop/Classic"><li>Classic</li></a>
-->
          <a class="testa <?php if($_GET['c'] == 'CLASSIC CORE') { echo 'active';}?>" href="/Shop/Core"><li>Classic Core</li></a>
          <a class="testa <?php if($_GET['c'] == 'CLASSIC') { echo 'active';}?>" href="/Shop/Classic"><li>Classic</li></a>
          <a class="testa <?php if($_GET['c'] == 'MINICLAT') { echo 'active';}?>" href="/Shop/Miniclat"><li>Miniclat</li></a>
          <a class="testa <?php if($_GET['c'] == 'KNOTACLAT') { echo 'active';}?>" href="/Shop/Knotaclat"><li>Knotaclat</li></a>
          <a class="testa <?php if($_GET['c'] == 'LIMITED') { echo 'active';}?>" href="/Shop/Limited"><li>Limited Edition</li></a>
          </ul>
        </div>
        <div class="row" style = " margin: 0;">
            <?php
            for($i=0; $i < count($products); $i++) {
                ?>
                <div class="col-sm-4">
                    <div id="product_<?php echo $i;?>" class="product_item" data-type = "<?php echo $products[$i]["type"]; ?>" sold =
                      <?php
                      if($products[$i]["webshop_stock"] < 1) {
                        ?>
                        "sold"
                        <?php
                      }
                      else {
                        ?>
                          "notsold"
                        <?
                      }
                      ?>
						data-prodid="<?php echo $products[$i]["prod_id"]?>"
						<?php
                        if($products[$i]["webshop_stock"] > 1)
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
                        <div class="product_item_img_cont">
                            <img src="/_assets/img/shop/<?php echo $products[$i]["prod_id"];?>.jpg" class="product_item_img" />
                        </div>
                        <h5><?php echo $products[$i]["type"];?> : <?php echo $products[$i]["name"];?></h5>
                        <div class="product_item_overlay">
                            <h1><?php echo $products[$i]["price"];?> Ft</h1>
<?php
	if($products[$i]["webshop_stock"] > 1) {
?>
                            <button class="button_back add_to_cart"
                            data-prodid="<?php echo $products[$i]["prod_id"];?>"
                            >Megveszem!</button>
<?php
	} else {
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
<?php require("_views/_includes/_footers/footer.php"); ?>
