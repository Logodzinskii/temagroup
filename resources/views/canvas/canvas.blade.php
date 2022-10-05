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
    <script>
        $(document).ready(function (){
            /**
             *
             * Первоначальная отрисовка модулей кухни по умолчанию
             *
             **/
            start();

            /**
             *
             * Функции для отслеживания позиции мышки и перемещения всех модулей
             *
             **/
            $("#example").on('mousedown', function (e) {

                var coord = getPosition(e).split('|');

                $('.navigationCanvas input[name=zoomTop]').val(parseInt(coord[0]));
                $('.navigationCanvas input[name=zoomRight]').val(parseInt(coord[1]));
                start();
                //alert(getPosition(e));

            });

            function getPosition(e) {
                var x = y = 0;

                if (!e) {
                    var e = window.event;
                }

                if (e.pageX || e.pageY) {
                    x = e.pageX;
                    y = e.pageY;
                } else if (e.clientX || e.clientY) {
                    x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                    y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
                }

                return x + "|" + y;
            }
            /**
             *
             * Отслеживаем значения инпутов для навигации увеличение и смещение
             *
             **/

            $('.navigationCanvas input').on('change', function (){
                start();
            })

            $('input:checkbox').on("click", function () {
                //верхние модули
                start();
            });
            /**
             *
             * Фунции для добавления в таблицу блока модуля
             *
             **/

            $('.add').on('click', function(){
                $('.tableValue').append('<tr><th scope="row"><input type="checkbox" class="checkbox" name="BottleMaker" data-x="200" data-y="90" data-w="60" data-h="60" data-type="top"></th><td>Средний модуль</td><td><input type="number" min="1250" name="length" class="selectBox"></td><td><input type="number" class="countItems" name="count" id="login" placeholder="" value="" ></td><td class="SumBoxPrice SumBoxPrice">0</td></tr>');
                start()
            });


            /**
             *
             * Функции для отрисовки модулей и их позиционирования
             *
             **/

            function start()
            {
                var ma = parseInt($('.navigationCanvas input').val())/10;
                var xa = parseInt($('.navigationCanvas input[name=zoomTop]').val());
                var ya = parseInt($('.navigationCanvas input[name=zoomRight]').val());

                var example = document.getElementById("example"),
                    ctx     = example.getContext('2d');
                    ctx.clearRect(0, 0, 700, 500);


                $('.checkbox:checked').each(function (){

                    var datax= $(this).data('x');
                    var datay= $(this).data('y');
                    var dataw = $(this).data('w');
                    var datah = $(this).data('h');
                    var typeb = $(this).data('type');
                    if( typeb == 'top')
                    {
                        addBox(xa+datax,ya+datay,dataw,datah,'active', ma, 20);
                    }
                    if(typeb == 'boxMiddle')
                    {
                        addBox(xa+datax,ya+datay,dataw,datah,'active', ma, 10);
                    }
                    if(typeb == 'boxDown')
                    {
                        createBoxDown(xa+datax,ya+datay,dataw,datah,'active', ma, 20);
                    }


                });
                $('.checkbox').each(function (){
                    var datax= $(this).data('x');
                    var datay= $(this).data('y');
                    var dataw = $(this).data('w');
                    var datah = $(this).data('h');
                    var typeb = $(this).data('type');
                    if( typeb == 'top')
                    {
                        addBox(xa+datax,ya+datay,dataw,datah,'deactive', ma, 20);
                    }
                    if(typeb == 'boxMiddle')
                    {
                        addBox(xa+datax,ya+datay,dataw,datah,'deactive', ma, 10);
                    }
                    if(typeb == 'boxDown')
                    {
                        createBoxDown(xa+datax,ya+datay,dataw,datah,'deactive', ma, 20);
                    }

                });
                /*верхние модули
                if ($('.checkbox').is(":checked")) {
                    //верхние модули
                    addBox(x+100,y+35,60,80,'active', m, 15);
                }else{
                    //верхние модули
                    addBox(x+100,y+35,60,80,'deactive', m, 15);
                }
                if ($('.checkbox1').is(":checked")) {
                    //антресоли
                    addBox(x+100,y,60,35,'active', m, 15);
                }else{
                    //антресоли
                    addBox(x+100,y,60,35,'deactive', m, 15);
                }
                if ($('.checkbox2').is(":checked")) {
                    //антресоли
                    addBox(x+160,y+15,45,35,'active', m, 15);
                }else{
                    //антресоли
                    addBox(x+160,y+15,45,35,'deactive', m, 15);
                }
                //нижние модули
                createBoxDown(x+80,y+185,60,100,'rgba(222, 194, 124,1)', m, 35);
                createBoxDown(x+140,y+200,60,100,'rgba(222, 194, 124,1)', m, 35);
                //столешница
                addBox(x+80,y+185,120,5,'rgba(105, 105, 105,1)', m, 35);

                 */
            }

            function createBoxDown(x,y,w,h,color,m,g)
            {
                addBox(x+5,y+h-5,w,15,color, m, g-5);
                addBox(x,y,w,h,color, m, g);
            }

            function addBox(xx,yy,ww,hh,color,mashtab,g )
            {
                var $window = $(window);
                var windowsize = $window.width();
                //alert(windowsize);

                var x = xx * mashtab;
                var y = yy * mashtab;
                var w = ww * mashtab;
                var h = hh * mashtab;
                var ang = w/4;
                var angh = g*(mashtab);
                var example = document.getElementById("example"),
                    ctx     = example.getContext('2d');
                var facadescolor = 'rgba(222, 194, 124,1)';
                var boxcolor = "rgba(220, 224, 224, 1)";
                var linecolor = "rgba(0, 0, 0, 0.8)";
                if(color == 'active')
                {
                     facadescolor = "rgba(222, 194, 124,1)";
                     boxcolor = "rgba(220, 224, 224, 1)";
                     linecolor = "rgba(0, 0, 0, 0.8)";
                }else{
                    facadescolor = "rgba(222, 194, 124,0.3)";
                    boxcolor = "rgba(220, 224, 224, 0.3)";
                    linecolor = "rgba(0, 0, 0, 0.3)";
                }

                ctx.strokeStyle = linecolor; // цвет линии
                ctx.beginPath();
                ctx.moveTo(x,y); //0,0
                //фасад
                ctx.lineTo(x+w, y+ang); //100, 25
                ctx.lineTo(x+w, y+ang+h); //100, 100+25+100
                ctx.lineTo(x, y+h); // 0, 100
                ctx.lineTo(x, y); //0,0
                ctx.strokeStyle = linecolor;
                //цвет заливки фигуры
                ctx.fillStyle = facadescolor;
                ctx.fill();
                ctx.closePath();
                ctx.stroke();
                //верхняя часть
                ctx.beginPath();
                ctx.moveTo(x,y); //0,0
                ctx.lineTo(x+angh, y-angh);//20,-20
                ctx.lineTo(x+w+angh, y+ang-angh);//0+100+20, 0+25-20
                ctx.lineTo(x-angh+w+angh, y+ang);
                ctx.strokeStyle = linecolor;
                //цвет заливки фигуры
                ctx.fillStyle = boxcolor;
                ctx.fill();
                ctx.closePath();
                ctx.stroke();
                //правая сторона по часовой стрелке рисуем линии
                ctx.beginPath();
                ctx.moveTo(x+w+angh, y+ang-angh); //
                ctx.lineTo(x+w+angh, y+ang-angh+h);//0+100+20, 0+25-20
                ctx.lineTo(x+w, y+ang+h);//0+100+20, 0+25-20
                ctx.lineTo(x+w, y+ang);
                //цвет заливки фигуры
                ctx.fillStyle = boxcolor;
                ctx.fill();
                ctx.closePath();
                ctx.stroke();
            }
        })


    </script>
    </head>
    <body class="container-fluid p-0 m-0">
        @include('header')
        <section class="col-12 d-flex row flex-wrap">
            <div class="col-6">
                <canvas height='500' width='580' id='example' class="shadow">Обновите браузер</canvas>

                <div class="navigationCanvas d-flex row">
                    <label for="zoom">увеличение<em>*</em></label>
                    <input type="range" min="2" max="10" value="5" name="zoom">
                    <input type="hidden" name="zoomTop" value="200" step="25"/>
                    <input type="hidden" name="zoomRight" value="200" step="25"/>
                </div>
                <div class="add" style="display: block; width: 100px; height: 50px">Добавить</div>
            </div>
            <div class="d-flex col-5">
                <table class="table" id="tab">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Размер</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена<span style="color:red">*</span></th>
                    </tr>
                    </thead>
                    <tbody class="text-center tableValue">
                    <tr>
                        <th scope="row">
                            <input type="checkbox" class="checkbox" name="BottleMaker" data-x="10" data-y="80" data-w="60" data-h="70" data-type="boxMiddle">
                        </th>
                        <td>
                            Средний модуль
                        </td>
                        <td>
                            <input type="number" min="1250" name="length" class="selectBox">
                        </td>
                        <td>
                            <input type="number" class="countItems" name="count" id="login" placeholder="" value="" >
                        </td>
                        <td class="SumBoxPrice SumBoxPrice">
                            0
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <input type="checkbox" class="checkbox" name="BottleMaker" data-x="0" data-y="50" data-w="60" data-h="40" data-type="top">
                        </th>
                        <td>
                            Антресоль
                        </td>
                        <td>
                            <input type="number" min="1250" name="length" class="selectBox" >
                        </td>
                        <td>
                            <input type="number" class="countItems" name="count" id="login" placeholder="" value="" >
                        </td>
                        <td class="SumBoxPrice SumBoxPrice">
                            0
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <input type="checkbox" class="checkbox" name="BottleMaker" data-x="0" data-y="230" data-w="60" data-h="87" data-type="boxDown">
                        </th>
                        <td>
                            Нижний модуль
                        </td>
                        <td>
                            <input type="number" min="1250" name="length" class="selectBox">
                        </td>
                        <td>
                            <input type="number" class="countItems" name="count" id="login" placeholder="" value="" >
                        </td>
                        <td class="SumBoxPrice SumBoxPrice">
                            0
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

        @extends('footer')
    </body>
