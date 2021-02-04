@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/pages/history.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <section id="history-content" class="content">
        <form id="history_form" action="{{ route('admin.pages.history.update') }}" method="post" role="form" enctype="multipart/form-data" data-id="{{ $id or null }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Título</p>
                    </div>

                    <div class="col s12 m4 l3">
                        <p>Text Area</p>
                        <input name="title" class="form-control" value="{{ $history_page->title ?? '' }}">
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Descrição</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Text Area</p>
                        <div id="description" class='textarea-editor'>
                            {!! $history_page->description or '' !!}
                        </div>
                    </div>
                </div>

                <div class="row section">
                    <div class="col s12 m4 l3">
                        <p class="left-title">Imagem</p>
                    </div>

                    <div class="col s12 m8 l9">
                        <p>Maximum file upload size 20MB</p>
                        <input type="file" id="media" class="dropify" name="media" data-max-file-size="10M" data-default-file="{{ url($history_page->media->url) }}"/>
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
    <script src="/admin/js/pages/pages/history.js"></script>
@endsection