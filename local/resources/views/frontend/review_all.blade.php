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
                <a href="{{url('/')}}"><img src="{{asset('images/icon_home.svg')}}" alt=""></a>
                <div>Reviews</div>
            </div>

            <div class="row wrap_reviewall wrap-content">
                <div class="col-12 col_itemproduct">
                    <div class="text-center inside_toptitle">
                        <div class="title_topic">SEE RESULTS</div>
                    </div>
                    <div class="topic_result_home">Get inspired by our customers’ amazing stories!</div>
                </div>
                <div class="col-12">
                    @foreach ($reviewAdmin as $item)
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    @if ($item->review_admin_rating == '1')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '2')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '3')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '4')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '5')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                @else
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> {{$item->review_admin_datetime_update}}</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">{{ Session::get('lang') ? $item->name_products_thai : $item->name_products_eng}}</div>
                                <div class="desc_results">{!! html_entity_decode($item->review_admin_review_th) !!}</div>
                                <div class="box_photoreviews"> 
                                    @php
                                    $image = DB::table('lv_review_admin_image')
                                        ->where('image_or_video', '=', 'Image')
                                        ->where('review_admin_id', '=', $item->review_admin_id)
                                        ->get();
                                    
                                    $video = DB::table('lv_review_admin_image')
                                        ->where('image_or_video', '=', 'VDO')
                                        ->where('review_admin_id', '=', $item->review_admin_id)
                                        ->get();
                                    @endphp
                                    @foreach ($image as $itemfile)
                                    <a href="{{url($itemfile->review_admin_image_image)}}" data-fancybox="images">
                                        <figure><img src="{{url($itemfile->review_admin_image_image)}}" alt=""></figure>
                                    </a>
                                    @endforeach
                                    
                                    @foreach ($video as $itemvdo)
                                       <a href="{{url($itemvdo->review_admin_image_image)}}" data-fancybox>
                                        {{-- <figure> --}}
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <video src="{{url($itemvdo->review_admin_image_image)}}" width="125">
                                            {{-- </figure> --}}
                                        </a> 
                                    @endforeach
                                    
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> {{$item->review_admin_name_th}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- @foreach ($review as $item)
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    @if ($item->review_star == '1')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '2')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '3')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '4')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '5')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                @else
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> {{$item->review_date}}</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">{{$item->review_title}}</div>
                                <div class="desc_results">{{$item->review_content}}</div>
                                <div class="box_photoreviews">
                                    
                                    @php
                                        $reviewfileimg = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', $item->review_id)
                                                        ->where('review_file_type', 'IMG')
                                                        // ->orderBy('review_id','DESC')
                                                        ->get();
                                        $reviewfilevddo = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', $item->review_id)
                                                        ->where('review_file_type', 'VDO')
                                                        // ->orderBy('review_id','DESC')
                                                        ->get();
                                    @endphp
                                    @foreach ($reviewfileimg as $itemfile)
                                    <a href="{{url('local/public/'.$itemfile->review_file_file)}}" data-fancybox="images">
                                        <figure><img src="{{url('local/public/'.$itemfile->review_file_file)}}" alt=""></figure>
                                    </a>
                                    @endforeach
                                    
                                    @foreach ($reviewfilevddo as $itemvdo)
                                       <a href="{{url('local/public/'.$itemvdo->review_file_file)}}" data-fancybox>
                                        {{-- <figure> --}}
                                            {{-- <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <video src="{{url('local/public/'.$itemvdo->review_file_file)}}" width="125">
                                            {{-- </figure> --}}
                                        {{-- </a> 
                                    @endforeach
                                    --}}
                                {{-- </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> {{$item->member_name.' '.$item->member_family}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                    {{-- <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star star-gold"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">Delicious</div>
                                <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                <div class="box_photoreviews">
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/photo_product1_03.jpg')}}" data-fancybox="images">
                                        <figure><img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                    <a href="{{asset('images/video_test.mp4')}}" data-fancybox>
                                        <figure>
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <img src="{{asset('images/photo_product1_03.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> Name
                                    Surname
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="page_pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')

</div>


</body>

</html>
