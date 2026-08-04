<div class="modal fade show" id="edit_menu_head" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('edit_menu_head')}}" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Edit setting </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id_menu_head" value="{{$show_menu_head->menu_product_head_id}}">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload img File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img_menu" id="imageactivities">
                        <p>* กรุณาใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p>
                    </div>
                </div>
                
                


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Thai</label>
                    <div class="col-sm-10">
                        <input required value="{{$show_menu_head->name_head_menu_thai}}" name=" namet"
                               class=" form-control "
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Eng</label>
                    <div class="col-sm-10">
                        <input required value="{{$show_menu_head->name_head_menu_eng}}" name=" namee"
                               class=" form-control "
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title Thai</label>
                    <div class="col-sm-10">
                        <textarea required name=" titlet" class=" form-control "
                                  placeholder="กรอกข้อมูล">{{$show_menu_head->title_head_menu_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title Eng</label>
                    <div class="col-sm-10">
                        <textarea required name=" titlee" class=" form-control "
                                  placeholder="กรอกข้อมูล">{{$show_menu_head->title_head_menu_eng}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title Thai</label>
                    <div class="col-sm-10">
                        <textarea required name=" contentt" class=" form-control summernote"
                                  placeholder="กรอกข้อมูล">{{$show_menu_head->content_head_menu_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title Eng</label>
                    <div class="col-sm-10">
                        <textarea required name=" contente" class=" form-control summernote"
                                  placeholder="กรอกข้อมูล">{{$show_menu_head->content_head_menu_eng}}</textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </form>
    </div>
</div>
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
