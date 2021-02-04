@extends('layout.website')

@section('content')
    @php $count = 0; @endphp
    @foreach($schedule_map as $week_day => $schedules)
        @php $count++ @endphp
        @if($count % 2)
            <section id="step-1" class="section-step step-wrap">
                <div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
                    <div class="row">
                        <div class="col-md-8 step-desc">
                            <div class="col-md-2 center">
                                <div class="step-no">
                                    <span class="no-inner">{{ $count }}</span>
                                </div>
                            </div>
                            <div class="col-md-10 step-details">
                                <h3 class="step-title-black color-scheme">{{ \App\Models\Schedule::weekDay($week_day) }}</h3>
{{--                                <p class="step-description">--}}
{{--                                    Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.--}}
{{--                                </p>--}}
                                <ul class="sub-steps">
                                    @foreach($schedules as $schedule)
                                        <li>
                                            <span class="icon fa fa-clock-o color-scheme"></span>
                                            <span class="sub-title">{{ $schedule->time_start }} - {{ $schedule->time_end }}</span>
                                            <span class="sub-text">{{ $schedule->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 step-img">
                            <img src="{{ asset('/media/assets/calendar.png') }}"/>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section id="step-2" class="section-step step-even step-wrap">
                <div class="container step animated" data-animation="bounceInRight" data-animation-delay="700">
                    <div class="row">
                        <div class="col-md-8 step-desc">
                            <div class="col-md-2 center">
                                <div class="step-no">
                                    <span class="no-inner">{{ $count }}</span>
                                </div>
                            </div>
                            <div class="col-md-10 step-details">
                                <h3 class="step-title-white color-scheme">{{ \App\Models\Schedule::weekDay($week_day) }}</h3>
{{--                                <p class="step-description">--}}
{{--                                    Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.--}}
{{--                                </p>--}}
                                <ul class="sub-steps">
                                    @foreach($schedules as $schedule)
                                        <li>
                                            <span class="icon fa fa-clock-o color-scheme"></span>
                                            <span class="sub-title">{{ $schedule->time_start }} - {{ $schedule->time_end }}</span>
                                            <span class="sub-text">{{ $schedule->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 step-img">
                            <img src="{{ asset('/media/assets/calendar.png') }}"/>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endsection