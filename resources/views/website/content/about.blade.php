@extends('layout.website') 

@section('content')
<section id="about-info">
    <div class="container">
        <div class="row about_row">
            <div class="col-md-6 col-sm-6 col-xs-12 wow slideInRight" style="padding:0;">
                <div class="about-slider">
                    <div class="about-slider-item">
                        <img src="{{ url($author->media->url) }}">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 about_text wow slideInLeft">
                <div class="about_inner">
                    <h2>
                        <span>
                            {!! $author->title !!}
                        </span>
                    </h2>

                    <div class="bio-text">
                        {!! $author->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Container -->
</section>
@endsection