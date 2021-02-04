@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/pages/home.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <section id="home-content" class="content">
        <form id="home_form" action="{{ route('admin.pages.home.update') }}" method="post" role="form" enctype="multipart/form-data" data-id="{{ $id or null }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 1 - Título</p>
                    </div>

                    <div class="col s12 m4 l3">
                        <p>Text Area</p>
                        <input name="home_page_1_title" class="form-control" value="{{ $home_page_1->title ?? '' }}">
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 1 - Descrição</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Text Area</p>
                        <in id="home_page_1_description" class='textarea-editor'>
                            {!! $home_page_1->description or '' !!}
                        </in>
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 1 - Imagem</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Maximum file upload size 20MB</p>
                        <input type="file" id="home_page_1_media" class="dropify" name="home_page_1_media" data-max-file-size="10M" data-default-file="{{ url($home_page_1->media->url) }}"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 2 - Título</p>
                    </div>

                    <div class="col s12 m4 l3">
                        <p>Text Area</p>
                        <input name="home_page_2_title" class="form-control" value="{{ $home_page_2->title ?? '' }}">
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 2 - Descrição</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Text Area</p>
                        <div id="home_page_2_description" class='textarea-editor'>
                            {!! $home_page_2->description or '' !!}
                        </div>
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Informação 2 - Imagem</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Maximum file upload size 20MB</p>
                        <input type="file" id="home_page_2_media" class="dropify" name="home_page_2_media" data-max-file-size="10M" data-default-file="{{ url($home_page_2->media->url) }}"/>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button id="btnCancel" class="btn btn-primary btn-edit delete">
                    Cancelar
                </button>
                <button id="btnSave" type="submit" class="btn btn-primary btn-edit save">
                    Salvar
                </button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script src="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/js/pages/pages/home.js"></script>
@endsection