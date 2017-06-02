$(function() {

    $(".product_item").click(function() {
        var prod_id = $(this).attr("data-prodid")
        var on_stock = $(this).attr("data-on_stock")
        if(on_stock == "1") {
          $.ajax({
              url: '../Viewmore/?prodid='+prod_id,
              type: "POST",
              datatype:JSON ,
              data: {
                  prodid: prod_id
              },
              success: function(result) {
                  console.log(result)
                var data = jQuery.parseJSON(result)
                showViewMore(data)
              }
          });
        }
        return;

    });

    $(".featured_item").click(function() {
      var prod_id = $(this).attr("data-prodid")
      var on_stock = $(this).attr("data-on_stock")
      console.log(on_stock)
      if(on_stock == "1") {
        $.ajax({
            url: '../Viewmore/?prodid='+prod_id,
            type: "POST",
            datatype:JSON ,
            data: {
                prodid: prod_id
            },
            success: function(result) {
              console.log(result)
              var data = jQuery.parseJSON(result)
              showViewMore(data)
            }
        });
      }
      return;

    });

    $(".add_to_cart").click(function(event) {
        event.stopPropagation();
        var prodid = $(this).attr("data-prodid")
        $.ajax({
            url: '../UserCart/addToCart?prodid='+prodid,
            type: "POST",
            data: {
                prodid: prodid
            },
            success: function(result) {
                console.log(result)
                $(location).attr('href','/Cart');
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
                console.warn(xhr.responseText);
            }
        });
    });

    $("#subscribe").click(function() {

        var sub_name = $("#subscribe_firstname").val() + " " + $("#subscribe_lastname").val();
        var sub_email = $("#subscribe_email").val();

        $.ajax({
            url: '../Subscribe/subscribe',
            type: "POST",
            data: {
                sub_name : sub_name,
                sub_email : sub_email
            },
            success: function(result) {
                $("#response_header").html(result);
                $('#modal_response').modal('toggle');
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
                console.warn(xhr.responseText);
            }
        });
    });

    $("#ordering").click(function() {

        var name = $("#order_input_name").val()
        var email = $("#order_input_email").val()
        var phone = $("#order_input_phone").val()
        var birth = $("#order_input_birth").val()
        var address = $("#order_input_addr").val()
        var name = $("#order_input_name").val()

        var privacy = 0


        if($("#check_privacy").prop("checked"))
        {
            privacy = 1
        }

        var terms = 0

        if($("#check_terms").prop("checked"))
        {
            terms = 1
        }


        if($("#check_subscribe").prop("checked"))
        {
            $.ajax({
                url: '../Subscribe/Subscribe',
                type: "POST",
                data: {
                    sub_name : name,
                    sub_email : email
                },
                success: function(result) {
                    $("#modal_response_paragraph").html(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                    console.warn(xhr.responseText);
                }
            });
        }
        else
        {
          $("#newsletter").hide();
          $("#modal_response_paragraph").html("");
        }


        if($("#check_afa").prop("checked"))
        {
            var afa_name = $("#modal_afa_name").val();
            var afa_address = $("#modal_afa_addr").val();
            var afa_other = $("#modal_afa_egyeb").val();

            var afa = {
                got: 1, name: afa_name, address: afa_address, other: afa_other
            }
        }
        else
        {
            var afa = {
                got: 0, name: "---", address: "---", other: "---"
            }
        }

        var paytype = "---"
        var pickpackdata = "---"

        if($("#check_pickpack").prop("checked"))
        {
            paytype = "Pick Pack Pont"
            pickpackdata = $("#order_form_data").attr("data-ppp")
        }
        else if($("#check_personal").prop("checked"))
        {
            paytype = "Személyes Átvétel"
        }

        //sending the ajax
        $.ajax({
            url: '/UserCart/buy',
            type: "POST",
            data: {
                privacy : privacy,
                terms : terms,
                customerdata: {
                    name : name,
                    email : email,
                    phone : phone,
                    birth : birth,
                    address : address
                },
                paytype : paytype,
                pdata : pickpackdata,
                afa : afa
            },
            success: function(result) {
                //console.log(result)
                $("#modal_response").modal("toggle");
                $("#response_header").html(result);
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
                console.warn(xhr.responseText);
            }
        });
    });
})
