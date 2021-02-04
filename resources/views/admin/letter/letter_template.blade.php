<!DOCTYPE html>
<html lang="pt_br">
<head>
    <style>
        .letter-card {
            background: #fff;
            padding: 10mm 20mm 10mm 20mm;
        }

        .top-content {
            margin-bottom: 20px;
        }

        .main-content {
            display: block;
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

        .letter-body {
            text-align: justify;
        }
    </style>
</head>
<body id="{{ $page or 'default'}}">
<div class="letter-card">
    <div class="letter-card-wrapper">
        <div class="top-content">
            <img class="logo-image" src="{{ asset('/media/logo/logo.png') }}">
        </div>
        <div class="main-content">
            <div class="letter-body">
                {!! \App\Models\Member::getLetterHtml($member) !!}
            </div>
        </div>
        <div class="bottom-content"><div>
    </div>
</div>
</body>
</html>