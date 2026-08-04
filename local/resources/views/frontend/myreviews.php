<!doctype html>
<html>

<head>
	<?php require('inc_head.php'); ?>
</head>

<body>

	<div class="container-fluid footer_notop">
	
		<?php require('inc_menu.php'); ?>

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="myprofile.php">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>Review</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">Review</div>
                        <div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		
		
		
		<?php require('inc_footer.php'); ?>
		<?php require('scriptjs.php'); ?>
		
		<script>
            $(".menu_account_left > ul > li:nth-child(6) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
