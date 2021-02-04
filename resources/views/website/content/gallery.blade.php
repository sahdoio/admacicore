@extends('layout.website')

@section('content')
<section id="page-top">   
    <div class="top-banner">
        <div class="banner-wrapper parallax-section" style="background-image: url({{ asset('website/media/img/bg/gallery.jpg') }})">
            <div class="content-box">
                <h1 class="animated fadeInLeftBig">
                    GALERIA DE IMAGENS
                </h1>
            </div>
        </div>
    </div>  
</section>

<section id="gallery-area">
    <div class="container">
        <div class="gallery-grid">            
            @foreach ($images as $i => $img)           
                <div class="gallery-grid-item">
                    <div class="gallery-grid-item-box">
                        <img class="grid-img" src="{{ url($img) }}">
                        <a class="hover-wrapper" href="{{ $img }}" title="{{ $i + 1 }}" data-gallery>
                            <div class="gallery-info-box">
                                <div class="gallery-item-name">
                                    <!-- <h2>Item Name</h2> -->
                                </div>
                                <div class="gallery-item-button">
                                    <span>
                                        Visualizar
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
</div>
@endsection