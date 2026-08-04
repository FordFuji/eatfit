<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')
</head>

<body>

    <div class="container-fluid">

        @include('frontend.layouts.inc_menu')

        <section class="row">
            <div class="container">
                <div class="row wrap_navigationbar">
                    <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('/')}}">@if(Session::get('lang') == 'th') บทความ @else Blog @endif</a> <span><i
                            class="fas fa-chevron-right"></i></span>
                    <div>
                        
                        @if(Session::get('lang') == 'th')
                        {!! Str::limit(strip_tags($detail->blog_topic_th), 80) !!}
                        @else
                        {!! Str::limit(strip_tags($detail->blog_topic_en), 80) !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="row wrap_blogdetail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> {{(date('d.m.Y', strtotime($detail->blog_date)))}}</div>
                        <div class="content_topicblog">
                            
                            @if(Session::get('lang') == 'th')
                            {!! $detail->blog_topic_th !!}
                                    @else
                                    {!! $detail->blog_topic_en !!}
                                    @endif
                        </div>
                        <div class="blog_editor">
                            <img src="{{url('local/public/'.$detail->blog_banner_image)}}" alt="">
                            <br><br>
                            @if(Session::get('lang') == 'th')
                            {!! $detail->blog_content_th !!}
                                    @else
                                    {!! $detail->blog_content_en !!}
                                    @endif
                            
                        </div>

                        {{-- <div class="box_socialshare">
                            <div class="txt_share">Share</div>
                            <div class="icon_socialshare">
                                <a href="" target="_blank">
                                    <img src="{{asset('/files/frontend/images/icon_fb.svg')}}" alt="">
                                </a>
                                <a href="" target="_blank">
                                    <img src="{{asset('/files/frontend/images/icon_twitter.svg')}}" alt="">
                                </a>
                                <a href="" target="_blank">
                                    <img src="{{asset('/files/frontend/images/icon_gplus.svg')}}" alt="">
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

        <section class="row wrapall_recentblog wrap_home_blog">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bar_recentblog">Recent Blog</div>
                        <div class="owl-blog owl-carousel owl-theme">
                            @foreach ($Recent as $item)
                            <div class="items">
                                <div class="item_blog">
                                    <a href="{{url('/blog_detail',$item->blog_id)}}">
                                        <div class="product_photosquare">
                                            <figure>
                                                <img src="{{url('local/public/'.$item->blog_cover_image)}}"  alt="">
                                            </figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i>{{(date('d.m.Y', strtotime($item->blog_date)))}}</div>
                                        <div class="desc_homeblog">
                                            {{-- {!! Str::limit(strip_tags($item->blog_topic_en), 80) !!} --}}
                                            @if(Session::get('lang') == 'th')
                                            {!! Str::limit(strip_tags($item->blog_topic_th), 80) !!}
                                            @else
                                            {!! Str::limit(strip_tags($item->blog_topic_en), 80) !!}
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                            {{-- <div class="items">
                                <div class="item_blog">
                                    <a href="">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                        <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item_blog">
                                    <a href="">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                        <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item_blog">
                                    <a href="">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                        <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item_blog">
                                    <a href="">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                        <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item_blog">
                                    <a href="">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                        <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</div>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <a href="{{url('/blog')}}" class="btn_default btn_orange">view all</a>
                    </div>
                </div>
            </div>
        </section>




        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

    </div>




</body>

</html>
