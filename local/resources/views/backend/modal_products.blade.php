<div class="modal fade show" id="edit_products" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('edit_menu_product')}}" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Edit setting </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                @csrf
                <input type="hidden" name="id_products" value="{{$show_products->products_id}}">

                <div >
                    <label for="cars">เลือกหัวข้อเมนู :</label>

                    <select  name="head_menu_id" id="cars">
                        <option></option>
                        @foreach($menu_products as $key_menu_head => $rmenu_products)
                            <option value="{{$rmenu_products->menu_product_head_id  }}">{{$key_menu_head+1}}
                                : {{$rmenu_products->name}}</option>
                        @endforeach
                    </select>
                    <div><span STYLE="color: red">(**** กรุณาเลือก ****)</span></div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload img File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img_products_outside" id="imageactivities">
                        <p>* กรุณาใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">percent %</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$show_products->percent}}" class="form-control"
                               name="percent_product"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>
                <div>
                    <div align="center">
                        <label for="color">สีพื้นหลังวงกลม :</label>

                        <select name="color" id="color">
                            <option value="" ></option>
                            <option value="1">ชมพู</option>
                            <option value="2">ฟ้า</option>
                            <option value="3">เหลือง</option>
                        </select>
                        <div><span
                                STYLE="color: red">(**** กรุณาเลือก สีพื้อนหลัง เปอร์เซ็น ****)</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Best Seller</label>
                    <div class="col-sm-10" align="left">
                        <input type="checkbox" name="products_bestsellers" id="products_bestsellers" value="Yes" @if(!empty($show_products) and $show_products->products_bestsellers == 'Yes'){{'checked'}}@endif>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name Thai</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$show_products->name_products_thai}}" class="form-control"
                               name="products_namet"
                               placeholder="กรอกข้อมูล" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">name English</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$show_products->name_products_eng}}" class="form-control"
                               name="products_namee"
                               placeholder="Enter" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">price full</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$show_products->price_full}}" class="form-control"
                               name="price_full"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">price sale</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$show_products->price_sale}}" class="form-control"
                               name="price_sale"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">price</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$show_products->price}}" class="form-control" name="price"
                               placeholder="กรอกข้อมูล">
                        <h7 class="text-center">
                            <spans style="color: red ">(**** หากกรอก
                                จำนวนเดียวแล้วไม่ต้อง กรอกส่วน ลดราคา และ ราเต็มก่อนลด****)
                            </spans>
                        </h7>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title products <span style="color: red">inside eng</span>
                        thai</label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="title_inside_products_thai"
                                              placeholder="กรอกข้อมูล">{{$show_products->title_inside_products_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">title products <span
                            style="color: red">inside eng</span></label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="title_inside_products_eng"
                                              placeholder="Enter">{{$show_products->title_inside_products_eng}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">CALORIES</label>
                    <div class="col-sm-5">
                        <input type="number" value="{{$show_products->calories_products}}" class="form-control"
                               name="calories_products"
                               placeholder="กรอกข้อมูล">
                    </div>

                    <label class="col-sm-1 col-form-label">CARBS</label>
                    <div class="col-sm-5">
                        <input type="number" value="{{$show_products->carbs_products}}" class="form-control"
                               name="carbs_products"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">TOTAL FAT</label>
                    <div class="col-sm-5">
                        <input type="number" value="{{$show_products->fat_products}}" class="form-control"
                               name="fat_products"
                               placeholder="กรอกข้อมูล">
                    </div>
                    <label class="col-sm-1 col-form-label">PROTEIN</label>
                    <div class="col-sm-5">
                        <input type="number" value="{{$show_products->protein_products}}" class="form-control"
                               name="protein_products"
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">text delivery <span
                            style="color: red">upper</span> thai</label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="text_delivery_upper_thai"
                                              placeholder="กรอกข้อมูล">{{$show_products->text_delivery_upper_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">text delivery <span
                            style="color: red">upper</span> eng</label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="text_delivery_upper_eng"
                                              placeholder="Enter">{{$show_products->text_delivery_upper_eng}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">text delivery <span
                            style="color: red">down</span> thai</label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="text_down_delivery_thai"
                                              placeholder="กรอกข้อมูล">{{$show_products->text_delivery_down_thai}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">text delivery <span
                            style="color: red">down</span> eng</label>
                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control summernote"
                                              name="text_down_delivery_eng"
                                              placeholder="Enter">{{$show_products->text_delivery_down_eng}}</textarea>
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
