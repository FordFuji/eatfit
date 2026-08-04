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
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart')}}">My Cart</a> <span><i class="fas fa-chevron-right"></i></span>  <div>Shipping</div>
                 </div>
		    </div>
		</section>
        
		<section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="cart_bggreen_topic cart_bgyellow_topic">
                             <img src="{{asset('files/frontend/images/icon_home-white.svg')}}" alt=""> Shipping Address
                         </div>

                         <div class="box_cart_shipping">
                             <div class="cart_topic_shipping">your SHIPPING ADDRESS</div>
                             <div class="md-radio md-radio-inline box_shipping">
                                <input id="sameaddship" type="radio" name="ship01" rel="sameaddress" {{Session::get('type_shipping_address') == true ? 'checked' : ''}}>
@if(!empty($shipping_address))
                                <label for="sameaddship">{{$shipping_address->member_name.' '.$shipping_address->member_family}}</label>
                                <div class="cart_sameaddress">
                                    <div>
                                        {{$shipping_address->address_no.', '.$shipping_address->address_sub_distric.', '.$shipping_address->address_distric.', '.$shipping_address->address_province.' '.$shipping_address->address_postcode}}<br>
                                        Email :  {{$shipping_address->member_email}} <br>
                                        Phone :  {{$shipping_address->member_phone_number}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="{{url('shipping_address')}}"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
@elseif(!empty($member_address))
                                <label for="sameaddship">{{$member_address->member_name.' '.$member_address->member_family}}</label>
                                <div class="cart_sameaddress">
                                    <div>
                                        {{$member_address->member_address.', '.$member_address->member_sub_district.', '.$member_address->member_district.', '.$member_address->member_province.' '.$member_address->member_postcode}}<br>
                                        Email :  {{$member_address->member_email}} <br>
                                        Phone :  {{$member_address->member_phone_number}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="{{url('shipping_address')}}"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
@endif
                            </div>
                            <div class="box_ship_nobg md-radio md-radio-inline box_shipping">
                                <div class="cart_btn_addnew">
                                    <input id="newaddship" type="radio" name="ship01" rel="w_getyourself" >
                                    <label for="newaddship"><i class="fas fa-plus"></i> Add New Address</label>
                                </div>
                            </div>
                            <div class="w_getyourself">
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Name</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_name" id="order_detail_shipping_name" value="{{Session::get('order_detail_shipping_name') != '' ? Session::get('order_detail_shipping_name') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Family Name</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_family" id="order_detail_shipping_family" value="{{Session::get('order_detail_shipping_family') != '' ? Session::get('order_detail_shipping_family') : ''}}">
                                              </div>
                                         </div>
@if(!empty(Session::get('order_detail_birth_day')))
    @php
    $order_detail_birth_day = explode('-', Session::get('order_detail_birth_day'));
    @endphp
@endif
                                         <div class="col-12">
                                             <label><span>*</span> Date of Birth</label>
                                             <div class="row">
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg" name="birth_day" id="birth_day" >
                                                            <option value="">Day</option>
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
                                                          <option value="">Month</option>
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
                                                        <option value="">Year</option>
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
                                                <label><span>*</span> Email Address</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_email" id="order_detail_shipping_email" value="{{Session::get('order_detail_shipping_email') != '' ? Session::get('order_detail_shipping_email') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Phone Number</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_phone_number" id="order_detail_shipping_phone_number" value="{{Session::get('order_detail_shipping_phone_number') != '' ? Session::get('order_detail_shipping_phone_number') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control form-control-lg" name="order_detail_shipping_address" id="order_detail_shipping_address" value="{{Session::get('order_detail_shipping_address') != '' ? Session::get('order_detail_shipping_address') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Province</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_province" id="order_detail_shipping_province"  onchange="changeShippingProvince(this.value);">
                                                    <option value="">Please Select</option>
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
                                                 <label>District</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_district" id="order_detail_shipping_district"  onchange="changeShippingAmphur(this.value);">
                                                    <option value="">Please Select</option>
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
                                                 <label>Sub-district</label>
                                                 <select class="form-control form-control-lg" name="order_detail_shipping_sub_district" id="order_detail_shipping_sub_district" >
                                                    <option value="">Please Select</option>
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
                                                 <label>Postcode </label>
                                                 <input class="form-control form-control-lg" name="order_detail_shipping_postcode" id="order_detail_shipping_postcode" value="{{Session::get('order_detail_shipping_postcode') != '' ? Session::get('order_detail_shipping_postcode') : ''}}">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bgpink">Billing Address</div>
                             <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="sameaddbill" type="radio" name="billaddress" value="sameaddress" rel="sameaddress" {{Session::get('billing_address') == 'same' ? 'checked' : ''}}>
                                <label for="sameaddbill">Same address as shipping address</label>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="newaddbill" type="radio" name="billaddress" value="newbilling" rel="w_newbilling" {{Session::get('billing_address') == 'unsame' ? 'checked' : ''}}>
                                <label for="newaddbill">New Address</label>
                            </div>
                            <div class="w_newbilling" <?php if(Session::get('billing_address') == 'unsame') echo 'style="display: block;"';?>>
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Name</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_name" id="order_detail_billing_name" value="{{Session::get('order_detail_billing_name') != '' ? Session::get('order_detail_billing_name') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Family Name</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_family" id="order_detail_billing_family" value="{{Session::get('order_detail_billing_family') != '' ? Session::get('order_detail_billing_family') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Email Address</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_email" id="order_detail_billing_email" value="{{Session::get('order_detail_billing_email') != '' ? Session::get('order_detail_billing_email') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Phone Number</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_phone_number" id="order_detail_billing_phone_number" value="{{Session::get('order_detail_billing_phone_number') != '' ? Session::get('order_detail_billing_phone_number') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control form-control-lg" name="order_detail_billing_address" id="order_detail_billing_address" value="{{Session::get('order_detail_billing_address') != '' ? Session::get('order_detail_billing_address') : ''}}">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Province</label>
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
                                                 <label>District</label>
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
                                                 <label>Sub-district</label>
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
                                                 <label>Postcode </label>
                                                 <input class="form-control form-control-lg" name="order_detail_billing_postcode" id="order_detail_billing_postcode" value="{{Session::get('order_detail_billing_postcode') != '' ? Session::get('order_detail_billing_postcode') : ''}}">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bggreen">Shipping & Delivery</div>
                            <div class="topic_sp01">Please select your delivery option</div>
                            
                             <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="nextday" type="radio" name="order_detail_shipping_date" rel="w_nextday" {{Session::get('order_detail_shipping_date_txt') == 'tomorrow' ? 'checked' : ''}} {{$send2time == true ? 'disabled' : ''}}>
                                <label for="nextday">Next day @if($send2time == true){!!' : <span style="color: red;">Please Select Other</span>'!!}@endif</label> 
                            </div>
                            <div class="w_nextday w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'tomorrow') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">Time of Delivery</div>
                                <div class="box_timedelivery">

@if(date('H') <= 12)
                                    <div class="box_bill_nobg md-radio md-radio-inline">
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
                                <label for="otherdelivery">Other</label>
                            </div>
                            <div class="w_delivery w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'other') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">please select date</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date">
                                      <input type="text" class="form-control" id="date_other" placeholder="MM/DD/YYYY" value="{{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_date_other_txt') != '') ? Session::get('order_detail_shipping_date_other_txt') : ''}}"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">Time of Delivery</div>
                                  <div class="box_timedelivery">
                                    <div class="box_bill_nobg md-radio md-radio-inline checkDate1">
                                        <input id="time_2_8_12" type="radio" name="timedelivery" value="08:00 – 12:00" {{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_time') == '08:00 – 12:00') ? 'checked' : ''}}>
                                        <label for="time_2_8_12">08:00 – 12:00</label>
                                    </div>
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
@if($send2time == true)
                            <div class="w_delivery w_shipdelivery" <?php if(Session::get('order_detail_shipping_date_txt') == 'other') echo 'style="display: block;"';?>>
                                <div class="cart_topic_shipping">please select date</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date date2_">
                                      <input type="text" class="form-control" id="date_other2" placeholder="MM/DD/YYYY" value="{{(Session::get('order_detail_shipping_date_txt') == 'other' and Session::get('order_detail_shipping_date_other_txt2') != '') ? Session::get('order_detail_shipping_date_other_txt2') : ''}}"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">Time of Delivery</div>
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
                        
                        <div class="box_notepack57">
                                *Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries.
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
                                       <a href="{{url('cart')}}" class="btn_default btn_brown">back</a>
                                  </div>
                                  <div class="col-5 col-sm-6">
                                      <a href="javascript:payment();" class="btn_default btn_green">continue</a>
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
            var send2time = '<?php echo $send2time;?>';

            if($("#sameaddship").is(":checked") == false && $("#newaddship").is(":checked") == false) {
                alert('Plese Select Your Shipping Address');

                $("#sameaddship").focus();
            } else if($("#order_detail_shipping_name").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Name');

                $("#order_detail_shipping_name").focus();
            } else if($("#order_detail_shipping_family").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Family Name');

                $("#order_detail_shipping_family").focus();
            } else if($("#birth_day").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select Day');

                $("#birth_day").focus();
            } else if($("#birth_month").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select Month');

                $("#birth_month").focus();
            } else if($("#birth_year").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select Year');

                $("#birth_year").focus();
            } else if($("#order_detail_shipping_email").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Email');

                $("#order_detail_shipping_email").focus();
            } else if(!isEmail($("#order_detail_shipping_email").val()) && $("#newaddship").is(":checked") == true) {
                alert('Incorrect Email');

                $("#order_detail_shipping_email").val('');
                $("#order_detail_shipping_email").focus();
            } else if($("#order_detail_shipping_phone_number").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Phone Number');

                $("#order_detail_shipping_phone_number").focus();
            } else if($("#order_detail_shipping_address").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Address');

                $("#order_detail_shipping_address").focus();
            } else if($("#order_detail_shipping_province").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select Province');

                $("#order_detail_shipping_province").focus();
            } else if($("#order_detail_shipping_district").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select District');

                $("#order_detail_shipping_district").focus();
            } else if($("#order_detail_shipping_sub_district").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Select Sub District');

                $("#order_detail_shipping_sub_district").focus();
            } else if($("#order_detail_shipping_postcode").val() == '' && $("#newaddship").is(":checked") == true) {
                alert('Please Enter Postcode');

                $("#order_detail_shipping_postcode").focus();
            } else if($("#sameaddbill").is(':checked') == false && $("#newaddbill").is(':checked') == false) {
                alert('Please Select Billing Address');

                $("#sameaddbill").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_name").val() == '') {
                alert('Please Enter Name');

                $("#order_detail_billing_name").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_family").val() == '') {
                alert('Please Enter Family Name');

                $("#order_detail_billing_family").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_email").val() == '') {
                alert('Please Enter Email');

                $("#order_detail_billing_email").focus();
            } else if($("#newaddbill").is(':checked') == true && !isEmail($("#order_detail_billing_email").val())) {
                alert('Incorrect Email');

                $("#order_detail_billing_email").val('');
                $("#order_detail_billing_email").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_phone_number").val() == '') {
                alert('Please Enter Phone Number');

                $("#order_detail_billing_phone_number").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_address").val() == '') {
                alert('Please Enter Address');

                $("#order_detail_billing_address").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_province").val() == '') {
                alert('Please Select Province');

                $("#order_detail_billing_province").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_district").val() == '') {
                alert('Please Select District');

                $("#order_detail_billing_district").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_sub_district").val() == '') {
                alert('Please Select Sub District');

                $("#order_detail_billing_sub_district").focus();
            } else if($("#newaddbill").is(':checked') == true && $("#order_detail_billing_postcode").val() == '') {
                alert('Please Enter Postcode');

                $("#order_detail_billing_postcode").focus();
            } else if($("#nextday").is(':checked') == false && $("#otherdelivery").is(':checked') == false) {
                alert('Please Select Shipping Delivery');

                $("#nextday").focus();
            } else if($("#nextday").is(':checked') == true && $("#time_8_12").is(':checked') == false && $("#time_14_16").is(':checked') == false && $("#time_16_20").is(':checked') == false) {
                alert('Please Select Time');

                $("#time_14_16").focus();
            } else if($("#otherdelivery").is(':checked') == true && $("#date_other").val() == '') {
                alert('Please Select Date');

                $("#date_other").focus();
            } else if($("#otherdelivery").is(':checked') == true && $("#time_2_8_12").is(':checked') == false && $("#time_2_14_16").is(':checked') == false && $("#time_2_16_20").is(':checked') == false) {
                alert('Please Select Time');

                $("#time_2_8_12").focus();
            } else if(send2time == true && $("#otherdelivery").is(':checked') == true && $("#date_other2").val() == '') {
                alert('Please Select Date');

                $("#date_other2").focus();
            } else if(send2time == true && $("#otherdelivery").is(':checked') == true && $("#time_3_8_12").is(':checked') == false && $("#time_3_14_16").is(':checked') == false && $("#time_3_16_20").is(':checked') == false) {
                alert('Please Select Time');

                $("#time_3_8_12").focus();
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
                    }

                    if($("#otherdelivery").is(":checked") == true) {
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
                    }
                }

                $.post('<?php echo url("ajaxShipping");?>', { order_detail_shipping_name: $("#order_detail_shipping_name").val(), order_detail_shipping_family: $("#order_detail_shipping_family").val(), birth_day: $("#birth_day").val(), birth_month: $("#birth_month").val(), birth_year: $("#birth_year").val(), order_detail_shipping_email: $("#order_detail_shipping_email").val(), order_detail_shipping_phone_number: $("#order_detail_shipping_phone_number").val(), order_detail_shipping_address: $("#order_detail_shipping_address").val(), order_detail_shipping_province: $("#order_detail_shipping_province").val(), order_detail_shipping_district: $("#order_detail_shipping_district").val(), order_detail_shipping_sub_district: $("#order_detail_shipping_sub_district").val(), order_detail_shipping_postcode: $("#order_detail_shipping_postcode").val(), billing_address: billing_address, order_detail_billing_name: order_detail_billing_name, order_detail_billing_family: order_detail_billing_family, order_detail_billing_email: order_detail_billing_email, order_detail_billing_phone_number: order_detail_billing_phone_number, order_detail_billing_address: order_detail_billing_address, order_detail_billing_province: order_detail_billing_province, order_detail_billing_district: order_detail_billing_district, order_detail_billing_sub_district: order_detail_billing_sub_district, order_detail_billing_postcode: order_detail_billing_postcode, order_detail_shipping_date: dateshipping, order_detail_shipping_date2: dateshipping2, order_detail_shipping_time2: timeshipping2, order_detail_shipping_time: timeshipping, type_shipping_address: type_shipping_address, "_token": "{{ csrf_token() }}" }, function(data) {
                    window.location.href = '<?php echo url("cart-payment");?>';
                });
            }
        }
    </script>
    
    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate()+1);
        $('#date_other').datepicker({
            language: "th",
             startDate: date,
             autoclose: true
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            maxDate.setDate(maxDate.getDate()+3);
            $('#date_other2').datepicker('setStartDate', maxDate);
        });

//        var date2 = new Date();
//        date2.setDate(date2.getDate()+3);
        $('#date_other2').datepicker({
            language: "th",
             startDate: date,
             autoclose: true
        });
         
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
    </script>

</body>

</html>
