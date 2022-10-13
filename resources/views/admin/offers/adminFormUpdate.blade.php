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
    </head>
    <body class="container-fluid p-0 m-0">
        @include('header')
        <section class="p-0 m-0 col-12 d-flex flex-wrap justify-content-start " style="min-height: 80vh">
                <form action="{{url("/admin/offers/edit/")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put" />
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <table class="table xs-auto tableValue" >
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Название</th>
                            <th scope="col">Значение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" >1</th>
                            <td>category</td>
                            <td><input type="text" name="category" value="{{$catalog[0]['category']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >2</th>
                            <td>article</td>
                            <td><input type="text" name="article" value="{{$catalog[0]['article']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >3</th>
                            <td>type</td>
                            <td><input type="text" name="type" value="{{$catalog[0]['type']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >4</th>
                            <td>name</td>
                            <td><input type="text" name="name" value="{{$catalog[0]['name']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >5</th>
                            <td>meta_title</td>
                            <td><input type="text" name="meta_title" value="{{$catalog[0]['meta_title']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >6</th>
                            <td>meta_descriptions</td>
                            <td><input type="text" name="meta_descriptions" value="{{$catalog[0]['meta_descriptions']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >7</th>
                            <td>configurations</td>
                            <td><textarea name="configurations">{{$catalog[0]['configurations']}}</textarea></td>
                        </tr>
                        <tr>
                            <th scope="row" >8</th>
                            <td>options</td>
                            <td><textarea name="options">{{$catalog[0]['options']}}</textarea></td>
                        </tr>
                        <tr>
                            <th scope="row" >9</th>
                            <td>image</td>
                            <td><input type="file" name="image[]" multiple></td>
                        </tr>
                        <tr>
                            <th scope="row" >10</th>
                            <td>file</td>
                            <td><input type="file" name="file" ></td>
                        </tr>
                        <tr>
                            <th scope="row" >11</th>
                            <td>price</td>
                            <td><input type="number" name="price" value="{{$catalog[0]['price']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >12</th>
                            <td>delivery_price</td>
                            <td><input type="number" name="delivery_price" value="{{$catalog[0]['delivery_price']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >13</th>
                            <td>delivery_day</td>
                            <td><input type="number" name="delivery_day" value="{{$catalog[0]['delivery_day']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >14</th>
                            <td>installation_price</td>
                            <td><input type="number" name="installation_price" value="{{$catalog[0]['installation_price']}}"></td>
                        </tr>
                        <tr>
                            <th scope="row" >15</th>
                            <td>status</td>
                            <td><input type="number" name="status" value="{{$catalog[0]['status']}}"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit">Обновить</button>
                </form>

        </section>

        @extends('footer')
    </body>
