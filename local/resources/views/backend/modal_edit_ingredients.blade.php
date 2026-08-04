<div class="modal fade show" id="modal_edit_ingredients" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" id="form_inside" action="{{url('/save_edit_ingredients')}}" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="id_products_pk" value="{{$data_ingredients_products->products_pk}}">
            <input type="hidden" name="id_ingredients" value="{{$data_ingredients_products->products_ingredients_id }}">
            {{--            {{dd($data_gallery_all)}}--}}
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
                    <label class="col-sm-2 col-form-label">Sort</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="ingredient_sort" id="ingredient_sort" value="{{$data_ingredients_products->ingredient_sort}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload img File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img_ingredients" id="imageactivities"
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <p> * กรุใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p>
                        <img id="blah" alt="your image" style="height: 150px"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Thai</label>
                    <div class="col-sm-10">
                        <input required name=" namet"
                               class=" form-control " value="{{$data_ingredients_products->text_ingredients_thai}}"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Eng</label>
                    <div class="col-sm-10">
                        <input required name=" namee" value="{{$data_ingredients_products->text_ingredients_eng}}"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect "
                        onclick="btnremove({{$data_ingredients_products->products_pk}})" data-dismiss="modal">
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
        btnModalingredients(id)
    }
</script>


