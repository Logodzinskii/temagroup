<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description">
        <title>Ваш заказ</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href="{{asset('css/calculate.css')}}">
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script type="text/javascript" src={{ asset('js/owl.carousel.min.js')}}></script>
        <script type="text/javascript" src="{{asset('js/calculate_slider.js')}}"></script>
    </head>
    <body class="container-fluid p-0 m-0">
    <x-header></x-header>
        <section style="min-height: 60vh; margin-top: 20px">
            @foreach($details as $detail)
            <div class="bg-light">
                <h2>Имя и контактный телефон заказчика: {{$detail->name}}</h2>
            </div>
                <div>
                    <h2>email:{{$detail->userEmail}}</h2>
                </div>
                @foreach($parametrs as $param)
                <div>
                    <ul class="list-group">
                        @foreach($param as $p)
                        <li class="list-group-item">
                            {{$p}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
                <div>
                </div>
            @endforeach
        </section>
    <x-footer></x-footer>
    </body>
