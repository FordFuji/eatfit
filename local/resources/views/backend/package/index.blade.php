@extends('backend.layouts.main')

@section('head')
<!-- sweet alert framework -->


@endsection

@section('content')
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <form action="saveUpdatePackage" method="post" enctype="multipart/form-data">
        @csrf
        <legend>Price</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    3 Day Price
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="number" name="package_price_3_day" value="{{!empty($package_price) ? $package_price->package_price_3_day : 0}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    5 Day Price
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="number" name="package_price_5_day" value="{{!empty($package_price) ? $package_price->package_price_5_day : 0}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    7 Day Price
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="number" name="package_price_7_day" value="{{!empty($package_price) ? $package_price->package_price_7_day : 0}}" required>
                </div>
            </div>
        </div>
        <legend>Image</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4" style="font-weight: bold;" align="right">
                    <input type="file" name="package_price3_image" class="form-control"> Recommend 225 x 207 px
@if(!empty($package_price) and $package_price->package_price3_image != '')
                    <img src="{{asset($package_price->package_price3_image)}}" width="150">
@endif
                </div>
                <div class="col-md-4" style="font-weight: bold;" align="right">
                    <input type="file" name="package_price5_image" class="form-control"> Recommend 225 x 207 px
@if(!empty($package_price) and $package_price->package_price5_image != '')
                    <img src="{{asset($package_price->package_price5_image)}}" width="150">
@endif
                </div>
                <div class="col-md-4" style="font-weight: bold;" align="right">
                    <input type="file" name="package_price7_image" class="form-control"> Recommend 225 x 207 px
@if(!empty($package_price) and $package_price->package_price7_image != '')
                    <img src="{{asset($package_price->package_price7_image)}}" width="150">
