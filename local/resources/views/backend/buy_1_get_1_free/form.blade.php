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
                                <h5>Promotion</h5>
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
                            <form action="{{url('/backend/buy_1_get_1_free_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
                                                <select name="product_id" class="form-control" required>
                                                    <option value="">กรุณาเลือก</option>
@if(!empty($products))
    @foreach($products as $r)
                                                    <option value="{{$r->products_id}}" @if(!empty($row) and $row->product_id == $r->products_id) {{'selected'}}@endif>{{$r->name_products_thai.' / '.$r->name_products_eng}}</option>
    @endforeach
@endif                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="buy_1_get_1_free_id" value="{{@$row->buy_1_get_1_free_id}}">
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

    </script>
@endsection
