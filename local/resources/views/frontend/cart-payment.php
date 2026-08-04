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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="cart.php">My Cart</a> <span><i class="fas fa-chevron-right"></i></span> <a href="cart-shipping.php">Shipping</a> <span><i class="fas fa-chevron-right"></i></span> <div>Payment</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="cart_bggreen_topic cart_purple_topic">
                             <img src="images/icon_money.svg" alt=""> <div>Payment</div>
                         </div>

                         <div class="box_cart_shipping">
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">SHIPPING ADDRESS</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477
                                    </div>
                                    <div class="cart_iconedit"><a href="shipping_address.php"><i class="fas fa-edit"></i> Edit</a></div>
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">Billing ADDRESS</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477
                                    </div>
                                    <div class="cart_iconedit"><a href="shipping_address.php"><i class="fas fa-edit"></i> Edit</a></div>
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">SHIPPING delivery</div>
                                 <div class="box_shipping">
                                    <div class="box_descpayment_dt">
                                        <div><i class="far fa-calendar-alt"></i> Date:  28.09.2020 </div>
                                        <div><i class="far fa-clock"></i> Time:   10:00 – 12:00 am</div>
                                    </div>
                                    <div class="cart_iconedit"><a href="cart-shipping.php"><i class="fas fa-edit"></i> Edit</a></div>
                                </div>
                             </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bgpink">Payment</div>
                             <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="nextday" type="radio" name="shipdelivery" rel="w_nextday">
                                <label for="nextday">ATM / Internet Banking</label>
                            </div>
                            <div class="w_nextday w_paymentbank">
                                <div class="cart_topic_shipping">Payment Account</div>
                                <div class="bgwhite_payment">
                                    <div class="kbank_txt"><img src="images/icon_kbank_04.jpg" alt=""> Kasikorn Bank</div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Name Account :</span> Eatfit
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Type of Account  :</span> Deposit
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Branch :</span> Central Rama 3 Sub
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Account No. :</span> 048-0-12859-4
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="otherdelivery" type="radio" name="shipdelivery" rel="w_delivery">
                                <label for="otherdelivery">Credit Card</label>
                            </div>
                            <div class="w_delivery w_paymentbank">
                                <div class="icon_visa"><img src="images/icon_visa_03.png" alt=""></div>
                                <div class="row form_cartlogin">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Card Number</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name on Card</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Expiration Date (MM / YY)</label>
                                            <input class="form-control form-control-lg" placeholder="MM/YY">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Security Code</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>

                    </div>
                
                <div class="col-12 col-lg-5">
                    <?php require('inc_summarycart.php'); ?>
                </div>
                
                </div>
                
                <div class="col-12">
                    <div class="cart_boxborder_btn">
                      <div class="row">
                          <div class="col-12 col-lg-5 col-xl-7"></div>
                          <div class="col-12 col-lg-7 col-xl-5">
                              <div class="row box_btncart_a">
                                  <div class="col-7 col-sm-6">
                                       <a href="cart-shipping.php" class="btn_default btn_brown">back</a>
                                  </div>
                                  <div class="col-5 col-sm-6">
                                      <a href="thankyou.php" class="btn_default btn_green">continue</a>
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
		
	</div>

	
	

</body>

</html>
