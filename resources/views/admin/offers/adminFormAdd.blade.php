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
                <form action="{{url("/admin/offers/edit/")}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                            <td><input type="text" name="category"></td>
                        </tr>
                        <tr>
                            <th scope="row" >2</th>
                            <td>article</td>
                            <td><input type="text" name="article"></td>
                        </tr>
                        <tr>
                            <th scope="row" >3</th>
                            <td>type</td>
                            <td><input type="text" name="type"></td>
                        </tr>
                        <tr>
                            <th scope="row" >4</th>
                            <td>name</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <th scope="row" >5</th>
                            <td>meta_title</td>
                            <td><input type="text" name="meta_title"></td>
                        </tr>
                        <tr>
                            <th scope="row" >6</th>
                            <td>meta_descriptions</td>
                            <td><input type="text" name="meta_descriptions"></td>
                        </tr>
                        <tr>
                            <th scope="row" >7</th>
                            <td>configurations</td>
                            <td><input type="text" name="configurations"></td>
                        </tr>
                        <tr>
                            <th scope="row" >8</th>
                            <td>options</td>
                            <td><input type="text" name="options"></td>
                        </tr>
                        <tr>
                            <th scope="row" >9</th>
                            <td>image</td>
                            <td><input type="file" name="image[]" multiple></td>
                        </tr>
                        <tr>
                            <th scope="row" >10</th>
                            <td>file</td>
                            <td><input type="file" name="file"></td>
                        </tr>
                        <tr>
                            <th scope="row" >11</th>
                            <td>price</td>
                            <td><input type="number" name="price"></td>
                        </tr>
                        <tr>
                            <th scope="row" >12</th>
                            <td>delivery_price</td>
                            <td><input type="number" name="delivery_price"></td>
                        </tr>
                        <tr>
                            <th scope="row" >13</th>
                            <td>delivery_day</td>
                            <td><input type="number" name="delivery_day"></td>
                        </tr>
                        <tr>
                            <th scope="row" >14</th>
                            <td>installation_price</td>
                            <td><input type="number" name="installation_price"></td>
                        </tr>
                        <tr>
                            <th scope="row" >14</th>
                            <td>status</td>
                            <td><input type="number" name="status"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit">отправить</button>
                </form>

        </section>

        @extends('footer')
    </body>
