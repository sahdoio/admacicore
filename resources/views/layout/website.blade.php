<!DOCTYPE html>
<html lang="pt_br">
<head>
    <title>@yield('page_title', env('APP_TITLE'))</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('website.inc.styles.main')
    @yield('styles')
</head>
<body id="{{ $page ?? 'default' }}">
    <div class="page-loader">
        <img src="{{ asset('media/assets/loader.gif') }}">
    </div>

    @include('website.inc.header')

    <div class="content">
        @yield('content')  
    </div>

    @include('website.inc.footer')
    @include('website.inc.components')
    @include('website.inc.scripts.main')
    @yield('scripts')   
</body>
</html>
