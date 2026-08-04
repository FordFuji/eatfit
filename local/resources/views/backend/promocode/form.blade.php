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
                                <h5>Promocode</h5>
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
                            <form action="{{url('/backend/promocode/saveUpdatepromocode')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promocode_name" class="form-control" value="@if(!empty($row)){{$row->promocode_name}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="promocode_discount" class="form-control" value="@if(!empty($row)){{$row->promocode_discount}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                                <select name="promocode_type" class="form-control" required>
                                                    <option value="">Please Select</option>
                                                    <option value="Baht" {{(!empty($row) and $row->promocode_type == 'Baht') ? 'selected' : ''}}>Baht</option>
                                                    <option value="%" {{(!empty($row) and $row->promocode_type == '%') ? 'selected' : ''}}>%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Begin Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promocode_begin_date" id="promocode_begin_date" class="form-control" value="@if(!empty($row)){{$row->promocode_begin_date}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="promocode_end_date" id="promocode_end_date" class="form-control" value="@if(!empty($row)){{$row->promocode_end_date}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Free Shipping</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="promocode_free_shipping" id="promocode_free_shipping" value="Yes" @if(!empty($row) and $row->promocode_free_shipping == 'Yes') checked @endif>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Giftset</label>
                                            <div class="col-sm-10">
                                                <select name="giftset_id" id="giftset_id" class="form-control">
                                                    <option value="">Please Select</option>
                                        @if(!empty($giftset))
                                            @foreach($giftset as $r)
                                                    <option value="{{ $r->giftset_id }}" @if(!empty($row) and $row->giftset_id == $r->giftset_id) selected @endif>{{ $r->giftset_name }}</option>
                                            @endforeach
                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Complete Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="sub_total_complete" id="sub_total_complete" class="form-control" value="@if(!empty($row)){{$row->sub_total_complete}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Limit Amount</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="amount_limit" id="amount_limit" class="form-control" value="@if(!empty($row)){{$row->amount_limit}}@endif" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="promocode_id" id="promocode_id" value="{{@$row->promocode_id}}">
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
        $( "#promocode_begin_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#promocode_end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
      </script>
@endsection
