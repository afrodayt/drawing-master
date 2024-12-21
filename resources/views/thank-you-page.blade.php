<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Дякуємо за заявку</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet">
    </head>
    <style>
        img {
            margin-bottom: 60px;
        }
        .thank-you-title {
            font-size: 36px;
            font-weight: 700;
            line-height: 110%;
            margin-bottom: 15px;
            text-align: center;
        }
        .thank-you-description {
            font-size: 18px;
            font-weight: 400;
            line-height: 140%;
        }
        @media (max-width: 991px) {
            img {
                margin-bottom: 0;
                margin-top: 40px;
                max-height: 560px;
            }
            .thank-you-title {
                font-size: 28px;
                line-height: 116%;
                text-align: center;
            }
            .thank-you-description {
                font-size: 16px;
                line-height: 120%;
                text-align: center;
            }
        }
    </style>
    <body class="antialiased">
        <div class="container">
            <div class="h-100 min-vh-100 d-flex align-items-center justify-content-center bg-white flex-column-reverse flex-lg-column">
                <img src="{{asset('assets/img/img-thank-you-page.png')}}" alt="img-thank-you" class="adaptive-img">
                <div class="d-flex flex-column">
                    <div class="thank-you-title">Вашу заявку прийнято!</div>
                    <div class="thank-you-description d-flex justify-content-center">Ми зв'яжемося з вами найближчим часом</div>
                </div>

            </div>
        </div>


    @vite('resources/js/app.js')
    </body>
</html>
