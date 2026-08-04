@extends('backend.layouts.main')

@section('head')
<!-- sweet alert framework -->


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
                            <i class="icofont icofont-home"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5>Banner Promotion | โปรโมชัน แบรนด์เนอร์</h5>
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

            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{url('backend/banner_promotion_save_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card buttoncard">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-block accordion-block">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Promotion Banner PC</strong> Recommend 1600 x 110 px
                                            <input type="file" name="banner_promotion_image_pc" id="banner_promotion_image_pc"
                                                class="form-control"><br>
                                            @if(!empty($banner_promotion) and $banner_promotion->banner_promotion_image_pc != '') 
                                            <img src="{{asset($banner_promotion->banner_promotion_image_pc)}}" width="150">
                                            @endif; 
                                        </div>
                                    </div>
                                </div>
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Promotion Banner Mobile</strong> Recommend 600 x 161 px
                                            <input type="file" name="banner_promotion_image_mobile" id="banner_promotion_image_mobile"
                                                class="form-control"><br>
                                            @if(!empty($banner_promotion) and $banner_promotion->banner_promotion_image_mobile != '') 
                                            <img src="{{asset($banner_promotion->banner_promotion_image_mobile)}}" width="150">
                                            @endif; 
                                        </div>
                                    </div>
                                </div>
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Enable</strong>
                                            <select name="banner_promotion_enable" id="banner_promotion_enable"
                                                class="form-control">
                                                <option value="Enable" @if(!empty($banner_promotion) and $banner_promotion->banner_promotion_enable == 'Enable'){{'selected'}}@endif>Enable</option>
                                                <option value="Disable" @if(!empty($banner_promotion) and $banner_promotion->banner_promotion_enable == 'Disable'){{'selected'}}@endif>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $('.summernote').summernote({

            height: 100,
            popover: {
                image: [],
                link: [],
                air: []
            }
        });

    });

