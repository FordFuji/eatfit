<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script> 
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/bootstrap-datepicker.th.min.js"></script>
    
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
    
     $( '.btn_addcart' ).click(function (event) {
            $('.cartbox').show('fade');
            $('.cartbox').delay( 3000 ).hide('fade', 1000);
        event.preventDefault();
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
				autoplay: false,
                rewind: true,
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
        $('.input-group.date').datepicker({
            language: "th"
        });
    </script>
    
<script>
    	// quantity plus minus
	$(document).on('click', '.box_quantity .minus', function(){
		var $_inp = $(this).parent().find('input');
		$_inp.val( parseInt( $_inp.val() ) - 1 );
		$_inp.trigger('propertychange');
		return false;
	});
	$(document).on('click', '.box_quantity .plus', function(){
		var $_inp = $(this).parent().find('input');
		$_inp.val( parseInt( $_inp.val() ) + 1 );
		$_inp.trigger('propertychange');
		return false;
	});
	$('.quantity-input').bind('input propertychange', function () {
		var $this = $(this);
		$this.val( $this.val().replace(/[^0-9]/gim, '') );
		if ( $this.val().length == 0 || parseInt( $this.val() ) <= 0 )
		$this.val(1);
	});
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