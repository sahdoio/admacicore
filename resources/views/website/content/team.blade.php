@extends('layout.website')

@section('content')
    <section id="team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nossos Líderes</h2>
                <div class="section-divider"></div>
                <p class="text-center wow fadeInDown">
                    Conheça nossa equipe
                </p>
            </div>

            <div class="row">
                @foreach($team as $member)
                    <div class="team-item col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                        <div class="img-box">
                            <img src="{{ url($member->image->url) }}" alt="">
                        </div>
                        <div class="content-box">
                            <h4 class="column-title">{{ $member->name . ' ' . $member->lastname }}</h4>
                            <p>
                                {{ $member->about }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="team-spacer" class="parallax-section"></section>

    <section id="ministerio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Ministérios</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle text-center wow fadeInDown">
                    Nossos ministérios
                </p>
            </div>

            <div class="divider"></div>

            <div id="box-wrapper" class="row">
                <div class="row wow animated fadeInUp">
                    @foreach($departments as $i => $department)
                        <div class="row_inner row-left">
                            <div class="col-sm-6 ministerio-col">
                                <div class="img-box">
                                    <img src="{{ url($department->media->url) }}"/>
                                </div>
                            </div>
                            <div class="col-sm-6 ministerio-col">
                                <div class="content-box tab-pane fade in active">
                                    <h2>{{ $department->name }}</h2>
                                    <p>{!! $department->description !!}</p>
                                </div>
                            </div>
                        </div>

                        @if($i < count($departments) - 1)
                            <div class="divider"></div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection