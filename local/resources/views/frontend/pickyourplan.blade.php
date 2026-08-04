<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')

    <style>
        .pickyourplanname {
            font-family: 'poppins', 'prompt', sans-serif;
            font-weight: normal;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>

<body>

	<div class="container-fluid footer_notop">
	
    @include('frontend.layouts.inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{ url('index') }}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') อีทฟิต แพคเกจ @else eatfit Packages @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
		    <div class="col-12 wrap_bannerinside">
                 <img src="{{asset('/files/frontend/images/banner_pickyourplan.jpg')}}" alt="">
		    </div>
		</section>
		
		
		<section class="row page_pickyourplan">
		    <div class="container">
		        <div class="row">
		            <div class="col-12 col-lg-6">
		                <div>
		                    <div class="topic_pickplan-page">
                                {{-- @php
                                dd($day_id);
                                @endphp --}}
                                @if($day_id == '3' and Session::get('lang') == 'th'){{$package_price->package_price3_description_th}} 
                                @elseif($day_id == '3' and Session::get('lang') == 'en'){{$package_price->package_price3_description_en}}<br> 
                                @endif

                                @if($day_id == '5' and Session::get('lang') == 'th'){{$package_price->package_price5_description_th}} 
                                @elseif($day_id == '5' and Session::get('lang') == 'en'){{$package_price->package_price5_description_en}}<br> 
                                @endif
                                
                                @if($day_id == '7' and Session::get('lang') == 'th'){{$package_price->package_price7_description_th}} 
                                @elseif($day_id == '7' and Session::get('lang') == 'en'){{$package_price->package_price7_description_en}}
                                @endif
                            </div>
		                    <div class="topic_pickplan2">
                                @if($day_id == '3' and Session::get('lang') == 'th'){{$package_price->package_price3_detail_th}} 
                                @elseif($day_id == '3' and Session::get('lang') == 'en'){{$package_price->package_price3_detail_en}} 
                                @endif
                                
                                @if($day_id == '5' and Session::get('lang') == 'th'){{$package_price->package_price5_detail_th}} 
                                @elseif($day_id == '5' and Session::get('lang') == 'en'){{$package_price->package_price5_detail_en}}  
                                @endif
                                
                                @if($day_id == '7' and Session::get('lang') == 'th'){{$package_price->package_price7_detail_th}} 
                                @elseif($day_id == '7' and Session::get('lang') == 'en'){{$package_price->package_price7_detail_en}}
                                @endif
                            </div>
                            <div class="pickyourplanname">
                                @if($day_id == '3' and Session::get('lang') == 'th'){{$package_price->package_price3_detail2_th}} 
                                @elseif($day_id == '3' and Session::get('lang') == 'en'){{$package_price->package_price3_detail2_en}} 
                                @endif
                                
                                @if($day_id == '5' and Session::get('lang') == 'th'){{$package_price->package_price5_detail2_th}} 
                                @elseif($day_id == '5' and Session::get('lang') == 'en'){{$package_price->package_price5_detail2_en}}  
                                @endif
                                
                                @if($day_id == '7' and Session::get('lang') == 'th'){{$package_price->package_price7_detail2_th}} 
                                @elseif($day_id == '7' and Session::get('lang') == 'en'){{$package_price->package_price7_detail2_en}}
                                @endif
                            </div>
		                </div>
		            </div>
		            <div class="col-12 col-lg-6">
		                <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank" class="btn_contactline"><img src="{{asset('files/frontend/images/icon_line_wh.svg')}}" alt=""> Order via LINE APPLICATION <span>Click Now!</span></a>
		            </div>
		            <div class="col-12">
		                @if($day == '3' and Session::get('lang') == 'th'){{$package_price->package_price3_detail2_th}} 
                        @elseif($day == '3' and Session::get('lang') == 'en'){{$package_price->package_price3_detail2_en}} 
                        @endif
                        
                        @if($day == '5' and Session::get('lang') == 'th'){{$package_price->package_price5_detail2_th}} 
                        @elseif($day == '5' and Session::get('lang') == 'en'){{$package_price->package_price5_detail2_en}}  
                        @endif
                        
                        @if($day == '7' and Session::get('lang') == 'th'){{$package_price->package_price7_detail2_th}} 
                        @elseif($day == '7' and Session::get('lang') == 'en'){{$package_price->package_price7_detail2_en}}
                        @endif
		            </div>
		            <div class="col-12">
@php
$i = 1;
$chr = 65;
@endphp
{{-- dd($pick_your_plan) --}}
@if(!empty($pick_your_plan))
    @foreach($pick_your_plan as $r)
        @php
        $product_id1_1 = DB::table('products')
            ->where('products_id', '=', $r->product_id1)
            ->first();

        $product_id1_2 = DB::table('products')
            ->where('products_id', '=', $r->product_id2)
            ->first();

        $product_id1_3 = DB::table('products')
            ->where('products_id', '=', $r->product_id3)
            ->first();

        if($i % 7 == 1) {
            $class_color = 'p_bgred';
            $class_color_checkbox = 'p_btnred';
        } elseif($i % 7 == 2) {
            $class_color = 'p_bgyellow';
            $class_color_checkbox = 'p_btnyellow';
        } elseif($i % 7 == 3) {
            $class_color = 'p_bgpink';
            $class_color_checkbox = 'p_btnpink';
        } elseif($i % 7 == 4) {
            $class_color = 'p_bggreen';
            $class_color_checkbox = 'p_btngreen';
        } elseif($i % 7 == 5) {
            $class_color = 'p_bgorange';
            $class_color_checkbox = 'p_btnorange';
        } elseif($i % 7 == 6) {
            $class_color = 'p_bgblue';
            $class_color_checkbox = 'p_btnblue';
        } elseif($i % 7 == 0) {
            $class_color = 'p_bgpurple';
            $class_color_checkbox = 'p_btnpurple';
        }

        if(!empty($product_id1_1) and !empty($product_id1_2) and !empty($product_id1_3)) {
            $calories = $product_id1_1->calories_products + $product_id1_2->calories_products + $product_id1_3->calories_products;
        }
        
        @endphp
		                <div class="item_pickplan_box {{ $class_color }}">
                             <div class="row">
                                 <div class="col-12 col-lg-3">
                                     <div class="pickplan_selectday row">
                                        <div class="col-12 col-sm-6 col-lg-12">
                                            <div class="control-group">
<!--
                                            <label class="control control--checkbox p_btndefault {{ $class_color_checkbox }}"> Set {{ chr($chr) }}
                                              {{-- <input type="checkbox" id="package{{ $i }}" value="{{ $i }}" onclick="checkSet();"/> --}}
                                              <div class="control__indicator"></div>
                                            </label> 
-->
                                                
                                                 <div class="p_btndefault {{ $class_color_checkbox }}"> Set {{ chr($chr) }} </div> 
                                                
                                                
                                           
                                          </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-12"> <div class="txt_numkcal">Calories : {{ @$calories }} kcal</div> </div>
                                         
                                     </div>
                                 </div>
                                 <div class="col-12 col-lg-9">
                                      <div class="wrap_pickplan_menus">
                                            <div class="pickplan_menus">
                                                <div class="pickplan_time">breakfast</div>
                                                <div class="pickplan_photo">
                                                    <figure><img src="{{@asset($product_id1_1->img_products)}}" alt=""></figure>
                                                </div>
                                                <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_1->name_products_thai : @$product_id1_1->name_products_eng}}</div>
                                            </div>
                                            <div class="pickplan_menus">
                                                <div class="pickplan_time">lunch</div>
                                                <div class="pickplan_photo">
                                                    <figure><img src="{{asset(@$product_id1_2->img_products)}}" alt=""></figure>
                                                </div>
                                                <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_2->name_products_thai : @$product_id1_2->name_products_eng}}</div>
                                            </div>
                                            <div class="pickplan_menus">
                                                <div class="pickplan_time">dinner</div>
                                                <div class="pickplan_photo">
                                                    <figure><img src="{{asset(@$product_id1_3->img_products)}}" alt=""></figure>
                                                </div>
                                                <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_3->name_products_thai : @$product_id1_3->name_products_eng}}</div>
                                            </div>
                                      </div>
                                      <div class="wrap_pickplan_menus_mobile">
                                          <div class="pickplan_menus_mb">
                                              <div class="row">
                                                  <div class="col-4">
                                                      <div class="pickplan_photo_mb">
                                                            <figure><img src="{{asset(@$product_id1_1->img_products)}}" alt=""></figure>
                                                        </div>
                                                  </div>
                                                  <div class="col-8 pick_nopadleft">
                                                      <div class="pick_menuname_mb">
                                                          <div class="pickplan_time">breakfast</div>
                                                          <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_1->name_products_thai : @$product_id1_1->name_products_eng}}</div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="pickplan_menus_mb">
                                              <div class="row">
                                                  <div class="col-4">
                                                      <div class="pickplan_photo_mb">
                                                            <figure><img src="{{asset(@$product_id1_2->img_products)}}" alt=""></figure>
                                                        </div>
                                                  </div>
                                                  <div class="col-8 pick_nopadleft">
                                                      <div class="pick_menuname_mb">
                                                          <div class="pickplan_time">lunch</div>
                                                          <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_2->name_products_thai : @$product_id1_2->name_products_eng}}</div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="pickplan_menus_mb">
                                              <div class="row">
                                                  <div class="col-4">
                                                      <div class="pickplan_photo_mb">
                                                            <figure><img src="{{asset(@$product_id1_3->img_products)}}" alt=""></figure>
                                                        </div>
                                                  </div>
                                                  <div class="col-8 pick_nopadleft">
                                                      <div class="pick_menuname_mb">
                                                          <div class="pickplan_time">dinner</div>
                                                          <div class="pickplan_name">{{Session::get('lang') == 'th' ? @$product_id1_3->name_products_thai : @$product_id1_3->name_products_eng}}</div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                 </div>
                             </div>
		                </div>
        @php
            $i++;
            $chr++;
        @endphp
    @endforeach
    @php
        $i--;
    @endphp