</script>
<script>
    function edit(about_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        $("#about_id").val(about_id);
        // $("#ct_text").val(ct_text);
        // alert(ct_id);


        $.ajax({
            data: {
                about_id: about_id,
                // ct_text: ct_text,
            },
            url: "{{url('/backabout')}}/" + about_id + "/edit",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                // $('#qa_question').val(data.qa_question);
                // $('#qa_answer').val(data.qa_answer);
                // $('#about_profile_th').summernote('code', data.about_profile_th);
                // $('#about_profile_en').summernote('code', data.about_profile_en);
                // $('#about_content_th').summernote('code', data.about_content_th);
                // $('#about_content_en').summernote('code', data.about_content_en);
                // $('#about_content_th').val(data.about_content_th);
                // $('#about_content_en').val(data.about_content_en);
                $('#about_address_th').val(data.about_address_th);
                $('#about_address_en').val(data.about_address_en);

                $('#about_phone').val(data.about_phone);
                $('#about_fax').val(data.about_fax);
                $('#about_email').val(data.about_email);
                $('#about_facebook').val(data.about_facebook);
                $('#about_line').val(data.about_line);
                $('#about_youtube').val(data.about_youtube);
                $('#about_instagram').val(data.about_instagram);
                $('#about_facebook_name').val(data.about_facebook_name);
                $('#about_line_id').val(data.about_line_id);
                $('#about_instagram_name').val(data.about_instagram_name);
                $('#about_youtube_name').val(data.about_youtube_name);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }

    function update() {
        // alert(about_id);

        about_id = $("#about_id").val();
        // var about_profile_th = $('#about_profile_th').val();
        // var about_profile_en = $('#about_profile_en').val();
        // var about_content_th = $('#about_content_th').val();
        // var about_content_en = $('#about_content_en').val();
        var about_address_th = $('#about_address_th').val();
        var about_address_en = $('#about_address_en').val();

        var about_phone = $('#about_phone').val();
        var about_fax = $('#about_fax').val();
        var about_email = $('#about_email').val();
        var about_facebook = $('#about_facebook').val();
        var about_line = $('#about_line').val();
        var about_youtube = $('#about_youtube').val();
        var about_instagram = $('#about_instagram').val();

        var about_facebook_name = $('#about_facebook_name').val();
        var about_line_id = $('#about_line_id').val();
        var about_instagram_name = $('#about_instagram_name').val();
        var about_youtube_name = $('#about_youtube_name').val();
        // var qa_admin = $('#qa_admin').val();
        // dd(about_id);
        $.ajax({

            // method: 'PUT',
            type: "POST",
            url: "{{url('/backabout')}}/" + about_id,

            data: {
                _method: "PUT",
                // about_profile_th: about_profile_th,
                // about_profile_en: about_profile_en,
                // about_content_th: about_content_th,
                // about_content_en: about_content_en,
                about_address_th: about_address_th,
                about_address_en: about_address_en,

                about_phone: about_phone,
                about_fax: about_fax,
                about_email: about_email,
                about_facebook: about_facebook,
                about_line: about_line,
                about_youtube: about_youtube,
                about_instagram: about_instagram,

                about_facebook_name: about_facebook_name,
                about_line_id: about_line_id,
                about_instagram_name: about_instagram_name,
                about_youtube_name: about_youtube_name,
                // reference_category_name_th: name_th,
                "_token": "{{ csrf_token() }}",
            },

            success: function (data) {
                // alert(data);

                $("#myModal").modal('hide');
                window.location.reload(true);
                // $('#foodtype_table').DataTable().ajax.reload();
                // alert(data);

            }

        });
    }

</script>
<script>
    function editstore(store_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        $("#store_id").val(store_id);
        // $("#ct_text").val(ct_text);
        // alert(ct_id);


        $.ajax({
            data: {
                store_id: store_id,
                // ct_text: ct_text,
            },
            url: "{{url('/backstore')}}/" + store_id + "/edit",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#strphone').val(data.store_phone);
                $('#straddress_en').val(data.store_address_en);
                // $('#project_content_th').summernote('code', data.ourproject_content_th);
                // $('#project_content_en').summernote('code', data.ourproject_content_en);
                $('#straddress_th').val(data.store_address_th);
                $('#strname_en').val(data.store_name_en);
                $('#strname_th').val(data.store_name_th);
                $('#strmap').val(data.store_map);
                // $('#modal_foodtype').modal('show');
                // $('#foodtype_table').DataTable().ajax.reload();
            },
            error: function (data) {

            }
        });
    }

    function updatestore() {
        // alert(question_id);
        store_id = $("#store_id").val();
        // var question_q_th = $('#questionq_th').val();
        // var question_q_en = $('#questionq_en').val();
        // var question_answer_th = $('#questionanswer_th').val();
        // var question_answer_en = $('#questionanswer_en').val();
        $.ajax({
            // method: 'PUT',
            type: "POST",
            url: "{{url('/backstore')}}/" + store_id,

            data: $('#Editstr').serialize(),

            success: function (data) {
                // alert(data);

                $("#EditStore").modal('hide');
                window.location.reload(true);
                // $('#foodtype_table').DataTable().ajax.reload();
                // alert(data);

            }

        });
    }

    function Details(store_id) {
        // $("#btn_submit").hide();
        // $("#btn_update").show();
        // $("#product_id").html(pro_id);
        // alert(pro_id);


        $.ajax({
            data: {
                store_id: store_id,
            },
            url: "{{url('/backstore')}}/" + store_id,
            type: "get",
            dataType: 'json',
            success: function (data) {
                // alert(data);
                // console.log(data);
                $('#name_th').html(data.store_name_th);
                $('#name_en').html(data.store_name_en);
                $('#address_th').html(data.store_address_th);
                $('#address_en').html(data.store_address_en);
                $('#phone').html(data.store_phone);
                $('#map').html(data.store_map);
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
    var today = new Date().getHours();
    if (today >= 8.30 && today <= 17.00) {
        document.getElementById('openclose').innerHTML = "<span style='color: green;'>เปิด<span>";
    } else {
        document.getElementById('openclose').innerHTML = "<span style='color: red;'>ปิด<span>";
    }

</script>

@endsection
