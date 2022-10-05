$(document).ready(function () {
    $("#myCanvas").on('click', function (e) {

        //alert(getPosition(e));

    });
    $('.checkbox').on("click", function () {
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

            $('.' + $(this).attr('name')).css('background', 'green');
            $('.' + $(this).attr('name')).removeClass('grey');
            $('.' + $(this).attr('name')).addClass('green');


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
            $('.' + $(this).attr('name')).css('background', 'grey');
            $('.' + $(this).attr('name')).removeClass('green');
            $('.' + $(this).attr('name')).addClass('grey');

            var sum = 0;
            $('.SumBoxPrice').each(function() {
                sum += Number($(this).text());
            });
            $(".sum").text(sum);
        }
    });

    function initialize()
    {

        $(window).on('load', function(){
            if($('.calc_body').width() < 1024)
            {
                var y = 0;
                var x = 0;
                var h = 0;
                var w = 0;
                x= 700 - parseInt($('.calc_body').width());
                setCoord(x);
            }else{
                //setDefCoord();
            }
        })

        $(window).on('resize',function (){
            if($('.calc_body').width() < 1024){
                console.log($('.calc_body').width());
                var y = 0;
                var x = 0;
                var h = 0;
                var w = 0;
                x= 700 - parseInt($('.calc_body').width());

                console.log(parseInt($('.BoxTop').css('left')));
                console.log(700 - parseInt($('.calc_body').width()));
                setCoord(x);
            }

        })

        function setCoord(x){
            var url      = window.location.href;
            //alert(url.indexOf('modelfirst')) //29;
            var type = 'modelfirst';

            if (url.indexOf('modelfirst') > 0)
            {
                var imageUrl = '../images/k3.jpg';
                $('.calc_body').css('background-image', 'url('+ imageUrl+')');
                var top = 54;
                setBox(top + 177 + (x/10),313 - (x/2.2), 170 - (x/4.2),30 - (x/24), 'BoxTop');
                setBox(top + 209 + (x/15),325 - (x/2.12), 170 - (x/4.2),48 - (x/14), 'BoxMiddle');
                setBox(top + 319 - (x/12),484 - (x/1.45), 28 - (x/30.2),68 - (x/11), 'BoxDown');
                setBox(top + 329 - (x/9),469 - (x/1.5), 14 - (x/35),54 - (x/15), 'BottleMaker');

                setBox(top + 320 - (x/9.8),430 - (x/1.65), 39 - (x/19),54 - (x/15), 'BoxOven');

                setBox(top + 312 - (x/10),392 - (x/1.8), 38 - (x/19),54 - (x/15), 'BoxShelves');
                setBox(top + 303 - (x/12),364 - (x/1.92), 28 - (x/24),54 - (x/15), 'BoxDishwasher');
                setBox(top + 293 - (x/14),313 - (x/2.2), 52 - (x/15),54 - (x/15), 'BoxWashing');
                setBox(top + 150 + (x/7),274 - (x/2.6), 39 - (x/15),187 - (x/3.8), 'PenalFridge');
                setBox(top + 140 + (x/6.3),232 - (x/3.0), 42 - (x/15),187 - (x/3.8), 'PenalMicrowave');
                setBox(top + 124 + (x/5.5),154 - (x/4.2), 79 - (x/11),187 - (x/3.8), 'PenalShelves');
            }
            if(url.indexOf('modelsecond') > 0)
            {
                var imageUrl = '../images/k12.jpg';
                $('.calc_body').css('background-image', 'url('+ imageUrl+')');
                var top = 15;
                var left = -43;
                setBox(top + 182 + (x/7.1),left + 337 - (x/2.35), 146 - (x/4.66),30 - (x/24), 'BoxTop');
                setBox(top + 210 + (x/9.36),left +335.5 - (x/2.35), 149.3 - (x/4.55),48 - (x/14), 'BoxMiddle');
                setBox(top + 329 - (x/12.56),left +469 - (x/1.6), 14 - (x/53),54 - (x/15), 'BottleMaker');
                setBox(top + 320 - (x/16),left +430 - (x/1.76), 39 - (x/19),54 - (x/15), 'BoxOven');
                setBox(top + 312 - (x/20),left +392 - (x/1.94), 38 - (x/19),54 - (x/15), 'BoxShelves');

                setBox(top + 303 - (x/28),left +364 - (x/2.12), 28 - (x/24),54 - (x/15), 'BoxDishwasher');
                setBox(top + 298 - (x/36),left +340 - (x/2.31), 25 - (x/26),54 - (x/15), 'BoxWashing');

                setBox(top + 184 + (x/7),left +262 - (x/2.6), 33 - (x/15),187 - (x/3.8), 'PenalFridge');
                setBox(top + 191 + (x/6.3),left +436 - (x/3.0), 41 - (x/15),187 - (x/3.8), 'PenalMicrowave');
                setBox(top + 124 + (x/5.5),left +154 - (x/4.2), 79 - (x/11),187 - (x/3.8), 'PenalShelves');

                setBox(top + 178 + (x/10),left + 295 - (x/2.2), 73 - (x/4.2),30 - (x/24), 'BoxTopSideA');
                setBox(top + 206 + (x/15),left +298 - (x/2.12), 70 - (x/4.2),48 - (x/14), 'BoxMiddleSideA');
                setBox(top + 302 - (x/14),left +320 - (x/2.2), 26 - (x/15),54 - (x/15), 'BoxWashingSideA');
                setBox(top + 314 - (x/10),left +308 - (x/1.8), 32 - (x/19),54 - (x/15), 'BoxShelvesSideA');
                setBox(top + 222 - (x/12),left +514 - (x/1.45), 28 - (x/30.2),168 - (x/11), 'BoxDownFfSideB');
                setBox(top + 218 - (x/12),left +273 - (x/1.45), 33 - (x/30.2),168 - (x/11), 'BoxDownFfSideA');
            }
            }

    }

    initialize();

    function setBox(top,left, width, height, name)
    {
        $('.' + name).css({"top": ""+ top +"px", "left": ""+ left +"px", "width": ""+ width +"px", "height": ""+ height +"px"});
    }

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
})
