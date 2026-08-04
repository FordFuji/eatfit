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
                                <h5>Order</h5>
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
                            <form action="{{url('/backend/pick_your_plan/pick_your_plan_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <legend>Shipping Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="plan_image">
                                                Recommend 270 x 230 px
                                                {{(!empty($planYourPlan) and $planYourPlan->plan_image != '') ? '<img src="'.$planYourPlan->plan_image.'" width="150">' : ''}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name(Th)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="plan_name_th" class="form-control" value="{{(!empty($planYourPlan) and $planYourPlan->plan_name_th != '') ? $planYourPlan->plan_name_th : ''}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name(En)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="plan_name_en" class="form-control" value="{{(!empty($planYourPlan) and $planYourPlan->plan_name_en != '') ? $planYourPlan->plan_name_en : ''}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description(Th)</label>
                                            <div class="col-sm-10">
                                                <textarea name="plan_description_th" class="form-control" rows="4" required>{{(!empty($planYourPlan) and $planYourPlan->plan_description_th != '') ? $planYourPlan->plan_description_th : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description(En)</label>
                                            <div class="col-sm-10">
                                                <textarea name="plan_description_en" class="form-control" rows="4" required>{{(!empty($planYourPlan) and $planYourPlan->plan_description_en != '') ? $planYourPlan->plan_description_en : ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="plan_id" value="@if(!empty($planYourPlan))(${{$planYourPlan->plan_id}}@endif">
                                                <input type="submit" name="change_status" value="Save">
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
    <script>

    </script>
@endsection
