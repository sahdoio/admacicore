@extends('layout.website') 

@section('content')
<section id="page-top">
    <div class="top-banner">
        <div class="banner-wrapper parallax-section" style="background-image: url(http://www.tma1.com/wp-content/uploads/2015/08/Header-Client-List2.jpg)">
            <div class="content-box">
                <h1 class="animated fadeInLeftBig">
                    Clientes
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="clients-area" class="clients-item">
    <div class="container">
        <div class="clients-item-wrapper wow fadeInUp" data-wow-duration="500ms">
            <ul id="og-grid" class="og-grid clients_list">
                @foreach ($clients as $client)   
                    <li class="clients_item">
                        <a href="javascript:void(0)" target="_blank">
                            <img src="{{ $client['client_image'] }}" title="{{ $client['client_name'] }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection