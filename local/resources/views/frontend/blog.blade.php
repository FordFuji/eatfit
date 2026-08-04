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
                    <div>@if(Session::get('lang') == 'th') บทความ @else Blog @endif</div>
                </div>
            </div>
        </section>

        <section class="row page_topblog">
            <div class="col-12">
                <div class="text-center">
                    <div class="title_topic">{{(Session::get('lang') == 'th') ? 'บทความแนะนำสำหรับคุณ' : 'Top Blog Posts for You'}}</div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bgwhite_blog">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <a href="{{url('/blog_detail',$blog_last->blog_id)}}" class="link_photoblog">
                                            <figure>
                                                <img src="{{url('local/public/'.$blog_last->blog_cover_image)}}" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="page_desc_topblog">
                                            <div class="blogdate"><i class="far fa-calendar-alt"></i>{{(date('d.m.Y', strtotime($blog_last->blog_date)))}}</div>
                                            <div class="main_topic_blog">
                                                {{-- {!! Str::limit(strip_tags($blog_last->blog_topic_en), 80) !!} --}}
                                                @if(Session::get('lang') == 'th')
                                                {!! Str::limit(strip_tags($blog_last->blog_topic_th), 80) !!}
                                                @else
                                                {!! Str::limit(strip_tags($blog_last->blog_topic_en), 80) !!}
                                                @endif
                                            </div>
                                            <div class="main_descblog">
                                                {{-- {!! Str::limit(strip_tags($blog_last->blog_content_en), 80) !!} --}}
                                                @if(Session::get('lang') == 'th')
                                                {!! Str::limit(strip_tags($blog_last->blog_content_th), 80) !!}
                                                @else
                                                {!! Str::limit(strip_tags($blog_last->blog_content_en), 80) !!}
                                                @endif
                                            </div>
                                            <a href="{{url('/blog_detail',$blog_last->blog_id)}}" class="btn_default btn_green">
                                                {{-- read more --}}
                                                @if(Session::get('lang') == 'th')
                                                อ่านเพิ่มเติม
                                                @else
                                                read more
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="row">
            <div class="container">
                <div class="row topblogs_second">
                    <div class="col-12 col-sm-6 topblogs_second_order1">
                        <div class="page_desc_topblog">
                            <div class="blogdate"><i class="far fa-calendar-alt"></i>{{(date('d.m.Y', strtotime($blog_last_two->blog_date)))}}</div>
                            <div class="main_topic_blog">
                                {{-- {!! Str::limit(strip_tags($blog_last_two->blog_topic_en), 80) !!} --}}
                                @if(Session::get('lang') == 'th')
                                {!! Str::limit(strip_tags($blog_last_two->blog_topic_th), 80) !!}
                                @else
                                {!! Str::limit(strip_tags($blog_last_two->blog_topic_en), 80) !!}
                                @endif
                            </div>
                            <div class="main_descblog">
                                {{-- {!! Str::limit(strip_tags($blog_last_two->blog_content_en), 80) !!} --}}
                                @if(Session::get('lang') == 'th')
                                {!! Str::limit(strip_tags($blog_last_two->blog_content_th), 80) !!}
                                @else
                                {!! Str::limit(strip_tags($blog_last_two->blog_content_en), 80) !!}
                                @endif
                            </div>
                            <a href="{{url('/blog_detail',$blog_last_two->blog_id)}}" class="btn_default btn_green">
                                @if(Session::get('lang') == 'th')
                                อ่านต่อ
                                @else
                                read more
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 topblogs_second_order2">
                        <a href="{{url('/blog_detail',$blog_last_two->blog_id)}}" class="link_photoblog">
                            <figure>
                                <img src="{{url('local/public/'.$blog_last_two->blog_cover_image)}}" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="row wrap_allblog_bggreen">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <div class="title_topic">
                                {{(Session::get('lang') == 'th') ? 'บทความทั้งหมด' : 'All Blogs'}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row item_allblog">
                    @foreach ($blog as $item)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail',$item->blog_id)}}">
                                <div class="product_photosquare">
                                    <figure>
                                        <img src="{{url('local/public/'.$item->blog_cover_image)}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> {{(date('d.m.Y', strtotime($item->blog_date)))}}</div>
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
                    
                    {{-- <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="item_blog">
                            <a href="{{url('/blog_detail')}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt="">
                                    </figure>
                                </div>
                                <div class="home_blogdate"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                <div class="desc_homeblog">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</div>
                            </a>
                        </div>
                    </div> --}}
                    <div class="col-12 text-center">
                        <a href="" class="btn_default btn_orange">@if(Session::get('lang') == 'th') ดูเพิ่มเติม @else show more @endif</a>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

    </div>




</body>

</html>
