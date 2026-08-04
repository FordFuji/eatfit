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
                                <i class="icon-tag"></i>
                            </div>
                            <div class="d-inline-block">
                                <h5>PRODUCT</h5>
                                <span>eatfit by Gourmet Primo </span>
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
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Zero config.table start -->
                            <form action="{{url('/insert_products')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <div class="card-header">

                                        <div align="center">
                                            <label for="cars">เลือกหัวข้อเมนู :</label>

                                            <select required name="head_menu_id" id="cars">
                                                <option></option>
                                                @foreach($menu_products as $key_menu_head => $rmenu_products)
                                                    <option value="{{$rmenu_products->menu_product_head_id  }}">
                                                        {{$key_menu_head+1}}
                                                        : {{$rmenu_products->name}}</option>
                                                @endforeach
                                            </select>
                                            <div><span STYLE="color: red">(**** กรุณาเลือก ****)</span></div>
                                        </div>


                                    </div>

                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload img File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="img_products_outside"
                                                       id="imageactivities" required>
                                                {{-- <p> * กรุณาใส่รูปภาพขนาดไม่เกิน 25 mb (105*100px) *</p> --}}
                                                <img src="" alt="" id="imgactivities" style="height: 300px">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">percent %</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="percent_product"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>

                                        <div align="center">
                                            <label for="color">สีพื้นหลังวงกลม :</label>

                                            <select required name="color" id="color">
                                                <option>กรุณาเลือกสีของ เปอร์เซ็นต์</option>
                                                <option value="1">ชมพู</option>
                                                <option value="2">ฟ้า</option>
                                                <option value="3">เหลือง</option>
                                            </select>
                                            <div><span
                                                    STYLE="color: red">(**** กรุณาเลือก สีพื้อนหลัง เปอร์เซ็น ****)</span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">name Thai</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="products_namet"
                                                       placeholder="กรอกข้อมูล" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">name English</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="products_namee"
                                                       placeholder="Enter" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">price full</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price_full"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">price sale</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price_sale"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">price</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price"
                                                       placeholder="กรอกข้อมูล">
                                                <h5 class="text-center">
                                                    <spans style="color: red ">(**** หากกรอก
                                                        จำนวนเดียวแล้วไม่ต้อง กรอกส่วน ลดราคา และ ราเต็มก่อนลด****)
                                                    </spans>
                                                </h5>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">title products <span
                                                    style="color: red">inside
                                            eng</span>
                                                thai</label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="title_inside_products_thai" placeholder="กรอกข้อมูล"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">title products <span
                                                    style="color: red">inside
                                            eng</span></label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="title_inside_products_eng" placeholder="Enter"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">CALORIES</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="calories_products"
                                                       placeholder="กรอกข้อมูล">
                                            </div>

                                            <label class="col-sm-1 col-form-label">CARBS</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="carbs_products"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">TOTAL FAT</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="fat_products"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                            <label class="col-sm-1 col-form-label">PROTEIN</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="protein_products"
                                                       placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">text delivery <span
                                                    style="color: red">upper</span>
                                                thai</label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="text_delivery_upper_thai" placeholder="กรอกข้อมูล"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">text delivery <span
                                                    style="color: red">upper</span>
                                                eng</label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="text_delivery_upper_eng" placeholder="Enter"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">text delivery <span
                                                    style="color: red">down</span>
                                                thai</label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="text_down_delivery_thai" placeholder="กรอกข้อมูล"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">text delivery <span
                                                    style="color: red">down</span>
                                                eng</label>
                                            <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote"
                                                  name="text_down_delivery_eng" placeholder="Enter"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md"></label>
                                            <button type="submit" class="btn btn-primary btn-sm">save</button>
                                        </div>
                                    </div>
                            </form>

                            {{--{{dd($mode)}}--}}
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>No .</th>
                                            <th>image</th>
                                            <th>menu head</th>
                                            <th>name Thai</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($products as $key => $rproducts)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><img src="{{url($rproducts->img_products)}}" style="height: 100px">
                                                </td>
                                                @foreach($menu_products_head_name as $keyx => $rmenu_products_head_name)
                                                    @if($rmenu_products_head_name->menu_product_head_id == $rproducts->menu_head_pk)
                                                        <td>{{$rmenu_products_head_name->name_head_menu_thai}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$rproducts->name_products_thai}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                            onclick="btnModal({{$rproducts->products_id  }})">edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="btn_del({{$rproducts->products_id  }})">delete
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                            onclick="btnModalpicm({{$rproducts->products_id }})">add +
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            onclick="btnModaltag({{$rproducts->products_id }})">tag +
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            onclick="btnModalingredients({{$rproducts->products_id }})">
                                                        ingredients
                                                        +
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            onclick="btnModaldelivery({{$rproducts->products_id }})">
                                                        delivery +
                                                    </button>
                                                    <br>
                                                    <br>


                                                </td>

                                            </tr>
                                        @endforeach
                                        </tfoot>
                                    </table>
                                </div>


                                <div id="resultModal"></div>
                                <input type="hidden" id="urlModal" value="{{url('model_edit_products')}}">

                                <form action="" method="post" id="form_del">
                                    @csrf

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Zero config.table end -->
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection

@section('script')
    <script>
        function btnModal(id) {

            $.ajax({
                url: $('#urlModal').val(),
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_products").modal('show');
                }
            });
        }


        function getComboA(selectObject) {
            var value = selectObject.value;
            // console.log(value);
            $.ajax({
                url: 'check_menu',
                data: {
                    id: value
                },
                type: 'GET',
                success: function (data) {
                    alert(data)

                }
            });

        }

        function btnModalpicm(id) {

            $.ajax({
                url: 'edit_gallery_products',
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

        function btnModaltag(id) {

            $.ajax({
                url: 'edit_tag_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_tag_products").modal('show');
                }
            });
        }

        function btnModaldelivery(id) {

            $.ajax({
                url: 'edit_delivery_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_delivery_products").modal('show');
                }
            });
        }

        function btnModalingredients(id) {

            $.ajax({
                url: 'edit_ingredients_products',
                data: {
                    id: id
                },
                type: 'GET',
                success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#edit_ingredients_products").modal('show');
                }
            });
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

        function btn_del(id) {
            var url = 'delete_product' + '/' + id;
            if (confirm('Confirm to Delete?')) {
                $('#form_del').attr('action', url);
                $("#form_del").submit();
            }

        }

    </script>
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
@endsection
