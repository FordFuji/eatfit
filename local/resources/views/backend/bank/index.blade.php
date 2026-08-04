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
                            <i class="icon-credit-card"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>BANK </h5>
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
                                <h5>All Bank </h5>
                                <div class="card-block icon-btn">
                                    <span>
                                        {{-- <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                                    class="icon-plus"></i>add</a> --}}
                                        <button class="btn btn-navy rounded-pill btn-sm" data-toggle="modal"
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
                                                <th class="text-center" width="10%">show</th>
                                                <th class="text-center" width="20%">Bank</th>
                                                <th class="text-center" width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bank as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>
                                                    <div class="checkbox-zoom zoom-primary">
                                                        <label>
                                                            <input type="checkbox" class="border-checkbox"
                                                                value="{{$item->bank_id}}" type="checkbox"
                                                                id="show_{{$item->bank_id}}" onclick="show_(this.value)"
                                                                {{$item->bank_show == 1 ? 'checked' : ''}}>
                                                            <span class="cr">
                                                                <i
                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Show</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$item->bank_namelogo_en}}
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
                                                                    onclick="Details('{{$item->bank_id}}')"
                                                                    data-toggle="modal" data-target="#myModalDetails">
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->bank_id}}"
                                                                action="{{ route('backbank.destroy', $item->bank_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->bank_id}})"
                                                                    value="{{$item->bank_id}}"
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
                                                <th class="text-center" width="10%">show</th>
                                                <th class="text-center" width="20%">Bank</th>
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
                    <h4 class="modal-title text-left">Add Bank</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('backbank.store') }}" method="POST" name="add_question"
                        enctype="multipart/form-data">
                        <?php echo csrf_field();?>
                        {{-- <div class="card"> --}}
                        <div class="row">
                            {{-- <div class="col-md-12"> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Image Logo</strong>
                                    <input class="form-control form-control-sm" type="file" name="bank_logo"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Bank Name (TH)</strong>
                                    <input type="text" name="bank_namelogo_th" class="form-control"
                                        placeholder="Bank Name (TH)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Bank Name (EN)</strong>
                                    <input type="text" name="bank_namelogo_en" class="form-control"
                                        placeholder="Bank Name (EN)">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Account name (TH)</strong>
                                    <input type="text" name="bank_accountname_th" class="form-control"
                                        placeholder="Account number (TH)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Account name (EN)</strong>
                                    <input type="text" name="bank_accountname_en" class="form-control"
                                        placeholder="Account number (EN)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Account number</strong>
                                    <input type="text" name="bank_accountnumber" class="form-control"
                                        placeholder="Account number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Show Bank</strong>
                                    <select class="default-select2 form-control" name="bank_show">
                                        <option value="0">Off</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                        {{-- </div> --}}

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
                        <img width="20%" alt="" src="" alt="" id="logo">
                    </div>
                    <strong class="label coblue">Bank name</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="bank_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="bank_en"></p><br>
                    <strong class="label coblue">Account number</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <p id="accnum"></p>
                    <br>
                    <strong class="label coblue">Account name</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="name_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="name_en"></p><br>
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
            url: "{{url('/showBank')}}",
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
    function Details(bank_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(pro_id);


        $.ajax({
            data: {
                bank_id: bank_id,
            },
            url: "{{url('/backbank')}}/" + bank_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#bank_th').html(data.bank_namelogo_th);
                $('#bank_en').html(data.bank_namelogo_en);
                $('#accnum').html(data.bank_accountnumber);
                $('#name_th').html(data.bank_accountname_th);
                $('#name_en').html(data.bank_accountname_en);
                // $('#product_content_th').summernote('code', data.product_content_th);
                $('#logo').attr('src', '{{asset('
                    local / public / ')}}' + '/' + data.bank_logo);
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
            url: "{{url('/backquestionHelp')}}/" + question_id + "/edit",
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
        alert(question_id);

        question_id = $("#question_id").val();
        var question_q_th = $('#questionq_th').val();
        var question_q_en = $('#questionq_en').val();
        var question_answer_th = $('#questionanswer_th').val();
        var question_answer_en = $('#questionanswer_en').val();

        $.ajax({

            // method: 'PUT',
            type: "POST",
            url: "{{url('/backquestionHelp')}}/" + question_id,

            data: {
                _method: "PUT",
                question_q_th: questionq_th,
                question_q_en: questionq_en,
                question_answer_th: questionanswer_th,
                question_answer_en: questionanswer_en,

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