@endif
                </div>
            </div>
        </div>
        <legend>Name</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price3_name_th" class="form-control" placeholder="3 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price3_name_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price3_name_en" class="form-control" placeholder="3 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price3_name_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price5_name_th" class="form-control" placeholder="5 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price5_name_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price5_name_en" class="form-control" placeholder="5 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price5_name_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price7_name_th" class="form-control" placeholder="7 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price7_name_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price7_name_en" class="form-control" placeholder="7 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price7_name_en : ''}}" required>
                </div>
            </div>
        </div>
        <legend>Description</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price3_description_th" class="form-control" placeholder="3 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price3_description_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price3_description_en" class="form-control" placeholder="3 Day (En)" value="{{!empty($package_price) ? $package_price->package_price3_description_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price5_description_th" class="form-control" placeholder="5 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price5_description_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price5_description_en" class="form-control" placeholder="5 Day (En)" value="{{!empty($package_price) ? $package_price->package_price5_description_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price7_description_th" class="form-control" placeholder="7 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price7_description_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price7_description_en" class="form-control" placeholder="7 Day (En)" value="{{!empty($package_price) ? $package_price->package_price7_description_en : ''}}" required>
                </div>
            </div>
        </div>
        <legend>Detail</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price3_detail_th" class="form-control" placeholder="3 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price3_detail_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price3_detail_en" class="form-control" placeholder="3 Day (En)" value="{{!empty($package_price) ? $package_price->package_price3_detail_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price5_detail_th" class="form-control" placeholder="5 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price5_detail_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price5_detail_en" class="form-control" placeholder="5 Day (En)" value="{{!empty($package_price) ? $package_price->package_price5_detail_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price7_detail_th" class="form-control" placeholder="7 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price7_detail_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price7_detail_en" class="form-control" placeholder="7 Day (En)" value="{{!empty($package_price) ? $package_price->package_price7_detail_en : ''}}" required>
                </div>
            </div>
        </div>
        <legend>Detail 2</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price3_detail2_th" class="form-control" placeholder="3 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price3_detail2_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price3_detail2_en" class="form-control" placeholder="3 Day (En)" value="{{!empty($package_price) ? $package_price->package_price3_detail2_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price5_detail2_th" class="form-control" placeholder="5 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price5_detail2_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price5_detail2_en" class="form-control" placeholder="5 Day (En)" value="{{!empty($package_price) ? $package_price->package_price5_detail2_en : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    <input type="text" name="package_price7_detail2_th" class="form-control" placeholder="7 Day (Th)" value="{{!empty($package_price) ? $package_price->package_price7_detail2_th : ''}}" required>
                </div>
                <div class="col-md-2" style="font-weight: bold;">
                    <input type="text" name="package_price7_detail2_en" class="form-control" placeholder="7 Day (En)" value="{{!empty($package_price) ? $package_price->package_price7_detail2_en : ''}}" required>
                </div>
            </div>
        </div>
        <br>
        <legend>List Product</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="font-weight: bold;" align="right">
                    Day / SET
                </div>
                <div class="col-md-3" style="font-weight: bold;">
                    BREAKFAST
                </div>
                <div class="col-md-3" style="font-weight: bold;">
                    LUNCH
                </div>
                <div class="col-md-3" style="font-weight: bold;">
                    DINNER
                </div>
                <div class="col-md-1" style="font-weight: bold;" align="center">
                    CALORIES
                </div>
            </div>
@php
$i = 0;
$chr = 64;
$total_calories = 0;

$txt_package = '';
if(!empty($product)) {
    foreach($product as $p) { 
        $txt_package .= '<option value="'.$p->products_id.'">'.$p->name_products_thai.' / '.$p->name_products_eng.'</option>';
    }
}
@endphp
<input type="button" value=" + " onclick="addPackage();">
@if(!empty($package))
    @foreach($package as $r)
        @php
        $i++;
        $chr++;
        $total_calories += $r->package_calories;
        @endphp
            <div class="row" id="div_package_{{ $i }}">
                <div class="col-md-1" style="font-weight: bold; margin-top: 30px; font-size:12px;" align="right">
                    Day {{$i}} (SET {{chr($chr)}})
                </div>
                <div class="col-md-3">
                    <select name="product_id1[]" class="form-control select2" style="margin-top: 10px;" required>
                        <option value="">Please Select</option>
        @if(!empty($product))
            @foreach($product as $p) 
                        <option value="{{$p->products_id}}" {{$p->products_id == $r->product_id1 ? 'selected' : ''}}>{{$p->name_products_thai.' / '.$p->name_products_eng}}</option>
            @endforeach
        @endif
                    </select>
                    <p>

                    </p>
                </div>
                <div class="col-md-3">
                    <select name="product_id2[]" class="form-control select2" style="margin-top: 10px;" required>
                        <option value="">Please Select</option>
        @if(!empty($product))
            @foreach($product as $p) 
                        <option value="{{$p->products_id}}" {{$p->products_id == $r->product_id2 ? 'selected' : ''}}>{{$p->name_products_thai.' / '.$p->name_products_eng}}</option>
            @endforeach
        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="product_id3[]" class="form-control select2" style="margin-top: 10px;" required>
                        <option value="">Please Select</option>
        @if(!empty($product))
            @foreach($product as $p) 
                        <option value="{{$p->products_id}}" {{$p->products_id == $r->product_id3 ? 'selected' : ''}}>{{$p->name_products_thai.' / '.$p->name_products_eng}}</option>
            @endforeach
        @endif
                    </select>
                </div>
                <div class="col-md-1" style="font-weight: bold; margin-top: 30px;" align="center">
                    {{$r->package_calories}}
                </div>
                <div class="col-md-1" style="font-weight: bold; margin-top: 30px;" align="center"><input type="button" value=" - " onclick="deletePackage({{ $i }});"></div>
            </div>
    @endforeach
@endif
            <span id="span_package"></span>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-10" style="font-weight: bold; margin-top: 10px;" align="right">
                    Total
                </div>
                <div class="col-md-1" style="font-weight: bold; margin-top: 10px;" align="center">
                    {{$total_calories}}
                </div>
                <div class="col-md-1" style="font-weight: bold;" align="right">
                    &nbsp;
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-1" style="font-weight: bold;" align="right">
                    &nbsp;
                </div>
                <div class="col-md-10">
                    <input type="submit" name="submit" value="Save">
                </div>
                <div class="col-md-1" style="font-weight: bold;" align="right">
                    &nbsp;
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<style>
    .select2 {
        margin-top: 20px !important;
    }
</style>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
@php
if(empty($i)) {
	$i = 1;
} else {
    $i++;
}
@endphp
<script>
    var i = {{ $i }};

    function addPackage() {
        i++;

        $('<div class="row" id="div_package_{{ $i }}"><div class="col-md-1" style="font-weight: bold; margin-top: 30px;" align="right"></div><div class="col-md-3"><select name="product_id1[]" class="form-control select2" style="margin-top: 10px;" required><option value="">Please Select</option>@php echo $txt_package @endphp</select><p></p></div><div class="col-md-3"><select name="product_id2[]" class="form-control select2" style="margin-top: 10px;" required><option value="">Please Select</option>@php echo $txt_package @endphp</select></div><div class="col-md-3"><select name="product_id3[]" class="form-control select2" style="margin-top: 10px;" required><option value="">Please Select</option>@php echo $txt_package @endphp</select></div><div class="col-md-1" style="font-weight: bold; margin-top: 30px;" align="center"></div><div class="col-md-1" style="font-weight: bold; margin-top: 30px;" align="center"><input type="button" value=" - " onclick="deletePackage({{ $i }});"></div></div>').clone().appendTo("#span_package");

        $('.select2').select2();
    }

    function deletePackage(i) {
        $("#div_package_" + i).remove();
    }
</script>
