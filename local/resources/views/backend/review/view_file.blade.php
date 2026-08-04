<div class="modal fade show" id="edit_gallery_banner_menu_head" tabindex="-1" role="dialog"
    style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left">Details {{$reviewAT->review_date}}</h4>
                {{-- <strong class="label label-inverse">THAI</strong><br>
                <h5 id="name_th"></h5>
                <br>
                <strong class="label label-inverse">ENGLISH</strong><br>
                <h5 id="name"></h5><br> --}}
                <a href="{{url('/backreview')}}" type="button" class="close" data-dismiss="modal">&times;</a>

            </div>
            <div class="modal-body">
            <strong class="label coblue"> {{$reviewAT->review_star}} Star </strong>
                <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                <div class="text-center">
                    @if ($reviewAT->review_star == '1')
                    <i class="icon-star"></i>
                    @elseif ($reviewAT->review_star == '2')
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    @elseif ($reviewAT->review_star == '3')
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    @elseif ($reviewAT->review_star == '4')
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    @elseif ($reviewAT->review_star == '5')
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    @else
                    0 <i class="icon-star"></i>
                    @endif
                </div>
                <div >
                    <strong class="label coblue">Image</strong>
                        <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <div class="row">
                        
                    
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
                    <div class="col-md-3">
                    <a href="{{url('local/public/'.$itemfile->review_file_file)}}" data-toggle="lightbox"
                        data-gallery="example-gallery">
                        <img src="{{url('local/public/'.$itemfile->review_file_file)}}" class="img-fluid m-b-10" alt="">
                    </a>
                    </div>
                    @endforeach
                </div>
                <strong class="label coblue">VDO</strong>
                <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                <div class="row">
                  
                    @foreach ($reviewfilevddo as $itemvdo)
                    <div class="col-md-3">
                        <div class="video-gallery"> 
                            <video width="500" controls controlsList="nodownload" oncontextmenu="return false;" allowfullscreen> 
                                <source src="{{url('local/public/'.$itemvdo->review_file_file)}}"   type="video/mp4"> 
                            </video> 
                        </div>
                </div>
                    @endforeach
                </div>
                </div>
                <strong class="label coblue">Topic</strong>
                <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                <p>{{$reviewAT->review_title}}</p>

                <strong class="label coblue">Content</strong>
                <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                <p>{{$reviewAT->review_content}}</p>
                <div class="modal-footer">
                    <a href="{{url('/backreview')}}" type="button" class="btn btn-default waves-effect "
                        data-dismiss="modal">Close</a>
                    {{-- <input type="submit" class="btn btn-primary" value="Submit"> --}}
                </div>

            </div>
        </div>
    </div>
</div>
