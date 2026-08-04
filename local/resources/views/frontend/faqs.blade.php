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
                    <div>@if(Session::get('lang') == 'th') คำถามที่พบบ่อย @else FAQs @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap_bannerinside">
                <img src="{{asset('/files/frontend/images/banner_faq_02.jpg')}}" alt="">
            </div>
        </section>
        
        <section class="row wrap_itemfaqs">
            <div class="container">
                <div class="row">
                    {{-- @foreach ($typequestion as $key => $item) --}}
                    <div class="col-12 col-lg-4 faq_nopad">
                        <div class="title_faqs title_topic">@if(Session::get('lang') == 'th') คำถามที่พบบ่อย @else FAQs @endif</div>
                        <div class="menu_account_left">
                            <ul>
                                @foreach ($typequestion as $key => $item)
                                <li>
                                    <a href="{{url('/faqsAW',$item->type_question_id)}}" class="icon_menudropdown m_iconfaqs {{ $item->type_question_id == $id ? "active" : '' }}">
                                        <div>
                                            <img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg">
                                        </div>
                                        @if(Session::get('lang') == 'th') {!! Str::limit(strip_tags($item->type_question_name_th), 50) !!} @else {!! Str::limit(strip_tags($item->type_question_name_en), 50) !!} @endif
                                    </a>
                                </li>
                                @endforeach
                                
                                {{-- <li>
                                    <a href="{{url('/faqs')}}" class="icon_menudropdown m_iconfaqs">
                                        <div>
                                            <img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg">
                                        </div> Orders
                                    </a>
                                </li>
                                <li><a href="faqs.php" class="icon_menudropdown m_iconfaqs">
                                        <div><img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg"></div> Payment
                                    </a>
                                </li>
                                <li><a href="faqs.php" class="icon_menudropdown m_iconfaqs">
                                        <div><img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg"></div> Service
                                    </a>
                                </li>
                                <li><a href="faqs.php" class="icon_menudropdown m_iconfaqs">
                                        <div><img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg"></div> Returns
                                    </a>
                                </li>
                                <li><a href="faqs.php" class="icon_menudropdown m_iconfaqs">
                                        <div><img src="{{asset('/files/frontend/images/icon_faqs.svg')}}" alt=""
                                                class="svg"></div> Account
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 faq_nopad">
@if(!empty($TTYYPP))
    @foreach($TTYYPP as $typ)
                        <div class="topicselect_faqs">@if(Session::get('lang') == 'th') {{$typ->type_question_name_th}} @else {{$typ->type_question_name_en}} @endif</div>
                        <div>
                            @foreach ($question as $item)
                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> @if(Session::get('lang') == 'th') {{$item->question_q_th}} @else {{$item->question_q_en}} @endif</div>
                                <div class="content_faqs">
                                    {{-- <p style="white-space: pre-wrap;"> --}}
                                    <p>
                                        @if(Session::get('lang') == 'th') {!! ($item->question_answer_th) !!} @else {!! ($item->question_answer_en) !!} @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            

                            {{-- <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> DO YOU DELIVER ON MONDAY?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> CAN I AMEND MY ORDER AFTER I HAVE PLACED IT?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> CAN I CANCEL MY ORDER BEFORE DELIVERY?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> WHAT SHOULD I DO IF MY ORDER HAS NOT BEEN
                                    DELIVERED?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> How much does shipping cost?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> How does shipping work?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> Where do you deliver?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> What days of the week do you deliver?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div>

                            <div class="item_faqs">
                                <div class="topicfaqs have_subitem"> Can I change the day my meals are delivered?</div>
                                <div class="content_faqs">
                                    <p>
                                        We currently provide the following shipping options within the UK:
                                    </p>
                                    <p>
                                        STANDARD DELIVERY (TUES-SAT) - DELIVERED ANYTIME BETWEEN 9AM - 6PM <br>
                                        MORNING DELIVERY (TUES-FRI) - DELIVERED BETWEEN 9AM - 12PM <br>
                                        SAME DAY (MON-FRI) ORDER BY 12PM, DELIVERY BY 7PM LONDON ONLY<br>
                                    </p>
                                    <p>
                                        It is not possible to specify an exact delivery time within these time slots.
                                        However, our courier
                                        DPD offer a delivery service whereby they inform customers of a one-hour
                                        delivery window
                                        notified by SMS and/or email. You can watch the progress of your delivery driver
                                        on a real-time
                                        map. If your plans change and you're not able to sign for your order, you can
                                        opt to deliver to a
                                        neighbour, have the parcel delivered to a safe place or collect your parcel from
                                        a local pickup
                                        shop. Please note, for fresh product deliveries, it is recommended that the
                                        package is delivered
                                        to an address where it can be received, products held in postal depots cannot be
                                        guaranteed
                                        to be refrigerated whilst being held.
                                    </p>
                                </div>
                            </div> --}}
                        </div>
    @endforeach
@endif
                    </div>
                </div>
            </div>
        </section>


        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

    </div>




</body>

</html>
