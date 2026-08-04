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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="myprofile.php">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>My Order</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">My Order</div>
                        <div>
                            <div class="cart_topic_shipping">Payment notification</div>
                            <div class="bggrey_thx">
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Order Number</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">EATFIT62100000000015</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Date</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">10/10/19</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Payment Method</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">ATM / Intenet Banking</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Promotion Code</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">eatfit2020</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Discount</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">-10%(30) THB</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Shipping</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">100 THB</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">Total</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">500 THB</div></div>
                                 </div>
                             </div>
                             
                             <div class="form_cartlogin">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> Phone Number</label>
                                                <input class="form-control form-control-lg">
                                                <small class="form-text text-muted">Please give me your contact number. In case of errors in verifying information We will be able to contact you.</small>
                                          </div>
                                     </div>
                                     <div class="col-12">
                                          <div class="form-group">
                                            <label><span>*</span> Bank</label>
                                            <div class="bggrey_uploadslip">
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
                                     </div>
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> Amount</label>
                                                <input class="form-control form-control-lg">
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group member_frmdate">
                                                <label><span>*</span> Date</label>
                                                <div class="input-group date box_inlinedate">
                                                  <input type="text" class="form-control form-control-lg" placeholder="วว/ดด/ปป"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group member_frmdate">
                                            <label><span>*</span> Time</label>
                                             <div class="box_inlinedate">
                                                <input class="form-control form-control-lg" value="--/--"><span><i class="far fa-clock"></i></span>
                                            </div>
                                          </div>
                                     </div>
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label>Message</label>
                                                <input class="form-control form-control-lg">
                                          </div>
                                     </div>
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> Upload Payment Slip</label>
                                                <input type="file" class="form-control-file">
                                          </div>
                                     </div>
                                 </div>
                             </div>
                             
                             <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green">send</button>
                                         </div>
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
            $(".menu_account_left > ul > li:nth-child(4) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
