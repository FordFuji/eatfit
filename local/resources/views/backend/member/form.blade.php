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
                                <h5>Member</h5>
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
                            <form action="{{url('/backend/order/saveUpdateOrder')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <legend>Member Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name - Family</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_name.' '.$member->member_family}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Birth Day</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_birth_day}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_gender}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_email}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_phone_number}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_password}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Datetime Create</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_datetime_create}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP Create</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_ip_create}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Datetime Update</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_datetime_update}}@endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP Update</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_ip_update}}@endif
                                            </div>
                                        </div>
                                        <legend>Shipping Address Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address 1</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($member)){{$member->member_address.' '.$member->member_sub_district.' '.$member->member_district.' '.$member->member_province.' '.$member->member_postcode}}@endif
                                            </div>
                                        </div>
@if(!empty($address))
    @php
    $i = 1;
    @endphp
    @foreach($address as $r)
        @php
        $i++;
        @endphp
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address {{$i}}</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$r->address_no.' '.$r->address_no.' '.$r->address_sub_distric.' '.$r->address_distric.' '.$r->address_province.' '.$r->address_postcode}}
                                            </div>
                                        </div>
    @endforeach
@endif
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
    <script>

    </script>
@endsection
