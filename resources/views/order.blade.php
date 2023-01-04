<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description">
        <title>Мебель на заказ</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>

        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script src={{ asset('js/owl.carousel.min.js')}}></script>

    </head>
    <body class="container-fluid p-0 m-0">
    <x-header></x-header>
        <section>
            {{ $title }}
        </section>
    <x-footer></x-footer>
    </body>
