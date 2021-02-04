@extends('layout.admin')

@section('styles')
    @parent
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/album_videos/album.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm"></div>
    @php
        $route = isset($album) ? route('admin.album_videos.update', $album->id) : route('admin.album_videos.create');
    @endphp
    <section id="album-content" class="content">
        <form id="album_form" action="{{ $route }}" method='post' role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Título do Álbum</p>
                    </div>
                    <div class="col s12 m8 l9">
                        <input class="form-control" name="name" value="{{ $album->name ?? '' }}" rows="3" placeholder="Enter Title...">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Imagem de Capa</p>
                    </div>
                    <div class="col s12 m8 l9">
                        <p>Maximum file upload size 10MB</p>
                        <input type="file" id="input-file-max-fs" class="dropify" name="cover_image" data-max-file-size="10M" data-default-file="{{ isset($album) ? url($album->cover_media->url) : '' }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Vídeos</p>
                    </div>
                    <div class="col s12 m8 l9">
                        <div class="album-btn-box">
                            <button id="buttonAdd" class="btn btn-success add" type="button" data-toggle="modal" data-target="#newVideoModal">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <div id="album-area" class="row section">
                    <div class="album-grid">
                        @if(isset($album) && count($album->medias))
                            @foreach ($album->medias as $i => $media)
                                @include('admin.album_videos.album_item', ['media' => $media])
                            @endforeach
                        @else
                            <div class="no-media">
                                <h3>Nenhuma vídeo cadastrado</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div id="new_media_group"></div>
            <div id="deleted_media_group"></div>

            <div class="box-footer">
                <button id="btnCancel" class="btn btn-primary btn-edit delete">
                    Cancelar
                </button>
                <button id="btnSave" type="submit" class="btn btn-primary btn-edit save" name="btn_save">
                    Salvar
                </button>
            </div>
        </form>
    </section>

    @include('admin.album_videos.modal_media')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="/admin/cdn/masonry/masonry.pkgd.js"></script>
    <script type="text/javascript" src="/admin/cdn/masonry/masonry.js"></script>
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/js/pages/album_videos/album.js"></script>
@endsection