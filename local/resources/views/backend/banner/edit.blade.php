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
                            <i class="icon-magic-wand"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>EDIT BANNER </h5>
                            <span>eatfit by Gourmet Primo</span>
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
            <div id="content" class="content">
                <div class="card">
                    <div class="card-block">
                        {{-- <ol class="breadcrumb pull-right">
                            <li></li>
                            <li class="active"></li>
                        </ol> --}}

                        <form action="{{ route('backbanner.update', $banner_info->banner_id) }}"
                            method="POST" name="update_news" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Banner(Th)</strong>
                                            <input type="file" class="form-control" name="banner_image" accept="image/*" id="imageactivitiesBA" >
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->blog_banner_image }}"> --}}
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="{{url('local/public/'.$banner_info->banner_image)}}" alt="" id="imgactivitiesBA" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Banner(En)</strong>
                                            <input type="file" class="form-control" name="banner_image_en" accept="image/*" id="imageactivitiesBA" >
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->blog_banner_image }}"> --}}
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="{{url('local/public/'.$banner_info->banner_image_en)}}" alt="" id="imgactivitiesBA" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Mobile Banner(Th)</strong>
                                            <input type="file" class="form-control" name="banner_image_mobile" accept="image/*" id="imageactivitiesBA" >
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->banner_image_mobile }}"> --}}
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="{{url('local/public/'.$banner_info->banner_image_mobile)}}" alt="" id="imgactivitiesBA" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Mobile Banner(En)</strong>
                                            <input type="file" class="form-control" name="banner_image_mobile_en" accept="image/*" id="imageactivitiesBA" >
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->banner_image_mobile_en }}"> --}}
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="{{url('local/public/'.$banner_info->banner_image_mobile_en)}}" alt="" id="imgactivitiesBA" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Link</strong>
                                        <input type="text" name="banner_link" class="form-control" id="ban_link"  value="{{ $banner_info->banner_link }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Topic (TH)</strong>
                                        <input type="text" name="banner_topic_th" class="form-control form-txt-success" value="{{ $banner_info->banner_topic_th }}"
                                            placeholder="Enter Topic (TH)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Topic (EN)</strong>
                                        <input type="text" name="banner_topic_en" class="form-control form-txt-success" value="{{ $banner_info->banner_topic_en }}"
                                            placeholder="Enter Topic (EN)">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Content (TH)</strong>
                                        <textarea type="text" name="banner_content_th" class="form-control"
                                            placeholder="Enter Content (TH)">{!! $banner_info->banner_content_th !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Content (EN)</strong>
                                        <textarea type="text" name="banner_content_en" class="form-control" 
                                            placeholder="Enter Content (EN)">{!! $banner_info->banner_content_en !!}</textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 text-right">
                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                    <a href="{{url('/backbanner')}}" type="button" class="btn btn-default">Close</a>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function () {

        $('.summernote').summernote({

            height: 300,
            popover: {
                image: [],
                link: [],
                air: []
            }
        });

    });
    function readURLBa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgactivitiesBA').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageactivitiesBA").change(function () {
        readURLBa(this);
    });
</script>

@endsection
