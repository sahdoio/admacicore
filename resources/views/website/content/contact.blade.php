@extends('layout.website') 

@section('content')
<section id="contact-info">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">FALE COM A GENTE</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle text-center wow fadeInDown">
                Atendemos em horário comercial
            </p>
        </div>

        <div class="contact-area">
            <div class="row">
                <div class="contact-box col-md-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="contact-info">
                        <h3>{{ $site_info->cellphone }}</h3>
                        <p>ligação/whatsapp</p>
                    </div>
                </div>

                <div class="contact-box col-md-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="contact-icon">
                        <i class="fa fa-coffee"></i>
                    </div>
                    <div class="contact-info">
                        <h3>{{ $site_info->email }}</h3>
                        <p>email comercial</p>
                    </div>
                </div>

                <div class="contact-box col-md-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="contact-icon">
                        <i class="fa fa-phone-square"></i>
                    </div>
                    <div class="contact-info">
                        <h3>{{ $site_info->cellphone2 }}</h3>
                        <p>ligação/whatsapp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
<section id="map">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Onde Estamos</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle text-center wow fadeInDown">
                {{ $site_info->street }}, {{ $site_info->number }}, {{ $site_info->district }}, {{ $site_info->cep }}, {{ $site_info->city }}
            </p>
        </div>
    </div>

    <div class="google-map wow fadeInDown" data-wow-duration="500ms">
        <div id="map-canvas"></div>
    </div>
</section>
-->

<section id="quote">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">MANDE UMA MENSAGEM</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle text-center wow fadeInDown">
                Responderemos em até 24 horas
            </p>
        </div>

        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>

            <form class="form" method="post" action="{{ route('sendMail') }}">
                {{ csrf_field() }}
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Nome *</label>
                        <input type="text" name="name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Empresa</label>
                        <input type="text" name="company" class="form-control">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Assunto *</label>
                        <input type="text" name="subject" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Mensagem *</label>
                        <textarea name="message" id="message" required class="form-control" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg" required="required">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection