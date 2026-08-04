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
                                <h5>Member</h5>
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
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name - Family</th>
                                            <th>Birth Day</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Point</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $i = 0;
                                        @endphp
                                        @if(!empty($member))
                                            @foreach($member as $r)
                                            @php
                                            $i++;
                                            @endphp
                                            <tr>
                                                <td>{{$r->member_id}}</td>
                                                <td>{{$r->member_name.' '.$r->member_family}}</td>
                                                <td>{{$r->member_birth_day}}</td>
                                                <td>{{$r->member_email}}</td>
                                                <td>{{$r->member_phone_number}}</td>
                                                <td>{{$r->member_point}}</td>
                                                <td><a href="{{url('backend/member/form/'.$r->member_id)}}">View</a></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        @if($i == 0)
                                            <tr>
                                                <td colspan="6" align="center">Not Found Data</td>
                                            </tr>
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
