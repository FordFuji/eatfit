<div class="modal fade show" id="edit_ingredients_products" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('/save_ingredients_products')}}" method="post"
              enctype="multipart/form-data" id="form_outside">
            <input type="hidden" name="id_products" value="{{$data_products->products_id}}">
            {{--            {{dd($data_gallery_all)}}--}}
            <div class="modal-header">
                <h4 class="modal-title">Ingredients</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload img File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img_ingredients" id="imageactivities"
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                               required>
                        <p> * กรุใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p>
                        <img id="blah" alt="your image" style="height: 150px"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Thai</label>
                    <div class="col-sm-10">
                        <input required name=" namet"
                               class=" form-control "
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Eng</label>
                    <div class="col-sm-10">
                        <input required name=" namee"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>No .</th>
                            <th>image</th>
                            <th>name Thai</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data_ingredients_products as $key => $rdata_ingredients_products)
                            <tr id="tr1{{$rdata_ingredients_products->products_ingredients_id}}">
                                <td><input type="number" name="ingredient_sort[]" class="form-control" style="width: 100px;" value="{{$rdata_ingredients_products->ingredient_sort}}"></td>
                                <td><img src="{{url($rdata_ingredients_products->img_ingredients)}}"
                                         style="height: 100px">
                                </td>
                                <td>{{$rdata_ingredients_products->text_ingredients_thai}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                            onclick="btnModalx({{$rdata_ingredients_products->products_ingredients_id}})">
                                        edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="btn_del({{$rdata_ingredients_products->products_ingredients_id}})">
                                        delete
                                    </button>
                                </td>
                                <input type="hidden" name="products_ingredients_id[]" value="{{$rdata_ingredients_products->products_ingredients_id}}">
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " onclick="btnremove()" data-dismiss="modal">
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
</script>
<script>
    function btnModalx(id) {

        $.ajax({
            url: 'modal_edit_ingredients',
            data: {id: id},
            type: 'GET',
            success: function (data) {
                // alert(data);
                $(".modal-backdrop").remove();
                $('#resultModal').html(data);
                $("#modal_edit_ingredients").modal('show');
            }
        });
    }

    function btn_delpicm(id) {
        if (confirm('Confirm to Delete?')) {
            $.ajax({
                url: 'delete_gallery_products/' + id,
                data: {"_token": "{{ csrf_token() }}"},
                type: 'POST',
                success: function (data) {
                    $('#picm' + id).remove();
                }
            });
        }
    }

    function btn_del(id) {
        if (confirm('Confirm to Delete?')) {
            $.ajax({
                url: 'delete_ingredients/' + id,
                data: {id: id},
                type: 'POST',
                success: function (data) {
                    $("#tr1" + id).remove();
                }
            });
        }
    }
</script>

