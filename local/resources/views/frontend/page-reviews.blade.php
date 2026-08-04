<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')
</head>

<body>

	<div class="container-fluid footer_notop">
	
		@include('frontend.layouts.inc_menu')
<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
< script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script -->
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/LANG.js"></script>
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
                    @include('frontend.inc_menuaccount')
                    @if(!empty($product))
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">Review</div>
                        
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="review_photomb"><img src="{{url($product->img_products)}}" class="img-fluid" alt=""> </div>   
                            </div>
                            <div class="col-12 col-sm-9">
                                <div>
                                    <div class="txt_topicreview">How do you think about the :</div>
                                    <div class="review_pname">
                                        @if(App::isLocale('th'))
                                    {{$product->name_products_thai}}
                                    @else
                                    {{$product->name_products_eng}}
                                    @endif
                                    </div>
                                    <div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{url('/ReviewsSave')}}" method="POST" name="add_reg" enctype="multipart/form-data" >
                            @csrf
                        <div class="box_review_rating">
                            <div class="txt_reviewrate">Rating</div>
                            <div class="review_rating">
                                <div class="rating" >
                                    <input type="radio" name="review_star" id="one" value="1" checked />
                                    <label for="one"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="review_star" id="two" value="2" />
                                    <label for="two"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="review_star" id="three" value="3" />
                                    <label for="three"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="review_star" id="four" value="4" />
                                    <label for="four"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="review_star" id="five" value="5" />
                                    <label for="five"><i class="fa fa-star"></i></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="review_menu" value="{{$product->products_id}}">
                        <input type="hidden" name="review_member" value="{{$member->member_id}}">
                        <input type="hidden" name="review_orderno" value="{{$order}}">
                        <div class="form_cartlogin">
                            <div class="row">
                                <div class="col-12">
                                     <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control form-control-lg" name="review_title">
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label>Your review</label>
                                        <textarea class="form-control" name="review_content" id="" rows="6" ></textarea>
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        {{-- <label >Photo</label> --}}
                                        <div class="review_photoupload">
                                            <div class="box_photoupload">
                                                <div class="item_photoupload ">
                                                    {{-- <figure><img src="" alt="" id="imgactivitiesBA"></figure> --}}
                                                    {{-- <button><i class="fas fa-times-circle"></i> Delete</button> --}}
                                                    {{-- <img src="" alt="" id="imgactivitiesBA" style="height: 300px"> --}}
                                                </div>
                                            </div>
                                            <div class="btn_review_addphoto">
                                                <span class="label">add a photo</span><br><br>
                                                <input type="file" id="input-id" name="upload_img[]" id="imageactivitiesBA" class="upload-box" placeholder="Upload File" accept="image/*" multiple >
                                            </div>
                                        </div>
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        {{-- <label>Video</label> --}}
                                        <div class="review_photoupload review_vdoupload">
                                            <div class="box_vdoupload">
                                                {{-- <video width="100%" controls>
                                                  <source src="video/sample-mp4-file.mp4" type="video/mp4">
                                                </video>
                                                <button><i class="fas fa-times-circle"></i> Delete</button> --}}
                                            </div>
                                            <div class="btn_review_addphoto">
                                                <span class="label">upload video</span><br><br>
                                                <input type="file" id="input-Vdio" name="upload_vdo[]" class="upload-box" placeholder="Upload File" accept="video/*" >
                                            </div>
                                        </div>
                                      </div>
                                 </div>
                                 {{-- <label for="input-24">Planets and Satellites</label> --}}
{{-- <div class="file-loading">
    <input id="input-24" name="input24[]" type="file" multiple>
</div> --}}
{{-- <input id="input-id" type="file"  class="file" data-preview-file-type="text" multiple> --}}
<script>
    $("#input-id").fileinput();
 
 // with plugin options
 $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});

 $("#input-Vdio").fileinput();
 
 // with plugin options
 $("#input-Vdio").fileinput({'showUpload':false, 'previewFileType':'any'});

// $(document).ready(function() {
//     var url1 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
//         url2 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg';
//     $("#input-24").fileinput({
//         initialPreview: [url1, url2],
//         initialPreviewAsData: true,
//         initialPreviewConfig: [
//             {caption: "Moon.jpg", downloadUrl: url1, size: 930321, width: "120px", key: 1},
//             {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
//         ],
//         deleteUrl: "/site/file-delete",
//         overwriteInitial: false,
//         maxFileSize: 100,
//         initialCaption: "The Moon and the Earth"
//     });
// });
// </script>
                         </button>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green" type="submit">review</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
		</section>
		
		
		
        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
    
		
		<script>
            $(".menu_account_left > ul > li:nth-child(6) > a").addClass("here");
        </script>
		
	</div>
    {{-- {{asset('/files/frontend/dropzone/dist/dropzone.js')}} --}}
	<script src="{{asset('/files/frontend/dropzone/dist/dropzone.js')}}"></script>
	<script>
    function readURLBa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgactivitiesBA').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageactivitiesBA").change(function () {
        readURLBa(this);
    });
    </script>

</body>

</html>
