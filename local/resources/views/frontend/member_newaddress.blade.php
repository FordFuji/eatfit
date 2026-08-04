<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')
</head>

<body>

    <div class="container-fluid footer_notop">

        @include('frontend.layouts.inc_menu')

        <section class="row">
            <div class="container">
                <div class="row wrap_navigationbar">
                    <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <a href="{{url('/myprofile')}}">@if(Session::get('lang') == 'th') สมาชิก @else Member @endif</a> <span><i class="fas fa-chevron-right"></i></span>
                    <div>@if(Session::get('lang') == 'th') การจัดส่งและการเรียกเก็บเงิน @else Shipping & Billing Address @endif</div>
                </div>
            </div>
        </section>

        <section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')

                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่ง @else Shipping Address @endif</div>
                        <div class="topic_member_border">@if(Session::get('lang') == 'th') ที่อยู่ใหม่ @else New Address @endif</div>
                        <div class="form_cartlogin">
                            <form action="{{url('/AddressSaveUpdate')}}" method="POST" name="add_reg" enctype="multipart/form-data" onsubmit="return checkMember();">
                                @csrf
                            <div class="row">
                                {{-- <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label><span>*</span> Name</label>
                                        <input class="form-control form-control-lg" name="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label><span>*</span> Family Name</label>
                                        <input class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label><span>*</span> Email Address</label>
                                        <input class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label><span>*</span> Phone Number</label>
                                        <input class="form-control form-control-lg">
                                    </div>
                                </div> --}}
                                <input type="hidden" name="idadd">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>@if(Session::get('lang') == 'th') ที่อยู่ @else Address @endif</label>
                                        <input class="form-control form-control-lg" name="member_address" placeholder="@if(Session::get('lang') == 'th') ที่อยู่ @else Address @endif" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>@if(Session::get('lang') == 'th') จังหวัด @else Province @endif</label>
                                            <select class="form-control form-control-lg" name="member_province" required onchange="changeProvince(this.value);">
                                                <option value="">@if(Session::get('lang') == 'th') จังหวัด @else Province @endif</option>
                                                @if(!empty($province))
                                                    @foreach($province as $r)
                                                <option value="{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en }}">{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>@if(Session::get('lang') == 'th') เขต/อำเภอ @else District @endif</label>
                                        <select class="form-control form-control-lg" name="member_district" id="member_district" required onchange="changeAmphur(this.value);">
                                            <option value="">@if(Session::get('lang') == 'th') เขต/อำเภอ @else District @endif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>@if(Session::get('lang') == 'th') แขวง/ตำบล @else Sub-district @endif</label>
                                        <select class="form-control form-control-lg" name="member_sub_district" id="member_sub_district" required>
                                            <option value="">@if(Session::get('lang') == 'th') แขวง/ตำบล @else Sub-District @endif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>@if(Session::get('lang') == 'th') รหัสไปรษณีย์ @else Postcode @endif </label>
                                        <input class="form-control form-control-lg" name="member_postcode" placeholder="@if(Session::get('lang') == 'th') รหัสไปรษณีย์ @else Postcode @endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="btn_submit_regis">
                                            <button class="btn_default btn_green" type="submit">@if(Session::get('lang') == 'th') บันทึก @else save @endif</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')


        <script>
            $(".menu_account_left > ul > li:nth-child(2) > a").addClass("here");

        </script>

    </div>

    <script>

        function changeProvince(province_name) {
            $.post('<?php echo url("ajaxChangeProvince");?>', { province_name: province_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#member_district").html(data);
            });
        }

        function changeAmphur(amphur_name) {
            $.post('<?php echo url("ajaxChangeAmphur");?>', { amphur_name: amphur_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#member_sub_district").html(data);
            });
        }
    </script>


</body>

</html>
