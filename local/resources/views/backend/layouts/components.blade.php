{{-- <!DOCTYPE html>
<html lang="en" class="no-js">
<head> --}}
{{-- <title>Backoffice</title> --}}
<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 10]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="description"
      content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
<meta name="keywords"
      content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive"/>
<meta name="author" content="codedthemes"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<!-- Favicon icon -->
<link rel="icon" href="{{asset('/files/backend/assets/images/fav-icon.png')}}" type="image/x-icon">
<!-- ion icon css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/icon/ion-icon/css/ionicons.min.css')}}">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css"
      href="{{asset('files/backend/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css"
      href="{!! URL::asset('/files/backend/assets/icon/themify-icons/themify-icons.css')!!}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/icon/icofont/css/icofont.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/icon/font-awesome/css/font-awesome.min.css')}}">
<!-- simple line icon -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/icon/simple-line-icons/css/simple-line-icons.css')}}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/icon/themify-icons/themify-icons.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/icon/font-awesome/css/font-awesome.min.css')}}">
<!-- Switch component css -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/switchery/css/switchery.min.css')}}">
<!-- Tags css -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}"/>
<!-- typicon icon -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/icon/typicons-icons/css/typicons.min.css')}}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/css/jquery.mCustomScrollbar.css')}}">

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet"> -->
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

<!-- light-box css -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/ekko-lightbox/css/ekko-lightbox.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/lightbox2/css/lightbox.css')}}">
{{-- custom css --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

<link type="text/css" rel="stylesheet" href="{{asset('/imguplode/dist/image-uploader.min.css')}}">


@yield('head')
<style>
    .modal {
        overflow-y: scroll;
    }
</style>

{{-- @include('layout_backoffice.style') --}}

{{-- </head> --}}

{{-- <body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div> --}}
<!-- Pre-loader end -->
{{-- <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @include('layout_backoffice.top_menu')
        @include('layout_backoffice.inc_chat')
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('layout_backoffice.left_menu')
                <div class="pcoded-content">
                    @yield('content')
                    @include('layout_backoffice.option_template')
                </div>
            </div>
        </div>
    </div>
</div> --}}


@if(Session::has('success'))
    {!! alertSuccess(Session::get("success"),'success') !!}
@endif
@if(Session::has('error'))
    {!! alertError(Session::get("error"),'error') !!}
@endif
@if(Session::has('info'))
    {!! alertInfo(Session::get("info"),'info') !!}
@endif
{{-- @include('layout_backoffice.footer') --}}

<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{!! URL::asset('backend/files/assets/images/browser/chrome.png')!!}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{!! URL::asset('backend/files/assets/images/browser/firefox.png')!!}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{!! URL::asset('backend/files/assets/images/browser/opera.png')!!}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{!! URL::asset('backend/files/assets/images/browser/safari.png')!!}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{!! URL::asset('backend/files/assets/images/browser/ie.png')!!}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<script src="{{asset('/files/backend/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/popper.js/js/popper.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script src="{{asset('/files/backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script src="{{asset('/files/backend/bower_components/modernizr/js/modernizr.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('/files/backend/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/script.js')}}"></script>

<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- data-table js -->
<script src="{{asset('/files/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
</script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}">
</script>
<script
    src="{{asset('/files/backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script
    src="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
</script>
{{-- custom js --}}
<script src="{{asset('js/custom.js')}}"></script>
<!-- light-box js -->
<script src="{{asset('/files/backend/bower_components/ekko-lightbox/js/ekko-lightbox.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/lightbox2/js/lightbox.js')}}"></script>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css"
      href="{{asset('/files/backend/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}"/>

  
@yield('script')
<script>
    $(document).ready(function () {
        var path = document.URL;
        $('.pcoded-item li').filter(function () {
            return $('a', this).attr('href') === path;
        }).parents("li").addClass('active pcoded-trigger');
        $('.pcoded-item li').filter(function () {
            return $('a', this).attr('href') === path;
        }).addClass('active');
        // console.log("ready!");
    });
</script>
<script>
    $("#example1").DataTable();
</script>
<script>
    //light box
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
{{-- <script>
    $('#divBtnImg').hide();
    function alertSuccessJs(title, text, success) {
        swal({
            title: "" + title + "",
            text: "" + text + "",
            icon: "" + success + "",
            timer: 3000,
            button: "OK",
        });
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#divBtnImg').show();
        } else {
            $('#divBtnImg').hide();
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#divBtnImg').show();
        } else {
            $('#divBtnImg').hide();
        }
    }
    $(".dropper-default").dateDropper({
        dropWidth: 200,
        dropPrimaryColor: "#1abc9c",
        dropBorder: "1px solid #1abc9c",
        maxYear: "{!! date('Y')+30 !!}",
        dateFormat: 'dddd-mmmm-yy'
    });
    $('.select2').select2();
    $('.autonumber').autoNumeric('init');
</script> --}}
{{-- </body>
</html> --}}
{{-- //datepicker --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<!-- Bootstrap date-time-picker js -->
<script src="{{asset('/files/backend/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Date-range picker js -->
<script src="{{asset('/files/backend/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<!-- Date-dropper js -->
<script src="{{asset('/files/backend/bower_components/datedropper/js/datedropper.min.js')}}"></script>
<!-- Color picker js -->
<script src="{{asset('/files/backend/bower_components/spectrum/js/spectrum.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/jscolor/js/jscolor.js')}}"></script>

<link href="{{asset('/files/backend/bootstrap-datepicker-custom/dist/css/bootstrap-datepicker.css')}}"
      rel="stylesheet"/>
<script src="{{asset('/files/backend/bootstrap-datepicker-custom/dist/js/bootstrap-datepicker-custom.js')}}"></script>
<script src="{{asset('/files/backend/bootstrap-datepicker-custom/dist/locales/bootstrap-datepicker.th.min.js')}}"
        charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('/imguplode/dist/image-uploader.min.js')}}"></script>

<!-- summernote -->
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- End summernote -->
