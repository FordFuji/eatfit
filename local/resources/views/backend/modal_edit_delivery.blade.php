<div class="modal fade show" id="modal_edit_delivery" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" id="form_inside" action="{{url('/save_edit_delivery')}}" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="id_products_pk" value="{{$show_delivery->products_pk}}">
            <input type="hidden" name="id_delivery" value="{{$show_delivery->products_delivery_id}}">

            <div class="modal-header">
                <h4 class="modal-title">Gallery Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                {{--                {{$data_ingredients_products->text_ingredients_thai}}--}}

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">option thai</label>
                    <div class="col-sm-10">
                        <input required name=" option_thai"
                               class=" form-control " value="{{$show_delivery->option_thai}}"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">option eng</label>
                    <div class="col-sm-10">
                        <input required name=" option_eng" value="{{$show_delivery->option_eng}}"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery days Thai</label>
                    <div class="col-sm-10">
                        <input required name=" day_thai"
                               class=" form-control " value="{{$show_delivery->day_thai}}"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery days eng</label>
                    <div class="col-sm-10">
                        <input required name=" day_eng" value="{{$show_delivery->day_eng}}"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery time thai</label>
                    <div class="col-sm-10">
                        <textarea required name=" time_thai"
                                  class=" form-control summernote "
                                  placeholder="กรอกข้อมูล">{{$show_delivery->time_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery time eng</label>
                    <div class="col-sm-10">
                        <textarea required name=" time_eng"
                                  class=" form-control summernote "
                                  placeholder="Enter">{{$show_delivery->time_eng}}</textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect "
                        onclick="btnremove({{$show_delivery->products_pk}})" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </form>
    </div>
</div>
<script>
    function btnremove(id) {
        $(".modal-backdrop").remove();
        btnModaldelivery(id)
    }

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