@endif	                
		            </div>
		            <div class="col-12">
                         <div class="package_boxbtn">
                             <div>{{$day}} / <span>{{number_format($package_price_result, 0, '.', ',')}} THB</span> Calories <span class="calories_package">0</span></div>
		                    <div id="add_to_cart" align="right">{{-- <a href="javascript:insertCartPackage" class="btn_default btn_green btn_addcart_package"><img src="{{asset('files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a> --}}<a href="https://line.me/R/ti/p/@eatfit.th" class="btn_default btn_green" target="_blank"><img src="{{asset('files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a></div>
                         </div>
                         
                          <div class="box_notepack57">
                                *Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries.
                            </div>

		            </div>
		        </div>
		    </div>
		</section>
		
		
		
		@include('frontend.layouts.inc_footer')
		@include('frontend.layouts.scriptjs')
		
	</div>

<script>
    var i = {{ $i }};
    var day = {{ $day }};
    function checkSet() {
        checked = 0;

        package_ = [];
        for(j = 1, k = 0; j <= i, k < i; j++, k++) {
            if($("#package" + j).is(":checked") == true) {
                checked += 1;
                package_[k] = j;
            }
        }
        
        if(day == checked) {
            for(j = 1; j <= i; j++) {
                if($("#package" + j).is(":checked") == false) {
                    $("#package" + j).attr("disabled", true);
                }
            }
        } else if(day > checked) {
            for(j = 1; j <= i; j++) {
                if($("#package" + j).is(":checked") == false) {
                    $("#package" + j).attr("disabled", false);
                }
            } 
        }

        $.post('{{ url("ajaxCalories") }}', { day: day, checked: checked, package_: package_, "_token": "{{ csrf_token() }}" }, function(data) {
            if(day == checked) {
                $("#add_to_cart").show();
            } else {
                $("#add_to_cart").hide();
            }

            $(".calories_package").html(data);
        });
    }
</script>
	

</body>

</html>
