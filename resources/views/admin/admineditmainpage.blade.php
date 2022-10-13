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



                    $('.btn').click( function(e){
                    e.preventDefault();
                        if($(this).attr('href') == 'copy')
                        {

                            /*var _token = $('meta[name="csrf-token"]').attr('content');

                            var rout_name =         $(this).parent().parent().children().eq(2).children().eq(0).val();
                            var name =              $(this).parent().parent().children().eq(2).children().eq(1).val();
                            var meta_name =         $(this).parent().parent().children().eq(2).children().eq(2).val();
                            var meta_descriptions = $(this).parent().parent().children().eq(2).children().eq(3).val();
                            var view =              $(this).parent().parent().children().eq(2).children().eq(4).val();
                            var tag =               $(this).parent().parent().children().eq(2).children().eq(5).val();
                            var page_status =       $(this).parent().parent().children().eq(2).children().eq(6).val();
                            var formData = new FormData();
                            formData.append('file', $(this).parent().parent().children().eq(4).children().eq(0).files[0]);
                            let arr = [];
                            $(this).parent().parent().children().eq(3).children().each(function (){
                                var tag_name = $(this).children().val();
                                var tag_content = $(this).children().eq(1).val();
                                var item1 = {
                                    "tag_name": tag_name,
                                    'tag_content': tag_content
                                }

                                arr.push(item1);

                            })

                            var tag_content = JSON.stringify(arr);*/

                            var formData =$(this).parent().parent().children().eq(0).serialize();

                            $.ajax({
                                url: "{{ url('/admin/content/edit/') }}",
                                type: 'POST',
                                cache: false,
                                dataType    : 'json',
                                contentType: false,
                                processData: false,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: formData,
                                success: function (data) {
                                    alert(data);
                                    var row = $('.btn:last').parent().parent().clone(true);
                                    row.insertAfter('.tableValue tr:last');
                                    $('.tableValue tr:last').children().eq(5).children().attr('data-id', data);
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
                                url: "{{ url('/admin/content/edit/') }}",
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
                        <th scope="col">Страница</th>
                        <th scope="col" class="d-none d-lg-block">Контент</th>
                        <th scope="col">Фасад</th>
                        <th scope="col" class="d-none d-lg-block">Тип</th>
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

                            <th scope="row" data-id=""></th>
                            <td>{{$page['meta_descriptions']}}</td>
                            <td>
                                <input type="hidden" name="rout_name"           value="{{$page['rout_name']}}"/>
                                <input type="hidden" name="name"                value="{{$page['name']}}"/>
                                <input type="hidden" name="meta_name"           value="{{$page['meta_name']}}"/>
                                <input type="hidden" name="meta_descriptions"   value="{{$page['meta_descriptions']}}"/>
                                <input type="hidden" name="view"                value="{{$page['view']}}"/>
                                <input type="text"   name="tag"                 value="{{$page['tag']}}">
                                <input type="hidden" name="page_status"         value="{{$page['page_status']}}"/>
                                <input type="file" name="file" />
                            </td>
                            <td>
                                @if(is_array(json_decode($page['tag_content'], true)))
                                    @foreach(json_decode($page['tag_content'], true) as $item)
                                        <p>
                                            @if($item['tag_name'] == 'img')
                                                <input type="hidden" name="" value="{{$item['tag_name']}}"/>
                                                <input type="file" name="images" value="{{$item['tag_content']}}"/>
                                                <img src="{{asset($item['tag_content'])}}" width="50" height="50">
                                            @else
                                                <input type="text" name="" value="{{$item['tag_name']}}"/>
                                                <input type="text" name="" value="{{$item['tag_content']}}"/>
                                            @endif
                                            <a href="copyItem" class="btn btn-warning" title="Копировать">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                                    <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z"/>
                                                </svg>
                                            </a>

                                            <a href="deleteItem" class="btn btn-danger" title="Удалить">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                                                    <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
                                                </svg>
                                            </a>
                                        </p>
                                    @endforeach
                                @else
                                    <input name="nameFacades" value="{{$page['tag_content']}}"></td>
                                @endif
                            <td>

                                <img src="{{asset($page['meta_name'])}}" width="50" height="50">
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
