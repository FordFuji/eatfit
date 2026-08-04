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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="myprofile.php">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>My Point</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">My Point</div>
                        
                        <div class="txt_point1">Earn points</div>
                        <div class="mypoint_yourpoint">
                            <div>Buy  89  thb </div>
                            <div class="point_iconarrow"><img src="images/arrow_white.svg" alt=""></div>
                            <div>get   1   point !</div>

                            <div class="box_yourpoint">
                                <div class="icon_point_c"><img src="images/icon_point.svg" class="svg" alt=""></div>
                                <div class="numpoint_c">199</div>
                                <div class="t_mpoint">My Point</div>
                            </div>
                        </div>
                        <div class="box_pointinfo">
                            <div class="topic_pointinfo">Conditions for earning points</div>
                            <ul>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
has been the industry's standard dummy text ever since the 1500s
                                </li>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
has been the industry's standard dummy text ever since the 1500s
                                </li>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
has been the industry's standard dummy text ever since the 1500s
                                </li>
                            </ul>
                        </div>
                        
                        <div class="topbar_rewards">EATFIT Rewards</div>
                        <div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-md-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-md-6">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="txt_redeempoint">Redeem 100 points</div>
                                     </div>
                                     <div class="col-9 offset-3 col-md-4 offset-md-0">
                                         <a href="page-reviews.php" class="btnredeem btnreview">redeem</a>
                                         <div class="noti_unsuccesspoint">ขออภัยค่ะ แต้มของท่านไม่พอค่ะ</div>
                                     </div>
                                 </div>
                             </div>
                            <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-md-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-md-6">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="txt_redeempoint">Redeem 100 points</div>
                                     </div>
                                     <div class="col-9 offset-3 col-md-4 offset-md-0">
                                         <a href="page-reviews.php" class="btnredeem btnreview">redeem</a>
                                     </div>
                                 </div>
                             </div>
                            <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-md-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-md-6">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="txt_redeempoint">Redeem 100 points</div>
                                     </div>
                                     <div class="col-9 offset-3 col-md-4 offset-md-0">
                                         <a href="page-reviews.php" class="btnredeem btnreview">redeem</a>
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
            $(".menu_account_left > ul > li:nth-child(5) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
