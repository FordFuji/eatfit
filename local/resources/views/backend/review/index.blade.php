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
                            <i class="icon-star"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>REVIEW </h5>
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
                                <h5>All Review </h5>
                                <div class="card-block icon-btn">
                                    <span>
                                        {{-- <button class="btn btn-primary btn-outline-primary btn-round" data-toggle="modal"  data-target="#myModal">
                                            <i class="ion-plus"></i>
                                        </button> --}}
                                        <button class="btn btn-primary btn-outline-primary btn-round"
                                            data-toggle="modal" data-target="#myModal"><i class="ion-plus-round"></i>
                                            ADD</button>
                                    </span>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="example2" class="table table-striped table-bordered nowrap">
                                        {{-- <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap"> --}}
                                        <thead>
                                            <tr>
                                                {{-- <th class="text-center" width="5%">Select</th> --}}
                                                <th class="text-center" width="5%">No.</th>
                                                <th class="text-center" width="10%">show</th>
                                                <th class="text-center" width="80%">Topic </th>
                                                <th class="text-center" width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($review as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>
                                                    <div class="checkbox-zoom zoom-primary">
                                                        <label>
                                                            <input type="checkbox" class="border-checkbox"
                                                                value="{{$item->review_id}}" type="checkbox"
                                                                id="show_{{$item->review_id}}"
                                                                onclick="show_(this.value)"
                                                                {{$item->review_show == 1 ? 'checked' : ''}}>
                                                            <span class="cr">
                                                                <i
                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Show</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    Menu : {{$item->name_products_eng}} <br>
                                                    Topic : {!! Str::limit(strip_tags($item->review_title), 50) !!} <br>
                                                    Content : {{$item->review_content}}
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
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    onclick="DetailsIMG('{{$item->review_id}}')"
                                                                    {{-- data-toggle="modal" data-target="#myModalDetails" --}}
                                                                    >
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            {{-- <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    data-toggle="modal" data-target="#myModalEdit"
                                                                    onclick="edit('{{$item->review_id}}')">
                                                                    <i class="icon-note"></i>Edit</a>
                                                            </form> --}}

                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->review_id}}"
                                                                action="{{ route('backreview.destroy', $item->review_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->review_id}})"
                                                                    value="{{$item->review_id}}"
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
                                                <th class="text-center" width="80%">Topic</th>
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
                    <h4 class="modal-title text-left">Add Review</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('backreview/admin_insert_update') }}" method="POST" name="add_question"
                        enctype="multipart/form-data">
                        <?php echo csrf_field();?>
                        {{-- <div class="card"> --}}
                        <div class="row">
                            {{-- <div class="col-md-12"> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Product</strong>
                                    <select class="default-select2 form-control" name="review_menu" required>
                                        <option value="">Please Select</option>
@if(!empty($product))
    @foreach($product as $r)
                                        <option value="{{ $r->products_id }}">{{ $r->name_products_thai.' / '.$r->name_products_eng }}</option>
    @endforeach
@endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Type Question</strong>
                                    <select class="default-select2 form-control filterType" name="question_type"
                                        id="selectType">
                                        <option value="">Select</option>
                                        <option value="">Other, please specify</option>
                                        {{-- @foreach ($typequestion as $item)
                                        <option value="{{$item->type_question_id}}">{{$item->type_question_name_en}}
                                        </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="Addtypeth">
                                {{-- <div class="form-group">
                                        <strong>Add Type (TH)</strong>
                                        <input type="hidden" name="type_question_name_th" class="form-control" id="Addtypeth"
                                            placeholder="Enter Type (TH)" readonly>
                                    </div> --}}
                            </div>
                            <div class="col-md-3" id="Addtypeen">
                                {{-- <div class="form-group">
                                        <strong>Add Type (EN)</strong>
                                        <input type="hidden" name="type_question_name_en" class="form-control" id="Addtypeen"
                                            placeholder="Enter Type (EN)" readonly>
                                    </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Question (TH)</strong>
                                    <textarea type="text" name="question_q_th" class="form-control"
                                        placeholder="Enter Question (TH)" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Question (EN)</strong>
                                    <textarea type="text" name="question_q_en" class="form-control"
                                        placeholder="Enter Question (EN)" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Answer (TH)</strong>
                                    <textarea type="text" name="question_answer_th" class="form-control"
                                        placeholder="Enter Answer (TH)" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Answer (EN)</strong>
                                    <textarea type="text" name="question_answer_en" class="form-control"
                                        placeholder="Enter Answer (EN)" rows="6"></textarea>
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

    <div id="myModalEdit" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Edit Question</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="EditQA">
                        <?php echo csrf_field();?>
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="question_id" id="question_id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Question (TH)</strong>
                                        <textarea type="text" name="questionq_th" id="questionq_th" class="form-control"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Question (EN)</strong>
                                        <textarea type="text" name="questionq_en" id="questionq_en" class="form-control"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Answer (TH)</strong>
                                        <textarea type="text" name="questionanswer_th" id="questionanswer_th"
                                            class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Answer (EN)</strong>
                                        <textarea type="text" name="questionanswer_en" id="questionanswer_en"
                                            class="form-control" rows="6"></textarea>
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
                    <strong class="label coblue">Topic</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="reto_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="reto_en"></p><br>
                    <strong class="label coblue">Content</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    <strong class="label label-inverse">THAI</strong><br>
                    <p id="reco_th"></p>
                    <br>
                    <strong class="label label-inverse">ENGLISH</strong><br>
                    <p id="reco_en"></p><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{-- <input type="submit" class="btn btn-primary" value="Submit"> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="myModalEditTYPE" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Edit Type</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="EditQATYPE">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="type_question_id" id="type_question_id">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Type (TH)</strong>
                                    <input type="text" name="type_question_name_th" class="form-control" id="TYPE_th"
                                            placeholder="Enter Type (TH)" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Type (EN)</strong>
                                    <input type="text" name="type_question_name_en" class="form-control" id="TYPE_en"
                                            placeholder="Enter Type (TH)" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-primary" onclick="updateTYPE()" value="Submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="resultModal"></div>
</div>
@endsection

@section('script')
<script>
    $("#example1").DataTable();
    $("#example2").DataTable();

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
            url: "{{url('/showReview')}}",
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
    function DetailsIMG(id) {

$.ajax({
    url:  "{{url('/backreview')}}/" + id,
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
    function Details(review_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(pro_id);


        $.ajax({
            data: {
                review_id: review_id,
            },
            url: "{{url('/backreview')}}/" + review_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#reto_th').html(data.review_title);
                $('#reto_en').html(data.review_title);
                $('#reco_th').html(data.question_answer_th);
                $('#reco_en').html(data.question_answer_en);
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
            url: "{{url('/backreview')}}/" + question_id + "/edit",
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
            url: "{{url('/backreview')}}/" + question_id,

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
<script>
    $(document).on('change', '.filterType', function () {
        intyp = $('#selectType').val();
        filterIntType(intyp);
    });

    function filterIntType(intyp) {
        $.ajax({
            url: "{{url('/filterIntType')}}",
            type: 'GET',
            data: {
                intyp: intyp,
            },
        }).done(function (data) {
            $('#Addtypeth').html(data.th_add)
            $('#Addtypeen').html(data.en_add)

        });
    }

</script>
<script>
    function editTYPE(type_question_id) {
        $("#type_question_id").val(type_question_id);
        // alert(type_question_id);


        $.ajax({
            data: {
                type_question_id: type_question_id,
                // ct_text: ct_text,
            },
            url: "{{url('/backquestionTYPEedit')}}/" + type_question_id ,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#TYPE_th').val(data.type_question_name_th);
                $('#TYPE_en').val(data.type_question_name_en);
                // $('#questionshow').val(data.questionshow);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }
    function updateTYPE() {
        // alert(type_question_id);

        type_question_id = $("#type_question_id").val();
        // var question_q_th = $('#questionq_th').val();
        // var question_q_en = $('#questionq_en').val();
        // var question_answer_th = $('#questionanswer_th').val();
        // var question_answer_en = $('#questionanswer_en').val();

        $.ajax({

            // method: 'PUT',
            type: "POST",
            url: "{{url('/backcontact')}}/" + type_question_id,

            data: $('#EditQATYPE').serialize(),

            success: function (data) {
                // alert(data);

                $("#myModalEditTYPE").modal('hide');
                window.location.reload(true);
                // $('#foodtype_table').DataTable().ajax.reload();
                // alert(data);

            }

        });
    }
    
</script>
@endsection
