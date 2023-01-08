<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META NAME="description" content="{{$page['descryption']}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$page['title']}}</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src={{ asset('js/owl.carousel.min.js')}}></script>
    <script src="{{asset('js/coockiInfo.js')}}"></script>
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
            $(".btn-submit1").click(function (e) {


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
            var num = 0;

            var postion = $('.title-slide').eq(0).offset().top-500,
                height = $('.title-slide').eq(0).height();


            $(document).on('scroll', function (){

                var scroll = $(document).scrollTop();
                if(scroll  > postion && scroll < (postion+15) ) {
                    $('.title-slide').eq(0).addClass('title-slide-left');
                    num+=1;
                    console.log(num);
                    pos(num)
                }
            })

            function pos(num){
                var postion = $('.title-slide').eq(num).offset().top-500;
                $(document).on('scroll', function (){

                    var scroll = $(document).scrollTop();
                    if(scroll  > postion && scroll < (postion+15) ) {
                        $('.title-slide').eq(num).addClass('title-slide-left');
                        num+=1;
                        console.log(num);
                        pos(num)
                    }
                })
            }

            $('.open').on('click',function (){
                $('.offer').show();
            });
            $(".owl-carousel:eq(0)").owlCarousel(
                {

                    margin:40,
                    dots: false,
                    autoplay:false,
                    lazyLoad: true,
                    loop: true,
                    nav:true,
                    navText: ['',
                        ''],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:3
                        }
                    }
                }
            );

        });
    </script>
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LX0K31E4E3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LX0K31E4E3');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.open').on('click', function () {
                $('.offer').show();
            });
            $('.close').on('click', function(){
                $('.modal').hide();
            });

        })
    </script>
</head>
<body class="container-fluid p-0 m-0 row d-flex justify-content-center">
<x-header></x-header>
<div class="col-12">
    <h1 class="title-section-dark">{{$page['h1']}}</h1>
    <div class="" >
        <div class="row d-flex justify-content-between flex-wrap">

            @foreach($complete as $cat)
                <div class="owl-item-square text-white col-12 col-md-4" style="position: relative">
                    <div class="">
                        <img src="/{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                    </div>
                    <div class="card-body d-flex row justify-content-center align-items-baseline" style="position: absolute; top:20px; z-index: 1; width:100%; height: 100%">
                        <p class="card-text fs-5 text-center" style="min-height: 0px; width: 100%"></p>
                        <div class="d-flex justify-content-center align-items-center" >
                            <div class="d-flex justify-content-center container align-items-end flex-wrap" style="height: 100%">
                                <h2 class="row" style="width: 100%; margin-bottom: 5vh">
                                    <span class="text-center fs-6">{{$cat['meta_title']}}</span>
                                </h2>
                                <a href="/complete/{{$cat['chpu_complite']}}">
                                    ПОДРОБНЕЕ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center" style="width: 100%">
        <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="blackwhite" data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp,moimir"></div>
    </div>

</div>
@auth
    <div class="container-fluid d-flex justify-content-center bg-light ">
        <a href="#" class="open btn btn-outline-secondary col-12 col-sm-12 col-md-6 " style="margin: 50px 0 50px 0">
            ДОБАВИТЬ ГОТОВЫЙ ПРОЕКТ
            <div class="btn-outline-secondary-inners"></div>
        </a>
    </div>
    <div class="modal offer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title ">Добавить проект</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <section class="modal-body p-0 m-0 d-flex justify-content-around align-items-start flex-wrap bg-dark text-white">
                    <form class="container" id="orderForm" action="{{route('create.complete.project')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2 ">
                            <div class="col">
                                <div class="mb-6">
                                    <label for="InputName" class="form-label">Название проекта</label>
                                    <input type="text" name="nameProject" class="form-control" id="InputName" value="" data-valid="0" required>
                                    <div class="valid-feedback">
                                        ok
                                    </div>
                                    <div class="invalid-feedback">
                                        Пожалуйста, укажите название.
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="InputPrice" class="form-label">Цена проекта</label>
                                    <input type="number" name="priceProject" class="form-control" id="InputPrice" value="" data-valid="0" required>
                                    <div class="valid-feedback">
                                        ok
                                    </div>
                                    <div class="invalid-feedback">
                                        Пожалуйста, укажите цену.
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="InputCategory" class="form-label">Категория</label>
                                    <select name="selectCategory" >
                                        <option value="kitchen">Кухня</option>
                                        <option value="wardrobe">Шкаф</option>
                                        <option value="Тумба">Тумба</option>
                                    </select>
                                    <div class="valid-feedback">
                                        ok
                                    </div>
                                    <div class="invalid-feedback">
                                        Пожалуйста, укажите категорию.
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="InputTel" class="form-label">Загрузить файлы</label>
                                    <input type="file" accept="image/*" name="files[]" multiple class="form-control" id="InputFile" data-valid="0"/>
                                    <div class="valid-feedback">
                                        ok
                                    </div>
                                    <div class="invalid-feedback">
                                        Пожалуйста, укажите описание.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-6">
                                    <label for="Textarea" class="form-label">Описание descriptions</label>
                                    <textarea class="form-control" name="metaDescriptions" id="Textarea" rows="7" data-valid="0" placeholder="Например: уточнение по параметрам кухни, или необходимости индивидуального расчета" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-submit btn btn-sm">Оформить заказ</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
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
@endauth
@guest
    <div class="container-fluid d-flex justify-content-center bg-light ">
        <a href="/" class="open btn btn-outline-secondary col-12 col-sm-12 col-md-6 " style="margin: 50px 0 50px 0">
            НА ГЛАВНУЮ СТРАНИЦУ
            <div class="btn-outline-secondary-inners"></div>
        </a>
    </div>
@endguest
<x-footer></x-footer>
</body>
