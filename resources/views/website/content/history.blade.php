@extends('layout.website') 

@section('content')
    <section id="history-article">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="img-box" style="display: block; width: 100%; margin: 20px auto; text-align: center">
                        <img class="img-responsive" src="{{ url($history_page->media->url) }}" alt="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content wow fadeInRight">
                        <div class="text history-body">
                            {!! $history_page->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- facebook-comments -->
                    <div class="fb-comments" style="margin-top: 40px; width: 100%; display: block"
                         data-href="{{ route('history') }}"
                         data-numposts="5"
                         data-width="100%">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection