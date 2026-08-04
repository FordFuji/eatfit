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
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart')}}">@if(Session::get('lang') == 'th') ตระกร้าสินค้า @else My Cart @endif</a> <span><i class="fas fa-chevron-right"></i></span>  <div>@if(Session::get('lang') == 'th') การจัดส่ง @else Shipping @endif</div>
                 </div>
		    </div>
		</section>
        
		<section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="cart_bggreen_topic cart_bgyellow_topic">
                             <img src="{{asset('files/frontend/images/icon_home-white.svg')}}" alt=""> @if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่ง @else Shipping Address @endif
                         </div>

                         <div class="box_cart_shipping">
                             <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่งของคุณ @else your SHIPPING ADDRESS @endif {!!((!empty($member_address) and $member_address->member_address == '') and (empty($shipping_address))) ? '<br><span style="color: red; font-size: 12px;">@if(Session::get("lang") == "th") กรุณาใส่ที่อยู่ของคุณ @else Please enter your shipping address @endif' : ''!!}</div>
                             <div class="md-radio md-radio-inline box_shipping">
                                <input id="sameaddship" type="radio" name="ship01" rel="sameaddress" {{Session::get('type_shipping_address') == true ? 'checked' : ''}} {{((!empty($member_address) and $member_address->member_address == '') and (empty($shipping_address))) ? 'disabled' : ''}}>
@if(!empty($shipping_address))
                                <label for="sameaddship">{{$shipping_address->member_name.' '.$shipping_address->member_family}}</label>
                                <div class="cart_sameaddress">
                                    <div>
                                        {{$shipping_address->address_no.', '.$shipping_address->address_sub_distric.', '.$shipping_address->address_distric.', '.$shipping_address->address_province.' '.$shipping_address->address_postcode}}<br>
                                        @if(Session::get('lang') == 'th') อีเมล @else Email @endif :  {{$shipping_address->member_email}} <br>
                                        @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{$shipping_address->member_phone_number}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="{{url('shipping_address')}}"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
@elseif(!empty($member_address))
    @if($member_address->member_address != '')
                                <label for="sameaddship">{{$member_address->member_name.' '.$member_address->member_family}}</label>
                                <div class="cart_sameaddress">
                                    <div>
                                        {{$member_address->member_address.', '.$member_address->member_sub_district.', '.$member_address->member_district.', '.$member_address->member_province.' '.$member_address->member_postcode}}<br>
                                        Email :  {{$member_address->member_email}} <br>
                                        Phone :  {{$member_address->member_phone_number}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="{{url('shipping_address')}}"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
    @else 
                                <label for="sameaddship">{{$member_address->member_name.' '.$member_address->member_family}}</label>
                                <div class="cart_sameaddress">
                                    <div>
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="{{url('shipping_address')}}"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
    @endif
@endif
                            </div>
                            <div class="box_ship_nobg md-radio md-radio-inline box_shipping">
                                <div class="cart_btn_addnew">
                                    <input id="newaddship" type="radio" name="ship01" rel="w_getyourself" >
                                    <label for="newaddship"><i class="fas fa-plus"></i> @if(Session::get('lang') == 'th') เพิ่มที่อยู่ใหม่ @else Add New Address @endif</label>
                                </div>
                            </div>
                            <div class="w_getyourself">
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') ชื่อ @else Name @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_name" id="order_detail_shipping_name" value="{{Session::get('order_detail_shipping_name') != '' ? Session::get('order_detail_shipping_name') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') นามสกุล @else Family Name @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_family" id="order_detail_shipping_family" value="{{Session::get('order_detail_shipping_family') != '' ? Session::get('order_detail_shipping_family') : ''}}">
                                              </div>
                                         </div>
@if(!empty(Session::get('order_detail_birth_day')))
    @php
    $order_detail_birth_day = explode('-', Session::get('order_detail_birth_day'));
    @endphp
@endif
                                         <div class="col-12">
                                             <label><span>*</span> @if(Session::get('lang') == 'th') วัน เดือน ปีเกิด @else Date of Birth @endif</label>
                                             <div class="row">
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg" name="birth_day" id="birth_day" >
                                                            <option value="">@if(Session::get('lang') == 'th') วัน @else Day @endif</option>
@for($i = 1; $i <= 31; $i++) 
    @if(strlen($i) == 1) {
                                                            <option value="0{{$i}}" @if(!empty($order_detail_birth_day[2]) and $order_detail_birth_day[2] == '0'.$i) selected @endif>0{{$i}}</option>
    @else
                                                            <option value="{{$i}}" @if(!empty($order_detail_birth_day[2]) and $order_detail_birth_day[2] == $i) selected @endif>{{$i}}</option>
    @endif
@endfor
                                                            <!-- <option value="01">1</option>
                                                            <option value="02">2</option>
                                                            <option value="03">3</option>
                                                            <option value="04">4</option>
                                                            <option value="05">5</option>
                                                            <option value="06">6</option>
                                                            <option value="07">7</option>
                                                            <option value="08">8</option>
                                                            <option value="09">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option> -->
                                                        </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg" name="birth_month" id="birth_month" >
                                                          <option value="">@if(Session::get('lang') == 'th') เดือน @else Month @endif</option>
                                                           <option value="01" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '01') selected @endif>January</option>
                                                            <option value="02" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '02') selected @endif>Febuary</option>
                                                            <option value="03" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '03') selected @endif>March</option>
                                                            <option value="04" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '04') selected @endif>April</option>
                                                            <option value="05" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '05') selected @endif>May</option>
                                                            <option value="06" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '06') selected @endif>June</option>
                                                            <option value="07" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '07') selected @endif>July</option>
                                                            <option value="08" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '08') selected @endif>August</option>
                                                            <option value="09" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '09') selected @endif>September</option>
                                                            <option value="10" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '10') selected @endif>October</option>
                                                            <option value="11" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '11') selected @endif>November</option>
                                                            <option value="12" @if(!empty($order_detail_birth_day[1]) and $order_detail_birth_day[1] == '12') selected @endif>December</option>
                                                        </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg" name="birth_year" id="birth_year" >
                                                        <option value="">@if(Session::get('lang') == 'th') ปี @else Year @endif</option>
@for($i = 2020; $i >= 1930; $i--)
                                                        <option value="{{$i}}" @if(!empty($order_detail_birth_day[0]) and $order_detail_birth_day[0] == $i) selected @endif>{{$i}}</option>
@endfor
                                                        <!-- 
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                        <option value="1969">1969</option>
                                                        <option value="1968">1968</option>
                                                        <option value="1967">1967</option>
                                                        <option value="1966">1966</option>
                                                        <option value="1965">1965</option>
                                                        <option value="1964">1964</option>
                                                        <option value="1963">1963</option>
                                                        <option value="1962">1962</option>
                                                        <option value="1961">1961</option>
                                                        <option value="1960">1960</option>
                                                        <option value="1959">1959</option>
                                                        <option value="1958">1958</option>
                                                        <option value="1957">1957</option>
                                                        <option value="1956">1956</option>
                                                        <option value="1955">1955</option>
                                                        <option value="1954">1954</option>
                                                        <option value="1953">1953</option>
                                                        <option value="1952">1952</option>
                                                        <option value="1951">1951</option>
                                                        <option value="1950">1950</option>
                                                        <option value="1949">1949</option>
                                                        <option value="1948">1948</option>
                                                        <option value="1947">1947</option>
                                                        <option value="1946">1946</option>
                                                        <option value="1945">1945</option>
                                                        <option value="1944">1944</option>
                                                        <option value="1943">1943</option>
                                                        <option value="1942">1942</option>
                                                        <option value="1941">1941</option>
                                                        <option value="1940">1940</option>
                                                        <option value="1939">1939</option>
                                                        <option value="1938">1938</option>
                                                        <option value="1937">1937</option>
                                                        <option value="1936">1936</option>
                                                        <option value="1935">1935</option>
                                                        <option value="1934">1934</option>
                                                        <option value="1933">1933</option>
                                                        <option value="1932">1932</option>
                                                        <option value="1931">1931</option>
                                                        <option value="1930">1930</option>
                                                        -->
                                                    </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') อีเมล์ @else Email Address @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_email" id="order_detail_shipping_email" value="{{Session::get('order_detail_shipping_email') != '' ? Session::get('order_detail_shipping_email') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone Number @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_phone_number" id="order_detail_shipping_phone_number" value="{{Session::get('order_detail_shipping_phone_number') != '' ? Session::get('order_detail_shipping_phone_number') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>@if(Session::get('lang') == 'th') ทีอยู่ @else Address @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_address" id="order_detail_shipping_address" value="{{Session::get('order_detail_shipping_address') != '' ? Session::get('order_detail_shipping_address') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') จังหวัด @else Province @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_province" id="order_detail_shipping_province"  onchange="changeShippingProvince(this.value);">
                                                    <option value="">@if(Session::get('lang') == 'th') จังหวัด @else Province @endif</option>
@if(!empty($province))
    @foreach($province as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en}}" @if(Session::get('lang') == 'th' and $r->province_name_th == Session::get('order_detail_shipping_province')){{'selected'}}@elseif(Session::get('lang') == 'en' and $r->province_name_en == Session::get('order_detail_shipping_province')){{'selected'}}@endif>{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en}}</option>
    @endforeach
@endif
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') เขต/อำเภอ @else District @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_district" id="order_detail_shipping_district"  onchange="changeShippingAmphur(this.value);">
                                                    <option value="">@if(Session::get('lang') == 'th') เขต/อำเภอ @else District @endif</option>
@if(!empty(Session::get('order_detail_shipping_province')))
    @php
    $amphur = DB::table('lv_amphur')
        ->join('lv_province', 'lv_amphur.province_id', '=', 'lv_province.province_id')
        ->where('lv_province.province_name_th', '=', Session::get('order_detail_shipping_province'))
        ->orWhere('lv_province.province_name_en', '=', Session::get('order_detail_shipping_province'))
        ->get();
    @endphp
    @if(!empty($amphur))
        @foreach($amphur as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->amphur_name_th : $r->amphur_name_en}}" {{(Session::get('order_detail_shipping_district') == $r->amphur_name_th or Session::get('order_detail_shipping_district') == $r->amphur_name_en) ? 'selected' : ''}}>{{Session::get('lang') == 'th' ? $r->amphur_name_th : $r->amphur_name_en}}</option>
        @endforeach
    @endif
@endif
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') แขวง/ตำบล @else Sub-district @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_sub_district" id="order_detail_shipping_sub_district" >
                                                    <option value="">@if(Session::get('lang') == 'th') แขวง/ตำบล @else Sub-District @endif</option>
@if(!empty(Session::get('order_detail_shipping_district')))
    @php
    $tumbol = DB::table('lv_tumbol')
        ->join('lv_amphur', 'lv_tumbol.amphur_id', '=', 'lv_amphur.amphur_id')
        ->where('lv_amphur.amphur_name_th', '=', Session::get('order_detail_shipping_district'))
        ->orWhere('lv_amphur.amphur_name_en', '=', Session::get('order_detail_shipping_district'))
        ->get();
    @endphp
    @if(!empty($tumbol))
        @foreach($tumbol as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->tumbol_name_th : $r->tumbol_name_en}}" {{(Session::get('order_detail_shipping_sub_district') == $r->tumbol_name_th or Session::get('order_detail_shipping_sub_district') == $r->tumbol_name_en) ? 'selected' : ''}}>{{Session::get('lang') == 'th' ? $r->tumbol_name_th : $r->tumbol_name_en}}</option>
        @endforeach
    @endif
@endif
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') รหัสไปรษณีย์ @else Postcode @endif </label>
                                                 <input class="form-control form-control-lg" name="order_detail_shipping_postcode" id="order_detail_shipping_postcode" value="{{Session::get('order_detail_shipping_postcode') != '' ? Session::get('order_detail_shipping_postcode') : ''}}">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bgpink">@if(Session::get('lang') == 'th') ที่อยู่การเรียกเก็บเงิน @else Billing Address @endif</div>
                             <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="sameaddbill" type="radio" name="billaddress" value="sameaddress" rel="sameaddress" {{Session::get('billing_address') == 'same' ? 'checked' : ''}}>
                                <label for="sameaddbill">@if(Session::get('lang') == 'th') ที่อยู่ที่ใช้ในการจัดส่ง @else Same address as shipping address @endif</label>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="newaddbill" type="radio" name="billaddress" value="newbilling" rel="w_newbilling" {{Session::get('billing_address') == 'unsame' ? 'checked' : ''}}>
                                <label for="newaddbill">@if(Session::get('lang') == 'th') ที่อยู่ใหม่ @else New Address @endif</label>
                            </div>
                            <div class="w_newbilling" <?php if(Session::get('billing_address') == 'unsame') echo 'style="display: block;"';?>>
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') ชื่อ @else Name @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_name" id="order_detail_billing_name" value="{{Session::get('order_detail_billing_name') != '' ? Session::get('order_detail_billing_name') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') นามสกุล @else Family Name @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_family" id="order_detail_billing_family" value="{{Session::get('order_detail_billing_family') != '' ? Session::get('order_detail_billing_family') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') อีเมล @else Email Address @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_email" id="order_detail_billing_email" value="{{Session::get('order_detail_billing_email') != '' ? Session::get('order_detail_billing_email') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') เบอร์โทรศัพท์ @else Phone Number @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_phone_number" id="order_detail_billing_phone_number" value="{{Session::get('order_detail_billing_phone_number') != '' ? Session::get('order_detail_billing_phone_number') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>@if(Session::get('lang') == 'th') ที่อยู่ @else Address @endif</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_address" id="order_detail_billing_address" value="{{Session::get('order_detail_billing_address') != '' ? Session::get('order_detail_billing_address') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') จังหวัด @else Province @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_billing_province" id="order_detail_billing_province" onchange="changeBillingProvince(this.value);">
                                                    <option value="">Please Select</option>
@if(!empty($province))
    @foreach($province as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en}}" @if(Session::get('lang') == 'th' and $r->province_name_th == Session::get('order_detail_billing_province')){{'selected'}}@elseif(Session::get('lang') == 'en' and $r->province_name_en == Session::get('order_detail_billing_province')){{'selected'}}@endif>{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en}}</option>
    @endforeach
@endif                                        
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') เขต/อำเภอ @else District @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_billing_district" id="order_detail_billing_district" onchange="changeBillingAmphur(this.value);">
                                                    <option value="">Please Select</option>
@if(!empty(Session::get('order_detail_billing_province')))
    @php
    $amphur = DB::table('lv_amphur')
        ->join('lv_province', 'lv_amphur.province_id', '=', 'lv_province.province_id')
        ->where('lv_province.province_name_th', '=', Session::get('order_detail_billing_province'))
        ->orWhere('lv_province.province_name_en', '=', Session::get('order_detail_billing_province'))
        ->get();
    @endphp
    @if(!empty($amphur))
        @foreach($amphur as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->amphur_name_th : $r->amphur_name_en}}" {{(Session::get('order_detail_billing_district') == $r->amphur_name_th or Session::get('order_detail_billing_district') == $r->amphur_name_en) ? 'selected' : ''}}>{{Session::get('lang') == 'th' ? $r->amphur_name_th : $r->amphur_name_en}}</option>
        @endforeach
    @endif
@endif
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') แขวง/ตำบล @else Sub-district @endif</label>
                                                 <select class="form-control form-control-lg" name="order_detail_billing_sub_district" id="order_detail_billing_sub_district">
                                                    <option value="">Please Select</option>
@if(!empty(Session::get('order_detail_billing_district')))
    @php
    $tumbol = DB::table('lv_tumbol')
        ->join('lv_amphur', 'lv_tumbol.amphur_id', '=', 'lv_amphur.amphur_id')
        ->where('lv_amphur.amphur_name_th', '=', Session::get('order_detail_billing_district'))
        ->orWhere('lv_amphur.amphur_name_en', '=', Session::get('order_detail_billing_district'))
        ->get();
    @endphp
    @if(!empty($tumbol))
        @foreach($tumbol as $r)
                                                    <option value="{{Session::get('lang') == 'th' ? $r->tumbol_name_th : $r->tumbol_name_en}}" {{(Session::get('order_detail_billing_sub_district') == $r->tumbol_name_th or Session::get('order_detail_billing_sub_district') == $r->tumbol_name_en) ? 'selected' : ''}}>{{Session::get('lang') == 'th' ? $r->tumbol_name_th : $r->tumbol_name_en}}</option>
        @endforeach
    @endif
@endif                                
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>@if(Session::get('lang') == 'th') รหัสไปรษณีย์ @else Postcode @endif</label>
                                                 <input class="form-control form-control-lg" name="order_detail_billing_postcode" id="order_detail_billing_postcode" value="{{Session::get('order_detail_billing_postcode') != '' ? Session::get('order_detail_billing_postcode') : ''}}">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>
@php
$check = false;
foreach(ShoppingCart::all() as $package_5_or_7) {
    if($package_5_or_7->name == 'Package 7 Days') {
        $check = true;
    }

    if($package_5_or_7->name == 'Package 5 Days') {
        $check = true;
    }
}
@endphp
                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bggreen">@if(Session::get('lang') == 'th') การจัดส่งและการขนส่ง @else Shipping & Delivery @endif</div>
                            <div class="topic_sp01">@if(Session::get('lang') == 'th') กรุณาเลือกตัวเลือกในการจัดส่งของคุณ @else Please select your delivery option @endif</div>
                            
                             <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="nextday" type="radio" name="order_detail_shipping_date" rel="w_nextday" {{(Session::get('order_detail_shipping_date_txt') == 'tomorrow' and $check == false) ? 'checked' : ''}} @if($send2time == true or $send3time == true or date('H') >= 20) disabled @endif>
                                <label for="nextday">@if(Session::get('lang') == 'th') วันถัดไป @else Next day @endif @if($send2time == true or $send3time == true or date('H') >= 20){!!' : <span style="color: red;">Please Select Other</span>'!!}@endif</label> 
                            </div>
                            <div class="w_nextday w_shipdelivery" <?php if((Session::get('order_detail_shipping_date_txt') == 'tomorrow') and $check == false) echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') เวลาในการจัดส่ง @else Time of Delivery @endif</div>
                                <div class="box_timedelivery">

@if(date('H') <= 11)
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_8_12" type="radio" name="order_detail_shipping_time" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'tomorrow' and Session::get('order_detail_shipping_time') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_8_12">08:00 – 12:00</label>
                                    </div>
@else
                                    <div class="box_bill_nobg md-radio md-radio-inline class_maruen1" style="display: none;">
                                        <input id="time_8_12" type="radio" name="order_detail_shipping_time" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'tomorrow' and Session::get('order_detail_shipping_time') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_8_12">08:00 – 12:00</label>
                                    </div>
@endif
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_14_16" type="radio" name="order_detail_shipping_time" value="14:00 – 16:00" {{(Session::get('order_detail_shipping_date_txt') == 'tomorrow' and Session::get('order_detail_shipping_time') == '14:00 – 16:00') ? 'checked' : ''}}>
                                        <label for="time_14_16">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_16_20" type="radio" name="order_detail_shipping_time" value="16:00 – 20:00" {{(Session::get('order_detail_shipping_date_txt') == 'tomorrow' and Session::get('order_detail_shipping_time') == '16:00 – 20:00') ? 'checked' : ''}}>
                                        <label for="time_16_20">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="otherdelivery" type="radio" name="order_detail_shipping_date" rel="w_delivery" {{Session::get('order_detail_shipping_date_txt') == 'other' ? 'checked' : ''}}>
                                <label for="otherdelivery">@if(Session::get('lang') == 'th') อื่นๆ @else Other @endif</label>
                            </div>
                            <div class="w_delivery w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'other') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') กรุณาเลือกวันที่ @else please select date @endif</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date">
                                      <input type="text" class="form-control" id="date_other" placeholder="@if(Session::get('lang') == 'th') เดือน/วัน/ปี @else MM/DD/YYYY @endif" value="{{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_date_other_txt') != '') ? Session::get('order_detail_shipping_date_other_txt') : ''}}" onchange="checkDateTomorrow1(this.value);"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') เวลาในการจัดส่ง @else Time of Delivery @endif</div>
                                  <div class="box_timedelivery">
@if(date('H') <= 11)
                                    <div class="box_bill_nobg md-radio md-radio-inline checkDate1">
                                        <input id="time_2_8_12" type="radio" name="timedelivery" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_2_8_12">08:00 – 12:00</label>
                                    </div>
@else
                                    <div class="box_bill_nobg md-radio md-radio-inline checkDate1 class_maruen1" style="display: none;">
                                        <input id="time_2_8_12" type="radio" name="timedelivery" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_2_8_12">08:00 – 12:00</label>
                                    </div>
@endif
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_2_14_16" type="radio" name="timedelivery" value="14:00 – 16:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time') == '14:00 – 16:00') ? 'checked' : ''}}>
                                        <label for="time_2_14_16">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_2_16_20" type="radio" name="timedelivery" value="16:00 – 20:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time') == '16:00 – 20:00') ? 'checked' : ''}}>
                                        <label for="time_2_16_20">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
@if($send2time == true or $send3time == true)
                            <div class="w_delivery w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'other') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">please select date</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date date2_">
                                      <input type="text" class="form-control" id="date_other2" placeholder="MM/DD/YYYY" value="{{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_date_other_txt2') != '') ? Session::get('order_detail_shipping_date_other_txt2') : ''}}"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') เวลาในการจัดส่ง @else Time of Delivery @endif</div>
                                  <div class="box_timedelivery">
                                    <div class="box_bill_nobg md-radio md-radio-inline checkDate2">
                                        <input id="time_3_8_12" type="radio" name="timedelivery2" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time2') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_3_8_12">08:00 – 12:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_3_14_16" type="radio" name="timedelivery2" value="14:00 – 16:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time2') == '14:00 – 16:00') ? 'checked' : ''}}>
                                        <label for="time_3_14_16">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_3_16_20" type="radio" name="timedelivery2" value="16:00 – 20:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time2') == '16:00 – 20:00') ? 'checked' : ''}}>
                                        <label for="time_3_16_20">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
