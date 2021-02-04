@extends('layout.website') 

@section('content')

<section id="page-top">   
    <div class="top-banner">
        <div class="banner-wrapper parallax-section" style="background-image: url({{ asset('website/media/img/bg/services.jpg') }})">
            <div class="content-box">
                <h1 class="animated fadeInLeftBig">
                    Como trabalhamos
                </h1>
            </div>
        </div>
    </div>  
</section>

<section>
    <div class="container">
        <p class="section-text">
        Após anos de experiência atuando em cargos de Liderança, concluimos que apenas treinar Líderes não é o suficiente para desenvolvê-los e assim obter melhores resultados, por isso criamos uma metodologia própria para desenvolver Líderes, que inclui: 
        </p>
    </div>
</section>

@foreach ($services as $i => $service) 
    @if ($i % 2)
        <section class="service right">
            <div class="container">        
                <div class="row">            
                    <div class="col-sm-6 info-wrapper">
                        <div class="info">
                            <h2 class="title-area">{{ $service->title }}</h2>
                            <div class="description-area">
                                <p>
                                    {!! $service->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 hidden-xs wow fadeIn">
                        <div class="image-area">
                            <img src="{{ $service->image }}" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="service bg-gray">
            <div class="container">        
                <div class="row">      
                    <div class="col-sm-6 hidden-xs wow fadeIn">
                        <div class="image-area">
                            <img src="{{ $service->image }}" alt="" class="img-responsive">
                        </div>
                    </div>      
                    <div class="col-sm-6 info-wrapper">
                        <div class="info">
                            <h2 class="title-area">{{ $service->title }}</h2>
                            <div class="description-area">
                                <p>
                                    {!! $service->description !!}
                                </p>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </section>
    @endif
@endforeach

@endsection