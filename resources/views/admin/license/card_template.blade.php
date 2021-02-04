<!DOCTYPE html>
<html lang="pt_br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <style>
        .licence-card {
            width: 8.6cm;
            height: 5.4cm;
            background: #eeefff;
            margin: 40px auto;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .licence-card .licence-card-wrapper {
            padding: 1mm 3mm 2mm 3mm;
            font-family: 'Roboto', sans-serif;
            width: 8.6cm;
            height: 5.4cm;
            background-image: url(/media/assets/card-background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .top-content {
            height: 11mm;
            text-align: right;
            width: 83mm;
        }

        .main-content {
            display: block;
            width: 83mm;
            height: 32mm;
        }

        .bottom-content {
            width: 83mm;
            height: 5mm;
            padding: 2mm;
        }

        .logo-image {
            width: 20mm;
            margin-right: 3mm;
        }

        .licence-field .field-title {
            font-weight: 600;
            margin-bottom: 1mm;
            font-size: 10px;
        }

        .licence-field .field-content {
            margin-bottom: 1mm;
            margin-top: 1mm;
            background: #fff;
            font-size: 10px;
            color: #000 !important;
        }

        .left-side {
            width: 30mm;
            height: 30mm;
            float: left;
            margin-right: 2mm;
        }

        .right-side {
            width: 49mm;
            float: right;
            padding-top: 2px;
            height: 31mm;
        }

        .licence-card-picture {
            width: 100%;
            display: block;
            padding: 2px;
        }

        .licence-card-picture img {
            width: 100%;
        }

        .expiration_date {
            font-size: 8px;
            width: 28mm;
            display: block;
            font-weight: bold;
            margin: 0;
            color: #ffffff;
        }
    </style>
</head>
<body id="{{ $page or 'default'}}">
<div class="licence-card">
    <div class="licence-card-wrapper">
        <div class="top-content">
            <img class="logo-image" src="{{ asset('/media/logo/logo.png') }}">
        </div>
        <div class="main-content">
            <div class="left-side">
                <div class="licence-card-picture">
                    <img src="{{ isset($member->media->url) ? asset($member->media->url) : asset('/media/assets/square-notfound.png') }}">
                </div>
            </div>
            <div class="right-side">
                <div class="licence-field">
                    <p class="field-title">Nome:</p>
                    <p class="field-content">{{ $member->name . ' ' . $member->lastname}}</p>
                </div>

                <div class="licence-field">
                    <p class="field-title">Número:</p>
                    <p class="field-content">{{ $member->id }}</p>
                </div>

                <div class="licence-field">
                    <p class="field-title">Data nascimento:</p>
                    <p class="field-content">{{ $member->birth_date }}</p>
                </div>
            </div>
        </div>
        <div class="bottom-content">
            <h1 class="expiration_date">VÁLIDO ATÉ: DEZ/2019</h1>
        </div>
    </div>
</div>
</body>
</html>