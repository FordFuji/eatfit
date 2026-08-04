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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>My Account</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">Change Password</div>
                        <div class="form_cartlogin">
                            <div class="row">
                                <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> Current Password</label>
                                        <input class="form-control form-control-lg" value="lalita">
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> New Password</label>
                                        <input class="form-control form-control-lg" value="lalita">
                                      </div>
                                 </div>
                                <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> Confirm Password</label>
                                        <input class="form-control form-control-lg" value="lalita">
                                      </div>
                                 </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green">save</button>
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
            $(".menu_account_left > ul > li:nth-child(7) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
