@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')
<div class="pcoded-inner-content">
    {{-- <div class="bg-white"> --}}
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card page-header p-0 bg-11">
                <div class="card-block front-icon-breadcrumb row align-items-end">
                    <div class="breadcrumb-header col">
                        <div class="big-icon">
                            <i class="ion-clipboard"></i>
                        </div>
                        <div class="d-inline-block">
                            <h5 class="title">@lang('messages.OrderID') : {{$detail->order_number}}</h5>
                            <span>Trisak Automation Co., Ltd.</span>
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


            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Zero config.table start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>@lang('messages.Orderinformation') </h5>
                                <div class="card-block icon-btn">
                                    <span>

                                    </span>
                                </div>
                            </div>
                            <div class="card-block">
                                <table id="tableOrder" class="mb-5 table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>@lang('messages.OrderNo')</th>
                                            <th>@lang('messages.Date')</th>
                                            <th>@lang('messages.Status')</th>
                                            <th>@lang('messages.Payment')</th>
                                            <th>@lang('messages.TrackingNo')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Order No.">{{$detail->order_number}}</td>
                                            <td data-label="Date">{{$detail->order_date}}</td>
                                            <td data-label="Status">
                                                @if ($detail->order_satatus == 'Ord')
                                                @lang('messages.Ordered')

                                                @elseif ($detail->order_satatus == 'Pay')
                                                @lang('messages.PaymentAccepted')

                                                @elseif ($detail->order_satatus == 'Pro')
                                                @lang('messages.Processing')

                                                @elseif ($detail->order_satatus == 'D')
                                                @lang('messages.Delivered')

                                                @else

                                                @endif
                                            </td>
                                            <td data-label="Payment">
                                                {{-- {{$detail->order_pay}} --}}
                                                @if ($detail->order_pay == 'Bank')
                                                @lang('messages.Banktransfer')

                                                @elseif ($detail->order_pay == 'Later')
                                                @lang('messages.PaymentLater')

                                                @elseif ($detail->order_pay == 'onDelivery')
                                                @lang('messages.CashonDelivery')

                                                @else

                                                @endif
                                            </td>
                                            <td data-label="Tracking No.">
                                                @if ($detail->order_tracking == '')
                                                -
                                                @else
                                                {{$detail->order_tracking}}
                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="card shadow rounded-0 mb-3">
                                            <div class="card-body">
                                                <div class="title mb-3">@lang('messages.ShippingAddress')</div>
                                                <p class="font-weight-medium mb-1">John Doe</p>
                                                <p class="mb-1">90/16 Sriayutthaya Road, Vachiraoayabaan,<br>Dusit,
                                                    Bangkok 10300
                                                </p>
                                                <p class="mb-0">088-222-2222</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card shadow rounded-0 mb-3">
                                            <div class="card-body">
                                                <div class="title mb-3">@lang('messages.BillingAddress')</div>
                                                <p class="font-weight-medium mb-1">John Doe</p>
                                                <p class="mb-1">90/16 Sriayutthaya Road, Vachiraoayabaan,<br>Dusit,
                                                    Bangkok 10300
                                                </p>
                                                <p class="mb-0">088-222-2222</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card rounded-0 mb-4">
                                            <div class="card-header bg-white border-bottom-0">
                                                <div class="title">@lang('messages.Iteminmyorder')
                                                    ({{$detail->order_count}})</div>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($myorder as $item)
                                                <div class="border-bottom rounded-0 p-2 mb-3">
                                                    <div class="row">
                                                        <div class="col-5 col-md-2 col-xl-1">
                                                            <div class="boxImgOrder">
                                                                <div class="boxIn">
                                                                    <img src="{{asset('/files/frontend/images/product/222005982303.jpg')}}"
                                                                        class="imageOrderD">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 col-md-7 col-xl-6">
                                                            <b>{{$item->name}} ({{$item->order_detail_numproduct}})</b>
                                                        </div>
                                                        <div class="col-12 col-md-3 col-xl-5 text-right text-md-right">
                                                            <p>{{$item->order_detail_price}} THB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>

                                            <div class="card-footer text-right bg-white">
                                                <p class="font-weight-medium mb-0 f-s-14">@lang('messages.TotalPrice') :
                                                    {{$detail->order_totalprice}}
                                                    @lang('messages.THB')</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 pb-5">
                                        <div class="clearfix">
                                            @if ($detail->order_satatus == 'Ord')
                                            <a href="{{url('/backorder')}}"
                                                class="btn btn-outline-dark rounded-pill py-1 font-weight-medium">@lang('messages.GoBack')</a>
                                            @elseif ($detail->order_satatus == 'Pay')
                                            <a href="{{url('/backpay')}}"
                                                class="btn btn-outline-dark rounded-pill py-1 font-weight-medium">@lang('messages.GoBack')</a>
                                            @elseif ($detail->order_satatus == 'Pro')
                                            <a href="{{url('/backpro')}}"
                                                class="btn btn-outline-dark rounded-pill  py-1 font-weight-medium">@lang('messages.GoBack')</a>
                                            @elseif ($detail->order_satatus == 'D')
                                            <a href="{{url('/backdelivery')}}"
                                                class="btn btn-outline-dark rounded-pill  py-1 font-weight-medium">@lang('messages.GoBack')</a>
                                            @else

                                            @endif


                                            {{-- @if ($detail->order_pay == 'Later')
                                                <a href="{{url('/confirmPayment')}}"
                                            class="btn btn-outline-dark rounded-pill float-right py-1
                                            font-weight-medium">@lang('messages.Confirmyourpayment')
                                            </a>
                                            @else

                                            @endif --}}


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Zero config.table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
