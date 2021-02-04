@extends('layout.admin')

@section('styles')
<link rel="stylesheet" href="/admin/css/dropify.css"/>
<link rel="stylesheet" href="/admin/css/pages/pages/contact.css"/>
@endsection

@section('content')
<div class="panel-header panel-header-sm">
</div>
<section id="contact-content" class="content">
    <form id="contact_form" action="{{ route('admin.pages.contact.update') }}" method="post" role="form" enctype="multipart/form-data" data-id="{{ $id or null}}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="row section">
                <h2 class="section-title">Informações de Contato</h2>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Telefone Celular</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->cellphone ?? '' }}" name="cellphone" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Telefone Celular 2</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->cellphone2 ?? '' }}" name="cellphone2" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Telefone Fixo 1</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->phone ?? '' }}" name="phone" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Telefone Fixo 2</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->phone2 ?? '' }}" name="phone2" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">E-mail</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->email ?? '' }}" name="email" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">E-mail 2</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->email2 ?? '' }}" name="email2" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Facebook</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->facebook ?? '' }}" name="facebook" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Instagram</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->instagram ?? '' }}" name="instagram" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Youtube</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->youtube ?? '' }}" name="youtube" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Flickr</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->flickr ?? '' }}" name="flickr" type="text" required="true" minlength="2"/>
                </div>
            </div>

            <div class="row section">
                <div class="col s12 m4 l3">
                    <p class="left-title">Twitter</p>
                </div>

                <div class="col s12 m8 l9">
                    <input class="form-control" value="{{ $contact_page->contact->twitter ?? '' }}" name="twitter" type="text" required="true" minlength="2"/>
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
<script src="/admin/js/pages/pages/contact.js"></script>
@endsection