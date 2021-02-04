<section id="bottom">
    <div class="container">
        <div class="row">
            <div class="item col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1>
                    Contato
                </h1>
                <address>
                    <p><i class="fa fa-home pr-10"></i>&nbsp; R. Santos Dumont, 466 - Centro</p>
                    <p><i class="fa fa-globe pr-10"></i>&nbsp; Manicoré-AM, Brasil</p>
                    <p><i class="fa fa-phone pr-10"></i>&nbsp; (97) 3385-1535 </p>
                    <p><i class="fa fa-envelope pr-10"></i>&nbsp; E-mail: <a href="javascript:;">contato@admanicore.com</a></p>
                </address>
            </div>

            <div class="item face-item col-lg-3 col-sm-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                <h1>fan page</h1>
                <div class="fb-page" data-href="https://www.facebook.com/admanicore/" data-tabs="timeline" data-width=""
                     data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                     data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/rodrigo.reasom" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/rodrigo.reasom">Rodrigo Reasom</a>
                    </blockquote>
                </div>
            </div>

            <div class="item col-lg-3 col-sm-3">
                <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                    <h1>
                        Links
                    </h1>
                    <ul class="page-footer-list">
                        <li>
                            <i class="fa fa-angle-right"></i>
                            &nbsp;
                            <a href="{{ route('about') }}">Sobre</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            &nbsp;
                            <a href="{{ route('jobs') }}">Portfólio</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            &nbsp;
                            <a href="{{ route('contact') }}">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="item col-lg-3 col-sm-3">
                <div class="map wow fadeInUp" data-wow-duration="2s" data-wow-delay=".7s">
                    <h1>
                        Mapa
                    </h1>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.3206752713196!2d-61.29761245899357!3d-5.8156923510955485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0a9c8f53ab9d44b1!2sIEADAM+Manicor%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1458426337323"
                            width="100%" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="500ms">
            <div class="col-lg-12">
                <div class="social-icon">
                    <ul>
                        <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="copyright text-center">
                    <a class="img-box" href="index.html">
                        <img src="{{ asset('media/logo/white-logo.png') }}"/>
                    </a>
                    <p>
                        Design And Developed by
                        <a class="link-ods" href="http://sahdo.me" target="_blank">
                            sahdo.me
                        </a>.
                        Copyright &copy; 2019. Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="back-top" style="display: none;">
    <button class="btn btn-primary scroll" title="Back to Top">
        <i class="fa fa-angle-up"></i>
    </button>
</div>