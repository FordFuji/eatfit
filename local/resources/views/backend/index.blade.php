@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card bg-c-blue order-card bg-1">
                            <div class="card-block">
                                <h6 class="m-b-20">Cart</h6>
                                <h2 class="text-right"><i class="icon-basket f-left"></i><span>{{$count_order}}</span></h2>
                                <p class="m-b-0">Go to page
                                    <a href=""><span class="icon-gopage f-right"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
