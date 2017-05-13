$(function() {

    $("#order_button").click(function() {
        if ($("#order_form").css("display") == "none") {
            $("#order_form").slideDown("slow");
        }
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });

    $("#order_confirm").click(function() {

        input_empty = false;

        $('.order_input_required').each(function() {
            if ($(this).val() == "") {
                input_empty = true;
            }
        });

        checkbox = $("#order_shipping input[type='checkbox']:checked").first();

        checkbox_terms = $("#check_terms").prop('checked');

        checkbox_privacy = $("#check_privacy").prop('checked');

        if (checkbox.length != 0 && !input_empty && checkbox_terms && checkbox_privacy) {

            checkbox_id = checkbox.attr("id");

            $("#order_modal_name").html($("#order_input_name").val());
            $("#order_form_data").attr("data-name", $("#order_input_name").val());

            $("#order_modal_email").html($("#order_input_email").val());
            $("#order_form_data").attr("data-email", $("#order_input_email").val());

            $("#order_modal_phone").html($("#order_input_phone").val());
            $("#order_form_data").attr("data-phone", $("#order_input_phone").val());

            $("#order_modal_birth").html($("#order_input_birth").val());
            $("#order_form_data").attr("data-birth", $("#order_input_birth").val());

            $("#order_modal_addr").html($("#order_input_addr").val());
            $("#order_form_data").attr("data-addr", $("#order_input_addr").val());

            $("#order_modal_price").html($("#order_input_price").val() + " Ft + 690Ft szállítási költség (2db rendelése esetén ingyenes)");

            if (checkbox_id == "check_card") {
                $("#order_modal_paytype").html("Bankkártyás fizetés ingyenes házhoz szállítással");
                $("#order_form_data").attr("data-paytype", "Házhozszállítás");
                $("#order_form_data").attr("data-price", $("#order_input_price").val());

                $('#order_modal_ossz').modal('toggle');
            }
            else if (checkbox_id == "check_pickpack") {
                $("#order_modal_paytype").html("Személyes átvétel Pick Pack Ponton");
                $("#order_form_data").attr("data-paytype", "Pick Pack Pont");
                $("#order_form_data").attr("data-price", parseInt($("#order_input_price").val()));
                $("#order_modal_price").html(String(parseInt($("#order_input_price").val())) + " Ft + 690Ft szállítási költség (2db rendelése esetén ingyenes)");

                $('#order_modal_pickpack').modal('toggle');
            }
            else if (checkbox_id == "check_personal") {
                $("#order_modal_paytype").html("Személyes átvétel Budapesten");
                $("#order_form_data").attr("data-paytype", "Személyes átvétel");
                $("#order_form_data").attr("data-price", $("#order_input_price").val());

                $('#order_modal_ossz').modal('toggle');
            }
            else {
                //alert("ervenytelen fizetesi mod");
            }
        }
        else {
            alert("Kérlek tölts ki minden mezőt!");
        }
    });

    $("#order_shipping input[type='checkbox']").change(function() {
        $("#order_shipping input[type='checkbox']").not(this).prop('checked', false);
    });

    pickpack_active = false;

    $("#pickpack_order").click(function() {
        pickpack_active = true;
    });

    $("#order_modal_pickpack").on('hidden.bs.modal', function (e) {
        if (pickpack_active) {
            $('#order_modal_ossz').modal('toggle');
        }
        pickpack_active = false;
    });

    // PICK PACK PONT API

    function receiveMessage(event) {
        $("#order_form_data").attr("data-ppp", JSON.stringify(JSON.parse(event.data)));
    };

    window.addEventListener("message", receiveMessage, false);

    $(".product_qty").on('change', function() {
        $.ajax({
            url: '/UserCart/freshCount',
            type: "POST",
            dataType: 'json',
            data: {
                prodid: $(this).data("prodid"),
                count: $(this).val()
            },
            success: function(result) {
                $(location).attr('href', '/Cart');
            },
            error: function(xhr, resp, text) {
                $(location).attr('href', '/Cart');
            }
        });
    });

    $(".product_remove").click(function() {
        $('#modal_remove_item').modal('toggle');
        $("#remove_button").attr("data-prodid", $(this).data("prodid"));
    });

    $("#remove_button").click(function() {
        $.ajax({
            url: '/UserCart/removeFromCart',
            type: "POST",
            data: {
                prodid: $(this).data("prodid")
            },
            success: function(result) {
                $(location).attr('href', '/Cart');
            },
            error: function(xhr, resp, text) {
                $(location).attr('href', '/Cart');
            }
        });
    });

    $('#modal_response').on('hidden.bs.modal', function () {
        $(location).attr('href', '/Index');
    });

    $("#check_afa").on('change', function() {
		if ($("#check_afa").prop("checked")) {
			$('#modal_afa').modal('toggle');
			$("#check_afa").prop("checked", false);
		}
    });

	$("#modal_afa_button").click(function() {
		$("#check_afa").prop("checked", true);
	});
})
