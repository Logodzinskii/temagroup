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
                    dots: false,
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
        <div class="owl-carousel owl-theme owl-loaded side" style="min-height: 85vh">
            <div class="owl-stage-outer">
                <div class="owl-stage blur">
                   <div class="owl-item slider-card">
                       <img src="images/main/kitchen_1_main.jpg"  class="card-img-top" alt="шкаф на заказ компания-тема">
                            <h1 class="text-center text-white">КОМПАНИЯ-ТЕМА</h1>
                                <div class="info-block">
                                    <p>Изготовим корпусную мебель</p>
                                    <p>Сделаем замеры</p>
                                    <p>Учтем все детали</p>
                                    <p>Произведем доставку</p>
                                    <p>Сделаем монтаж</p>
                                </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="card p-0 m-0">
            <h1 class="text-center">Мы изготавливаем различную мебель</h1>
            <div class="owl-carousel owl-theme owl-loaded side">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item">
                            <img src="{{asset('images/main/kitchen.png')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Кухни</h2>
                            </div>
                        </div>
                        <div class="owl-item">
                            <img src="{{asset('images/main/pedestal.png')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Тумбы</h2>
                            </div>
                        </div>
                        <div class="owl-item">
                            <img src="{{asset('images/main/wardrobe.png')}}" height="300" class="card-img-top" alt="шкаф на заказ компания-тема">
                            <div class="card-body d-flex justify-content-center">
                                <h2>Шкафы</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-center">Делаем визуализацию проекта</h1>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2" >
                <div class="col info-block">
                    <p class="text-center bg-light">РЕАЛИСТИЧНАЯ КАРТИНКА, БУДУЩЕЙ МЕБЕЛИ!</p>
                    <p>Проработаем дизайн проект до мелочей</p>
                    <p>Подстроимся под любые размеры</p>
                    <p>Предложим альтернативу</p>
                </div>
                <video class="col" controls autoplay width="100%" height="400">
                    <source src="{{asset('video/videoplayback.mp4')}}"  type="video/mp4" controls width="250">
                </video>
            </div>
        </div>

        <section class="m-3">
            @if(count($catalog) > 0)
            <h1 class="text-center">Готовые решения</h1>
            @endif
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($catalog as $cat)
                    <div class="col">
                        <div class="card shadow-sm">
                           <img src="{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                            <div class="card-body">
                                <p class="card-text">{{$cat['meta_descriptions']}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <h2>
                                            <span style="color: darkred">Цена:</span> <b>{{$cat['price']}}</b>
                                        </h2>
                                        <a href="/catalog/{{$cat['article']}}" class="btn btn-sm btn-outline-secondary">Посмотреть</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <section class="bg-dark">
            <h1 class="text-white text-center">Фотографии готовых работ</h1>
            <div class="owl-carousel owl-theme owl-loaded side" style="min-height: 100vh">
                <div class="owl-stage-outer">
                    <div class="owl-stage blur">
                        @for ($i = 1; $i <= 11; $i++)
                            <div class="owl-item">
                                <img src="{{asset('images/resoultProject/'. $i . '.jpg')}}"/>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light">
            <h1 class="text-center">Сотрудничаем только с проверенными поставщиками фурнитуры и комплектующих</h1>
            <div class="owl-carousel owl-theme owl-loaded side d-flex align-items-center" style="min-height: 50vh">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="owl-item">
                                <img src="{{asset('images/partners/'. $i . '.jpg')}}"/>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
        <h1 class="text-center" style="padding: 20px">ЗАКАЗАТЬ МЕБЕЛЬ У НАС - ПРОСТО</h1>
        <section class="col-lg-12 row justify-content-around p-0 m-0" style="min-height: 20vh">
            <div class="d-flex row justify-content-center col-lg-3 flex-wrap card" style="border-bottom: grey 1px solid;">
                <h3 style="width: 100%; height: 70px; text-align: center">ЗАМЕРЫ</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bounding-box-circles" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM0 2a2 2 0 0 1 3.937-.5h8.126A2 2 0 1 1 14.5 3.937v8.126a2 2 0 1 1-2.437 2.437H3.937A2 2 0 1 1 1.5 12.063V3.937A2 2 0 0 1 0 2zm2.5 1.937v8.126c.703.18 1.256.734 1.437 1.437h8.126a2.004 2.004 0 0 1 1.437-1.437V3.937A2.004 2.004 0 0 1 12.063 2.5H3.937A2.004 2.004 0 0 1 2.5 3.937zM14 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM2 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm12 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <div style="min-height: 150px">
                    <p style="text-align: center">
                        Сделаем замеры, учтём все углы
                    </p>
                </div>
            </div>
            <div class="d-flex row justify-content-center col-lg-3 flex-wrap card" style="border-bottom: grey 1px solid;">
                <h3 style="width: 100%; height: 70px; text-align: center">СОГЛАСОВАНИЕ</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
                <div style="min-height: 150px">
                    <p style="text-align: center">Обговорим детали по материалам,
                        покажем реалистичную картинку проекта и
                        если понадобиться, внесем правки
                    </p>
                </div>
            </div>
            <div class="d-flex row justify-content-start col-lg-3 flex-wrap card" style="border-bottom: grey 1px solid;">

                <h3 style="width: 100%; height: 70px; text-align: center">ОПЛАТА</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                </svg>
                <div style="min-height: 150px">
                    <p style="text-align: center">Примем оплату наличным
                        или безналичным расчетом
                    </p>
                </div>
            </div>
            <div class="d-flex row justify-content-start col-lg-3 flex-wrap card" style="border-bottom: grey 1px solid;">

                <h3 style="width: 100%; height: 70px; text-align: center">ДОСТАВКА И СБОРКА</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
                </svg>
                <div style="min-height: 150px">
                    <p style="text-align: center">Изготовим, привезем,
                       соберём и установим
                    </p>
                </div>
            </div>
        </section>
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
            <div class="card" style="max-width: 400px">
                <h2 class="card-title text-center">Или воспользуйтесь калькулятором</h2>
                <img src="{{asset('images/k3.jpg')}}"  class="card-img-top" alt="кухня на заказ компания-тема">
                <div class="card-body d-flex justify-content-center">
                    <a href="/calculate/modelfirst" class="btn btn-primary">Расчитать</a>
                </div>
            </div>

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
                        <p>Окончательная стоимость заказа обговаривается
                        при заключении договора.
                        Стоимость указанная в расчете калькулятора не является окончательной.</p>
                    </div>
                </div>
            </div>
        </div>
        @extends('footer')
    </body>
