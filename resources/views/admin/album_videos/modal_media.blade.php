@section('styles')
    @parent
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/album_videos/modal_media.css"/>
@endsection

<!-- Modal -->
<div class="modal fade" id="newVideoModal" tabindex="-1" role="dialog" aria-labelledby="newImageModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Vídeo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modal_media_form" action="{{ route('admin.album_videos.create_video') }}" method="post">
                    <div class="row">
                        <div class="col s12 m8 l9">
                            <p>Link do vídeo (Youtube ou Vimeo):</p>
                            <input type="text" class="form-control video-input" name="media_input"/>
                            <br>
                            <div class="video-box">
                                @include('tools.iframe_video', ['media' => $media])
                            </div>
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
    <script src="/admin/js/pages/album_videos/modal_media.js"></script>
@endsection