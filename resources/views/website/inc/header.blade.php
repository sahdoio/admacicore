<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header collapsed">
                <!-- responsive nav button -->
                <button id="mobile-menu-button" type="button" class="navbar-toggle x collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('media/logo/logo.png') }}" alt="logo" style="float:left;">
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <!-- <div class="mobile-menu-close-btn" onclick="$(this).parent().parent().find('.navbar-toggle').click();">x</div> -->
                <ul class="nav navbar-nav">
                    <li class="home scroll"><a href="{{ route('home')  }}">home</a></li>
                    <li class="about scroll"><a href="{{ route('about')  }}">sobre</a></li>
                    <li class="films scroll"><a href="{{ route('jobs') }}">portfólio</a></li>
                    <li class="contact scroll"><a href="{{ route('contact')  }}">contato</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@if(isset($page))
    @if($page == 'home')
        <section id="main-slider">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    @foreach ($banners as $i => $banner)
                        <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ ($i == 0) ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($banners as $i => $banner)
                        <div class="item {{ ($i == 0) ? 'active' : '' }}">
                            <div class="fill" style="background-image:url({{ url($banner->url) }});">
                                <a class="slider-link" href="{{ $banner->link or '#' }}">
                                    <div class="slider-title slideInDown animated slow">
                                        <h2>
                                            {{ $banner->title }}
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section id="page-top">
            <div class="top-banner">
                <div class="banner-wrapper parallax-section" style="background-image: url({{ url('/media/bg') . '/' . $page . '.jpg' }})">
                    <div class="content-box">
                        <h1 class="animated fadeInLeftBig">
                            {{ $page_title ?? 'Undefined' }}
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif