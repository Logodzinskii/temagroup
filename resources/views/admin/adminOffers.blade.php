<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <META NAME="description">
        <title>Мебель на заказ</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href="{{asset('css/calculate.css')}}">
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script type="text/javascript" src={{ asset('js/owl.carousel.min.js')}}></script>
        <script type="text/javascript" src="{{asset('js/calculate_slider.js')}}"></script>
        <script>
            $(document).ready(function (){
                $('.update').click( function(e){
                    e.preventDefault();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    var article = $(this).data('article');

                    $.ajax({
                        url: "{{ url('/admin/offers/edit/') }}",
                        type: 'PUT',
                        dataType: "JSON",
                        data: {
                            "_token": _token,
                            "article": article,
                        },
                        success: function (data) {

                        }
                    });
                })
                    $('.delete').click( function(e){
                            e.preventDefault();
                            var _token = $('meta[name="csrf-token"]').attr('content');
                            var id = $(this).data('id');

                            $.ajax({
                                url: "{{ url('/admin/offers/edit/') }}",
                                type: 'DELETE',
                                dataType: "JSON",
                                data: {
                                    "_token": _token,
                                    "id": id
                                },
                                success: function (data) {
                                    $('.tableValue tr:last').remove();
                                }
                            });
                        })
            })
        </script>
    </head>
    <body class="container-fluid p-0 m-0">
        @include('header')
        <section class="p-0 m-0 col-12 d-flex flex-wrap justify-content-start " style="min-height: 80vh">

                <table class="table xs-auto tableValue" >
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Артикул</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>@foreach( $offers as $offer)
                        <tr>
                            <th scope="row" ></th>
                            <td>{{$offer['category']}}</td>
                            <td>{{$offer['name']}}</td>
                            <td><a href="/admin/offer/add/{{{$offer['article']}}}">{{$offer['article']}}</a></td>
                            <td>{{$offer['price']}}</td>
                            <td>{{$offer['status']}}</td>
                            <td><a href="" class="delete" data-id="{{$offer['id']}}">Удалить</a> </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        <a href="/admin/offer/add/">Добавить новый товар</a>
        </section>

        @extends('footer')
    </body>
