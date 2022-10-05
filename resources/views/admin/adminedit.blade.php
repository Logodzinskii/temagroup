<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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



                    $('.btn').click( function(e){

                        if($(this).attr('href') == 'copy')
                        {
                            var formData =$('#orderForm').serialize();
                            //alert(formData);
                            var _token = $('meta[name="csrf-token"]').attr('content');
                            var nameProject = $(this).parent().parent().children().eq(1).children().val();
                            var nameFacades = $(this).parent().parent().children().eq(2).children().val();
                            var imageFacades = $(this).parent().parent().children().eq(3).children().val();

                            let arr = [];
                            $(this).parent().parent().children().eq(4).children().each(function (){
                                var nameFacades = $(this).children().val();
                                var priceFacades = $(this).children().eq(1).val();
                                var item1 = {
                                    "nameFacades": nameFacades,
                                    'priceFacades': priceFacades
                                }
                                arr.push(item1);
                            })
                            var typeFacades = JSON.stringify(arr);

                            $.ajax({
                                url: "{{ route('add.facades.price') }}",
                                type: 'POST',
                                data: {_token: _token, nameProject: nameProject, nameFacades: nameFacades, imageFacades: imageFacades, typeFacades: typeFacades},
                                success: function (data) {
                                    var row = $('.btn:last').parent().parent().clone(true);
                                    row.insertAfter('.tableValue tr:last');
                                    $('.tableValue tr:last').attr('data-id', data);
                                }
                            });


                        }
                        if($(this).attr('href') == 'copyItem')
                        {
                            $(this).parent().clone(true).insertAfter($(this).parent());
                        }
                        if($(this).attr('href') == 'delete')
                        {
                            var _token = $('meta[name="csrf-token"]').attr('content');
                            var id = $(this).parent().parent().children().data('id');

                            $.ajax({
                                url: "{{ url('delete/facades/price/') }}" +"/id=" + id,
                                type: 'GET',

                                success: function (data) {

                                    $('.tableValue tr:last').remove();
                                }
                            });

                        }
                        if($(this).attr('href') == 'deleteItem')
                        {
                            $(this).parent().remove();
                        }
                        if($(this).attr('href') == 'update')
                        {
                            {
                                var formData =$('#orderForm').serialize();
                                //alert(formData);
                                var _token = $('meta[name="csrf-token"]').attr('content');
                                var nameProject = $(this).parent().parent().children().eq(1).children().val();
                                var nameFacades = $(this).parent().parent().children().eq(2).children().val();
                                var imageFacades = $(this).parent().parent().children().eq(3).children().val();
                                var id = $(this).parent().parent().children().data('id');
                                alert(id);
                                let arr = [];
                                $(this).parent().parent().children().eq(4).children().each(function (){
                                    var nameFacades = $(this).children().val();
                                    var priceFacades = $(this).children().eq(1).val();
                                    var item1 = {
                                        "nameFacades": nameFacades,
                                        'priceFacades': priceFacades
                                    }
                                    arr.push(item1);
                                })
                                var typeFacades = JSON.stringify(arr);

                                $.ajax({
                                    url: "{{ route('update.facades.price') }}",
                                    type: 'POST',
                                    data: {_token: _token, id:id, nameProject: nameProject, nameFacades: nameFacades, imageFacades: imageFacades, typeFacades: typeFacades},
                                    success: function (data) {

                                    }
                                });


                            }
                        }


                        return false;

                    });


                function addRowForTable(e)
                {
                    $('.tableValue').append('<tr><th scope="row"></th><td><input name="nameProject" value=""></td><td><input name="nameFacades" value=""></td><td><input name="imageFacades" value=""></td><td><p><input name="" value=""/> -  <input name="" value=""/><a href="#" class="btn btn-success">V</a><a href="#" class="btn btn-danger">Х</a></p><td><a href="#" class="btn btn-info">Обновить</a><a href="/copy/" class="btn btn-warning">Копировать</a><a href="#" class="btn btn-danger">Удалить</a></td></tr>');
                }
            })
        </script>
    </head>
    <body class="container-fluid p-0 m-0">
        @include('header')
        <section class="p-0 m-0 col-12 d-flex flex-wrap justify-content-start " style="min-height: 80vh">
            <form id="orderForm" class="was-validated" >
                @csrf
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                <table class="table xs-auto tableValue" >
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Тип изделия</th>
                        <th scope="col" class="d-none d-lg-block">Модель</th>
                        <th scope="col">Фасад</th>
                        <th scope="col" class="d-none d-lg-block">Тип</th>
                        <th scope="col">Редактировать</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div style="display: none">{{$i=1}}</div>
                    @foreach( $facades as $item)
                        <tr>
                            <th scope="row" data-id="{{$item['id']}}">{{$i++}}</th>
                            <td><input name="nameProject" value="{{$item['nameProject']}}"></td>
                            <td><input name="nameFacades" value="{{$item['nameFacades']}}"></td>
                            <td><input name="imageFacades" value="{{$item['imageFacades']}}"></td>
                            <td>
                                @foreach(json_decode($item['typeFacades'],true) as $type)
                                    <p><input name="" value="{{$type['nameFacades']}}"/> <input name="" value="{{$type['priceFacades']}}"/><a href="copyItem" class="btn btn-success">V</a><a href="deleteItem" class="btn btn-danger">Х</a></p>
                                @endforeach
                            </td>
                            <td><a href="update" class="btn btn-info">Обновить</a><a href="copy" class="btn btn-warning" >Копировать</a><a href="delete" class="btn btn-danger">Удалить</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </section>

        @extends('footer')
    </body>
