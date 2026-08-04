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
                 <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> 
                 <a href="{{url('/myprofile')}}">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>Review</div>
             </div>
        </div>
    </section>

    <section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
            {{-- <div class="row wrap_navigationbar">
                <a href="{{url('/')}}"><img src="{{asset('images/icon_home.svg')}}" alt=""></a>
                <div>Reviews</div>
            </div> --}}
            <div class="col-12 col-lg-8 wrap_memberorder">
                <div class="topicbar_member">Review</div>
            <div class="row wrap_reviewall wrap-content">
                {{-- <div class="col-12 col_itemproduct">
                    <div class="text-center inside_toptitle">
                        <div class="title_topic">SEE RESULTS</div>
                    </div>
                    <div class="topic_result_home">Get inspired by our customers’ amazing stories!</div>
                </div> --}}
                <div class="col-12">
                    {{-- @foreach ($review as $item) --}}
                    <div class="product_boxreviews">
                        <div class="row">
                            <div class="col-6">
                                <div class="star-rate">
                                    @if ($reviewAT->review_star == '1')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($reviewAT->review_star == '2')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($reviewAT->review_star == '3')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($reviewAT->review_star == '4')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($reviewAT->review_star == '5')
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
                                <div class="date_seeresult"><i class="far fa-calendar-alt"></i> {{$reviewAT->review_date}}</div>
                            </div>
                            <div class="col-12">
                                <div class="topic_results">{{$reviewAT->review_title}}</div>
                                <div class="desc_results">{{$reviewAT->review_content}}</div>
                                <div class="box_photoreviews">
                                    
                                    @php
                                        $reviewfileimg = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', $reviewAT->review_id)
                                                        ->where('review_file_type', 'IMG')
                                                        // ->orderBy('review_id','DESC')
                                                        ->get();
                                        $reviewfilevddo = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', $reviewAT->review_id)
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
                                            <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                            <video src="{{url('local/public/'.$itemvdo->review_file_file)}}" width="125">
                                            {{-- </figure> --}}
                                        </a> 
                                    @endforeach
                                    
                                </div>
                                <div class="name_customerresult"><img src="{{asset('images/avatar.svg')}}" alt=""> {{$member->member_name.' '.$member->member_family}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    </section>

    @include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')

    <script>
        $(".menu_account_left > ul > li:nth-child(6) > a").addClass("here");
    </script>

</div>


</body>

</html>
