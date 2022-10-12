<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="Мебель на заказ в Екатеринбурге по вашим размерам. Узнай стоимость новой кухни в калькуляторе на сайте. Звони +7 963 272 72 82">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Мебель на заказ в Екатеринбурге. Мебельный интерьер кухни, визуализация проекта.</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/main.css') }}>
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script src={{ asset('js/owl.carousel.min.js')}}></script>

        <script type="text/javascript">

        $(document).ready(function(){

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

                if(sumValid >= 3){
                    $(".btn-submit").prop('disabled',false);
                }else{
                    $(".btn-submit").prop('disabled',true);
                }

                console.log(sumValid);
            }
            $('.close').on('click', function(){
                $('.modal').hide();
            })
            $(".btn-submit").click(function (e) {


                    var formData =$('#orderForm').serialize();

                    $.ajax({

                        url: "{{ route('order.user.store') }}",
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                             $('.modal').show();
                            $('#orderForm').text('Мы приняли вашу заявку, свяжемся с вами в ближайшее время').addClass('bg-success');
                        }
                    });

                e.preventDefault();
            });

            $(".owl-carousel:eq(0)").owlCarousel(
                {

                    margin:10,
                    dots: true,
                    autoplay:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                }
            );
            $(".owl-carousel:eq(1)").owlCarousel(
                {

                    margin:10,

                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:3
                        }
                    }
                }
            );
            $(".owl-carousel:eq(2)").owlCarousel(
                {

                    margin:10,

                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:3
                        }
                    }
                }
            );
            $(".owl-carousel:eq(3)").owlCarousel(
                {

                    margin:10,
                    autoplay:true,
                    responsive:{
                        0:{
                            items:4
                        },
                        600:{
                            items:4
                        },
                        1000:{
                            items:8
                        }
                    }
                }
            );
        });
    </script>
    </head>
    <body class="container-fluid p-0 m-0">
        @include('header')
        <h1>Название кухни</h1>
        <div class="row d-flex flex-wrap">
            <div class="owl-carousel owl-theme owl-loaded side" style="min-height: 85vh; max-width: 70vw">
                <div class="owl-stage-outer">
                    <div class="owl-stage blur">
                        <div class="owl-item slider-card">
                            <img src="{{asset('images/main/kitchen_2_main.jpg')}}"  class="card-img-top" alt="шкаф на заказ компания-тема">
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-block" style="min-height: 85vh; max-width: 29vw">
                <div class="card">
                    <div class="card-title">
                        <h1>Характеристики</h1>
                        <h3 style="color: grey">арт. 202201</h3>
                    </div>
                    <div class="card-text">
                    <div>
                        <ul class="row d-flex">
                            <li>Материал фасадов:  Прямой, пленка</li>
                            <li>Материал модулей:  ДСП</li>
                            <li>Фурнитура: эконом </li>
                            <li>Длина: 2500 мм </li>
                            <li>Высота: 2500 мм </li>
                        </ul>
                        <h2>Комплектация</h2>
                        <ul class="row d-flex">
                            <li>Шкаф для мойки:  1 шт</li>
                            <li>Шкаф для духовки:  1 шт</li>
                            <li>Бутылошница: 1 шт</li>
                            <li>Шкаф для духовки: 1 шт </li>
                            <li>Пенал для холодильника: 1шт</li>
                        </ul>
                    </div>
                    <div style="border-bottom: solid grey 1px;">
                        <h2>
                            <span style="color: darkred">Цена:</span> <b>156 000</b>
                        </h2>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-center">Готовы сделать заказ?</h1>
        <section class="p-0 m-0 d-flex justify-content-around align-items-start flex-wrap">
            <form class="card" id="orderForm">
                <h2>Отправьте заявку на расчет</h2>
                @csrf

                <div class="mb-6">
                    <label for="InputName" class="form-label">Ваше имя</label>
                    <input type="text" name="firstname" class="form-control" id="InputName" value="" data-valid="0" required>
                    <div class="valid-feedback">
                        ok
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, сообщите ваше имя и фамилию.
                    </div>
                </div>
                <div class="mb-6">
                    <label for="InputEmail" class="form-label">Email для связи с вами</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" data-valid="0" required>
                    <div class="valid-feedback">
                        ok
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, укажите вашу почту.
                    </div>
                </div>
                <div class="mb-6">
                    <label for="InputTel" class="form-label">Ваш контактный телефон</label>
                    <input type="tel" name="tel" class="form-control" id="InputTel" data-valid="0"/>
                    <div class="valid-feedback">
                        ok
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, укажите вашу почту.
                    </div>
                </div>
                <div class="mb-6">
                    <label for="Textarea" class="form-label">Дополнительная информация</label>
                    <textarea class="form-control" name="body" id="Textarea" rows="3" data-valid="0" placeholder="Например: уточнение по параметрам кухни, или необходимости индивидуального расчета" required></textarea>
                </div>
                <input type="hidden" class="sumForm" name="sumForm" value="0"/>
                <input type="hidden"  name="kitchenConfigurations" value="Default" />
                <button type="submit" class="btn btn-primary btn-submit" disabled>Отправить</button>
            </form>
        </section>
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
                        <p>Окончательная стоимость заказа оговаривается
                        при заключении договора.
                        Стоимость указанная в расчете калькулятора не является окончательной.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-0 m-0">
            <h1>Други предложения</h1>
            <div class="owl-carousel owl-theme owl-loaded side">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item">
                            <img src="{{asset('images/main/kitchen_1_main.jpg')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Кухни 1</h2>
                            </div>
                        </div>
                        <div class="owl-item">
                            <img src="{{asset('images/main/kitchen_2_main.jpg')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Кухня 2</h2>
                            </div>
                        </div>
                        <div class="owl-item">
                            <img src="{{asset('images/main/kitchen_3_main.jpg')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Кухня 3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @extends('footer')
    </body>
