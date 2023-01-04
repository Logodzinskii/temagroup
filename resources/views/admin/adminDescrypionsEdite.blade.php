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
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script type="text/javascript" src={{ asset('js/owl.carousel.min.js')}}></script>
        <script type="text/javascript" src="{{asset('js/calculate_slider.js')}}"></script>
        <script>
            $(document).ready(function (){



                    $('.btn').click( function(e){
                    e.preventDefault();
                        if($(this).attr('href') == 'copy')
                        {

                            var _token =        $('meta[name="csrf-token"]').attr('content');
                            var page =          '1';
                            var title =         '1';
                            var descryption =   '1';
                            var h1 =            '1';

                            $.ajax({
                                url: "{{ route('create.descryption.page') }}",
                                type: 'POST',
                                data: {_token: _token, page: page, title: title, descryption: descryption, h1: h1},
                                success: function (data) {
                                    alert('done');

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
                            var id = $(this).data('id');
                            alert(id);
                            $.ajax({
                                url: "{{ url('/admin/content/delete/') }}",
                                type: 'DELETE',
                                dataType: "JSON",
                                data: {
                                    "_token": _token,
                                    "id": id
                                },
                                success: function (data) {
                                    //alert(data);
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

                                var _token =        $('meta[name="csrf-token"]').attr('content');
                                var id =            $(this).parent().parent().find(':input[name="id"]').val();
                                var page =          $(this).parent().parent().find(':input[name="page"]').val();
                                var title =         $(this).parent().parent().find(':input[name="title"]').val();
                                var descryption =   $(this).parent().parent().find(':input[name="descryption"]').val();
                                var h1 =            $(this).parent().parent().find(':input[name="h1"]').val();

                                $.ajax({
                                    url: "{{ route('update.descryption.page') }}",
                                    type: 'PUT',
                                    data: {_token: _token, id:id, page: page, title: title, descryption: descryption, h1: h1},
                                    success: function (data) {
                                        alert('done');
                                    }
                                });
                            }
                        }
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

                <table class="table xs-auto tableValue" >
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Страница/Title</th>
                        <th scope="col" class="d-none d-lg-block">Descryptions</th>
                        <th scope="col">h1</th>
                        <th scope="col" class="d-none d-lg-block">Content P</th>
                        <th scope="col">Редактировать</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div style="display: none"></div>

                    @foreach( $pagesContent as $page)

                        <tr>
                            <form  class="was-validated" enctype="multipart/form-data" name="1" method="post" action="/admin/content/edit/">
                                @csrf
                                <input type="hidden" id="_token" value="{{ csrf_token() }}">

                                <th scope="row" data-id="{{$page['id']}}"></th>
                                <td class="row">
                                    <input type="hidden" name="id" value="{{$page['id']}}">
                                    <input type="text" name="page" value="{{$page['page']}}" />
                                    <input type="text" name="title" value="{{$page['title']}}" />
                                </td>
                                <td>
                                    <textarea cols="15" rows="5" name="descryption" placeholder="">{{$page['descryption']}}</textarea>
                                </td>
                                <td>
                                    <input type="text" name="h1" value="{{$page['h1']}}" />
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a href="update" class="btn btn-info" data-id="{{$page['id']}}" title="Обновить">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                                            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5Zm6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                                        </svg>
                                    </a>
                                    <a href="copy" class="btn btn-warning" data-id="{{$page['id']}}" title="Копировать">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z"/>
                                        </svg>
                                    </a>
                                    <a href="delete" class="btn btn-danger" data-id="{{$page['id']}}" title="Удалить">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
                                        </svg>
                                    </a>
                                </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

        </section>

        @extends('footer')
    </body>
