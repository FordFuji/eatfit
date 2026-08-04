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
                            <h5>MENU </h5>
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

            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card ">
                            <div class="card-header">
                                <h5 class="card-header-text">Edit setting
                                </h5>
                            </div>
                            <div class="card-block">
                                <h4 class="sub-title">Edit setting</h4>
                                <form action="{{url('/insert_menu_head')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Upload img File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="img_menu" id="imageactivities"
                                                required>
                                            <p> * กรุใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p>
                                            <img src="" alt="" id="imgactivities" style="height: 300px">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">name Thai</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="namet"
                                                placeholder="กรอกข้อมูล" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">name English</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="namee" placeholder="Enter"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">title Thai</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="titlet"
                                                placeholder="กรอกข้อมูล"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">title English</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="titlee"
                                                placeholder="Enter"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">content Thai</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control summernote" name="contentt"
                                                placeholder="กรอกข้อมูล"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">content English</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control summernote" name="contente"
                                                placeholder="Enter"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md"></label>
                                        <button type="submit" class="btn btn-primary btn-sm">save</button>
                                    </div>

                                </form>
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>No .</th>
                                                <th>image</th>
                                                <th>name Thai</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($menu_head as $key => $rmenu_head)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><img src="{{url($rmenu_head->img_head_menu_eng)}}"
                                                        style="height: 100px">
                                                </td>
                                                <td>{{$rmenu_head->name_head_menu_thai}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="btnModal({{$rmenu_head->menu_product_head_id }})">edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="btn_del({{$rmenu_head->menu_product_head_id }})">delete
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        onclick="btnModalpicm({{$rmenu_head->menu_product_head_id}})">add
                                                        +
                                                    </button>
                                                </td>

                                            </tr>
                                            @endforeach
                                            </tfoot>
                                    </table>
                                </div>


                                <div id="resultModal"></div>
                                <input type="hidden" id="urlModal" value="{{url('model_edit_menu_head')}}">

                                <form action="" method="post" id="form_del">
                                    @csrf

                                </form>
                            </div>
                        </div>
                        <!-- Zero config.table end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function btnModal(id) {

        $.ajax({
            url: $('#urlModal').val(),
            data: {
                id: id
            },
            type: 'GET',
            success: function (data) {
                // alert(data);
                $('#resultModal').html(data);
                $("#edit_menu_head").modal('show');
            }
        });
    }

    function btnModalpicm(id) {

        $.ajax({
            url: 'edit_gallery_banner_menu_head',
            data: {
                id: id
            },
            type: 'GET',
            success: function (data) {
                // alert(data);
                $('#resultModal').html(data);
                $("#edit_gallery_banner_menu_head").modal('show');
            }
        });
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgactivities').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageactivities").change(function () {
        readURL(this);
    });

    function btn_del(id) {
        var url = 'delete_menu_head' + '/' + id;
        if (confirm('Confirm to Delete?')) {
            $('#form_del').attr('action', url);
            $("#form_del").submit();
        }

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
@endsection
