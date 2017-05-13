     <!-- CART -->
        <section id="cart">
            <div class="container" style="padding-top:69px;">
                <div class="row">
                    <div id="top" class="col-sm-12 text-center">
                        <h1 class="page_header">Kosár</h1>
                    </div>
                </div>
				<div class="row" id="order_form">
					<div class="col-sm-6">
                        <h1 class="page_header order_header">Adatok</h1>
						<input class="order_input order_input_required" id="order_input_name" placeholder="* Név" type="text" value="" />
						<input class="order_input order_input_required" id="order_input_email" placeholder="* Email..." type="text" value="" />
						<input class="order_input order_input_required" id="order_input_phone" placeholder="* Telefon..." type="text" value=""/ >
						<input class="order_input order_input_required" id="order_input_birth" placeholder="* Születési idő..." type="text" value="" />
						<input class="order_input order_input_required" id="order_input_addr" placeholder="* Cím..." type="text" value="" />
                        <input class="hidden" id="order_input_price" type="number" value="<?php echo $this->fullPrice ?>"/>
						<div class="order_checks" id="order_checks">
                            <div class="checkbox">
                                <label>
                                    <input id="check_terms" type="checkbox">
                                    * Az Általános Szerződési Feltételeket (ÁSZF) és az adatvédelmi és adatkezelési szabályzatot tudomásul vettem, azokat elfogadom.
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
        							<input id="check_privacy" type="checkbox">
                                    * Az adatvédelmi és adatkezelési szabályzatot tudomásul vettem, azokat elfogadom.
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
        							<input id="check_subscribe" type="checkbox">
                                    Regisztrálom magam a hírlevélre.
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
							        <input id="check_afa" type="checkbox">
                                    Áfás számlát kérek.
                                </label>
                            </div>
						</div>
					</div>
                    <div class = "col-sm-6">
                        <div class = "order_checks" id = "order_shipping">
                            <h1 class="page_header order_header">Fizetés-Szállítás típusa</h1>
                            <div class="checkbox">
                              <!--
                                <label>
                                    <span>Kiválasztott Rastaclat karkötőd szállítására nem számolunk fel plusz költséget és utánvéttel tudod majd rendezni a számlát. Az alábbi lehetőségek közül választhatod ki a szállítás módját. (IDE KELL VALAMI ÚJ GONDOLOM)</span>
                                </label><br><br>
                              -->
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="check_pickpack" type="checkbox">
                                    Rendelés Budapestre vagy vidéki városba, Pick Pack Ponton személyesen venném át, utánvéttel fizetve
                                    <br><a class="show_modal_info" data-info-header="Pick Pack Pont" data-info-text="Pick Pack Ponton személyesen venném át, utánvéttel fizetve.
A szállításért cégünk 1 darab karkötő rendelése esetén 690 forint plusz költséget számol fel.                      2 darab vagy annál több ékszer rendelésénél nem számolunk fel szállítási díjat!<br><br>
Országszerte több mint 750 Pick Pack Ponton van lehetőség a személyes átvételre. Ez esetben a választott terméket, termékeket a helyszínen, Pick Pack Ponton kell kifizetni. A pontok nagy részén van lehetőség a bankkártyás fizetésre is. A szállítási idő 3-8 munkanap. Fontos, hogy a telefonszám, amit megadtál helyes legyen, mert sms-ben értesítünk, ha megérkezett a termék a Pick Pack Pontra!">Tudj meg többet...</a>
                                </label>
                            </div>
                            <!--
                            <div class="checkbox">
                                <label>
                                    <input id="check_personal" type="checkbox">
                                    Budapesten személyesen venném át, utánvéttel fizetve
                                    <br><a class="show_modal_info" data-info-header="Személyes átvétel" data-info-text="Budapesten venném át személyesen, utánvéttel. ( Ez esetben a Rastaclat munkatársai a rendeléstől számított 2 munkanapon belül felkeresnek telefonon és megbeszélnek veled egy időpontot és helyszínt, hogy kifizethesd és megkapd az általad rendelt árut. Itt kizárólag készpénzes fizetéssel tudod rendezni majd a számlát. A termék leszállítására cégünk nem számol fel külön költséget! Fontos, hogy a telefonszám, amit megadtál helyes legyen, mert munkatársaink ezen fognak veled kapcsolatba lépni!)">Tudj meg többet...</a>
                                </label>
                            </div>
                          -->
                            <div class="text-center">
                                <button id="order_confirm" class="button_primary">Megrendelem</button>
                            </div>
                        </div>
                    </div>
				</div>
<?php
$kosar = $this->data;
for ($i = 0; $i < count($kosar); $i++) {
?>
                <div class="row product_row">
                    <div class="col-sm-6 product_list_box">
                        <img class="product_img" src="/_assets/img/shop/<?php echo $kosar[$i]["prod_id"]; ?>.jpg" alt="cart-img">
                        <div class="product_name">
                            <?php echo $kosar[$i]["type"]." : ".$kosar[$i]["name"]; ?><br />
                            <a class="product_remove" data-prodid="<?php echo $kosar[$i]["prod_id"]; ?>" href="#">Törlés</a>
                        </div>
                    </div>
                    <div class="col-sm-6 product_list_box">
                        <div class="product_supp product_supp_right">
                            <span class="product_price"><?php echo $kosar[$i]["price"] * $kosar[$i]["count"] * 1000; ?> Ft</span>
                            <select class="product_qty" name="item-selector" data-prodid="<?php echo $kosar[$i]["prod_id"]; ?>">
                                <?php

                                    for($j = 1; $j < $kosar[$i]["count"]; $j++) {
                                    ?>
                                        <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                    <?php
                                    }

                                ?>
                                <option selected="selected" value="<?php echo $kosar[$i]["count"]; ?>"><?php echo $kosar[$i]["count"]; ?></option>
                                <?php

                                    for($j = $kosar[$i]["count"]+1; $j < 6; $j++) {
                                    ?>
                                        <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                    <?php
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                </div>
<?php
}
?>
                <div class="row">
                    <div class="col-sm-12 total_price">
                        <h3>Összesen: <?php echo $this->fullPrice; ?> FT + 690FT SZÁLLÍTÁSI KÖLTSÉG <br>  <br>   (2 DARAB VAGY ANNÁL TÖBB ÉKSZER RENDELÉSE ESETÉN INGYENES A SZÁLLÍTÁS)</h3>
                        <p>
                            A feltüntetett ár a termék bruttó ára, amely az Általános Forgalmi Adót (ÁFA) is tartalmazza!
                        </p>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button class="button_back" id="back_to_shop" onclick="window.location.href='/Shop'">Vásárlás folytatása</button>
                        <button class="button_primary" data-toggle="modal" id="order_button">Megveszem</button>
                    </div>
                </div>
            </div>
        </section>
