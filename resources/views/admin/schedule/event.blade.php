@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/schedule/event.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        @php
            $action = isset($schedule) ? route('admin.schedule.update', $schedule->id) : route('admin.schedule.create');
        @endphp
        <form id="form_schedule" method="post" action="{{ $action }}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 center">
                    <div class="card pessoa">
                        <div class="row section">
                            <h2 class="section-title col s12 m6">Sobre o Evento</h2>
                        </div>

                        <div class="card-body">
                            <div class="group center">                             
                                <div class="form-group has-label">
                                    <label>
                                        Nome
                                    </label>
                                    <input class="form-control" value="{{ $schedule->name ?? '' }}" name="name" type="text" required="true" minlength="2"/>
                                </div>
                                <div class="form-group has-label select-wrapper">
                                    <label>
                                        Dia da semana
                                    </label>
                                    <select id="civil-status-select" name="week_day" class="selectpicker center" name="client_id" data-size="7" data-live-search="true" data-style="btn btn-primary btn-round" title="Selecionar">
                                        <option value="">-</option>
                                        @foreach(\App\Models\Schedule::WEEK_MAP as $week_key => $week_name)
                                            <option value="{{ $week_key }}" {{ (isset($schedule) && $schedule->week_day == $week_key) ? 'selected' : ''}}>
                                                {{ $week_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Hora - início
                                    </label>
                                    @php
                                        $now = date("H:i");
                                        $time = isset($schedule) ? $schedule->time_start : $now;
                                    @endphp
                                    <input type="text" name="time_start" class="form-control timepicker" value="{{ $time }}">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Hora - término
                                    </label>
                                    @php
                                        $now = date("H:i");
                                        $time = isset($schedule) ? $schedule->time_end : $now;
                                    @endphp
                                    <input type="text" name="time_end" class="form-control timepicker" value="{{ $time }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 center">
                    <div class="row">
                        <div class="col-md-6">
                            <button id="btn-cancel" class="btn btn-primary btn-round btn-danger">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                Cancelar
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button id="btn-save" class="btn btn-primary btn-round btn-save">
                                <i class="now-ui-icons ui-1_check"></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/admin/js/dropify.js"></script>
    <script src="/admin/cdn/jquery/jquery.validate.min.js"></script>
    <script src="/admin/cdn/mascara_js/mascara.min.js"></script>
    <script src="/admin/js/pages/schedule/event.js"></script>
@endsection

