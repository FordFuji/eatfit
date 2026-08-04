<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>EAT FIT</title>

    @include('backend.layouts.components')
    @include('backend.layouts.style')
</head>

<body style="font-family: 'Kanit', sans-serif;">
<!-- Pre-loader start -->
{{-- <div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div> --}}
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include('backend.layouts.top_menu')

        @include('backend.layouts.inc_chat')


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('backend.layouts.letf_menu')

                <div class="pcoded-content">

                    @yield('content')
                    {{-- @include('layout_backoffice.option_template') --}}

                </div>
            </div>
        </div>
    </div>
</div>


</body>

<script>
  $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
</script>
  @yield('script')

</html>
