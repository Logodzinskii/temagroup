<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$complete[0]['meta_descriptions']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$complete[0]['meta_title']}}</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/main.css') }}>
        <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    </head>
    <body class="container-fluid p-0 m-0 row d-flex justify-content-center">
        @include('header')
        <div class="col-10">
            <h1 class="title-section-dark">ГОТОВЫЕ ПРОЕКТЫ</h1>
            <div class="container" >
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-1 g-md-2 g-lg-3">
                                @foreach($complete as $cat)
                                    <div class="owl-item-square text-white " style="position: relative">
                                        <div class="">
                                            <img src="{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                                        </div>
                                        <div class="card-body d-flex row justify-content-center align-items-baseline" style="position: absolute; top:20px; z-index: 1; width:100%; height: 100%">
                                            <p class="card-text fs-5 text-center" style="min-height: 0px; width: 100%"></p>
                                            <div class="d-flex justify-content-center align-items-center" >
                                                <div class="d-flex justify-content-center container align-items-end flex-wrap" style="height: 100%">
                                                    <h2 class="row" style="width: 100%; margin-bottom: 5vh">
                                                        <span class="text-center fs-6">{{$cat['meta_title']}}</span>
                                                    </h2>
                                                    <a href="/catalog/{{$cat['chpu_complite']}}">
                                                       ПОДРОБНЕЕ
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 100%">
                            <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="blackwhite" data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp,moimir"></div>
                        </div>
            </div>
                @extends('footer')
    </body>
