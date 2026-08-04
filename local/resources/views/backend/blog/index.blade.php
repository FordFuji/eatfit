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
                            <h5>BLOG </h5>
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

            <!-- Page-header end -->


            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">  
                        <!-- Zero config.table start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>All</h5>
                                <div class="card-block icon-btn">
                                    <span>
                                        <button class="btn btn-navy rounded-pill btn-sm" data-toggle="modal"
                                            data-target="#myModal" type="button">
                                            <i class="ion-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="example1" class="table table-striped table-bordered nowrap">
                                        {{-- <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap"> --}}
                                        <thead>
                                            <tr>
                                                {{-- <th class="text-center" width="5%">Select</th> --}}
                                                <th class="text-center" width="5%">No.</th>
                                                <th class="text-center" width="10%">date</th>
                                                <th class="text-center" width="30%">Topic</th>
                                                <th class="text-center" width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blog as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>{{(date('d.m.Y', strtotime($item->blog_date)))}}</td>
                                                <td>
                                                    {!! Str::limit(strip_tags($item->blog_topic_en), 50) !!}
                                                </td>
                                                <td>
                                                    <div class="dropdown-blue dropdown open ">
                                                        <button
                                                            class="btn btn-navy rounded-pill btn-sm"
                                                            type="button" id="dropdown-2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true">action
                                                            <i class="ion-arrow-down-b"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-2"
                                                             data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    onclick="Details('{{$item->blog_id}}')"
                                                                    data-toggle="modal" data-target="#myModalDetails">
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    href="{{ route('backblog.edit', $item->blog_id)}}">
                                                                    <i class="icon-note"></i>Edit</a>
                                                            </form>
                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->blog_id}}"
                                                                action="{{ route('backblog.destroy', $item->blog_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->blog_id}})"
                                                                    value="{{$item->blog_id}}"
                                                                    class="dropdown-item delbtn  ">
                                                                    <i class="icon-trash"></i>Delete
                                                                </a>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                {{-- <th class="text-center">Select</th> --}}
                                                <th class="text-center">No.</th>
                                                <th class="text-center">date</th>
                                                <th class="text-center">Topic</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Zero config.table end -->

                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <div id="na" class="modal fade " role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <!-- Modal ตารางป็อปอัพ -->
    <div id="myModal" class="modal fade " role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Add Blog</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;

                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('backblog.store') }}" method="POST" name="add_news"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="card"> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <h2 class="sub-title">Image</h2>
                                </strong>

                                <div class="col-md-12">
                                    <strong>Images Banner</strong>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="blog_banner_image" accept="image/*" id="imageactivitiesBA"
                                            required>
                                        <p> * กรุณาใส่รูปภาพ *</p>
                                        <img src="" alt="" id="imgactivitiesBA" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <strong>Images Cover</strong>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="blog_cover_image" accept="image/*" id="imageactivitiesCo"
                                            required>
                                        <p> * กรุณาใส่รูปภาพ *</p>
                                        <img src="" alt="" id="imgactivitiesCo" style="height: 300px">
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Image Content</strong>
                                        <input class="form-control form-control-sm" type="file"
                                            name="ourproject_image[]" accept="image/*" multiple>
                                        <strong style="color:red">เพิ่มได้มากกว่า 1 รูป</strong>
                                    </div>
                                </div>
                                <br> --}}
                                <strong>
                                    <h2 class="sub-title">Input Blog</h2>
                                </strong>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Date</strong>
                                        <input type="date" name="blog_date" class="form-control"
                                            placeholder="Enter date">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (TH)</strong>
                                        <input type="text" name="blog_topic_th" class="form-control"
                                            placeholder="Enter Topic (TH)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (EN)</strong>
                                        <input type="text" name="blog_topic_en" class="form-control"
                                            placeholder="Enter Topic (EN)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content TH</strong>
                                        <textarea class="form-control summernote" type="text"
                                            name="blog_content_th" placeholder="Enter content (TH)"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content</strong>
                                        <textarea class="form-control summernote" type="text"
                                            name="blog_content_en" placeholder="Enter content (EN)"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalEdit" class="modal fade " role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Edit Our Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" name="add_news" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <h2 class="sub-title">Image</h2>
                                </strong>

                                <div class="col-md-12">
                                    <strong>Images</strong>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="file" name="project_head_img">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <strong>Image Content</strong>
                                        <input class="form-control form-control-sm" type="file" name="project_image[]">
                                    </div>
                                </div>
                                <br>
                                <strong>
                                    <h2 class="sub-title">Input Our Project</h2>
                                </strong>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Type</strong>
                                        <select class="default-select2 form-control" name="project_type">
                                            <option value="1">News</option>
                                            <option value="2">Event</option>
                                            <option value="3">Projects</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Date</strong>
                                        <input type="date" name="project_date" class="form-control"
                                            placeholder="Enter date">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (TH)</strong>
                                        <input type="text" name="project_topic_th" class="form-control"
                                            placeholder="Enter Topic (TH)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (EN)</strong>
                                        <input type="text" name="project_topic_en" class="form-control"
                                            placeholder="Enter Topic (EN)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content TH</strong>
                                        <textarea class="form-control summernote" type="text" name="project_content_th"
                                            placeholder="Enter content (TH)"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content</strong>
                                        <textarea class="form-control summernote" type="text" name="project_content_en"
                                            placeholder="Enter content (EN)"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-primary" onclick="update()" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalDetails" class="modal fade" role="dialog">  
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Details</h4>
                    {{-- <strong class="label label-inverse">THAI</strong><br>
                    <h5 id="name_th"></h5>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <h5 id="name"></h5><br> --}}
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                        <strong class="label coblue">Banner</strong>
                        <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <div class="text-center">
                        <img width="30%" alt="" src="" alt="" id="imageB">
                    </div>
                        <strong class="label coblue">Cover</strong>
                        <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <div class="text-center">    
                        <img width="30%" alt="" src="" alt="" id="imageCO">
                    </div>
                    <strong class="label coblue">Topic</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="topic_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="topic_en"></p><br>

                    <strong class="label coblue">Content</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="content_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="content_en"></p><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{-- <input type="submit" class="btn btn-primary" value="Submit"> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#example1").DataTable();
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
    function edit(project_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        $("#project_id").val(project_id);
        // $("#ct_text").val(ct_text);
        // alert(ct_id);


        $.ajax({
            data: {
                project_id: project_id,
                // ct_text: ct_text,
            },
            url: "{{url('/backourproject')}}/" + project_id + "/edit",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                // $('#qa_question').val(data.qa_question);
                // $('#qa_answer').val(data.qa_answer);
                $('#project_content_th').summernote('code', data.ourproject_content_th);
                $('#project_content_en').summernote('code', data.ourproject_content_en);
                $('#project_topic_th').val(data.ourproject_topic_th);
                $('#project_topic_en').val(data.ourproject_topic_en);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }

    function update() {
        // alert(about_id);

        about_id = $("#project_id").val();
        var about_profile_th = $('#about_profile_th').val();
        var about_profile_en = $('#about_profile_en').val();
        var about_content_th = $('#about_content_th').val();
        var about_content_en = $('#about_content_en').val();
        var about_address_th = $('#about_address_th').val();
        var about_address_en = $('#about_address_en').val();

        // var qa_admin = $('#qa_admin').val();
        // dd(about_id);
        $.ajax({

            // method: 'PUT',
            type: "POST",
            url: "{{url('/backourproject')}}/" + project_id,

            data: {
                _method: "PUT",
                about_profile_th: about_profile_th,
                about_profile_en: about_profile_en,
                about_content_th: about_content_th,
                about_content_en: about_content_en,
                about_address_th: about_address_th,
                about_address_en: about_address_en,

                // reference_category_name_th: name_th,
                "_token": "{{ csrf_token() }}",
            },

            success: function (data) {
                // alert(data);

                $("#myModalEdit").modal('hide');
                window.location.reload(true);
                // $('#foodtype_table').DataTable().ajax.reload();
                // alert(data);

            }

        });
    }

</script>
<script>
    function Details(blog_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(pro_id);


        $.ajax({
            data: {
                blog_id: blog_id,
            },
            url: "{{url('/backblog')}}/" + blog_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#topic_th').html(data.blog_topic_th);
                $('#topic_en').html(data.blog_topic_en);
                $('#content_th').html(data.blog_content_th);
                $('#content_en').html(data.blog_content_en);
                $('#imageB').attr('src','{{asset('local/public/')}}'+'/' +data.blog_banner_image);
                $('#imageCO').attr('src','{{asset('local/public/')}}'+'/' +data.blog_cover_image);
                // $('#product_content_th').summernote('code', data.product_content_th);
                // $('#product_image_banner').show(data.product_image_banner);
                // $('#product_content').summernote('code', data.product_content);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }

</script>
<script>
    $(document).ready(function () {

        $('.summernote').summernote({

            height: 100,
            dialogsInBody: true,
            dialogsFade: false,
            // airMode: true,
            popover: {
                image: [],
                link: [],
                air: []
            }
        });

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