@endif
@if($send3time == true)
                            <div class="w_delivery w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'other') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">please select date</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date date3_">
                                      <input type="text" class="form-control" id="date_other3" placeholder="MM/DD/YYYY" value="{{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_date_other_txt3') != '') ? Session::get('order_detail_shipping_date_other_txt3') : ''}}"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') เวลาในการจัดส่ง @else Time of Delivery @endif</div>
                                  <div class="box_timedelivery">
                                    <div class="box_bill_nobg md-radio md-radio-inline checkDate3">
                                        <input id="time_4_8_12" type="radio" name="timedelivery3" value="08:00 – 13:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time3') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_4_8_12">08:00 – 12:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_4_14_16" type="radio" name="timedelivery3" value="14:00 – 16:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time3') == '14:00 – 16:00') ? 'checked' : ''}}>
                                        <label for="time_4_14_16">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time_4_16_20" type="radio" name="timedelivery3" value="16:00 – 20:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time3') == '16:00 – 20:00') ? 'checked' : ''}}>
                                        <label for="time_4_16_20">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
@endif
                        
                        <div class="box_notepack57">
                            @if(Session::get('lang') == 'th') หมายเหตุ : หากคุณทำแพ็คเกจ 3 วัน คุณสามารถเลือกจัดส่งแบบทุกวันได้ เพื่อความสดใหม่อย่างมีประสิทธิภาพสูงสุด ทางทีมจัดส่งของเราจะติดต่อคุณเพื่อยืนยันวันและเวลาในการจัดส่ง @else *Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries. @endif
                            </div>
                         </div>

                    </div>
                
                <div class="col-12 col-lg-5">
                    @include('frontend.inc_summarycart')
                </div>
                
                </div>
                
                <div class="col-12">
                    <div class="cart_boxborder_btn">
                      <div class="row">
                          <div class="col-12 col-lg-5 col-xl-7"></div>
                          <div class="col-12 col-lg-7 col-xl-5">
                              <div class="row box_btncart_a">
                                  <div class="col-7 col-sm-6">
                                       <a href="{{url('cart')}}" class="btn_default btn_brown">@if(Session::get('lang') == 'th') ย้อนกลับ @else back @endif</a>
                                  </div>
                                  <div class="col-5 col-sm-6">
                                      <a href="javascript:payment();" class="btn_default btn_green">@if(Session::get('lang') == 'th') ดำเนินการต่อ @else continue @endif</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
		</section>
		
		@include('frontend.layouts.inc_footer')
		@include('frontend.layouts.scriptjs')
		
	</div>
	<script>
        function changeShippingProvince(province_name) {
            $.post('<?php echo url("ajaxChangeProvince");?>', { province_name: province_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#order_detail_shipping_district").html(data);
            });
        }

        function changeShippingAmphur(amphur_name) {
            $.post('<?php echo url("ajaxChangeAmphur");?>', { amphur_name: amphur_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#order_detail_shipping_sub_district").html(data);
            });
        }

        function changeBillingProvince(province_name) {
            $.post('<?php echo url("ajaxChangeProvince");?>', { province_name: province_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#order_detail_billing_district").html(data);
            });
        }

        function changeBillingAmphur(amphur_name) {
            $.post('<?php echo url("ajaxChangeAmphur");?>', { amphur_name: amphur_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#order_detail_billing_sub_district").html(data);
            });
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function payment() {
            var send2time = @if(!empty($send2time)){{ $send2time }}@else false @endif;
            var send3time = @if(!empty($send3time)){{ $send3time }}@else false @endif;;

            if($("#sameaddship").is(":checked") == false && $("#newaddship").is(":checked") == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกที่อยุ่จัดส่งของคุณ @else Plese Select Your Shipping Address @endif");

                $("#sameaddship").focus();
            } else if($("#order_detail_shipping_name").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกชื่อ @else Please Enter Name @endif");

                $("#order_detail_shipping_name").focus();
            } else if($("#order_detail_shipping_family").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกนามสกุล @else Please Enter Family Name @endif");

                $("#order_detail_shipping_family").focus();
            } else if($("#birth_day").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกวัน @else Please Select Day @endif");

                $("#birth_day").focus();
            } else if($("#birth_month").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเดือน @else Please Select Month @endif");

                $("#birth_month").focus();
            } else if($("#birth_year").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกปี @else Please Select Year @endif");

                $("#birth_year").focus();
            } else if($("#order_detail_shipping_email").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกอีเมล์ @else Please Enter Email @endif");

                $("#order_detail_shipping_email").focus();
            } else if(!isEmail($("#order_detail_shipping_email").val()) && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') รูปแบบอีเมล์ไม่ถูกต้อง @else Incorrect Email @endif");

                $("#order_detail_shipping_email").val('');
                $("#order_detail_shipping_email").focus();
            } else if($("#order_detail_shipping_phone_number").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกหมายเลขโทรศัพท์ @else Please Enter Phone Number @endif");

                $("#order_detail_shipping_phone_number").focus();
            } else if($("#order_detail_shipping_address").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกที่อยู่ @else Please Enter Address @endif");

                $("#order_detail_shipping_address").focus();
            } else if($("#order_detail_shipping_province").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกจังหวัด @else Please Select Province @endif");

                $("#order_detail_shipping_province").focus();
            } else if($("#order_detail_shipping_district").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเขต/อำเภอ @else Please Select District @endif");

                $("#order_detail_shipping_district").focus();
            } else if($("#order_detail_shipping_sub_district").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกตำบล/แขวง @else Please Select Sub District @endif");

                $("#order_detail_shipping_sub_district").focus();
            } else if($("#order_detail_shipping_postcode").val() == '' && $("#newaddship").is(":checked") == true) {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกรหัสไปรษณีย์ @else Please Enter Postcode @endif");

                $("#order_detail_shipping_postcode").focus();
            } else if($("#sameaddbill").is(':checked') == false && $("#newaddbill").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกที่อยู่ในการออกบิล @else Please Select Billing Address @endif");

                $("#sameaddbill").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_name").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกชื่อ @else Please Enter Name @endif");

                $("#order_detail_billing_name").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_family").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกนามสกุล @else Please Enter Family Name @endif");

                $("#order_detail_billing_family").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_email").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกอีเมล์ @else Please Enter Email @endif");

                $("#order_detail_billing_email").focus();
            } else if($("#newaddbill").is(':checked') == true && !isEmail($("#order_detail_billing_email").val())) {
                alert("@if(Session::get('lang') == 'th') รูปแบบอีเมล์ไม่ถูกต้อง @else Incorrect Email @endif");

                $("#order_detail_billing_email").val('');
                $("#order_detail_billing_email").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_phone_number").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกเบอร์โทรศัพท์ @else Please Enter Phone Number @endif");

                $("#order_detail_billing_phone_number").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_address").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกที่อยู่ @else Please Enter Address @endif");

                $("#order_detail_billing_address").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_province").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกจังหวัด @else Please Select Province @endif");

                $("#order_detail_billing_province").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_district").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเขต/อำเภอ @else Please Select District @endif");

                $("#order_detail_billing_district").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_sub_district").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกแขวง/ตำบล @else Please Select Sub District @endif");

                $("#order_detail_billing_sub_district").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_postcode").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณากรอกรหัสไปรษณีย์ @else Please Enter Postcode @endif");

                $("#order_detail_billing_postcode").focus();
            } else if($("#nextday").is(':checked') == false && $("#otherdelivery").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกตัวเลือกในการจัดส่งของคุณ @else Please Select Shipping Delivery @endif");

                $("#nextday").focus();
            } else if($("#nextday").is(':checked') == true && $("#time_8_12").is(':checked') == false && $("#time_14_16").is(':checked') == false && $("#time_16_20").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเวลา @else Please Select Time @endif");

                $("#time_14_16").focus();
            } else if($("#otherdelivery").is(':checked') == true && $("#date_other").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกวัน @else Please Select Date @endif");

                $("#date_other").focus();
            } else if($("#otherdelivery").is(':checked') == true && $("#time_2_8_12").is(':checked') == false && $("#time_2_14_16").is(':checked') == false && $("#time_2_16_20").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเวลา @else Please Select Time @endif");

                $("#time_2_8_12").focus();
            } else if(send2time == true && $("#otherdelivery").is(':checked') == true && $("#date_other2").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกวัน @else Please Select Date @endif");

                $("#date_other2").focus();
            } else if(send2time == true && $("#otherdelivery").is(':checked') == true && $("#time_3_8_12").is(':checked') == false && $("#time_3_14_16").is(':checked') == false && $("#time_3_16_20").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเวลา @else Please Select Time @endif");

                $("#time_3_8_12").focus();
            } else if(send3time == true && $("#otherdelivery").is(':checked') == true && $("#date_other3").val() == '') {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกวัน @else Please Select Date @endif");

                $("#date_other2").focus();
            } else if(send3time == true && $("#otherdelivery").is(':checked') == true && $("#time_4_8_12").is(':checked') == false && $("#time_4_14_16").is(':checked') == false && $("#time_4_16_20").is(':checked') == false) {
                alert("@if(Session::get('lang') == 'th') กรุณาเลือกเวลา @else Please Select Time @endif");

                $("#time_4_8_12").focus();
            } else {
                if($("#sameaddbill").is(":checked") == true) {
                    billing_address = 'same';
                    order_detail_billing_name = '';
                    order_detail_billing_family = '';
                    order_detail_billing_email = '';
                    order_detail_billing_phone_number = '';
                    order_detail_billing_address = '';
                    order_detail_billing_province = '';
                    order_detail_billing_district = '';
                    order_detail_billing_sub_district = '';
                    order_detail_billing_postcode = '';
                } else if($("#newaddbill").is(":checked") == true) {
                    billing_address = 'unsame';
                    order_detail_billing_name = $("#order_detail_billing_name").val();
                    order_detail_billing_family = $("#order_detail_billing_family").val();
                    order_detail_billing_email = $("#order_detail_billing_email").val();
                    order_detail_billing_phone_number = $("#order_detail_billing_phone_number").val();
                    order_detail_billing_address = $("#order_detail_billing_address").val();
                    order_detail_billing_province = $("#order_detail_billing_province").val();
                    order_detail_billing_district = $("#order_detail_billing_district").val();
                    order_detail_billing_sub_district = $("#order_detail_billing_sub_district").val();
                    order_detail_billing_postcode = $("#order_detail_billing_postcode").val();
                }

                if($("#sameaddship").is(":checked") == true) {
                    type_shipping_address = 'sameaddship';
                }
                
                if($("#newaddship").is(":checked") == true) {
                    type_shipping_address = 'newaddship';
                }

                if($("#nextday").is(":checked") == true) {
                    dateshipping = 'tomorrow';
                    if($("#time_8_12").is(':checked') == true) {
                        timeshipping = '08:00 – 12:00';
                    } else if($("#time_14_16").is(':checked') == true) {
                        timeshipping = '14:00 – 16:00';
                    } else if($("#time_16_20").is(':checked') == true) {
                        timeshipping = '16:00 – 20:00';
                    }
                    
                    dateshipping2 = '';
                    timeshipping2 = '';
                    dateshipping3 = '';
                    timeshipping3 = '';
                } else {
                    if($("#otherdelivery").is(":checked") == true) {
                        dateshipping = $("#date_other").val();
                        if($("#time_2_8_12").is(':checked') == true) {
                            timeshipping = '08:00 – 12:00';
                        } else if($("#time_2_14_16").is(':checked') == true) {
                            timeshipping = '14:00 – 16:00';
                        } else if($("#time_2_16_20").is(':checked') == true) {
                            timeshipping = '16:00 – 20:00';
                        }
                    } else {
                        dateshipping2 = '';
                        timeshipping2 = '';
                        dateshipping3 = '';
                        timeshipping3 = '';
                    }

                    if($("#otherdelivery").is(":checked") == true) {
                        if(send2time == true || send3time == true) {
                            dateshipping2 = $("#date_other2").val();
                            if($("#time_3_8_12").is(':checked') == true) {
                                timeshipping2 = '08:00 – 12:00';
                            } else if($("#time_3_14_16").is(':checked') == true) {
                                timeshipping2 = '14:00 – 16:00';
                            } else if($("#time_3_16_20").is(':checked') == true) {
                                timeshipping2 = '16:00 – 20:00';
                            } else {
                                dateshipping2 = '';
                                timeshipping2 = '';
                            }
                        } else {
                            dateshipping2 = '';
                            timeshipping2 = '';
                        }
                        
                        if(send3time == true) {
                            dateshipping3 = $("#date_other3").val();
                            if($("#time_4_8_12").is(':checked') == true) {
                                timeshipping3 = '08:00 – 12:00';
                            } else if($("#time_4_14_16").is(':checked') == true) {
                                timeshipping3 = '14:00 – 16:00';
                            } else if($("#time_4_16_20").is(':checked') == true) {
                                timeshipping2 = '16:00 – 20:00';
                            } else {
                                dateshipping3 = '';
                                timeshipping3 = '';
                            }
                        } else {
                            dateshipping3 = '';
                            timeshipping3 = '';
                        }
                    } else {
                        dateshipping2 = '';
                        timeshipping2 = '';
                        dateshipping3 = '';
                        timeshipping3 = '';
                    }
                }

                //alert(dateshipping2 + ' ' + timeshipping2 + ' ' + dateshipping3 + ' ' + timeshipping3);

                $.post('<?php echo url("ajaxShipping");?>', { order_detail_shipping_name: $("#order_detail_shipping_name").val(), order_detail_shipping_family: $("#order_detail_shipping_family").val(), birth_day: $("#birth_day").val(), birth_month: $("#birth_month").val(), birth_year: $("#birth_year").val(), order_detail_shipping_email: $("#order_detail_shipping_email").val(), order_detail_shipping_phone_number: $("#order_detail_shipping_phone_number").val(), order_detail_shipping_address: $("#order_detail_shipping_address").val(), order_detail_shipping_province: $("#order_detail_shipping_province").val(), order_detail_shipping_district: $("#order_detail_shipping_district").val(), order_detail_shipping_sub_district: $("#order_detail_shipping_sub_district").val(), order_detail_shipping_postcode: $("#order_detail_shipping_postcode").val(), billing_address: billing_address, order_detail_billing_name: order_detail_billing_name, order_detail_billing_family: order_detail_billing_family, order_detail_billing_email: order_detail_billing_email, order_detail_billing_phone_number: order_detail_billing_phone_number, order_detail_billing_address: order_detail_billing_address, order_detail_billing_province: order_detail_billing_province, order_detail_billing_district: order_detail_billing_district, order_detail_billing_sub_district: order_detail_billing_sub_district, order_detail_billing_postcode: order_detail_billing_postcode, order_detail_shipping_date: dateshipping, order_detail_shipping_time: timeshipping, order_detail_shipping_date2: dateshipping2, order_detail_shipping_time2: timeshipping2, order_detail_shipping_date3: dateshipping3, order_detail_shipping_time3: timeshipping3, type_shipping_address: type_shipping_address, "_token": "{{ csrf_token() }}" }, function(data) {
                    window.location.href = '<?php echo url("cart-payment");?>';

                    //console.log(data);
                });
            }
        }
    </script>
    
    <script type="text/javascript">
        var hour = {{ date('H') }};
        var date = new Date();

        if(hour >= 20) {
            date.setDate(date.getDate()+2);
        } else {
            date.setDate(date.getDate()+1);
        }
        
        $('#date_other').datepicker({
            language: "th",
            startDate: date,
            autoclose: true
        }).on('changeDate', function (selected) {
            // ford ทำ
            year = date.getFullYear();
            month = ("0" + (date.getMonth() + 1)).slice(-2);
            day = ("0" + (date.getDate())).slice(-2);

            date_other = $("#date_other").val().split('/');

            year1 = date_other[2];
            day1 = date_other[1];
            month1 = date_other[0];

            if((year + '-' + month + '-' + day) == (year1 + '-' + month1 + '-' + day1)) {
                if(date.getHours() >= 12) {
                    $(".checkDate1").hide();
                } else {
                    $(".checkDate1").show();
                }
            }

            // end ford ทำ
            var maxDate = new Date(selected.date.valueOf());
            maxDate.setDate(maxDate.getDate()+3);
            $('#date_other2').datepicker('setStartDate', maxDate);
        });

        var send3time = @if(!empty($send3time)){{ $send3time }}@else false @endif;

        $('#date_other2').datepicker({
            language: "th",
            startDate: date,
            autoclose: true
        }).on('changeDate', function (selected) {
            // ford ทำ
            year = date.getFullYear();
            month = ("0" + (date.getMonth() + 1)).slice(-2);
            day = ("0" + (date.getDate())).slice(-2);

            date_other = $("#date_other").val().split('/');

            year1 = date_other[2];
            day1 = date_other[1];
            month1 = date_other[0];

            if((year + '-' + month + '-' + day) == (year1 + '-' + month1 + '-' + day1)) {
                if(date.getHours() >= 12) {
                    $(".checkDate1").hide();
                } else {
                    $(".checkDate1").show();
                }
            }

            // end ford ทำ

            if(send3time == true) {
                var maxDate = new Date(selected.date.valueOf());
                maxDate.setDate(maxDate.getDate()+2);
                $('#date_other3').datepicker('setStartDate', maxDate);
            }
        });
        
        if(send3time == true) {
            $('#date_other3').datepicker({
                language: "th",
                startDate: date,
                autoclose: true
            });
        }
         
        // 1
        /*var date = new Date();
        date.setDate(date.getDate() + 1);
        
        year = date.getFullYear();
        month = ("0" + (date.getMonth() + 1)).slice(-2);
        day = ("0" + (date.getDate())).slice(-2);

        $('#date_other').datepicker({
            language: "th",
            startDate: date,
            autoclose: true
        });
        
        $("#date_other").change(function() {
            date_other = $("#date_other").val().split('/');

            year1 = date_other[2];
            day1 = date_other[1];
            month1 = date_other[0];

            console.log(year + '-' + month + '-' + day + '^' + year1 + '-' + month1 + '-' + day1 + ' H ' + date.getHours());

            if((year + '-' + month + '-' + day) == (year1 + '-' + month1 + '-' + day1)) {
                if(date.getHours() >= 12) {
                    $(".checkDate1").hide();
                } else {
                    $(".checkDate1").show();
                }
            }
        });

        // end 1

        // 2
        var date2 = new Date();
        date2.setDate(date2.getDate() + 3);

        $('#date_other2').datepicker({
            language: "th",
            startDate: date2,
            autoclose: true
        });
        // end 2
        */

        function checkAddress() {
          alert('Please Enter Address');

          window.location.href = '<?php echo url('cart-login');?>';
        }

        function checkDateTomorrow1(date) {
            var start = new Date('{{ date("Y-m-d") }}'),

            date_split = date.split('/');

            end   = new Date(date_split[2] + '-' + date_split[0] + '-' + date_split[1]),
            diff  = new Date(end - start),
            days  = diff/1000/60/60/24;

            console.log(days);
            if(parseInt(days) > 1) {
                $(".class_maruen1").css('display', 'inline-block');
            } else {
                $(".class_maruen1").css('display', 'none');
            }
        }
    </script>

</body>

</html>
