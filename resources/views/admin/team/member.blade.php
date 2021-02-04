@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
    <link rel="stylesheet" href="/admin/css/pages/team/member.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm"></div>
    @php
        $form_url = isset($member) ? route('admin.team.update', $member->id) : route('admin.team.create');
    @endphp
    <div class="content">
        <form id="team_form" method="post" action="{{ $form_url }}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 center">
                    <div class="card pessoa">
                        <div class="card-header">
                            <h4 class="card-title">Sobre o Colaborador</h4>
                        </div>
                        <div class="card-body">
                            <div class="group center">
                                <div class="form-group has-label">
                                    <label>
                                        Nome
                                    </label>
                                    <input class="form-control" value="{{ $member->name ?? '' }}" name="name" type="text" required="true" minlength="2"/>
                                </div>
                                <div class="form-group has-label">
                                    <label>
                                        Sobrenome
                                    </label>
                                    <input class="form-control" value="{{ $member->lastname ?? '' }}" name="lastname" type="text" required="true" minlength="2"/>
                                </div>
                                <div class="form-group has-label">
                                    <label>
                                        Sobre o Colaborador
                                    </label>
                                    <div id="about" class='textarea-editor'>
                                        {!! $member->about or '' !!}
                                    </div>
                                </div>
                                <div class="form-group has-label">
                                    <label>Imagem</label>
                                    <input type="file" id="input-file-max-fs"
                                           class="dropify"
                                           name="image"
                                           data-max-file-size="10M"
                                           data-default-file="{{ isset($member) ? url($member->image->url) : '' }}"
                                    />
                                    <label>Maximum file upload size 10MB</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 center">
                    <div class="box-footer">
                        <button id="btnCancel" class="btn btn-primary btn-edit delete">
                            Cancelar
                        </button>
                        <button id="btnSave" type="submit" class="btn btn-primary btn-edit save" name="btn_save">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/cdn/jquery/jquery.validate.min.js"></script>
    <script src="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/cdn/mascara_js/mascara.min.js"></script>
    <script src="/admin/js/pages/team/member.js"></script>
@endsection