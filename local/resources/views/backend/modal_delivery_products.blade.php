<div class="modal fade show" id="edit_delivery_products" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('/save_delivery_products')}}" method="post"
              enctype="multipart/form-data" id="form_outside">
            <input type="hidden" name="id_products" value="{{$data_products->products_id}}">
            {{--            {{dd($data_gallery_all)}}--}}
            <div class="modal-header">
                <h4 class="modal-title">Gallery Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">option thai</label>
                    <div class="col-sm-10">
                        <input required name="option_thai"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">option eng</label>
                    <div class="col-sm-10">
                        <input required name="option_eng"
                               class=" form-control "
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery days Thai</label>
                    <div class="col-sm-10">
                        <input required name=" day_thai"
                               class=" form-control "
                               placeholder="Enter">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery days eng</label>
                    <div class="col-sm-10">
                        <input required name=" day_eng"
                               class=" form-control "
                               placeholder="กรอกข้อมูล">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery time thai</label>
                    <div class="col-sm-10">
                        <textarea required name=" time_thai"
                                  class=" form-control summernote "
                                  placeholder="กรอกข้อมูล"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">delivery time eng</label>
                    <div class="col-sm-10">
                        <textarea required name=" time_eng"
                                  class=" form-control summernote "
                                  placeholder="Enter"></textarea>
                    </div>
                </div>

                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>No .</th>
                            <th>option thai</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($show_delivery as $key => $rshow_delivery)
                            <tr id="tr1{{$rshow_delivery->products_delivery_id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$rshow_delivery->option_thai}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                            onclick="btnModalx({{$rshow_delivery->products_delivery_id }})">
                                        edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="btn_del({{$rshow_delivery->products_delivery_id }})">
                                        delete
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " onclick="btnremove()" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </form>


    </div>

</div>
<script>
    function btnremove(id) {
        $(".modal-backdrop").remove();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgactivities').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageactivities").change(function () {
        readURL(this);
    });
</script>
<script>
    function btnModalx(id) {

        $.ajax({
            url: 'modal_edit_delivery',
            data: {id: id},
            type: 'GET',
            success: function (data) {
                // alert(data);
                $(".modal-backdrop").remove();
                $('#resultModal').html(data);
                $("#modal_edit_delivery").modal('show');
            }
        });
    }

    function btn_delpicm(id) {
        if (confirm('Confirm to Delete?')) {
            $.ajax({
                url: 'delete_gallery_products/' + id,
                data: {"_token": "{{ csrf_token() }}"},
                type: 'POST',
                success: function (data) {
                    $('#picm' + id).remove();
                }
            });
        }
    }

    function btn_del(id) {
        if (confirm('Confirm to Delete?')) {
            $.ajax({
                url: 'delete_delivery/' + id,
                data: {id: id},
                type: 'POST',
                success: function (data) {
                    $("#tr1" + id).remove();
                }
            });
        }
    }


    $(document).ready(function () {

        $('.summernote').summernote({

            height: 100,
            dialogsInBody: true,
            dialogsFade: false,
            // airMode: true,
            popover: {
                image: [],
                link: [],
                air: []
            }
        });

    });
</script>



