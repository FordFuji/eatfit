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
                            <h5>BANNER </h5>
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
                        <div class="card ">
                            <div class="card-header">
                                <h5>All Banner </h5>
                                <div class="card-block icon-btn">
                                    <span>
                                        {{-- <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                                    class="icon-plus"></i>add</a> --}}
                                        <button class="btn btn-navy rounded-pill btn-sm " data-toggle="modal"
                                            data-target="#myModal">
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
                                                <th class="text-center" width="10%">Page</th>
                                                {{-- <th class="text-center" width="5%">Page</th> --}}
                                                <th class="text-center" width="5%">Topic</th>
                                                <th class="text-center" width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banner as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>
                                                    <div class="checkbox-zoom zoom-primary">
                                                        <label>
                                                            <input type="checkbox" class="border-checkbox"
                                                                value="{{$item->banner_id}}" type="checkbox"
                                                                id="show_{{$item->banner_id}}"
                                                                onclick="show_(this.value)"
                                                                {{$item->banner_show == 1 ? 'checked' : ''}}>
                                                            <span class="cr">
                                                                <i
                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Show</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$item->banner_topic_en}}
                                                </td>
                                                <td>
                                                    <div class="dropdown-blue dropdown open ">
                                                        <button class="btn btn-navy rounded-pill btn-sm" type="button"
                                                            id="dropdown-2" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">action
                                                            <i class="ion-arrow-down-b"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-2"
                                                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            {{-- <a class="dropdown-item waves-light waves-effect" href="#">Action</a> --}}
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    onclick="Details('{{$item->banner_id}}')"
                                                                    data-toggle="modal" data-target="#myModalDetails">
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    href="{{ route('backbanner.edit', $item->banner_id)}}">
                                                                    <i class="icon-note"></i>Edit</a>
                                                            </form>
                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->banner_id}}"
                                                                action="{{ route('backbanner.destroy', $item->banner_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->banner_id}})"
                                                                    value="{{$item->banner_id}}"
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
                                                <th class="text-center">Page</th>
                                                {{-- <th class="text-center">Page</th> --}}
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

    <!-- Modal ตารางป็อปอัพ -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Add Banner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('backbanner.store') }}" method="POST" name="add_banner"
                        enctype="multipart/form-data">
                        <?php echo csrf_field();?>
                        {{-- <div class="card"> --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <strong>Images(Th)</strong>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="file" name="banner_image"
                                            id="imageactivitiesBA" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <strong>Images(En)</strong>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="file" name="banner_image_en"
                                            id="imageactivitiesBA" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <strong>Images Mobile(Th)</strong>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="file" name="banner_image_mobile"
                                            id="imageactivitiesBA" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <strong>Images Mobile(En)</strong>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="file" name="banner_image_mobile_en"
                                            id="imageactivitiesBA" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Show banner</strong>
                                        <select class="default-select2 form-control" name="banner_show">
                                            <option value="0">Off</option>
                                            <option value="1">Show</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Link </strong>
                                        <input type="text" name="banner_link" class="form-control" placeholder="Enter Link" required>
                                    </div>
                                </div>
                            </div>
                            {{-- 
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (TH)</strong>
                                        <input type="text" name="banner_topic_th" class="form-control form-txt-success" placeholder="Enter Topic (TH)" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Title (TH)</strong>
                                        <input type="text" name="banner_title_th" class="form-control" placeholder="Enter Title (TH)" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content (TH)</strong>
                                        <textarea type="text" name="banner_content_th" class="form-control" placeholder="Enter Content (TH)" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Topic (EN)</strong>
                                        <input type="text" name="banner_topic_en" class="form-control form-txt-success" placeholder="Enter Topic (EN)" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Title (TH)</strong>
                                        <input type="text" name="banner_title_en" class="form-control " placeholder="Enter Title (EN)" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Content (EN)</strong>
                                        <textarea type="text" name="banner_content_en" class="form-control" placeholder="Enter Content (EN)" required></textarea>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img width="20%" alt="" src="" alt="" id="imageB">
                    </div>
                    <strong class="label coblue">Topic</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="topic_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="topic_en"></p><br>

                    <strong class="label coblue">Title</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="title_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="title_en"></p><br>

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
    $(function () {
        $('.bannerType').hide();
        $('#bannerT').change(function () {
            $('.bannerType').hide();
            $('#' + $(this).val()).show();
        });
    });
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

</script>
<script>
    function show_(id) {
        // alert(id);
        var one = 0;
        if ($('#show_' + id).is(':checked')) {
            one = 1;
        } else {
            one = 0;
        }
        $.ajax({
            url: "{{url('/showdata')}}",
            type: 'get',
            dataType: "json",
            data: {
                id: id,
                one: one
            },
            success: function () {
                // alert('สวัสดี');
            }
        });
        window.location.reload(true);
    }
    function Details(banner_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(banner_id);


        $.ajax({
            data: {
                banner_id: banner_id,
            },
            url: "{{url('/backbanner')}}/" + banner_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#topic_th').html(data.banner_topic_th);
                $('#topic_en').html(data.banner_topic_en);
                $('#title_th').html(data.banner_title_th);
                $('#title_en').html(data.banner_title_en);
                $('#content_th').html(data.banner_content_th);
                $('#content_en').html(data.banner_content_en);
                $('#imageB').attr('src','{{asset('local/public/')}}'+'/' +data.banner_image);
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

            height: 300,
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
