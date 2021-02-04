@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/letter/letter.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm"></div>
    <div class="content">
        <div class="row">
            <div class="col-md-8 center">
                <div class="card">
                    <div class="card-header">
                        <div class="row section">
                            <h2 class="section-title col s12 m6">Carta de Recomendação</h2>
                            <div class="btn-box col s12 m6">
                                <button type="button"
                                        class="btn btn-success add"
                                        data-href="{{ route('admin.letter.export', $member->id) }}"
                                        onclick="exportPDF(this)">
                                    Exportar
                                </button>
                                <button type="button"
                                        class="btn btn-warning edit"
                                        data-href="{{ route('admin.letter.export', $member->id) }}"
                                        data-toggle="modal"
                                        data-target="#modalEditTemplate">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="letter-box group center">
                            <div class="letter-card-template">
                                <iframe src="{{ route('admin.letter.template', $member->id) }}" frameBorder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.letter.modal_edit_template', ['letterTemplate' => $member->letterTemplate])
@endsection

@section('scripts')
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/cdn/jquery/jquery.validate.min.js"></script>
    <script src="/admin/cdn/mascara_js/mascara.min.js"></script>
    <script src="/admin/js/pages/license/license.js"></script>
@endsection

