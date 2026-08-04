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
                            <i class="icon-bubbles"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>CONTACT FORM | ข้อความติดต่อเรา</h5>
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
                                <h5>All Contact </h5>
                                <div class="card-block icon-btn">
                                    <span>
                                        {{-- <button class="btn btn-primary btn-outline-primary btn-icon" data-toggle="modal"
                                            data-target="#myModal">
                                            <i class="ion-plus"></i>
                                        </button> --}}
                                    </span>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="example1" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                {{-- <th class="text-center">Select</th> --}}
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Phone / E-mail</th>
                                                <th class="text-center">date</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $key => $item)
                                            <tr>
                                                {{-- <td>Select</td> --}}
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    {{$item->contact_form_name}}
                                                </td>
                                                <td>
                                                    {{$item->contact_form_phone}} <br>
                                                    {{$item->contact_form_email}}
                                                </td>
                                                <td>
                                                    <strong class="label label-inverse">created
                                                        {{$item->created_at}}</strong><br>
                                                    <strong class="label label-primary">updated
                                                        {{$item->updated_at}}</strong><br>
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
                                                            {{-- <a class="dropdown-item waves-light waves-effect" href="#">Action</a> --}}
                                                            <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    onclick="Details('{{$item->contact_form_id}}')"
                                                                    data-toggle="modal" data-target="#myModalDetails">
                                                                    <i class="icon-eye"></i>Details
                                                                </a>
                                                            </form>
                                                            {{-- <form action="">
                                                                <a class="dropdown-item waves-light waves-effect"
                                                                    href="{{ route('backproductservices.edit', $item->contact_form_id)}}">
                                                                    <i class="icon-note"></i>Edit</a>
                                                            </form> --}}
                                                            <div class="dropdown-divider"></div>
                                                            <form id="del_{{$item->contact_form_id}}"
                                                                action="{{ route('backcontact.destroy', $item->contact_form_id)}}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <a type="button" onclick="del({{$item->contact_form_id}})"
                                                                    value="{{$item->contact_form_id}}"
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
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Phone / E-mail</th>
                                                <th class="text-center">date</th>
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
    <div id="myModalDetails" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-left">Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    

                    <strong class="label coblue">Massage</strong>
                    <ul class="breadcrumb-title b-t-default p-t-10"></ul>
                    
                    <p id="massage"></p>
                    
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

</script>
<script>
    function Details(con_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(pro_id);


        $.ajax({
            data: {
                con_id: con_id,
            },
            url: "{{url('/backcontact')}}/" + con_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#massage').html(data.contact_form_massage);
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
