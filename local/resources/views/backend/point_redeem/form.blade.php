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
                                <h5>Point</h5>
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
                            <form action="{{url('/backend/point_redeem_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                                <select name="point_redeem_new_type" id="point_redeem_new_type" class="form-control" onchange="changeType(this.value);" required>
                                                    <option value="">Please Select</option>
                                                    <option value="Product" @if(!empty($row) and $row->point_redeem_new_type == 'Product') selected @endif>Product</option>
                                                    <option value="Minimum Price" @if(!empty($row) and $row->point_redeem_new_type == 'Minimum Price') selected @endif>Minimum Price</option>
                                                    <option value="Free Shipping" @if(!empty($row) and $row->point_redeem_new_type == 'Free Shipping') selected @endif>Free Shipping</option>
                                                    <option value="Discount" @if(!empty($row) and $row->point_redeem_new_type == 'Discount') selected @endif>Discount</option>
                                                </select>
                                            </div>
                                        </div>
@if(!empty($row) and $row->point_redeem_new_type == 'Product')
    @php
    $product = 'inherite';
    $minimum_price = 'none';
    $free_shipping = 'none';
    $discount = 'none';
    @endphp
@elseif(!empty($row) and $row->point_redeem_new_type == 'Minimum Price')
    @php
    $product = 'none';
    $minimum_price = 'inherite';
    $free_shipping = 'none';
    $discount = 'none';
    @endphp
@elseif(!empty($row) and $row->point_redeem_new_type == 'Free Shipping')
    @php
    $product = 'none';
    $minimum_price = 'none';
    $free_shipping = 'inherite';
    $discount = 'none';
    @endphp
@elseif(!empty($row) and $row->point_redeem_new_type == 'Discount')
    @php
    $product = 'none';
    $minimum_price = 'none';
    $free_shipping = 'none';
    $discount = 'inherite';
    @endphp
@else
    @php
    $product = 'none';
    $minimum_price = 'none';
    $free_shipping = 'none';
    $discount = 'none';
    @endphp
@endif
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="point_redeem_new_image" id="point_redeem_new_image" class="form-control"> Recommend 98 x 98 px
@if(!empty($row) and $row->point_redeem_new_image != '')
    <br><img src="{{asset($row->point_redeem_new_image)}}" width="150">
@endif
                                            </div>
                                        </div>

                                        <div class="form-group row product" style="display: <?php echo $product;?>;">
                                            <label class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
                                                <select name="point_redeem_new_product_id" id="point_redeem_new_product_id" class="form-control">
                                                    <option value="">Please Select</option>
@if(!empty($products))
    @foreach($products as $r)
                                                    <option value="{{$r->products_id}}" {{(!empty($row) and $row->point_redeem_new_product_id == $r->products_id) ? 'selected' : ''}}>{{$r->name_products_thai.' / '.$r->name_products_eng}}</option>
    @endforeach
@endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row minimum_price" style="display: <?php echo $minimum_price;?>;">
                                            <label class="col-sm-2 col-form-label">Minimum Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="point_redeem_new_minimum_price" id="point_redeem_new_minimum_price" value="{{(!empty($row)) ? $row->point_redeem_new_minimum_price : ''}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row free_shipping" style="display: <?php echo $free_shipping;?>">
                                            <label class="col-sm-2 col-form-label">Free Shipping</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="point_redeem_new_free_shipping" id="point_redeem_new_free_shipping" value="Yes" {{(!empty($row) and $row->point_redeem_new_free_shipping == 'Yes') ? 'checked' : ''}}>
                                            </div>
                                        </div>

                                        <div class="form-group row discount" style="display: <?php echo $discount;?>;">
                                            <label class="col-sm-2 col-form-label">Discount</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="point_redeem_new_discount" id=" point_redeem_new_discount" value="{{(!empty($row)) ? $row->point_redeem_new_discount : ''}}" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <select name="point_redeem_new_discount_type" id="point_redeem_new_discount_type" class="form-control">
                                                    <option value="%">%</option>
                                                    <option value="Baht">Baht</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Point</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="point_redeem_new_point" id="point_redeem_new_point" class="form-control" value="{{@$row->point_redeem_new_point}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="point_redeem_new_id" value="{{@$row->point_redeem_new_id}}">
                                                <input type="submit" name="submit" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        function changeType(type) {
            if(type == 'Minimum Price') {
                $('.minimum_price').show();
                $('.free_shipping').hide();
                $('.discount').hide();
                $('.product').hide();

                $('#point_redeem_new_product_id').val('');
                //$('#point_redeem_new_minimum_price').val('0');
                $('#point_redeem_new_free_shipping').val('No');
                $('#point_redeem_new_discount').val('0');
                $('#point_redeem_new_discount_type').val('');
            } else if(type == 'Free Shipping') {
                $('.free_shipping').show();
                $('.minimum_price').hide();
                $('.discount').hide();
                $('.product').hide();

                $('#point_redeem_new_product_id').val('');
                $('#point_redeem_new_minimum_price').val('0');
                //$('#point_redeem_new_free_shipping').val('No');
                $('#point_redeem_new_discount').val('0');
                $('#point_redeem_new_discount_type').val('');
            } else if(type == 'Discount') {
                $('.discount').show();
                $('.minimum_price').hide();
                $('.free_shipping').hide();
                $('.product').hide();

                $('#point_redeem_new_product_id').val('');
                $('#point_redeem_new_minimum_price').val('0');
                $('#point_redeem_new_free_shipping').val('No');
                //$('#point_redeem_new_discount').val('0');
                //$('#point_redeem_new_discount_type').val('');
            } else if(type == 'Product') {
                $('.product').show();
                $('.discount').hide();
                $('.minimum_price').hide();
                $('.free_shipping').hide();

                //$('#point_redeem_new_product_id').val('0');
                $('#point_redeem_new_minimum_price').val('0');
                $('#point_redeem_new_free_shipping').val('No');
                $('#point_redeem_new_discount').val('0');
                $('#point_redeem_new_discount_type').val('');
            }
        }
    </script>
@endsection
