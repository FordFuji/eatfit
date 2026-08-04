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
                            <form action="{{url('/backend/promotion_complete_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Price Complete</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_complete_from_price" class="form-control" value="{{(!empty($row)) ? $row->promotion_complete_from_price : '0'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_complete_discount" class="form-control" value="{{(!empty($row)) ? $row->promotion_complete_discount : '0'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Free Shipping</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="promotion_complete_free_shipping" value="Yes" {{(!empty($row) and $row->promotion_complete_free_shipping == 'Yes') ? 'checked' : ''}}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Begin Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promotion_complete_begin_date" id="promotion_complete_begin_date" class="form-control" value="{{(!empty($row)) ? $row->promotion_complete_begin_date : '0000-00-00'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promotion_complete_end_date" id="promotion_complete_end_date" class="form-control" value="{{(!empty($row)) ? $row->promotion_complete_end_date : '0000-00-00'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="Submit" name="Submit" value="Save">
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $("#promotion_complete_begin_date").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#promotion_complete_end_date").datepicker({ dateFormat: 'yy-mm-dd' });
    } );
    </script>
@endsection
