@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card page-header p-0 bg-11">
                    <div class="card-block front-icon-breadcrumb row align-items-end">
                        <div class="breadcrumb-header col">
                            <div class="big-icon">
                                <i class="icon-tag"></i>
                            </div>
                            <div class="d-inline-block">
                                <h5>Video</h5>
                                <span>eatfit by Gourmet Primo </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#!"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header start -->

                <!-- Page-header end -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Zero config.table start -->
                            <form action="{{url('/backend/saveUpdateVideoYoutube')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Embed Youtube</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="video_youtube_embed" class="form-control" value="@if(!empty($row)){{ $row->video_youtube_embed }}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Topic(Th)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="video_youtube_topic_th" class="form-control" value="@if(!empty($row)){{ $row->video_youtube_topic_th }}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Topic(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="video_youtube_topic_en" class="form-control" value="@if(!empty($row)){{ $row->video_youtube_topic_en }}@endif" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Topic2(Th)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="video_youtube_topic2_th" class="form-control" value="@if(!empty($row)){{ $row->video_youtube_topic2_th }}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Topic2(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="video_youtube_topic2_en" class="form-control" value="@if(!empty($row)){{ $row->video_youtube_topic2_en }}@endif" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Detail(Th)</label>
                                            <div class="col-sm-10">
                                                <textarea name="video_youtube_detail_th" class="form-control" rows="3" required>@if(!empty($row)){{ $row->video_youtube_detail_th }}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Detail(En)</label>
                                            <div class="col-sm-10">
                                                <textarea name="video_youtube_detail_en" class="form-control" rows="3" required>@if(!empty($row)){{ $row->video_youtube_detail_en }}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="video_youtube_id" id="video_youtube_id" value="{{ @$row->video_youtube_id }}">
                                                <input type="submit" name="submit" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <!-- Zero config.table end -->
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#promocode_begin_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#promocode_end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
      </script>
@endsection
