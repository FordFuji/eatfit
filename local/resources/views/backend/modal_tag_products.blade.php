<div class="modal fade show" id="edit_tag_products" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('/save_tag_products')}}" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="id_products" value="{{$data_products->products_id}}">
            <div class="modal-header">
                <h4 class="modal-title">Gallery Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                @foreach($data_tag_show as $key => $rdata_tag_show)
                    <div class="form-group row" id="div1{{$rdata_tag_show->products_tag_id}}">
                        <label class="col-sm-2 col-form-label">tag thai</label>
                        <div class="col-sm-4">
                            <input value="{{$rdata_tag_show->tag_thai}}" type="text" class="form-control"
                                   name="tag_thai_show[]"
                                   placeholder="Enter">
                        </div>
                        <label class="col-sm-2 col-form-label">tag eng</label>
                        <div class="col-sm-3">
                            <input value="{{$rdata_tag_show->tag_eng}}" type="text" class="form-control"
                                   name="tag_eng_show[]"
                                   placeholder="Enter">
                        </div>
                        <br>
                        <button type="button" onclick="del_tag({{$rdata_tag_show->products_tag_id}})"
                                class="btn btn-danger del_tag btn-sm">-
                        </button>
                    </div>
                @endforeach


                <hr noshade="noshade" width="100%" size="6">
                <div align="center">
                    <button type="button"
                            id="editadd"
                            class="btn btn-danger btn-sm">
                        add+
                    </button><br><br>
                    <label style="color: red">(** หากแก้ไขข้อมูลอย่าพึ่งกด เพิ่มข้อมูล ทำที่ละขั้นตอน **)</label>
                </div>
                <hr noshade="noshade" width="100%" size="6">
                <br>
                <div align="center" id="diveditadd">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.input-images').imageUploader();
</script>
<script>
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

    $(document).ready(function () {
        var i = 0;
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#txtP' + button_id + '').remove();

        });
        $('#editadd').click(function () {
            i++;
            $('#diveditadd').append('<div id="txtP' + i + '" class="form-group row"><label class="col-sm-2 col-form-label">Tag thai</label>' +
                '<div class="col-sm-3">' +
                '<input type="text" class="form-control" name="tag_thai[]" placeholder="กรอกข้อมูล" required>' +
                '</div><label class="col-sm-2 col-form-label">Tag eng</label>' +
                '<div class="col-sm-3">' +
                '<input type="text" class="form-control" name="tag_eng[]" placeholder="Enter" required>' +
                '</div>' +
                '<button type="button"  id="' + i + '" class="btn btn-danger btn-sm btn_remove col-sm-1">remove</button></div>');

        });
    });

    function del_tag(id) {
        // alert(id)
        $.ajax({
            url: 'remove_tag_products/' + id,
            data: {id: id},
            type: 'POST',
            success: function (data) {
                $("#div1" + id).remove();
            }
        });
    }
</script>
