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
                            <i class="ion-cube"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>PROCESSING | กำลังดำเนินการ</h5>
                            <span>Trisak Automation Co., Ltd.</span>
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
                                <h5>All Order </h5>
                                <div class="card-block icon-btn">
                                    <span>
                                       
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
                                                <th class="text-center" width="10%">Order No.</th>
                                                {{-- <th class="text-center" width="20%">Customer name</th> --}}
                                                <th class="text-center" width="5%">date</th>
                                                <th class="text-center" width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td class="text-center">
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->order_number}}
                                                </td>
                                                {{-- <td>
                                                    {{$item->order_customer}}
                                                </td> --}}
                                                <td>
                                                    <strong class="label label-inverse">created
                                                        {{$item->created_at}}
                                                    </strong><br>
                                                    <strong class="label label-primary">updated
                                                        {{$item->updated_at}}
                                                    </strong><br>
                                                </td>
                                                <td>
                                                    {{-- <form action="{{url('/savedelivery', $item->order_id)}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="order_satatus" value="D" >
                                                        <button class="btn btn-navy rounded-pill btn-sm" type="submit" >
                                                            <i class="icon-credit-card"></i>Delivered</button>
                                                    </form> --}}
                                                    <div class="dropdown-blue dropdown open ">
                                                        <button
                                                            class="btn btn-navy rounded-pill btn-sm"
                                                            type="button" id="dropdown-2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true">action    
                                                            <i class="ion-arrow-down-b"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-2"
                                                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            {{-- <a class="dropdown-item waves-light waves-effect" href="#">Action</a> --}}
                                                            <form action="">
                                                                {{-- <a class="dropdown-item waves-light waves-effect"
                                                                    onclick="Details('{{$item->order_id}}')"
                                                                    data-toggle="modal" data-target="#myModalDetails">
                                                                    <i class="icon-eye"></i>Details
                                                                </a> --}}
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    href="{{ route('backorder.show', $item->order_id)}}">
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            <form action="">
                                                                {{-- <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModalEdit"
                                                                onclick="edit('{{$item->order_id}}')">
                                                                    <i class="icon-note"></i>Edit</a> --}}
                                                                    {{-- <a class="dropdown-item waves-light waves-effect"
                                                                    href="{{ route('backorder.edit', $item->order_id)}}">
                                                                    <i class="icon-note"></i>Edit</a> --}}
                                                            </form>
                                                            {{-- <form action="{{url('/savedelivery', $item->order_id)}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="order_satatus" value="D"> --}}
                                                                <button class="dropdown-item waves-light waves-effect" type="button"  data-toggle="modal"
                                                                data-target="#myModal" onclick="call_idOr({{$item->order_id}})">
                                                                    <i class="ion-model-s"></i>Delivered</button>
                                                            {{-- </form> --}}

                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->order_id}}"
                                                                action="{{ route('backorder.destroy', $item->order_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->order_id}})"
                                                                    value="{{$item->order_id}}"
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
                                                {{-- <th class="text-center" width="5%">Select</th> --}}
                                                <th class="text-center" width="5%">No.</th>
                                                <th class="text-center" width="10%">Order No.</th>
                                                {{-- <th class="text-center" width="20%">Customer name</th> --}}
                                                <th class="text-center" width="5%">date</th>
                                                <th class="text-center" width="5%"></th>
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
                    <h4 class="modal-title text-left">Tracking No.</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/savedelivery')}}" method="POST" name="add_question"
                        enctype="multipart/form-data">
                        <?php echo csrf_field();?>
                        {{-- <div class="card"> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Tracking</strong>
                                        <input type="text" name="order_tracking" class="form-control"
                                            placeholder="Tracking" >
                                    </div>
                                </div>
                                <input type="hidden" name="order_satatus" value="D">
                                <input type="hidden" name="order_id" id="order_id">
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

    <div id="myModalEdit" class="modal fade " role="dialog" >
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Edit Question</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST"  enctype="multipart/form-data" id="EditQA">
                        <?php echo csrf_field();?>
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="question_id" id="question_id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Question (TH)</strong>
                                        <textarea type="text" name="questionq_th" id="questionq_th" class="form-control"  rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Question (EN)</strong>
                                        <textarea type="text" name="questionq_en" id="questionq_en" class="form-control"  rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Answer (TH)</strong>
                                        <textarea type="text" name="questionanswer_th" id="questionanswer_th" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Answer (EN)</strong>
                                        <textarea type="text" name="questionanswer_en" id="questionanswer_en" class="form-control" rows="6"></textarea>
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
                    <h4 class="modal-title text-left" id="idorder"></h4>
                    {{-- <strong class="label label-inverse">THAI</strong><br>
                    <h5 id="name_th"></h5>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <h5 id="name"></h5><br> --}}
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <strong class="label coblue">Totalprice</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <p id="totalprice"></p>
                    <br>
                    <strong class="label coblue">Pay</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <p id="pay"></p>
                    <br>
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
    function call_idOr(Orid) {
        // subproduct_product
        $('#order_id').val(Orid);
    }
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
            url: "{{url('/showQA')}}",
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

</script>
<script>
    function Details(order_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        alert(order_id);


        $.ajax({
            data: {
                order_id: order_id,
            },
            url: "{{url('/backorder')}}/" + order_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#idorder').html(data.order_number);
                $('#totalprice').html(data.order_totalprice);
                $('#pay').html(data.order_pay);
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
    function edit(question_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        $("#question_id").val(question_id);
        // $("#ct_text").val(ct_text);
        // alert(ct_id);


        $.ajax({
            data: {
                question_id: question_id,
                // ct_text: ct_text,
            },
            url: "{{url('/savedelivery')}}/" + question_id + "/edit",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#questionq_th').val(data.question_q_th);
                $('#questionq_en').val(data.question_q_en);
                // $('#project_content_th').summernote('code', data.ourproject_content_th);
                // $('#project_content_en').summernote('code', data.ourproject_content_en);
                $('#questionanswer_th').val(data.question_answer_th);
                $('#questionanswer_en').val(data.question_answer_en);
                // $('#questionshow').val(data.questionshow);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }

    function update() {
        // alert(question_id);

        question_id = $("#question_id").val();
        // var question_q_th = $('#questionq_th').val();
        // var question_q_en = $('#questionq_en').val();
        // var question_answer_th = $('#questionanswer_th').val();
        // var question_answer_en = $('#questionanswer_en').val();

        $.ajax({

            // method: 'PUT',
            type: "POST",
            url: "{{url('/backquestionHelp')}}/" + question_id,
            
            data: $('#EditQA').serialize(),

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
