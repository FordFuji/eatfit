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
                            <form action="{{url('/backend/promotion_day_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Date Begin</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="promotion_day_begin" name="promotion_day_begin" class="form-control" value="{{(!empty($row)) ? $row->promotion_day_begin : '0000-00-00'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Date End</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="promotion_day_end" name="promotion_day_end" class="form-control" value="{{(!empty($row)) ? $row->promotion_day_end : '0000-00-00'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Day</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_day_day" class="form-control" value="{{(!empty($row)) ? $row->promotion_day_day : '0'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Percent</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_day_percent" class="form-control" value="{{(!empty($row)) ? $row->promotion_day_percent : '0'}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Baht</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promotion_day_baht" class="form-control" value="{{(!empty($row)) ? $row->promotion_day_baht : '0'}}" required>
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
            $( "#promotion_day_begin" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#promotion_day_end" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>
@endsection
