<meta charset="utf-8">
<?php
if (empty($_title)) $_title = '';
if (empty($_keywords)) $_keywords = '';
if (empty($_description)) $_description = '';
?>

<title>
    <?php echo $_title;?>
</title>
<meta name="keywords" content="<?php echo $_keywords;?>"/>
<meta name="description" content="<?php echo $_description;?>"/>
<meta name="robot" content="index, follow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link type="image/ico" rel="shortcut icon" href="{{asset('/files/frontend/images/favicon.ico')}}">
<link href="{{asset('/files/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/files/frontend/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('/files/frontend/fontawesome/css/all.min.css')}}" rel="stylesheet">
<link href="{{asset('/files/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('/files/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/files/frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('/files/frontend/css/jquery.fancybox.min.css')}}"/>
<link rel="stylesheet" href="{{asset('/files/frontend/css/bootstrap-datepicker3.standalone.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('/files/frontend/css/layout.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('/files/frontend/css/menu.css')}}"/>

<!-- Global site tag (gtag.js) - Google Ads: 452802633 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-452802633"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-452802633'); </script>