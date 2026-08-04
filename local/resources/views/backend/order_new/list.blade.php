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
                                <h5>Order</h5>
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
                                Search Order No : <input type="text" id="search" onkeyup="search_order_no(this.value);">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>Member ID</th>
                                            <th>Order No</th>
                                            <th>Total</th>
                                            <th>Promocode</th>
                                            <th>Name Surname</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Datetime Create</th>
                                            <th>IP Create</th>
                                            <th>Datetime Update</th>
                                            <th>IP Update</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="txtOrder">
                                        @php
                                        $i = 0;
                                        @endphp
                                        @if(!empty($order_detail))
                                            @foreach($order_detail as $r)
                                            @php
                                            $i++;
                                            @endphp
                                            <tr>
                                                <td>{{$r->member_id}}</td>
                                                <td>{{$r->order_no}}</td>
                                                <td>{{number_format($r->order_detail_total, 2, '.', ',')}}</td>
                                                <td>{{$r->promocode_name}}</td>
                                                <td>{{$r->order_detail_shipping_name.' '.$r->order_detail_shipping_family}}</td>
                                                <td>{{$r->order_detail_shipping_email}}</td>
                                                <td>{{$r->order_detail_shipping_phone_number}}</td>
                                                <td>{{$r->order_detail_status}}</td>
                                                <td>{{$r->order_detail_datetime_create}}</td>
                                                <td>{{$r->order_detail_ip_create}}</td>
                                                <td>{{$r->order_detail_datetime_update}}</td>
                                                <td>{{$r->order_detail_ip_update}}</td>
                                                <td><a href="{{url('backend/order/form/'.$r->order_detail_id)}}">View & Change Status</a></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        @if($i == 0)
                                            <tr>
                                                <td colspan="7" align="center">Not Found Data</td>
                                            </tr>
                                        @endif
                                        </tbody>
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
    @php
    $data = array(
        'order_detail_view' => 'Yes'
    );

    DB::table('lv_order_detail')
        ->update($data)
    @endphp
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

        function search_order_no(order_no) {
            $.post('<?php echo url("ajaxSearchOrderNo");?>', { order_no: order_no, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#txtOrder").html(data);
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
@endsection
