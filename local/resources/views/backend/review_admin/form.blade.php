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
                                <h5>Review(Admin)</h5>
                                <span>eatfit by Gourmet Primo </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#"></a>
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
                            <form action="{{url('/backend/review_admin/saveUpdateReviewAdmin')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
                                                <select name="products_id" class="form-control" required>
                                                    <option value="">Please Select Product</option>
@if(!empty($products))
    @foreach($products as $r)
                                                    <option value="{{ $r->products_id }}" @if(!empty($row) and $row->products_id == $r->products_id)selected @endif>{{ $r->name_products_thai.'/'.$r->name_products_eng }}</option>
    @endforeach
@endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="review_admin_name_th" class="form-control" value="@if(!empty($row)){{$row->review_admin_name_th}}@endif" required>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="review_admin_name_en" class="form-control" value="@if(!empty($row)){{$row->review_admin_name_en}}@endif" required>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title(Th)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="review_admin_title_th" class="form-control" value="@if(!empty($row)){{$row->review_admin_title_th}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="review_admin_title_en" class="form-control" value="@if(!empty($row)){{$row->review_admin_title_en}}@endif" required>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Review</label>
                                            <div class="col-sm-10">
                                                <textarea name="review_admin_review_th" class="form-control" rows="3" required>@if(!empty($row)){{$row->review_admin_review_th}}@endif</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Review(En)</label>
                                            <div class="col-sm-10">
                                                <textarea name="review_admin_review_en" class="form-control" rows="3" required>@if(!empty($row)){{$row->review_admin_review_en}}@endif</textarea>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Rating</label>
                                            <div class="col-sm-10">
                                                <select name="review_admin_rating" class="form-control" required>
                                                    <option value="">Please Select Rating</option>
                                                    <option value="1" @if(!empty($row) and $row->review_admin_rating == 1)selected @endif>1</option>
                                                    <option value="2" @if(!empty($row) and $row->review_admin_rating == 2)selected @endif>2</option>
                                                    <option value="3" @if(!empty($row) and $row->review_admin_rating == 3)selected @endif>3</option>
                                                    <option value="4" @if(!empty($row) and $row->review_admin_rating == 4)selected @endif>4</option>
                                                    <option value="5" @if(!empty($row) and $row->review_admin_rating == 5)selected @endif>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image[]" multiple="true" class="form-control">
@if(!empty($image))
    @foreach($image as $r)
                                                <p>
                                                    <img src="{{ asset($r->review_admin_image_image) }}" width="150"> <a href="{{ url('backend/review_admin/delete/'.$r->review_admin_image_id.'/'.$r->review_admin_id) }}" onclick="return confirm('Confirm Delete');">Delete</a>                                                
                                                </p>
    @endforeach
@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">VDO</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="vdo[]" multiple="true" class="form-control">Recommend Extension mp4
@if(!empty($vdo))
    @foreach($vdo as $r)
                                                <p>
                                                    <video width="300" controls>
                                                        <source src="{{ asset($r->review_admin_image_image) }}" type="video/mp4">
                                                      Your browser does not support the video tag.
                                                      </video> <a href="{{ url('backend/review_admin/delete/'.$r->review_admin_image_id.'/'.$r->review_admin_id) }}" onclick="return confirm('Confirm Delete');" onclick="return confirm('Confirm Delete');">Delete</a>                                                
                                                </p>
    @endforeach
@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="review_admin_id" id="review_admin_id" value="{{@$row->review_admin_id}}">
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
        $( "#review_admin_begin_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#review_admin_end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
      </script>
@endsection
