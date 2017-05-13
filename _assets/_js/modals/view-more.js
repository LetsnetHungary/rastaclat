function showViewMore(data) {
    var prodid = data[0].prod_id;
    var name = data[0].name;
    var type = data[0].type;
    var price = data[0].price;
    var prop1 = data[0].prop1;
    var prop2 = data[0].prop2;
    var prop3 = data[0].prop3;
    var prop4 = data[0].prop4;
    var prop5 = data[0].prop5;
    var on_stock = data[0].webshop_stock;

    var mname = type + name + ".jpg";

    $('#view-more-pic').attr('src', "/_assets/img/shop/" + prodid + ".jpg");

    $('.vm-title').html(type + ' : ' + name);
    $('.vm-price').html(price + " Ft");
    $('.vm-collinfo').html(prop1);
    $('.vm-desc').html(prop2);
    $('.vm-prop').html(prop3);
    $('.vm-size2').html(prop4);
    $('.vm-wrist').html(prop5);

    /*

    if(type == "Classic")
    {
        $('.vm-size2').html("Állítható méret átlagos csuklóra.");
        $('.vm-wrist').html("Nagyon vékony csuklóra a Miniclat kollekciót javasoljuk.");
    }
    else if(type == "Miniclat")
    {
        $('.vm-size2').html("Nagyon vékony csuklóra, elsősorban hölgyeknek ajánljuk.");
        $('.vm-wrist').html("11,43 cm-15,24 cm között állítható.");
    }

    */

    $(".add_to_cart").attr("data-prodid", prodid);
    $(".add_to_cart").attr("data-name", name);
    $(".add_to_cart").attr("data-price", price);
    $(".add_to_cart").attr("data-type", type);

    $('#view-more').modal('show');
};
