<script src="{{asset('/files/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('/files/frontend/js/jquery-ui.js')}}"></script>
<script src="{{asset('/files/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('/files/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/files/frontend/js/owl.carousel.js')}}"></script>
<script src="{{asset('/files/frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('/files/frontend/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/files/frontend/js/bootstrap-datepicker.th.min.js')}}"></script>


<!--menu -->
<!--menu -->
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 25){  
            $('.wrap_menu, .topbar_green').addClass("sticky");
        }
        else{
            $('.wrap_menu, .topbar_green').removeClass("sticky");
        }
    });
    </script>
    
    <script type="text/javascript">
    $( document ).ready(function() {
    var mmH = $('.wrap_menu').outerHeight(true) + $('.topbar_green').outerHeight(true)
        $('.container-fluid').eq(0).css('padding-top', mmH);
        
        $('.wrap_btn_menu').click(function(event) {
            if (!$(".menuleft").hasClass("open")) {
                //$(this).addClass("active");
                $('.menuleft').addClass('open');
                $("body").addClass("menuopened");
              } else {
                $('.menuleft').removeClass('open');
                //$(this).removeClass("active");
                $("body").removeClass("menuopened");
              }
              event.stopPropagation();
        });
        
         $('.close_menu').click(function(event) {
            $('.menuleft').removeClass('open');
            $(this).removeClass("active");
            $("body").removeClass("menuopened");
        });
       
         $('.menuleft').click(function(event) {
              //event.stopPropagation();
        });
        
        
         $( '.hassub' ).click(function (event) {
          if (  $(this).children( ".submenu" ).is( ":hidden" ) ) {
                  $('.submenu').slideUp();
                $(this).children('.submenu').slideDown();
          } else {
              $('.submenu').slideUp();
          }
          //event.stopPropagation();
        });
        
         $( ".submenu" )
          .mouseenter(function() {
            $('.submenu').clearQueue();
            event.stopPropagation();
          })
          .mouseleave(function() {
            $('.submenu').delay( 2000 ).hide('fade', 1000);
          });
        
        $('.btn_addcart').click(function (event) {
            if($("#qty_product_page").val() == undefined) {
                var qty = 1;
            } else if($("#qty_product_page").val() != '') {
                var qty = $("#qty_product_page").val();
            } else {
                var qty = 1;
            }

            var product_id = $(this).attr('id');

            //alert(product_id);

            var data_split = product_id.split('_promotion');

            if(data_split[1] == '') {
                $.post('{{url("ajaxInsertCart")}}', { products_id: product_id, qty: qty, "_token": "{{ csrf_token() }}" }, function(data) {
                    var data_split = data.split('!@#$%^&*())_+');

                    $(".order_qty").html(data_split[0]);
                    $(".order_sub_total").html(data_split[1]);
                    $(".order_shipping").html(data_split[2]);
                    $(".order_discount").html(data_split[3]);
                    $(".order_total").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);
                    $(".view_cart").html(data_split[6]);
                    $(".order_calories").html(data_split[7]);
                    $(".promotion_2_type_before").html(data_split[8]);
                    $(".cart_point").html(data_split[9]);
                    //$(".promotion_by_product").html(data_split[12]);
                });
            } else {
                $.post('{{url("ajaxInsertCart")}}', { products_id: data_split[0], qty: 1, "_token": "{{ csrf_token() }}", promotion_by_product: true }, function(data) {
                    var data_split = data.split('!@#$%^&*())_+');

                    $(".order_qty").html(data_split[0]);
                    $(".order_sub_total").html(data_split[1]);
                    $(".order_shipping").html(data_split[2]);
                    $(".order_discount").html(data_split[3]);
                    $(".order_total").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);
                    $(".view_cart").html(data_split[6]);
                    $(".order_calories").html(data_split[7]);
                    $(".promotion_2_type_before").html(data_split[8]);
                    $(".cart_point").html(data_split[9]);
                    //$(".promotion_by_product").html(data_split[12]);
                });
            }

//            $('.cartbox').show('fade');
//            $('.cartbox').delay( 3000 ).hide('fade', 1000);
           // event.preventDefault();
        });

        $('.btn_product').click(function (event) {

            var id = $(this).attr('id');

            //alert(id);

            var id_split = id.split('-');

            $.post('{{url("ajaxInsertProductRedeemCart")}}', { products_id: id_split[0], qty: 1, "_token": "{{ csrf_token() }}", 'redeem_point_new_id': id_split[1] }, function(data) {
                //alert(data);
                if(data == 'true') {
                    alert('ได้ทำการ Redeem Point ไปแล้ว');
                } else {
                    var data_split = data.split('!@#$%^&*())_+');

                    $(".order_qty").html(data_split[0]);
                    $(".order_sub_total").html(data_split[1]);
                    $(".order_shipping").html(data_split[2]);
                    $(".order_discount").html(data_split[3]);
                    $(".order_total").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);
                    $(".view_cart").html(data_split[6]);
                    $(".order_calories").html(data_split[7]);
                    $(".promotion_2_type_before").html(data_split[8]);
                    $(".cart_point").html(data_split[9]);
                }
            });

//            $('.cartbox').show('fade');
//            $('.cartbox').delay( 3000 ).hide('fade', 1000);
           // event.preventDefault();
        });

        $('.btn_free_shipping').click(function (event) {

            var point_redeem_new_id = $(this).attr('id');

            $.post('{{url("ajaxInsertFreeShippingCart")}}', { point_redeem_new_id: point_redeem_new_id, qty: 1, "_token": "{{ csrf_token() }}" }, function(data) {
                if(data == 'true') {
                    alert('ได้ทำการ Redeem Point ไปแล้ว');
                } else {
                    var data_split = data.split('!@#$%^&*())_+');

                    $(".order_qty").html(data_split[0]);
                    $(".order_sub_total").html(data_split[1]);
                    $(".order_shipping").html(data_split[2]);
                    $(".order_discount").html(data_split[3]);
                    $(".order_total").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);
                    $(".view_cart").html(data_split[6]);
                    $(".order_calories").html(data_split[7]);
                    $(".promotion_2_type_before").html(data_split[8]);
                    $(".cart_point").html(data_split[9]);
                }
            });

//            $('.cartbox').show('fade');
//            $('.cartbox').delay( 3000 ).hide('fade', 1000);
            //event.preventDefault(); 
        });

        $('.btn_discount').click(function (event) {
            
            var point_redeem_new_id = $(this).attr('id');

            $.post('{{url("ajaxInsertDiscountCart")}}', { point_redeem_new_id: point_redeem_new_id, qty: 1, "_token": "{{ csrf_token() }}" }, function(data) {
                if(data == 'true') {
                    alert('ได้ทำการ Redeem Point ไปแล้ว');
                } else {
                    var data_split = data.split('!@#$%^&*())_+');

                    $(".order_qty").html(data_split[0]);
                    $(".order_sub_total").html(data_split[1]);
                    $(".order_shipping").html(data_split[2]);
                    $(".order_discount").html(data_split[3]);
                    $(".order_total").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);
                    $(".view_cart").html(data_split[6]);
                    $(".order_calories").html(data_split[7]);
                    $(".promotion_2_type_before").html(data_split[8]);
                    $(".cart_point").html(data_split[9]);
                }
            });

//            $('.cartbox').show('fade');
//            $('.cartbox').delay( 3000 ).hide('fade', 1000);
            //event.preventDefault();
        });

        $('.btn_addcart_package').click(function (event) {
            if($("#package1").is(":checked") == true) {
                var package1 = 'true';
            } else {
                var package1 = 'false';
            }

            if($("#package2").is(":checked") == true) {
                var package2 = 'true';
            } else {
                var package2 = 'false';
            }

            if($("#package3").is(":checked") == true) {
                var package3 = 'true';
            } else {
                var package3 = 'false';
            }

            if($("#package4").is(":checked") == true) {
                var package4 = 'true';
            } else {
                var package4 = 'false';
            }

            if($("#package5").is(":checked") == true) {
                var package5 = 'true';
            } else {
                var package5 = 'false';
            }

            if($("#package6").is(":checked") == true) {
                var package6 = 'true';
            } else {
                var package6 = 'false';
            }

            if($("#package7").is(":checked") == true) {
                var package7 = 'true';
            } else {
                var package7 = 'false';
            }

            if($("#package8").is(":checked") == true) {
                var package8 = 'true';
            } else {
                var package8 = 'false';
            }

            if($("#package9").is(":checked") == true) {
                var package9 = 'true';
            } else {
                var package9 = 'false';
            }

            if($("#package10").is(":checked") == true) {
                var package10 = 'true';
            } else {
                var package10 = 'false';
            }

            if($("#package11").is(":checked") == true) {
                var package11 = 'true';
            } else {
                var package11 = 'false';
            }

            if($("#package12").is(":checked") == true) {
                var package12 = 'true';
            } else {
                var package12 = 'false';
            }

            if($("#package13").is(":checked") == true) {
                var package13 = 'true';
            } else {
                var package13 = 'false';
            }

            if($("#package14").is(":checked") == true) {
                var package14 = 'true';
            } else {
                var package14 = 'false';
            }

            if($("#package15").is(":checked") == true) {
                var package15 = 'true';
            } else {
                var package15 = 'false';
            }

            if($("#package16").is(":checked") == true) {
                var package16 = 'true';
            } else {
                var package16 = 'false';
            }

            if($("#package17").is(":checked") == true) {
                var package17 = 'true';
            } else {
                var package17 = 'false';
            }

            if($("#package18").is(":checked") == true) {
                var package18 = 'true';
            } else {
                var package18 = 'false';
            }

            if($("#package19").is(":checked") == true) {
                var package19 = 'true';
            } else {
                var package19 = 'false';
            }

            if($("#package20").is(":checked") == true) {
                var package20 = 'true';
            } else {
                var package20 = 'false';
            }

            if($("#package21").is(":checked") == true) {
                var package21 = 'true';
            } else {
                var package21 = 'false';
            }

            if($("#package22").is(":checked") == true) {
                var package22 = 'true';
            } else {
                var package22 = 'false';
            }

            if($("#package23").is(":checked") == true) {
                var package23 = 'true';
            } else {
                var package23 = 'false';
            }

            if($("#package24").is(":checked") == true) {
                var package24 = 'true';
            } else {
                var package24 = 'false';
            }

            if($("#package25").is(":checked") == true) {
                var package25 = 'true';
            } else {
                var package25 = 'false';
            }

            if($("#package26").is(":checked") == true) {
                var package26 = 'true';
            } else {
                var package26 = 'false';
            }

            if($("#package27").is(":checked") == true) {
                var package27 = 'true';
            } else {
                var package27 = 'false';
            }

            if($("#package28").is(":checked") == true) {
                var package28 = 'true';
            } else {
                var package28 = 'false';
            }

            if($("#package29").is(":checked") == true) {
                var package29 = 'true';
            } else {
                var package29 = 'false';
            }

            if($("#package30").is(":checked") == true) {
                var package30 = 'true';
            } else {
                var package30 = 'false';
            }

            if($("#package31").is(":checked") == true) {
                var package31 = 'true';
            } else {
                var package31 = 'false';
            }

            if($("#package32").is(":checked") == true) {
                var package32 = 'true';
            } else {
                var package32 = 'false';
            }

            if($("#package33").is(":checked") == true) {
                var package33 = 'true';
            } else {
                var package33 = 'false';
            }

            if($("#package34").is(":checked") == true) {
                var package34 = 'true';
            } else {
                var package34 = 'false';
            }

            if($("#package35").is(":checked") == true) {
                var package35 = 'true';
            } else {
                var package35 = 'false';
            }

            if($("#package36").is(":checked") == true) {
                var package36 = 'true';
            } else {
                var package36 = 'false';
            }

            if($("#package37").is(":checked") == true) {
                var package37 = 'true';
            } else {
                var package37 = 'false';
            }

            if($("#package38").is(":checked") == true) {
                var package38 = 'true';
            } else {
                var package38 = 'false';
            }

            if($("#package39").is(":checked") == true) {
                var package39 = 'true';
            } else {
                var package39 = 'false';
            }

            if($("#package40").is(":checked") == true) {
                var package40 = 'true';
            } else {
                var package40 = 'false';
            }

            if($("#package41").is(":checked") == true) {
                var package41 = 'true';
            } else {
                var package41 = 'false';
            }

            if($("#package42").is(":checked") == true) {
                var package42 = 'true';
            } else {
                var package42 = 'false';
            }

            if($("#package43").is(":checked") == true) {
                var package43 = 'true';
            } else {
                var package43 = 'false';
            }

            if($("#package44").is(":checked") == true) {
                var package44 = 'true';
            } else {
                var package44 = 'false';
            }

            if($("#package45").is(":checked") == true) {
                var package45 = 'true';
            } else {
                var package45 = 'false';
            }

            if($("#package46").is(":checked") == true) {
                var package46 = 'true';
            } else {
                var package46 = 'false';
            }

            if($("#package47").is(":checked") == true) {
                var package47 = 'true';
            } else {
                var package47 = 'false';
            }

            if($("#package48").is(":checked") == true) {
                var package48 = 'true';
            } else {
                var package48 = 'false';
            }

            if($("#package49").is(":checked") == true) {
                var package49 = 'true';
            } else {
                var package49 = 'false';
            }

            if($("#package50").is(":checked") == true) {
                var package50 = 'true';
            } else {
                var package50 = 'false';
            }

            if($("#package51").is(":checked") == true) {
                var package51 = 'true';
            } else {
                var package51 = 'false';
            }

            if($("#package52").is(":checked") == true) {
                var package52 = 'true';
            } else {
                var package52 = 'false';
            }

            if($("#package53").is(":checked") == true) {
                var package53 = 'true';
            } else {
                var package53 = 'false';
            }

            if($("#package54").is(":checked") == true) {
                var package54 = 'true';
            } else {
                var package54 = 'false';
            }

            if($("#package55").is(":checked") == true) {
                var package55 = 'true';
            } else {
                var package55 = 'false';
            }

            if($("#package56").is(":checked") == true) {
                var package56 = 'true';
            } else {
                var package56 = 'false';
            }

            if($("#package57").is(":checked") == true) {
                var package57 = 'true';
            } else {
                var package57 = 'false';
            }

            if($("#package58").is(":checked") == true) {
                var package58 = 'true';
            } else {
                var package58 = 'false';
            }

            if($("#package59").is(":checked") == true) {
                var package59 = 'true';
            } else {
                var package59 = 'false';
            }

            if($("#package60").is(":checked") == true) {
                var package60 = 'true';
            } else {
                var package60 = 'false';
            }

            if($("#package61").is(":checked") == true) {
                var package61 = 'true';
            } else {
                var package61 = 'false';
            }

            if($("#package62").is(":checked") == true) {
                var package62 = 'true';
            } else {
                var package62 = 'false';
            }

            if($("#package63").is(":checked") == true) {
                var package63 = 'true';
            } else {
                var package63 = 'false';
            }

            if($("#package64").is(":checked") == true) {
                var package64 = 'true';
            } else {
                var package64 = 'false';
            }

            if($("#package65").is(":checked") == true) {
                var package65 = 'true';
            } else {
                var package65 = 'false';
            }

            if($("#package66").is(":checked") == true) {
                var package66 = 'true';
            } else {
                var package66 = 'false';
            }

            if($("#package67").is(":checked") == true) {
                var package67 = 'true';
            } else {
                var package67 = 'false';
            }

            if($("#package68").is(":checked") == true) {
                var package68 = 'true';
            } else {
                var package68 = 'false';
            }

            if($("#package69").is(":checked") == true) {
                var package69 = 'true';
            } else {
                var package69 = 'false';
            }

            if($("#package70").is(":checked") == true) {
                var package70 = 'true';
            } else {
                var package70 = 'false';
            }

            if($("#package71").is(":checked") == true) {
                var package71 = 'true';
            } else {
                var package71 = 'false';
            }

            if($("#package72").is(":checked") == true) {
                var package72 = 'true';
            } else {
                var package72 = 'false';
            }

            if($("#package73").is(":checked") == true) {
                var package73 = 'true';
            } else {
                var package73 = 'false';
            }

            if($("#package74").is(":checked") == true) {
                var package74 = 'true';
            } else {
                var package74 = 'false';
            }

            if($("#package75").is(":checked") == true) {
                var package75 = 'true';
            } else {
                var package75 = 'false';
            }

            if($("#package76").is(":checked") == true) {
                var package76 = 'true';
            } else {
                var package76 = 'false';
            }

            if($("#package77").is(":checked") == true) {
                var package77 = 'true';
            } else {
                var package77 = 'false';
            }

            if($("#package78").is(":checked") == true) {
                var package78 = 'true';
            } else {
                var package78 = 'false';
            }

            if($("#package79").is(":checked") == true) {
                var package79 = 'true';
            } else {
                var package79 = 'false';
            }

            if($("#package80").is(":checked") == true) {
                var package80 = 'true';
            } else {
                var package80 = 'false';
            }

            if($("#package81").is(":checked") == true) {
                var package81 = 'true';
            } else {
                var package81 = 'false';
            }

            if($("#package82").is(":checked") == true) {
                var package82 = 'true';
            } else {
                var package82 = 'false';
            }

            if($("#package83").is(":checked") == true) {
                var package83 = 'true';
            } else {
                var package83 = 'false';
            }

            if($("#package84").is(":checked") == true) {
                var package84 = 'true';
            } else {
                var package84 = 'false';
            }

            if($("#package85").is(":checked") == true) {
                var package85 = 'true';
            } else {
                var package85 = 'false';
            }

            if($("#package86").is(":checked") == true) {
                var package86 = 'true';
            } else {
                var package86 = 'false';
            }

            if($("#package87").is(":checked") == true) {
                var package87 = 'true';
            } else {
                var package87 = 'false';
            }

            if($("#package88").is(":checked") == true) {
                var package88 = 'true';
            } else {
                var package88 = 'false';
            }

            if($("#package89").is(":checked") == true) {
                var package89 = 'true';
            } else {
                var package89 = 'false';
            }

            if($("#package90").is(":checked") == true) {
                var package90 = 'true';
            } else {
                var package90 = 'false';
            }

            if($("#package91").is(":checked") == true) {
                var package91 = 'true';
            } else {
                var package91 = 'false';
            }

            if($("#package92").is(":checked") == true) {
                var package92 = 'true';
            } else {
                var package92 = 'false';
            }

            if($("#package93").is(":checked") == true) {
                var package93 = 'true';
            } else {
                var package93 = 'false';
            }

            if($("#package94").is(":checked") == true) {
                var package94 = 'true';
            } else {
                var package94 = 'false';
            }

            if($("#package95").is(":checked") == true) {
                var package95 = 'true';
            } else {
                var package95 = 'false';
            }

            if($("#package96").is(":checked") == true) {
                var package96 = 'true';
            } else {
                var package96 = 'false';
            }

            if($("#package97").is(":checked") == true) {
                var package97 = 'true';
            } else {
                var package97 = 'false';
            }

            if($("#package98").is(":checked") == true) {
                var package98 = 'true';
            } else {
                var package98 = 'false';
            }

            if($("#package99").is(":checked") == true) {
                var package99 = 'true';
            } else {
                var package99 = 'false';
            }

            if($("#package100").is(":checked") == true) {
                var package100 = 'true';
            } else {
                var package100 = 'false';
            }

            $.post('<?php echo url('ajaxInsertCartPackage');?>', { day: day, package1: package1, package2: package2, package3: package3, package4: package4, package5: package5, package6: package6, package7: package7, package8: package8, package9: package9, package10: package10, package11: package11, package12: package12, package13: package13, package14: package14, package15: package15, package16: package16, package17: package17, package18: package18, package19: package19, package20: package20, package21: package21, package22: package22, package23: package23, package24: package24, package25: package25, package26: package26, package27: package27, package28: package28, package29: package29, package30: package30, package31: package31, package32: package32, package33: package33, package34: package34, package35: package35, package36: package36, package37: package37, package38: package38, package39: package39, package40: package40, package41: package41, package42: package42, package43: package43, package44: package44, package45: package45, package46: package46, package47: package47, package48: package48, package49: package49, package50: package50, package51: package51, package52: package52, package53: package53, package54: package54, package55: package55, package56: package56, package57: package57, package58: package58, package59: package59, package60: package60, package61: package61, package62: package62, package63: package63, package64: package64, package65: package65, package66: package66, package67: package67, package68: package68, package69: package69, package70: package70, package71: package71, package72: package72, package73: package73, package74: package74, package75: package75, package76: package76, package77: package77, package78: package78, package79: package79, package80: package80, package81: package81, package82: package82, package83: package83, package84: package84, package85: package85, package86: package86, package87: package87, package88: package88, package89: package89, package90: package90, package91: package91, package92: package92, package93: package93, package94: package94, package95: package95, package96: package96, package97: package97, package98: package98, package99: package99, package100: package100, "_token": "{{ csrf_token() }}" }, function(data) {
                var data_split = data.split('!@#$%^&*())_+');

                $(".order_qty").html(data_split[0]);
                $(".order_sub_total").html(data_split[1]);
                $(".order_shipping").html(data_split[2]);
                $(".order_discount").html(data_split[3]);
                $(".order_total").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);
                $(".view_cart").html(data_split[6]);
                $(".order_calories").html(data_split[7]);
                $("#redeem_already").html(data_split[10]);
            });

//            $('.cartbox').show('fade');
//            $('.cartbox').delay( 3000 ).hide('fade', 1000);
            //event.preventDefault();
        });
        
        $( ".cartbox" )
          .mouseenter(function() {
            $('.cartbox').clearQueue();
            event.stopPropagation();
          })
          .mouseleave(function() {
            $('.cartbox').delay( 3000 ).hide('fade', 1000);
          });
        
    });
    </script>
    <!--menu -->
    
     
      <script type="text/javascript">
            $(document).ready(function() {
                $('.owl-bannerslide').owlCarousel({
                    loop: true,
                    margin: 50,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: true,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });
                
                $('.owl-promotion').owlCarousel({
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: true,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1,
                            dots: false,
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                
                $('.owl-pickplan').owlCarousel({
                    loop: false,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1,
                            dots: false,
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        },
                        1300: {
                            items: 4
                        }
                    }
                });
                
                $('.owl-bmi').owlCarousel({
                    loop: true,
                    margin: 0,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: true,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1,
                            dots: false,
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                
                $('.owl-seeresult').owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                
                 $('.owl-blog').owlCarousel({
                    loop: false,
                    margin: 15,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: false,
                    dots: true,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                
                  $('.owl-productcate').owlCarousel({
                    loop: false,
                    margin: 25,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                
                $('.owl-recentproduct').owlCarousel({
                    loop: false,
                    margin: 0,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
                
            });
    
        </script>
    
    
    <script>
    $(document).ready(function(){
        $(".btnquantity").on("click", function () {
            var $button = $(this);
            var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();
            if ($button.hasClass("sp-plus")) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);
        });
        
        $(function(){
            jQuery('img.svg').each(function(){
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
    
                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');
    
                    // Add replaced image's ID to the new SVG
                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if(typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass+' replaced-svg');
                    }
    
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
    
                    // Check if the viewport is set, else we gonna set it if we can.
                    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                    }
    
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                    
                    $( '.mapoceania .svg path' ).click(function (event) {
                        var pathnation = $(this).attr('id');
                        
                    });
    
                }, 'xml');
    
            });
        });
        
    });    
    </script>
    
    
    <script>
    $(document).ready(function() {
        $(".tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });
        
    </script>
    
    
    <script type="text/javascript">
        $(document).ready(function () {
             var box_shipping = $('.box_shipping').find('input:checked').attr('rel');
            $('.box_shipping input').click(function () {
                var box_shipping = $('.box_shipping').find('input:checked').attr('rel');
                 if (  $('.'+box_shipping).is( ":hidden" ) ) {
                     $('.w_getyourself').slideUp();
                     $('.'+box_shipping).slideDown();
                 }else{
                     $('.w_getyourself').slideUp();
                 }
                
            });  
            
            $('.box_billing input').click(function () {
                var box_billing = $('.box_billing').find('input:checked').attr('rel');
                 if (  $('.'+box_billing).is( ":hidden" ) ) {
                     $('.w_newbilling').slideUp();
                     $('.'+box_billing).slideDown();
                 }else{
                     $('.w_newbilling').slideUp();
                 }
                
            });  
            
            $('.box_delivery input').click(function () {
                var box_delivery = $('.box_delivery').find('input:checked').attr('rel');
                 if (  $('.'+box_delivery).is( ":hidden" ) ) {
                     $('.w_delivery, .w_nextday').slideUp();
                     $('.'+box_delivery).slideDown();
                 }else{
                     $('.w_delivery, .w_nextday').slideUp();
                 }
                
            }); 
            
        });
    </script>
    

     <script type="text/javascript">
            $('.member_frmdate .input-group.date').datepicker({
                language: "th",
                 autoclose: true
            });
        </script>

        
    <script>
            // quantity plus minus
        /*$(document).on('click', '.box_quantity .minus', function(){
            var $_inp = $(this).parent().find('input');
            $_inp.val( parseInt( $_inp.val() ) - 1 );
            $_inp.trigger('propertychange');

            alert('abc');

            return false;
        });
        $(document).on('click', '.box_quantity .plus', function(){
            var $_inp = $(this).parent().find('input');
            $_inp.val( parseInt( $_inp.val() ) + 1 );
            $_inp.trigger('propertychange');

            alert('def');

            return false;
        });
        $('.quantity-input').bind('input propertychange', function () {
            var $this = $(this);
            $this.val( $this.val().replace(/[^0-9]/gim, '') );
            if ( $this.val().length == 0 || parseInt( $this.val() ) <= 0 )
            $this.val(1);

            alert('ghi');
        });*/
        </script>
        
       
        <script>
        $( '.item_faqs > .topicfaqs' ).click(function (event) {
          if (  $(this).siblings('.content_faqs').is( ":hidden" ) ) {
                $('.item_faqs').removeClass("active");
                $('.content_faqs').slideUp();
                $(this).parent('.item_faqs').addClass("active");
                $(this).siblings('.content_faqs').slideDown();
          } else {
              $('.item_faqs').removeClass("active");
                $('.content_faqs').slideUp();
          }
          event.stopPropagation();
        });
    </script>