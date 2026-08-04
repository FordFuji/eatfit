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
                                <h5>Promotion By Product</h5>
                                <span>eatfit by Gourmet Primo </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#"></a>
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
                            <form action="{{url('/backend/promotion_by_product_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Text(Th)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promotion_by_product_text_th" class="form-control" value="@if(!empty($row)){{$row->promotion_by_product_text_th}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Text(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promotion_by_product_text_en" class="form-control" value="@if(!empty($row)){{$row->promotion_by_product_text_en}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Amount</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_by_product_amount" class="form-control" value="@if(!empty($row)){{$row->promotion_by_product_amount}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Discount(%)</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_by_product_percent" class="form-control" value="@if(!empty($row)){{$row->promotion_by_product_percent}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
@if(!empty($result))
    @foreach($result as $r)
        @php
        $check = false;
        $exp = explode(', ', $row->products_id);   
        @endphp
        @if(!empty($exp))
            @foreach($exp as $p) 
                @if($r->products_id == $p)
                    @php
                    $check = true;
                    @endphp
                @endif
            @endforeach
        @endif
                                                <input type="checkbox" name="products_id[]" value="{{ $r->products_id }}" @if($check == true){{ 'checked' }}@endif> {{$r->name_products_thai.' / '.$r->name_products_eng}}<br>
    @endforeach
@endif
                                                <input type="checkbox" name="products_package_3" value="Yes" @if(!empty($row) and $row->products_package_3 == 'Yes'){{ 'checked' }}@endif> EATFIT PACKAGES 9-COURSE MEAL PLAN<br>
                                                <input type="checkbox" name="products_package_5" value="Yes" @if(!empty($row) and $row->products_package_5 == 'Yes'){{ 'checked' }}@endif> EATFIT PACKAGES 15-COURSE MEAL PLAN<br>
                                                <input type="checkbox" name="products_package_7" value="Yes" @if(!empty($row) and $row->products_package_7 == 'Yes'){{ 'checked' }}@endif> EATFIT PACKAGES 21-COURSE MEAL PLAN<br>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Free Shipping</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="promotion_by_product_free_shipping" value="Yes" @if(!empty($row) and $row->promotion_by_product_free_shipping == 'Yes'){{ 'checked' }}@endif>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                {{-- <input type="hidden" name="review_admin_id" id="review_admin_id" value="{{@$row->review_admin_id}}"> --}}
                                                <input type="submit" name="submit" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </div>        
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#review_admin_begin_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#review_admin_end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
      </script>
@endsection
