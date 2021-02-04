@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/blog/post.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <section id="blog-post-content" class="content">
        @php
            $route = isset($post) ? route('admin.blog.update', $post->id) : route('admin.blog.create');
        @endphp
        <form id="blog_post_form" action="{{ $route }}" method='post' role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Imagem de Capa</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Tipos: PNG, JPG, GIF</p>
                        <p>Tamanho máximo de 10MB</p>
                        <input type="file" class="dropify" name="media" data-max-file-size="10M" data-default-file="{{ isset($post) ? url($post->media->url) : '' }}" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Título</p>
                    </div>
                    <div class="col s12 m8 l9">
                        <p>Text Area</p>
                        <textarea class="form-control" name="title" rows="3" placeholder="Enter Title...">{{ $post->title ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Conteúdo</p>
                    </div>
                    <div class="col s12 m8 l9">
                        <p>Text Area</p>
                        <div id="body" class='textarea-editor'>
                            {!! $post->body or '' !!}
                        </div>
                    </div>
                </div>
            </div>

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
@endsection

@section('scripts')
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/js/pages/blog/post.js"></script>
@endsection