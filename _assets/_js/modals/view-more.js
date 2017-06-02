function showViewMore(data) {

    props = Array()

    $.each(data, function(i, item) {
        props[i] = item.property_value
    });


    var prodid = data[0].prod_id;
    var name = data[0].prod_name;
    var price = data[0].prod_price;
    var prop1 = props[0];
    var prop2 = props[1];
    var prop3 = props[2];
    var prop4 = props[3];
    var prop5 = props[4];
    var on_stock = data[0].outofstock;

    $('#view-more-pic').attr('src', "/_assets/img/shop/" + prodid + ".jpg");

    $('.vm-title').html(name);
    $('.vm-price').html(price + " Ft");
    $('.vm-collinfo').html(prop1);
    $('.vm-desc').html(prop2);
    $('.vm-prop').html(prop3);
    $('.vm-size2').html(prop4);
    $('.vm-wrist').html(prop5);

    $(".add_to_cart").attr("data-prodid", prodid);
    $(".add_to_cart").attr("data-name", name);
    $(".add_to_cart").attr("data-price", price);

    $('#view-more').modal('show');
};
