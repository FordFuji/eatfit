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
                    <div>@if(Session::get('lang') == 'th') คำนวณดัชนีมวลกาย @else BMI Calculations @endif</div>
                </div>
            </div>
        </section>

        <section class="row wrap_bmi">
            <div class="container">
                <div class="row">
                    <div class="col-12 wrap_home_bmi">
                        <div class="home_bmi">
                            <div class="home_photo_bmi"><img
                                    src="{{asset('/files/frontend/images/photo_cal_bmi_07.jpg')}}" alt=""></div>
                            <div class="home_title_bmi">
                                <div class="title_topic">@if(Session::get('lang') == 'th') คำนวณดัชนีมวลกาย @else BMI Calculations @endif</div>
                                <div>@if(Session::get('lang') == 'th') มาดูกันว่าแต่ละวันร่างกายของคุณต้องการแคลอรีเท่าไหร่ @else Do you know if you are a healthy weight and how many daily calories you need? @endif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row bmi_page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="topic_bmicalc"><img src="{{asset('/files/frontend/images/icon_calc.svg')}}" alt="">
                            @if(Session::get('lang') == 'th') คำนวณดัชนีมวลกาย @else BMI Calculations @endif</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank" class="btn_contactline"><img
                                src="{{asset('/files/frontend/images/icon_line_wh.svg')}}" alt=""> @if(Session::get('lang') == 'th') ติดต่อเราที่ไลน์ @else Contact on Line @endif
                            @eatfit.th</a>
                    </div>
                    <div class="col-12">
                        <div class="border_boxbmi form_cartlogin">
                            <form action="{{ url('/BMIresult') }}" method="POST" name="BMI_Calculator">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="form-group">
                                            <label>@if(Session::get('lang') == 'th') สูง @else Height @endif</label>
                                            <input class="form-control form-control-lg" placeholder="@if(Session::get('lang') == 'th') เซนติเมตร @else cm @endif" name="Height"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="form-group">
                                            <label>@if(Session::get('lang') == 'th') น้ำหนัก @else Weight @endif</label>
                                            <input class="form-control form-control-lg" placeholder="@if(Session::get('lang') == 'th') กิโลกรัม @else kg @endif" name="Weight"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="form-group">
                                            <label>@if(Session::get('lang') == 'th') เพศ @else Gender @endif</label>
                                            <select class="form-control form-control-lg" name="@if(Session::get('lang') == 'th') เพศ @else Gender @endif" required>
                                                <option>@if(Session::get('lang') == 'th') เพศ @else Gender @endif</option>
                                                <option value="Male">@if(Session::get('lang') == 'th') ชาย @else Male @endif</option>
                                                <option value="Female">@if(Session::get('lang') == 'th') หญิง @else Female @endif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="form-group">
                                            <label>@if(Session::get('lang') == 'th') อายุ @else Age @endif</label>
                                            <input class="form-control form-control-lg" placeholder="@if(Session::get('lang') == 'th') ปี @else year @endif" name="Age"
                                                required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label>Activity Level</label>
                                        <input class="form-control form-control-lg" name="Activity_Level">
                                    </div>
                                </div> --}}
                                    <div class="col-12">
                                        {{-- <a type="submit"  class="btn_default btn_green">Show my result</a> --}}
                                        <input type="submit" class="btn_default btn_green" value="@if(Session::get('lang') == 'th') แสดงผลลัพธ์ @else Show my result @endif">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="bmi_result">
                            <div class="topicgreen_result">@if(Session::get('lang') == 'th') ผลลัพธ์ @else Result @endif</div>
                            <div class="row">
                                <div class="col-12 col-xl-8">
                                    <div class="desc_resultbmi">
                                        @if(Session::get('lang') == 'th')
                                        <div class="topic_bmi"> ดัชนีมวลกาย = {{number_format($BMI, 2, '.', '')}} กิโลกรัม/เมตร^2 <div>
                                            (<span>เกณฑ์</span>)</div>
                                        </div>
                                        @else
                                        <div class="topic_bmi"> BMI = {{number_format($BMI, 2, '.', '')}} kg/m2<div>
                                            (<span>{{$Categories}}</span>)</div>
                                        </div>
                                        @endif
                                        <div class="list_descbmi">
                                            @if(Session::get('lang') == 'th')
                                            <ul>
                                                @if ($Categories == 'Underweight')
                                                <li>Underweight = BMI < 18.5 <br>
                                                        Daily enegy intake(female) = 1,500 - 1,700 kcal / day <br>
                                                        Daily enegy intake(male) = 2,000 - 2,200 kcal / day</li>
                                                @elseif ($Categories == 'Normal weight')
                                                <li>Normal weight = BMI 18.5 - 22.9 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,500 - 1,700 kcal / day <br>
                                                    Daily enegy intake(male) = 2,000 - 2,200 kcal / day</li>
                                                @elseif ($Categories == 'Overweight')
                                                <li>Over weight = BMI 23 - 24.9 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,200 - 1,300 kcal / day <br>
                                                    Daily enegy intake(male) = 1,500 - 1,700 kcal / day</li>
                                                @elseif ($Categories == 'Obesity')
                                                <li>Obsity = BMI >25 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,200 - 1,300 kcal / day <br>
                                                    Daily enegy intake(male) = 1,500 - 1,700 kcal /day</li>
                                                @else

                                                @endif

                                            </ul>
                                            @else 
                                            <ul>
                                                @if ($Categories == 'Underweight')
                                                <li>Underweight = BMI < 18.5 <br>
                                                        Daily enegy intake(female) = 1,500 - 1,700 kcal / day <br>
                                                        Daily enegy intake(male) = 2,000 - 2,200 kcal / day</li>
                                                @elseif ($Categories == 'Normal weight')
                                                <li>Normal weight = BMI 18.5 - 22.9 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,500 - 1,700 kcal / day <br>
                                                    Daily enegy intake(male) = 2,000 - 2,200 kcal / day</li>
                                                @elseif ($Categories == 'Overweight')
                                                <li>Over weight = BMI 23 - 24.9 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,200 - 1,300 kcal / day <br>
                                                    Daily enegy intake(male) = 1,500 - 1,700 kcal / day</li>
                                                @elseif ($Categories == 'Obesity')
                                                <li>Obsity = BMI >25 kg/m2 <br>
                                                    Daily enegy intake(female) = 1,200 - 1,300 kcal / day <br>
                                                    Daily enegy intake(male) = 1,500 - 1,700 kcal /day</li>
                                                @else

                                                @endif

                                            </ul>
                                            @endif
                                        </div>
                                        @if (empty($FOOD))
                                                
                                        @else
                                        <div class="topic_bmi">Food recommended for you</div>
                                        <div class="bmi_productsugguest wrap_promotion">
                                            <div class="owl-bmi owl-carousel owl-theme">
                                                
                                                @foreach($FOOD as $keyproduct => $rproducts)
                                                <div class="items">
                                                    <div class="item_products">
                                                        @if(getPercent($rproducts->price_full, $rproducts->price_sale)
                                                        != 0)
                                                        <div class="badge_tag
                                                            @if($rproducts->color_percent == 1)
                                                            pinktag
                                                            @elseif($rproducts->color_percent == 2)
                                                            purpletag
                                                            @elseif($rproducts->color_percent == 3)
                                                            yellowtag
                                                            @else
                                                            pinktag
                                                            @endif ">
                                                            <div>-{{$rproducts->percent}}%</div>
                                                        </div>
                                                        @endif
                                                        <div class="box_addwishlist">
                                                            @if(Session::get('member_id') != '')
                                                            @php
                                                            $login_inc_top = DB::table('lv_member')
                                                            ->where('member_id', '=', Session::get('member_id'))
                                                            ->first();
                                                            @endphp
                                                            <button
                                                                class="{{$rproducts->wish_id && ($rproducts->wish_member == Session::get('member_id'))  != '' ? 'active' : ''}}"
                                                                value="{{$rproducts->products_id}}"
                                                                id="show_{{$rproducts->products_id}}"
                                                                onclick="show_(this.value)">
                                                                <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}"
                                                                    class="svg" alt="">
                                                            </button>
                                                            @endif
                                                        </div>
                                                        <a
                                                            href="{{url('/product_page/'.$rproducts->menu_head_pk.'/'.$rproducts->products_id)}}">
                                                            <div class="product_photosquare">
                                                                <figure><img src="{{url($rproducts->img_products)}}"
                                                                        alt="">
                                                                </figure>
                                                            </div>
                                                            <div class="item_productname">
                                                                @if(Session::get('lang') == 'th')
                                                                {{$rproducts->name_products_thai}}
                                                                @else
                                                                {{$rproducts->name_products_eng}}
                                                                @endif
                                                            </div>
                                                        </a>
                                                        <div class="item_productprice">@if($rproducts->price == null)
                                                            Price : <span>฿{{$rproducts->price_full}}</span>
                                                            <div>฿{{$rproducts->price_sale}}</div>
                                                            @else
                                                            <div>฿{{$rproducts->price}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="wrap_addcart">
                                                            <a href="" id="{{$rproducts->products_id}}"
                                                                class="btn_default btn_green btn_addcart"><img
                                                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}"
                                                                    alt=""> Add to Cart</a>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                @endforeach
                                                
                                               
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="bmi_boxright">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="box_bmi_category">
                                                    <div class="topic_bmicalc">@if(Session::get('lang') == 'th') เกณฑ์วัดดัชนีมวลกาย @else BMI Categories @endif</div>
                                                    <div>
                                                        <div class="list_bmicategory">@if(Session::get('lang') == 'th') น้ำหนักน้อยกว่ามาตรฐาน @else Underweight @endif =
                                                            <span>&#60;18.5</span></div>
                                                        <div class="list_bmicategory">@if(Session::get('lang') == 'th') เกณฑ์น้ำหนักปกติ @else Normal weight @endif =
                                                            <span>18.5–24.9</span></div>
                                                        <div class="list_bmicategory">@if(Session::get('lang') == 'th') น้ำหนักเกินมาตรฐาน @else Overweight @endif = <span>25–29.9</span>
                                                        </div>
                                                        <div class="list_bmicategory">@if(Session::get('lang') == 'th') โรคอ้วน @else Obesity @endif = <span>@if(Session::get('lang') == 'th') มากกว่า 30 ขึ้นไป @else BMI of 30 or
                                                                greater @endif</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="desc_bmichart">
                                                    {{-- <div class="topic_bmichart">BMI chart for adults</div>
                                                    <p>
                                                        This is a graph of BMI categories based
                                                        on the World Health Organization data.
                                                        The dashed lines represent subdivisions
                                                        within a major categorization.
                                                    </p> --}}
                                                    <a href="https://line.me/R/ti/p/@eatfit.th"
                                                        class="btn_viewchart"><img
                                                            src="{{asset('/files/frontend/images/icon_line_wh.svg')}}"
                                                            alt=""> @if(Session::get('lang') == 'th') ติดต่อผ่านทางไลน์ @eatfit.th @else Contact on Line @eatfit.th @endif</a>
                                                </div>
                                            </div>
                                        </div>
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
        function show_(id) {

            // alert(id);
            var one = 0;
            if ($('#show_' + id).hasClass("active")) {
                alert("ลบ");
                one = 0;
                // $(this).removeClass('active')
                $('#show_' + id).removeClass("active")
                // $(#show_' + id).removeClass("active");
            } else {
                alert("เพิ่ม");
                // $( "p" ).addClass( "myClass yourClass" );
                one = 1;
                $('#show_' + id).addClass("active");

            }
            // if ($('#show_' + id).is('active')) {
            //     one = 1;
            //     $("p").css("background-color", "yellow");
            // } else {
            //     one = 0;
            // }
            $.ajax({
                url: "{{url('/mywish')}}",
                type: 'get',
                dataType: "json",
                data: {
                    id: id,
                    one: one
                },
                success: function () {
                    // alert('สวัสดี');
                }
            });
            // if ( Session::get('member_id') == '') {
            //     window.location.href = "{{url('/')}}";
            // }
            window.location.reload(true);
        }

    </script>



</body>

</html>
