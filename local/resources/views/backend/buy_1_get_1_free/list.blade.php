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
                                <h5>Promotion</h5>
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
                            <div class="card-block">
                                <input type="button" value="Add" onclick="window.location.href='{{url("backend/buy_1_get_1_free_form")}}';"><p>
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($rows))
                                            @foreach($rows as $r)
                                            <tr>
                                                <td>{{$r->buy_1_get_1_free_id}}</td>
                                                <td><img src="{{asset($r->img_products)}}" width="150"> {{$r->name_products_thai.'/'.$r->name_products_eng}}</td>
                                                <td><a href="{{url('backend/buy_1_get_1_free_form/'.$r->buy_1_get_1_free_id)}}">Edit</a> / <a href="{{url('backend/buy_1_get_1_free_delete/'.$r->buy_1_get_1_free_id)}}" onclick="return confirm('Confirm Delete');">Delete</a></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tfoot>
                                    </table>
                                </div>


                                <div id="resultModal"></div>
                                <input type="hidden" id="urlModal" value="{{url('model_edit_products')}}">

                                <form action="" method="post" id="form_del">
                                    @csrf

                                </form>
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
                    $("#edit_products").modal('show');
                }
            });
        }


        function getComboA(selectObject) {
            var value = selectObject.value;
            // console.log(value);
            $.ajax({
                url: 'check_menu',
                data: {
                    id: value
                },
                type: 'GET',
                success: function (data) {
                    alert(data)

                }
            });

        }

        function btnModalpicm(id) {

            $.ajax({
                url: 'edit_gallery_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_gallery_products").modal('show');
                }
            });
        }

        function btnModaltag(id) {

            $.ajax({
                url: 'edit_tag_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_tag_products").modal('show');
                }
            });
        }

        function btnModaldelivery(id) {

            $.ajax({
                url: 'edit_delivery_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_delivery_products").modal('show');
                }
            });
        }

        function btnModalingredients(id) {

            $.ajax({
                url: 'edit_ingredients_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_ingredients_products").modal('show');
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
