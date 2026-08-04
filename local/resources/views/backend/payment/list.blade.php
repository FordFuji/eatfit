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
                                Search Payment No : <input type="text" id="search" onkeyup="search_order_no(this.value);">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>Payment No</th>
                                            <th>Phone Number</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            <th>Slip</th>
                                            <th>Datetime Create</th>
                                            <th>IP Create</th>
                                        </tr>
                                        </thead>
                                        <tbody id="txtOrder">
                                        @php
                                        $i = 0;
                                        @endphp
                                        @if(!empty($payment))
                                            @foreach($payment as $r)
                                            @php
                                            $i++;
                                            @endphp
                                            <tr>
                                                <td>{{$r->order_no}}</td>
                                                <td>{{$r->payment_phone_number}}</td>
                                                <td>{{$r->payment_amount}}</td>
                                                <td>{{$r->payment_date}}</td>
                                                <td>{{$r->payment_time}}</td>
                                                <td>{{$r->payment_message}}</td>
                                                <td><a href="{{url('local/storage/app/pick_your_plan/'.$r->payment_slip)}}" target="_blank"><img src="{{asset('local/storage/app/pick_your_plan/'.$r->payment_slip)}}" width="150"></a></td>
                                                <td>{{$r->payment_datetime_create}}</td>
                                                <td>{{$r->payment_ip_create}}</td>
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
        'payment_view' => 'Yes'
    );

    DB::table('lv_payment')
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
            $.post('<?php echo url("ajaxSearchOrderNoPayment");?>', { order_no: order_no, "_token": "{{ csrf_token() }}" }, function(data) {
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
