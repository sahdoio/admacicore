@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/album_images/modal_media.css"/>
@endsection

<!-- Modal -->
<div class="modal fade" id="newImageModal" tabindex="-1" role="dialog" aria-labelledby="newImageModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modal_media_form" action="{{ route('admin.album_images.create_image') }}" method="post">
                    <div class="row">
                        <div class="col s12 m8 l9">
                            <p>Tamanho máximo 10MB</p>
                            <input type="file" id="input-file-max-fs" class="dropify" name="image"
                                   data-max-file-size="10M"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="btn-save-modal" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/js/pages/album_images/modal_media.js"></script>
@endsection