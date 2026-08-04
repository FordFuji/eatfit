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
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">Review</div>
                        
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="review_photomb"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""> </div>   
                            </div>
                            <div class="col-12 col-sm-9">
                                <div>
                                    <div class="txt_topicreview">How do you think about the :</div>
                                    <div class="review_pname">choize - Chocolate</div>
                                    <div>
                                        The Mediterranean diet has been getting a lot of buzz lately. Why? 
Because it has consistently been proven to be one of the best diets 
for weight loss and overall health
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box_review_rating">
                            <div class="txt_reviewrate">Rating</div>
                            <div class="review_rating">
                                <div class="rating">
                                    <input type="radio" name="test" id="one" checked />
                                    <label for="one"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="test" id="two" />
                                    <label for="two"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="test" id="three" />
                                    <label for="three"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="test" id="four" />
                                    <label for="four"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="test" id="five" />
                                    <label for="five"><i class="fa fa-star"></i></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form_cartlogin">
                            <div class="row">
                                <div class="col-12">
                                     <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control form-control-lg">
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label>Your review</label>
                                        <textarea class="form-control" name="" id="" rows="6"></textarea>
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label>Photo</label>
                                        <div class="review_photoupload">
                                            <div class="box_photoupload">
                                                <div class="item_photoupload">
                                                    <figure><img src="images/photo_product1_03.jpg" alt=""></figure>
                                                    <button><i class="fas fa-times-circle"></i> Delete</button>
                                                </div>
                                                <div class="item_photoupload">
                                                    <figure><img src="images/photoproduct_03.jpg" alt=""></figure>
                                                    <button><i class="fas fa-times-circle"></i> Delete</button>
                                                </div>
                                                <div class="item_photoupload">
                                                    <figure><img src="images/photo_product1_03.jpg" alt=""></figure>
                                                    <button><i class="fas fa-times-circle"></i> Delete</button>
                                                </div>
                                                <div class="item_photoupload">
                                                    <figure><img src="images/photoproduct_03.jpg" alt=""></figure>
                                                    <button><i class="fas fa-times-circle"></i> Delete</button>
                                                </div>
                                            </div>
                                            <div class="btn_review_addphoto">
                                                <span class="label">add a photo</span>
                                                <input type="file" name="upload" class="upload-box" placeholder="Upload File">
                                            </div>
                                        </div>
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label>Video</label>
                                        <div class="review_photoupload review_vdoupload">
                                            <div class="box_vdoupload">
                                                <video width="100%" controls>
                                                  <source src="video/sample-mp4-file.mp4" type="video/mp4">
                                                </video>
                                                <button><i class="fas fa-times-circle"></i> Delete</button>
                                            </div>
                                            <div class="btn_review_addphoto">
                                                <span class="label">upload video</span>
                                                <input type="file" name="upload" class="upload-box" placeholder="Upload File">
                                            </div>
                                        </div>
                                      </div>
                                 </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green">review</button>
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
            $(".menu_account_left > ul > li:nth-child(6) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
