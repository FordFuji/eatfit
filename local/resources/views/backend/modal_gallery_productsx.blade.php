<div class="modal fade show" id="edit_gallery_products" tabindex="-1" role="dialog"
     style="z-index: 1050; display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" action="{{url('/save_gallery_products')}}" method="post"
              enctype="multipart/form-data">
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
                <div class="input-images"></div>
                <div class="form-group row">
                    @foreach($data_gallery_products as $key => $rdata_gallery_products)
                        <div style="position:relative; width: 200px; padding:10px"
                             id="picm{{$rdata_gallery_products->products_gallery_id  }}">
                            <button type="button"
                                    style="position: absolute;display:block;top:3px;right:3px;z-index: 100;">
                                <i class="ion-close-circled"
                                   onclick="btn_delpicm({{$rdata_gallery_products->products_gallery_id  }})"></i>
                            </button>
                            <img
                                src="{{url($rdata_gallery_products->img_products_gallery)}}"
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
                url: 'delete_gallery_products/' + id,
                data: {"_token": "{{ csrf_token() }}"},
                type: 'POST',
                success: function (data) {
                    $('#picm' + id).remove();
                }
            });
        }
    }
</script>
