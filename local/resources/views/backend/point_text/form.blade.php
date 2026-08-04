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
                                <h5>Point</h5>
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
                            <form action="{{url('/backend/proint_text_save_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="button" value=" + " onclick="clickPlus();">
                                            </div>
                                        </div>
@php
$i = 1;
@endphp                        
@if(!empty($rows))
    @foreach($rows as $r)
                                        <div class="form-group row remove{{$i}}">
                                            <label class="col-sm-2 col-form-label">Text(Th)</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="point_text_name_th[]" class="form-control" value="{{$r->point_text_name_th}}" required>
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="button" value=" - " onclick="clickRemove(1);">
                                            </div>
                                        </div>
                                        <div class="form-group row remove{{$i}}">
                                            <label class="col-sm-2 col-form-label">Text(En)</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="point_text_name_en[]" class="form-control" value="{{$r->point_text_name_en}}" required>
                                            </div>
                                        </div>
        @php
        $i++;
        @endphp
    @endforeach
@else 
                                        <div class="form-group row remove1">
                                            <label class="col-sm-2 col-form-label">Text(Th)</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="point_text_name_th[]" class="form-control" value="" required>
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="button" value=" - " onclick="clickRemove(1);">
                                            </div>
                                        </div>
                                        <div class="form-group row remove1">
                                            <label class="col-sm-2 col-form-label">Text(En)</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="point_text_name_en[]" class="form-control" value="" required>
                                            </div>
                                        </div>
@endif
                                        <span id="spanPlusPoint"></span>
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
    <script>
        var i = '<?php echo $i;?>';
        function clickPlus() {
            i++;

            $('<div class="form-group row remove' + i + '"><label class="col-sm-2 col-form-label">Text(Th)</label><div class="col-sm-9"><input type="text" name="point_text_name_th[]" class="form-control" value="" required></div><div class="col-sm-1"><input type="button" value=" - " onclick="clickRemove(' + i + ');"></div></div><div class="form-group row remove' + i + '"><label class="col-sm-2 col-form-label">Text(En)</label><div class="col-sm-9"><input type="text" name="point_text_name_en[]" class="form-control" value="" required></div></div>').clone().appendTo("#spanPlusPoint");
        }

        function clickRemove(point_text_id) {
            console.log(point_text_id);

            $(".remove" + point_text_id).remove();
        }
    </script>
@endsection
