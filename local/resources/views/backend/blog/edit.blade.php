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
                            <i class="icon-trophy"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>Edit Blog </h5>
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
            <div id="content" class="content">
                <div class="card">
                    <div class="card-block">
                        {{-- <ol class="breadcrumb pull-right">
                            <li></li>
                            <li class="active"></li>
                        </ol> --}}

                        <form action="{{ route('backblog.update', $blog_info->blog_id) }}"
                            method="POST" name="update_news" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Banner</strong>
                                            <input type="file" class="form-control" name="blog_banner_image" accept="image/*" id="imageactivitiesBA" >
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->blog_banner_image }}"> --}}
                                            <p> * กรุณาใส่รูปภาพ *</p>
                                            <img src="{{url('local/public/'.$blog_info->blog_banner_image)}}" alt="" id="imgactivitiesBA" style="height: 300px">
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Cover</strong>
                                        {{-- <input type="file" class="form-control form-control-sm" id="ourproject_head_img"
                                            name="ourproject_head_img" accept="image/*">
                                        <br>
                                        <img src="{{url('local/public/'.$blog_info->blog_banner_image)}}"
                                            width="20%" alt="">
                                    </div>
                                    <input type="hidden" name="imgbn" id="imgbn"
                                        value="{{ $blog_info->blog_banner_image }}"> --}}

                                            <input type="file" class="form-control" name="blog_cover_image" accept="image/*" id="imageactivitiesCo">
                                                {{-- <input type="hidden" name="imgbn" id="imgbn"
                                                value="{{ $blog_info->blog_cover_image }}"> --}}
                                            <p> * กรุณาใส่รูปภาพ *</p>
                                            <img src="{{url('local/public/'.$blog_info->blog_cover_image)}}" alt="" id="imgactivitiesCo" style="height: 300px">
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Date</strong>
                                        <input type="date" name="blog_date" class="form-control"
                                            placeholder="Enter date" value="{{ $blog_info->blog_date }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (TH)</strong>
                                        <input type="text" name="blog_topic_th" class="form-control"
                                            placeholder="Enter Title TH"
                                            value="{{ $blog_info->blog_topic_th }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (EN)</strong>
                                        <input type="text" name="blog_topic_en" class="form-control"
                                            placeholder="Enter Title"
                                            value="{{ $blog_info->blog_topic_en }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content (TH)</strong>
                                        <textarea class="form-control summernote" name="blog_content_th">
                                            {!! $blog_info->blog_content_th !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content (EN)</strong>
                                        <textarea class="form-control summernote" name="blog_content_en">
                                            {!! $blog_info->blog_content_en !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <a href="{{url('/backblog')}}" type="button" class="btn btn-default">Close</a>
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
    function readURLCo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgactivitiesCo').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageactivitiesCo").change(function () {
        readURLCo(this);
    });
</script>
<script>
    function del(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        Swal.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ข้อมูลจะไม่สามารถกู้กลับมาได้อีก!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'NO...',
        }).then((result) => {
            if (result.value) {

                $("#del_" + id).submit();

                Swal.fire(
                    'ลบข้อมูลสำเร็จ!',
                    'ข้อมูลถูกลบออกจากระบบแล้ว',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'ยกเลิก',
                    'ยกเลิกการลบข้อมูล',
                    'error'
                )
            }
        })
    }

</script>
@endsection
