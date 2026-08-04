<div class="modal fade show" id="edit_gallery_banner_menu_head" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('/save_gallery_banner_menu_head')}}" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="id_menu_head" value="{{$data_gallery->menu_product_head_id}}">
            {{--            {{dd($data_gallery_all)}}--}}
            <div class="modal-header">
                <h4 class="modal-title">Gallery Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="input-images"></div>
                <div class="form-group row">
                    @foreach($data_gallery_all as $key => $rdata_gallery_all)
                        <div style="position:relative; width: 200px; padding:10px"
                             id="picm{{$rdata_gallery_all->gallery_menu_head_id }}">
                            <button type="button"
                                    style="position: absolute;display:block;top:3px;right:3px;z-index: 100;">
                                <i class="ion-close-circled"
                                   onclick="btn_delpicm({{$rdata_gallery_all->gallery_menu_head_id }})"></i>
                            </button>
                            <img
                                src="{{url($rdata_gallery_all->img_gallery_banner_menu_head)}}"
                                style="width: 100%;">
                        </div>
                    @endforeach
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
                url: 'delete_gallery_banner_menu',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id : id
                },
                type: 'POST',
                success: function (data) {
                    // alert(data);
                    // $('#resultModal').html(data);
                    // $("#editoverviewpicm").modal('hide');
                    $('#picm' + id).remove();
                }
            });
        }
    }
</script>
