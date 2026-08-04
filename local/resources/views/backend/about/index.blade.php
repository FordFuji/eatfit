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
                            <h5>ABOUT | เกี่ยวกับเรา</h5>
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
                        <div class="card buttoncard">
                            <div class="card-header">
                                <h5 class="card-header-text">ALL DATA
                                    <a data-toggle="modal" data-target="#myModal"
                                        onclick="edit('{{$aboutlist->about_id}}')"><i class="ion-compose"></i>
                                    </a>
                                </h5>
                            </div>
                            <div class="card-block accordion-block">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    {{-- <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingtwelve">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsetwelve" aria-expanded="true"
                                                    aria-controls="collapsetwelve">
                                                    Profile (TH)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsetwelve" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingtwelve">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {!! $aboutlist->about_profile_th !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingeleven">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseeleven" aria-expanded="false"
                                                    aria-controls="collapseeleven">
                                                    Profile (EN)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseeleven" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingeleven">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {!! $aboutlist->about_profile_en !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingOne">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Content (TH)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingOne">
                                            <div class="accordion-content accordion-desc">
                                                <p style="white-space: pre-wrap;">
                                                    {!! $aboutlist->about_content_th !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingTwo">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Content (EN)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingTwo">
                                            <div class="accordion-content accordion-desc">
                                                <p style="white-space: pre-wrap;">
                                                    {!! $aboutlist->about_content_en !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingThree">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Address (TH)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {!! $aboutlist->about_address_th !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingfour">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsefour" aria-expanded="false"
                                                    aria-controls="collapsefour">
                                                    Address (EN)
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingfour">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {!! $aboutlist->about_address_en !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingfive">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsefive" aria-expanded="true"
                                                    aria-controls="collapsefive">
                                                    Phone / Fax
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingfive">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Phone</strong>
                                                    {{$aboutlist->about_phone}} <br><br>
                                                    <strong class="label coblue">Fax</strong>
                                                    {{$aboutlist->about_fax}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingsix">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsesix" aria-expanded="false"
                                                    aria-controls="collapsesix">
                                                    E-mail
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingsix">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {{$aboutlist->about_email}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingseven">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseseven" aria-expanded="false"
                                                    aria-controls="collapseseven">
                                                    Facebook
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseseven" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingseven">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_facebook}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_facebook_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingeight">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseeight" aria-expanded="false"
                                                    aria-controls="collapseeight">
                                                    LINE
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseeight" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingeight">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_line}} <br><br>
                                                    <strong class="label coblue">ID : </strong>
                                                    {{$aboutlist->about_line_id}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingnine">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsenine" aria-expanded="false"
                                                    aria-controls="collapsenine">
                                                    Youtube
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsenine" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingnine">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_youtube}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_youtube_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingten">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseten" aria-expanded="false"
                                                    aria-controls="collapseten">
                                                    Instagram
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseten" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingten">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_instagram}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_instagram_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="card buttoncard">
                            <div class="card-header">
                                <h5 class="card-header-text">ALL CONTACT
                                </h5>
                            </div>
                            <div class="card-block accordion-block">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingfive">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsefive" aria-expanded="true"
                                                    aria-controls="collapsefive">
                                                    Phone / Fax
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingfive">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Phone</strong>
                                                    {{$aboutlist->about_phone}} <br><br>
                                                    <strong class="label coblue">Fax</strong>
                                                    {{$aboutlist->about_fax}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingsix">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsesix" aria-expanded="false"
                                                    aria-controls="collapsesix">
                                                    E-mail
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingsix">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    {{$aboutlist->about_email}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingseven">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseseven" aria-expanded="false"
                                                    aria-controls="collapseseven">
                                                    Facebook
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseseven" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingseven">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_facebook}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_facebook_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingeight">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseeight" aria-expanded="false"
                                                    aria-controls="collapseeight">
                                                    LINE
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseeight" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingeight">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_line}} <br><br>
                                                    <strong class="label coblue">ID : </strong>
                                                    {{$aboutlist->about_line_id}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingnine">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapsenine" aria-expanded="false"
                                                    aria-controls="collapsenine">
                                                    Youtube
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapsenine" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingnine">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_youtube}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_youtube_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class=" accordion-heading" role="tab" id="headingten">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseten" aria-expanded="false"
                                                    aria-controls="collapseten">
                                                    Instagram
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseten" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingten">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <strong class="label coblue">Link : </strong>
                                                    {{$aboutlist->about_instagram}} <br><br>
                                                    <strong class="label coblue">Name : </strong>
                                                    {{$aboutlist->about_instagram_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>


            <!-- Modal ตารางป็อปอัพ -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-lg ">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-left">Edit About</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" name="add_about" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="card"> --}}
                                <div class="row">
                                    {{-- <div class="col-md-12"> --}}
                                        <input type="hidden" name="about_id" id="about_id">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Address (TH)</strong>
                                                <input type="text" name="about_address_th" id="about_address_th"
                                                    class="form-control" placeholder="Enter Address (TH)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Address (EN)</strong>
                                                <input type="text" name="about_address_en" id="about_address_en"
                                                    class="form-control" placeholder="Enter Address (EN)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Phone</strong>
                                                <input type="text" name="about_phone" id="about_phone"
                                                    class="form-control" placeholder="Enter Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Fax</strong>
                                                <input type="text" name="about_fax" id="about_fax" class="form-control"
                                                    placeholder="Enter Fax">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>E-mail</strong>
                                                <input type="email" name="about_email" id="about_email"
                                                    class="form-control" placeholder="Enter E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Facebook (Link)</strong>
                                                <input type="text" name="about_facebook" id="about_facebook"
                                                    class="form-control" placeholder="Enter Facebook">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Facebook (Name)</strong>
                                                <input type="text" name="about_facebook_name" id="about_facebook_name"
                                                    class="form-control" placeholder="Enter Facebook">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Line (Link QR)</strong>
                                                <input type="text" name="about_line" id="about_line"
                                                    class="form-control" placeholder="Enter Line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Line (ID)</strong>
                                                <input type="text" name="about_line_id" id="about_line_id"
                                                    class="form-control" placeholder="Enter Line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Youtube (Link)</strong>
                                                <input type="text" name="about_youtube" id="about_youtube"
                                                    class="form-control" placeholder="Enter Youtube">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Youtube (Name)</strong>
                                                <input type="text" name="about_youtube_name" id="about_youtube_name"
                                                    class="form-control" placeholder="Enter Youtube">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Instagram (Link)</strong>
                                                <input type="text" name="about_instagram" id="about_instagram"
                                                    class="form-control" placeholder="Enter Instagram">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Instagram (Name)</strong>
                                                <input type="text" name="about_instagram_name" id="about_instagram_name"
                                                    class="form-control" placeholder="Enter Instagram">
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-primary" onclick="update()" value="Submit">
                        </div>
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
