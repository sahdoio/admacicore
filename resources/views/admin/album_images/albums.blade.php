@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/album_images/albums.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm"></div>

    <section id="albums-content" class="content">
        <div class="albums">
            <div class="form-group">
                <div class="row section">
                    <h2 class="section-title col s12 m6">Seus Álbuns de Imagens</h2>
                    <div class="albums-btn-box col s12 m6">
                        <button id="buttonAdd" type="button" class="btn btn-success add" data-href="{{ route('admin.album_images.new') }}">
                            Novo
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    @foreach($albums as $i => $album)
                        @php
                            $front_id = $i + 1;
                        @endphp
                        @if($album->cover_media)
                            @if($album->cover_media->type_id == \App\Models\MediaType::VIMEO)
                                <div class="item-job col-sm-4 grid" data-id="{{ $album->id }}" data-front-id="{{ $front_id }}">
                                    <figure class="effect-roxy">
                                        <iframe src="{{ $album->cover_media->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        <figcaption>
                                            <div class="button-wrapper">
                                                <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.album_images.edit', $album->id) }}">Edit</button>
                                                <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.album_images.delete', $album->id) }}">Delete</button>
                                            </div>
                                            <h2>{{ $album->name }}</h2>
                                            <a href="{{ route('admin.album_images.edit', $album->id) }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @elseif($album->cover_media->isImage() || $album->cover_media->isVideo())
                                <div class="item-job col-sm-4 grid" data-id="{{ $album->id }}" data-front-id="{{ $front_id }}">
                                    <figure class="effect-roxy">
                                        <img src="{{ isset($album->cover_media->url) ? url($album->cover_media->url) : '' }}" alt="{{"Álbum $front_id"}}"/>
                                        <figcaption>
                                            <div class="button-wrapper">
                                                <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.album_images.edit', $album->id) }}">Edit</button>
                                                <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.album_images.delete', $album->id) }}">Delete</button>
                                            </div>
                                            <h2>{{ $album->name }}</h2>
                                            <a href="{{ route('admin.album_images.edit', $album->id) }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @else
                                <div class="folio-media">
                                    <h3>Mídia desconhecida</h3>
                                </div>
                            @endif
                        @else
                            <div class="folio-media">
                                <h3>Mídia desconhecida</h3>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/js/pages/album_images/albums.js"></script>
@endsection