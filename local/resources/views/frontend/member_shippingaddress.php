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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="myprofile.php">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>Shipping & Billing Address</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member_auto topicbar_member">Shipping Address <a href="member_newaddress.php" class="btn_white">+ Add New Address</a></div>
                        <div>
                            <div class="member_boxaddress">
                                <div class="topic_member_border">Address 1 
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477 <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="member_newaddress.php">edit</a> <button class="btn_member btn_del_red">delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="member_boxaddress">
                                <div class="topic_member_border">Address 2
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox"/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477 <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="member_newaddress.php">edit</a> <button class="btn_member btn_del_red">delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="topicbar_member_auto topicbar_member">Billing Address <a href="member_newaddress.php" class="btn_white">+ Add New Address</a></div>
                        <div>
                            <div class="member_boxaddress">
                                <div class="topic_member_border">Address 1 
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477 <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="member_newaddress.php">edit</a> <button class="btn_member btn_del_red">delete</button>
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
            $(".menu_account_left > ul > li:nth-child(2) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
