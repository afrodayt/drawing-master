<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Art Master Сlasses with Alevtyna</title>
        <meta name="description" content="Unlock creativity with inspiring art workshops for all skill levels.">
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

        <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '551397814563158');
            fbq('track', 'PageView');
        </script>

        <style>
            .modal-title {
                font-family: Cormorant Garamond, sans-serif;
                font-size: 42px;
                font-weight: 400;
            }
        </style>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=551397814563158&ev=PageView&noscript=1"
            /></noscript>
        <!-- End Meta Pixel Code -->
    </head>
    <body class="antialiased h-100">

    <div id="app" class="h-100">
        <div class="container h-100 d-flex flex-column align-items-center justify-content-center">
            <div class="header">
                <div class="modal-title text-center">Your application has been accepted!</div>
            </div>
            <div class="body text-center">
                <img src="{{asset('assets/img/img-success.png')}}" alt="success" class="adaptive-img">
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    </body>
</html>
