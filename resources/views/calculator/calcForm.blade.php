<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <META NAME="description" content="Узнай размеры кухонного гарнитура на сайте в калькуляторе. Сделай заказ кухни.">
        <title>Размеры кухонного гарнитура</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/calcv2.css') }}>
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(90538515, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/90538515" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('input[name=firstname]').bind('input',function(){

                if($(this).val().match(/[А-Яа-яЁё]/) !== null )
                {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display','none').text('');
                    $(this).attr('data-valid', 1);
                }else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display','block').text('Введите имя и фамилию на русском языке');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })

            $('input[name=email]').bind('input',function()
            {
                if($(this).val().match(/\w+@\w+\.\w+/) !== null )
                {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display','none').text('')
                    $(this).attr('data-valid', 1);

                }else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display','block').text('Введите email в формате: example@mail.ru');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })
            $('input[name=tel]').bind('input',function()
            {
                if($(this).val().match(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/) !== null )
                {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display','none').text('');
                    $(this).attr('data-valid', 1);

                }else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display','block').text('Введите телефон +79XX-XXX-XX-XX');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })
            function ch(){
                var sumValid = 0;

                $('.form-control').each(function(){

                    sumValid += parseInt($(this).attr('data-valid'));

                })

                if(sumValid >= 3 ){
                    $(".btn-submit").prop('disabled',false);
                }else{
                    $(".btn-submit").prop('disabled',true);
                }

                console.log(sumValid);
            }


            $("#orderForm input:radio:first").attr('checked', true);

            $('.close').on('click', function(){
                $('.modal').hide();
            })

            $(".btn-submit").click(function (e) {
                var sum = $('.sum').text();
                if(sum === '00')
                {
                    $('.summError').text('Вы не выбрали конфигурацию кухни');
                    return false;
                }else{
                    $('.summError').text('');
                    var formData =$('#orderForm').serialize();

                    $.ajax({
                        url: "{{ route('order.user.store') }}",
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            $('.modal').show();
                            $('.result').addClass('bg-success').text('Мы приняли вашу заявку, свяжемся с вами в ближайшее время');
                        }
                    });
                }
                e.preventDefault();
            });
            $('input[name="facadesPrice"]').on('change', function (){
                //alert($(this).val());
                $('.tableValue input:checked').each(function (){
                    var length = $(this).parent().parent().children().eq(2).children().val();
                    var count = $(this).parent().parent().children().eq(3).children().val();
                    var nameBox = $(this).parent().parent().children().eq(0).children().last().attr('name');
                    var facadesPrice = $('input[name="facadesPrice"]:checked').val();
                    sendAjax(length, count, nameBox, facadesPrice);
                });
            });
            $('.selectBox').on('change', function(){
                var length = $(this).val();
                var count = $(this).parent().parent().children().eq(3).children().val();
                var nameBox = $(this).parent().parent().children().eq(0).children().last().attr('name');
                var facadesPrice = $('input[name="facadesPrice"]:checked').val();
                sendAjax(length, count, nameBox, facadesPrice);
            })
            $('.countItems').on("change", function () {
                var count = $(this).val();
                var length = $(this).parent().parent().children().eq(2).children().val();
                var nameBox = $(this).parent().parent().children().eq(0).children().last().attr('name');
                var facadesPrice = $('input[name="facadesPrice"]:checked').val();
                sendAjax(length, count, nameBox, facadesPrice);
            })
            function sendAjax(lengthBox, countBox, typeBox, facadesPrice){
                var _token = $('meta[name="csrf-token"]').attr('content');
                var length = lengthBox;
                var count = countBox;
                var type = typeBox;
                var facades = facadesPrice;
                $.ajax({
                    url: "{{ route('ajax.data.resp') }}",
                    type: 'POST',
                        data: {_token: _token, length: length, count: count, type: type, facadesPrice: facades},
                    success: function (data) {
                        $('.SumBoxPrice'+ type).text(data);
                        sumTotal();
                        start();
                    }
                });
            }

            function sumTotal()
            {
                var sum = 0;
                var sumCount = 0;
                var sumLength = 0;
                $('.SumBoxPrice').each(function() {
                    sum += Number($(this).text());
                });
                $('.countItems').each(function() {
                    sumCount += Number($(this).val());
                });
                $('.selectBox').each(function() {

                    if($(this).parent().parent().children().children().is(':checked') && $(this).attr('name').indexOf('BoxTop') < 0 && $(this).attr('name').indexOf('BoxMiddle') <0 && $(this).attr('name').indexOf('StolBoxTop') <0 && $(this).attr('name').indexOf('BoxApronsTop') <0 && $(this).attr('name').indexOf('BoxDown') < 0 && $(this).attr('name').indexOf('BoxDownFf') <0 ){

                        var c = $(this).parent().parent().children().eq(3).children().val();
                        var l = $(this).val();
                        sumLength += Number(l*c);
                    }
                });

                $(".sum").text(sum);
                $(".sumForm").val(sum);
                $(".summError").text('');
                $('.sumCount').text(sumCount);
                $('.sumLength').text(sumLength);

            }

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

                var target = this.getBoundingClientRect();
                var x = e.clientX - target.left;
                var y = e.clientY - target.top;

                //$('.navigationCanvas input[name=zoomTop]').val(x);
                //$('.navigationCanvas input[name=zoomRight]').val(y);
                //start();
                //alert(getPosition(e));

            });

            /**
             *
             * Отслеживаем значения инпутов для навигации увеличение и смещение
             *
             **/

            $('.navigationCanvas input').on('change', function (){
                start();
            })
            $('.result input:checkbox:eq(0)').on("click", function () {

                var kitchenprice = parseInt($(".canvasSum").text());
                var sborka = 0;
                if(kitchenprice >0 )
                {
                    if ($(this).is(":checked"))
                    {
                        if($('.result input:checkbox:eq(1)').is(":checked"))
                        {
                            sborka = parseInt($(".canvasSum").text()) * 0.12;
                        }

                        var sum = parseInt($(".canvasSum").text());
                        $(".sum:eq(1)").text(sum + 5000 + sborka);
                        $(".sum:eq(0)").val(5000);
                    }else {
                        var sum = parseInt($(".sum:eq(1)").text());
                        $(".sum:eq(1)").text(sum - 5000 - sborka);
                        $(".sum:eq(0)").val(0);
                    }
                }

            });
            $('.result input:checkbox:eq(1)').on("click", function () {

                var kitchenprice = parseInt($(".canvasSum").text());
                var dostavka = 0;
                if(kitchenprice >0 )
                {
                    if ($(this).is(":checked"))
                    {

                        if($('.result input:checkbox:eq(0)').is(":checked"))
                        {
                            dostavka = 5000;
                        }
                        var sum = parseInt($(".canvasSum").text());

                        $(".sum:eq(1)").text(sum + (kitchenprice * 0.12) + dostavka);
                        $(".sum:eq(1)").val(kitchenprice);
                    }else {
                        var sum = parseInt($(".sum:eq(1)").text());

                        $(".sum:eq(1)").text(sum - (kitchenprice * 0.12) - dostavka);
                        $(".sum:eq(1)").val(0);
                    }
                }

            });
            $('.calc_container input:checkbox').on("click", function () {

                if(parseInt($(this).parent().parent().children().eq(3).children().val()) === 0)
                {
                    $(this).parent().parent().children().eq(3).children().val(1);
                    var length = $(this).parent().parent().children().eq(2).children().val();
                    var count = $(this).parent().parent().children().eq(3).children().val();
                    var nameBox = $(this).parent().parent().children().eq(0).children().last().attr('name');
                    var facadesPrice = $('input[name="facadesPrice"]:checked').val();
                    sendAjax(length, count, nameBox, facadesPrice);
                }


                if ($(this).is(":checked")) {
                    var  attr = $(this).parent().parent().children().children().eq(2);

                    if(!$(this).parent().parent().children().children().eq(2).length > 0)
                    {
                        //alert($(this).parent().parent().children().children().eq(2).length);
                        $(this).parent().parent().children().eq(3).children().attr('disabled', false);
                    }else {
                        $(this).parent().parent().children().children().eq(2).attr('disabled', false);
                        $(this).parent().parent().children().eq(2).children().attr('disabled', false);
                    }

                    var price = $(this).data('price');
                    var count = $(this).parent().parent().children().eq(3).children().val();
                    //$(this).parent().parent().children().eq(4).text(parseInt(price) * parseInt(count));


                    var sum = 0;
                    $('.SumBoxPrice').each(function() {
                        sum += Number($(this).text());
                    });
                    $(".sum").text(sum);
                } else {
                    // checkbox unchecked
                    if(!$(this).parent().parent().children().children().eq(2).length > 0)
                    {
                        //alert($(this).parent().parent().children().children().eq(2).length);
                        $(this).parent().parent().children().eq(3).children().attr('disabled', true);
                        $(this).parent().parent().children().eq(3).children().val(0);
                        $(this).parent().parent().children().eq(4).text(0);
                    }else {
                        $(this).parent().parent().children().eq(2).children().attr('disabled', true);
                        $(this).parent().parent().children().children().eq(2).attr('disabled', true);
                        $(this).parent().parent().children().children().eq(2).val(0);
                        $(this).parent().parent().children().eq(4).text(0);
                    }

                    $(this).parent().parent().children().children().eq(2).attr('disabled', true);
                    $(this).parent().parent().children().eq(2).children().attr('disabled', true);
                    //$(this).parent().parent().children().eq(4).text(0);


                    var sum = 0;
                    $('.SumBoxPrice').each(function() {
                        sum += Number($(this).text());
                    });
                    $(".sum").text(sum);


                }
                $('.result input:checkbox').prop('checked',false);
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

            $('.coord').on('change',function(){
                //alert($(this).val());
                $(this).parent().parent().children().eq(0).children().attr('data-x', $(this).val());
                start();
            });

            $('table').on('click', '.move-up', function () {
                var thisRow = $(this).closest('tr');
                var prevRow = thisRow.prev();

                var xThis = thisRow.children().eq(5).children().eq(0).val();
                var yThis = thisRow.children().eq(5).children().eq(1).val();
                var wThis = thisRow.children().eq(2).children().val();
                var xprev = prevRow.children().eq(5).children().eq(0).val();
                var yprev = prevRow.children().eq(5).children().eq(1).val();
                var wprev = prevRow.children().eq(2).children().val();

                var closestBoxX = xprev;
                var closestBoxY = yprev;
                /**
                 * Установлю текущей строке значения х,у соседней строки
                 * */
                thisRow.children().eq(5).children().eq(0).val(closestBoxX);
                thisRow.children().eq(5).children().eq(1).val(closestBoxY);
                /**
                 * Установлю заменяемой строке значения х,у текущей строки
                 * */
                prevRow.children().eq(5).children().eq(0).val(parseInt(xThis)+((wThis/10)-(wprev/10)));
                prevRow.children().eq(5).children().eq(1).val(yThis - ((wprev/10)/4));

                if (prevRow.length) {
                    prevRow.before(thisRow);
                }
                start();
            });

            $('table').on('click', '.move-down', function () {
                var thisRow = $(this).closest('tr');
                var nextRow = thisRow.next();

                var xThis = thisRow.children().eq(5).children().eq(0).val();
                var yThis = thisRow.children().eq(5).children().eq(1).val();
                var wThis = thisRow.children().eq(2).children().val();
                var xNext = nextRow.children().eq(5).children().eq(0).val();
                var yNext = nextRow.children().eq(5).children().eq(1).val();
                var wNext = nextRow.children().eq(2).children().val();

                var closestBoxX = nextRow.next().children().eq(0).children().data('x');
                var closestBoxY = nextRow.next().children().eq(0).children().data('y');
                /**
                 * Установлю текущей строке значения х,у соседней строки
                 * */
                thisRow.children().eq(5).children().eq(0).val(closestBoxX-(wThis/10));
                thisRow.children().eq(5).children().eq(1).val(closestBoxY - ((wThis/10)/4));
                /**
                 * Установлю заменяемой строке значения х,у текущей строки
                 * */
                nextRow.children().eq(5).children().eq(0).val(xThis);
                nextRow.children().eq(5).children().eq(1).val(yThis);

                if (nextRow.length) {
                    nextRow.after(thisRow);
                }
                start();
            });

            $('table').on('click', '.copy', function () {
                $(this).parent().parent().parent().clone(true).insertAfter($(this).parent().parent().parent());
            });
            $('table').on('click', '.delete', function () {
                $(this).parent().parent().parent().remove();
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
                //размеры
                ctx.beginPath();
                ctx.fillStyle = 'rgba(0,0,0,1)';
                ctx.font = '18px vardana';
                ctx.fillText('Расчетная стоимость - ' + $(".canvasSum" ).text() + ' руб', 100,30);
                ctx.fillText('Расчетная длинна кухни - ' + $(".sumLength").text() + ' мм', 100,50);
                //ctx.fillText('Общее количество модулей - ' + $(".sumCount").text() + ' мм', 100,70);
                ctx.closePath();
                ctx.stroke();
                var kitchenLength = 0;
                $('.checkbox').each(function (){
                    var inputWidth = $(this).parent().parent().children().eq(2).children().val();

                    var datay= $(this).data('y');
                    var datax= $(this).data('x');
                    if($(this).parent().parent().children().eq(5).length){
                        var dataxadmin = $(this).parent().parent().children().eq(5).children().eq(0).val();
                        var datayadmin = $(this).parent().parent().children().eq(5).children().eq(1).val();


                        if (dataxadmin !== datax || datayadmin !== datay){
                            datax = dataxadmin;
                            datay = datayadmin;
                        }
                    }

                    var dataw = $(this).data('w');
                    var datah = $(this).data('h');
                    var datag = $(this).data('g');
                    var typeb = $(this).data('type');


                    //$(this).parent().parent().children().eq(2).children().val(kitchenLength);
                    if($(this).is(':checked')){
                        if( typeb == 'BoxTop' || typeb == 'BoxMiddle' || typeb == 'StolBoxTop' || typeb == 'BoxApronsTop')
                        {
                            $(this).parent().parent().children().eq(2).children().val($('.sumLength').attr('data-kitchenLens'));
                            addBox(xa+datax,ya+datay,dataw,datah,'active', ma, datag);

                        }
                        if(typeb == 'BoxOven' || typeb == 'BottleMaker' || typeb == 'BoxShelves' || typeb == 'BoxDishwasher' || typeb == 'BoxWashing' || typeb == 'PenalFridge' || typeb == 'PenalMicrowave' || typeb == 'PenalShelves')
                        {

                            kitchenLength += Number(($(this).parent().parent().children().eq(2).children().val()) * ($(this).parent().parent().children().eq(3).children().val()));

                            $('.sumLength').attr('data-kitchenLens', kitchenLength);

                            if(typeb == 'PenalFridge' || typeb == 'PenalMicrowave' || typeb == 'PenalShelves')
                            {
                                createBoxAntresole(xa+datax,ya+datay,dataw,datah,'active', ma, datag)
                            }else{
                                createBoxDown(xa+datax,ya+datay,dataw,datah,'active', ma, datag);
                            }
                            if(typeb == 'BoxShelves')
                            {
                                createBoxBoxShelves(xa+datax,ya+datay,dataw,datah,'active', ma, datag)
                            }
                        }

                    }else{
                        if( typeb == 'BoxTop' || typeb == 'BoxMiddle' || typeb == 'StolBoxTop' || typeb == 'BoxApronsTop')
                        {

                            //var count = $(this).parent().parent().children().eq(3).children().val(1);
                            //count.attr();
                            $(this).parent().parent().children().eq(2).children().attr('type','hidden');
                            $(this).parent().parent().children().eq(2).children().val($('.sumLength').attr('data-kitchenLens'));

                            addBox(xa+datax,ya+datay,dataw,datah,'deactive', ma, datag);
                        }
                        if(typeb == 'BoxOven' || typeb == 'BottleMaker' || typeb == 'BoxShelves' || typeb == 'BoxDishwasher' || typeb == 'BoxWashing' || typeb == 'PenalFridge' || typeb == 'PenalMicrowave' || typeb == 'PenalShelves')
                        {
                            if(typeb == 'PenalFridge' || typeb == 'PenalMicrowave' || typeb == 'PenalShelves')
                            {
                                createBoxAntresole(xa+datax,ya+datay,dataw,datah,'deactive', ma, datag)
                            }else{
                                createBoxDown(xa+datax,ya+datay,dataw,datah,'deactive', ma, datag);
                            }
                            if(typeb == 'BoxShelves')
                            {
                                createBoxBoxShelves(xa+datax,ya+datay,dataw,datah,'deactive', ma, datag)
                            }
                        }

                    }

                });

            }
            function createBoxBoxShelves(x,y,w,h,color,m,g)
            {
                createBoxDown(x,y,w,h,color,m,g);
                addBox(x,y,w,h-47,color, m, g);
                addBox(x,y,w,h-67,color, m, g);

            }

            function createBoxAntresole(x,y,w,h,color,m,g)
            {
                createBoxDown(x,y,w,h,color,m,g);
                addBox(x,y,w,h-87,color, m, g);
                addBox(x,y,w,h-267,color, m, g);

            }

            function createBoxDown(x,y,w,h,color,m,g)
            {
                addBox(x+5,y+h-5,w,15,color, m, g-5);
                addBox(x,y,w,h,color, m, g);
            }

            function addBox(xx,yy,ww,hh,color,mashtab,g )
            {
                var x = xx * mashtab;
                var y = yy * mashtab;
                var w = ww * mashtab;
                var h = hh * mashtab;
                var ang = w/4;
                var angh = g*(mashtab);
                var example = document.getElementById("example"),
                    ctx     = example.getContext('2d');

                var facadescolor = '';
                var boxcolor = "";
                var linecolor = "";
                var textcolor = "";
                if(color == 'active')
                {

                    facadescolor = "rgba(222, 194, 124,1)";
                    boxcolor = "rgba(255, 255, 255, 1)";
                    linecolor = "rgba(0, 0, 0, 1)";
                    textcolor = "green";
                }else{
                    facadescolor = "rgba(255, 255, 255,1)";
                    boxcolor = "rgba(255, 255, 255, 1)";
                    linecolor = "rgba(0, 0, 0, 1)";
                    textcolor = "rgba(0,0,0,1)";
                }
                //левая сторона
                ctx.beginPath();
                ctx.setLineDash([2, 2]);
                ctx.moveTo(x,y); //0,0
                ctx.lineTo(x+angh, y-angh);//20,-20
                ctx.lineTo(x+angh, y-angh+h);//20,-20
                ctx.lineTo(x, y+h);//20,-20
                //цвет заливки фигуры
                ctx.fillStyle = boxcolor;
                ctx.fill();
                ctx.closePath();
                ctx.stroke();
                //задняя сторона
                ctx.beginPath();
                ctx.moveTo(x+angh, y-angh); //0,0
                ctx.lineTo(x+angh+w, y-angh+ang);//20,-20
                ctx.lineTo(x+angh+w, y-angh+ang+h);//20,-20
                ctx.lineTo(x+angh, y+h-angh);//20,-20
                //цвет заливки фигуры
                //ctx.fillStyle = boxcolor;
                //ctx.fill();
                ctx.closePath();
                ctx.stroke();
                //фасад
                ctx.strokeStyle = linecolor; // цвет линии
                ctx.beginPath();
                ctx.setLineDash([]);
                ctx.moveTo(x,y); //0,0
                ctx.lineTo(x, y); //0, 0
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
                ctx.setLineDash([]);
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
                ctx.setLineDash([]);
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
    <x-header></x-header>
        <form id="orderForm">
            @csrf
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <section class="calc_container d-flex row col-lg-12 justify-content-around flex-wrap m-0">
                <div class="col-lg-6 col-12 row justify-content-center">
                    <canvas height='500' width='580' id='example' class="card">Обновите браузер</canvas>

                    <div class="navigationCanvas d-flex row card">
                        <label for="zoom">увеличение<em>*</em></label>
                        <input type="range" min="2" max="10" value="5" name="zoom">
                        <input type="range" name="zoomTop" value="0" min="-500" max="500" value="25"/>
                        <input type="range" name="zoomRight" value="0" min="-500" max="700" value="25"/>

                        <div class="d-flex row-cols-3 flex-wrap">
                            @foreach($facades as $facade)
                                <div class="col colorFacades">
                                    <h5>{{$facade['nameFacades']}}</h5>
                                    <img src="{{asset($facade['imageFacades'])}}" height="80" width="60" />
                                    @foreach(json_decode($facade['typeFacades'], true) as $type)
                                        <div>
                                            <input type="radio" name="facadesPrice" value="{{$type['priceFacades']}}" data-color="{{$facade['colorFacades']}}"/>
                                            <label name="facadesPrice">{{$type['nameFacades']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-around row col-lg-5 col-xs-12 col-md-12 parametrs card">
                        <table class="table p-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Размер</th>
                                <th scope="col">Количество</th>
                                <th scope="col">Цена<span style="color:red">*</span></th>
                                @guest
                                @else
                                @if(Auth::user()->status == 'admin')
                                <th scope="col">x</th>
                                <th scope="col">y</th>
                                @endif
                                @endguest
                            </tr>
                            </thead>
                            <tbody class="text-center tableValue">
                            @foreach( $items as $item)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" class="checkbox" name="{{$item['nameClassBox']}}" data-price="{{$item['price']}}" data-x="{{$item['x']}}" data-y="{{$item['y']}}" data-w="{{$item['w']}}" data-h="{{$item['h']}}" data-g="{{$item['g']}}" data-type="{{$item['nameClassBox']}}">

                                    </th>
                                    <td>
                                        {{$item['nameBoxBottom']}}

                                    </td>
                                    <td>
                                        @if(count(json_decode($item['defaultLen']),true) == 0 )
                                            <input type="number" min="1250" name="length{{$item['nameClassBox']}}" class="selectBox" placeholder="{{$item['placeholder']}}" disabled>
                                        @else
                                            <select class="selectBox" name="length{{$item['nameClassBox']}}" disabled>
                                                @foreach(json_decode($item['defaultLen'],true) as $len)
                                                    <option value="{{$len}}">{{$len}} мм</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="number" class="countItems" name="count{{$item['nameClassBox']}}" id="login" placeholder="{{$item['placeholder']}}" value="{{$item['defaultNum']}}" disabled>
                                    </td>
                                    <td class="SumBoxPrice{{$item['nameClassBox']}} SumBoxPrice">
                                        0
                                    </td>
                                    @guest
                                    @else
                                        @if(Auth::user()->status == 'admin')
                                        <td>
                                            <input type="number" class="coord" name="count{{$item['nameClassBox']}}" placeholder="{{$item['placeholder']}}" value="{{$item['x']}}" step="1">

                                            <input type="number" class="coord" name="count{{$item['nameClassBox']}}" placeholder="{{$item['placeholder']}}" value="{{$item['y']}}" step="1">

                                        </td>
                                        <td class="d-flex row p-0 m-0" style="width: 100px;">
                                                <div>
                                                    <span class="move-up btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                </span>
                                                    <span class="copy btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                                </svg>
                                                </span>
                                                </div>
                                                <div>
                                                    <span class="move-down btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                                                </svg>
                                                </span>
                                                    <span class="delete btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                                </span>
                                                </div>
                                        </td>
                                        @endif
                                    @endguest
                                </tr>
                            @endforeach
                            <tr class="table-success">
                                <td></td>
                                <td>Итого</td>
                                <td class="sumLength" data-kitchenLens="">0</td>
                                <td class="sumCount">0</td>
                                <td class="sum canvasSum">0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </section>
            <div class="col-12 d-flex justify-content-center row result">
                <section class="d-flex justify-content-center card row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Ваше имя</label>
                        <input type="text" name="firstname" class="form-control" id="InputName" value="" data-valid="0"  required>
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, сообщите ваше имя и фамилию.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email для связи с вами</label>
                        <input type="email" name="email" class="form-control" id="InputEmail" data-valid="0"  aria-describedby="emailHelp" required>
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, укажите вашу почту.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="InputTel" class="form-label">Ваш контактный телефон</label>
                        <input type="tel" name="tel" class="form-control" id="InputTel" data-valid="0"  aria-describedby="telHelp" required>
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, укажите ваш номер телефона для связи с вами.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Textarea" class="form-label">Дополнительная информация</label>
                        <textarea class="form-control" name="body" id="Textarea" rows="3" data-valid="0"  placeholder="Например: уточнение по параметрам кухни, или необходимости индивидуального расчета" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="dopprice" val="5000">
                        <label for="dopprice" class="form-label">Доставка. (По г.Екатеринбург - от 5000 руб)</label>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="dopprice" val="">
                        <label for="dopprice" class="form-label">Сборка. (12% от заказа)</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-submit" disabled>Отправить</button>
                    <div class="mb-3">
                        <h2 class="summError bg-danger"></h2>
                    </div>
                    <h2 class="text-center bg-light">Предварительная стоимость составляет</h2>
                    <h2 class="text-center sum bg-light">0</h2>
                    <input type="hidden" class="sumForm" name="sumForm" />
                </section>
            </div>
        </form>
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Сообщение</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-success text-white">

                        <p>Благодарим за ваше обращение в нашу компанию. </p>
                        <p>Мы свяжемся с вами для уточнения заказа.</p>

                    </div>
                    <div class="bg-warning">
                        <p>Окончательная стоимость заказа обговаривается
                            при заключении договора.
                            Стоимость указанная в расчете калькулятора не является окончательной.</p>
                    </div>
                </div>
            </div>
        </div>
    <x-footer></x-footer>
    </body>
