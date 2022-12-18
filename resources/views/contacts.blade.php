<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$descryptions['descryption']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$descryptions['title']}}</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/main.css') }}>
        <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
        <script src={{ asset('js/owl.carousel.min.js')}}></script>

        <script type="text/javascript">

        $(document).ready(function() {

            $('input[name=firstname]').bind('input', function () {

                if ($(this).val().match(/[А-Яа-яЁё]/) !== null) {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'none').text('');
                    $(this).attr('data-valid', 1);
                } else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'block').text('Введите имя и фамилию на русском языке');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })

            $('input[name=email]').bind('input', function () {
                if ($(this).val().match(/\w+@\w+\.\w+/) !== null) {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'none').text('')
                    $(this).attr('data-valid', 1);

                } else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'block').text('Введите email в формате: example@mail.ru');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })
            $('input[name=tel]').bind('input', function () {
                if ($(this).val().match(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/) !== null) {
                    $(this).css('background', 'rgba(46, 171, 63, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'none').text('');
                    $(this).attr('data-valid', 1);

                } else {
                    $(this).css('background', 'rgba(209, 31, 31, 0.5)');
                    $(this).parent().children().eq(3).css('display', 'block').text('Введите телефон +79XX-XXX-XX-XX');
                    $(this).attr('data-valid', 0);
                }
                ch();
            })

            function ch() {
                var sumValid = 0;

                $('.form-control').each(function () {

                    sumValid += parseInt($(this).attr('data-valid'));

                })

                if (sumValid >= 3) {
                    $(".btn-submit").prop('disabled', false);
                } else {
                    $(".btn-submit").prop('disabled', true);
                }

                console.log(sumValid);
            }

            $(".btn-submit").click(function (e) {


                var formData = $('#orderForm').serialize();

                $.ajax({

                    url: "{{ route('order.user.store') }}",
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        $('#orderForm').text('Мы приняли вашу заявку, свяжемся с вами в ближайшее время').addClass('bg-success');
                    }
                });

                e.preventDefault();
            });
        });

    </script>
    </head>
    <body class="container-fluid row p-0 m-0 d-flex justify-content-center">
        @include('header')
        <section class="d-flex row p-0 m-0 text-body col-10" >
            <h1 class="title-section-white">{{$descryptions['h1']}}</h1>
            <div class="container " style="margin-bottom: 10vh" >
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset("images/logo/logo.png")}}" width="80">
                    </div>
                    <div class="col-9 container">
                        <div class="row">
                            <div class="col">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>г. Екатеринбург ул. Студенческая 11 офис 509</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                <a href=":tel" style="color: #2E2D30 !important;"> +7 963 272 72 82</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                <a href="mailto:temagroupekb@gmail.com" style="color: #2E2D30 !important;">temagroupekb@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-10">
            <table class="table p-0 col-8">
                <thead>
                <tr>
                    <th scope="col">Реквизиты</th>
                    <th scope="col">Наименование</th>
                </tr>
                </thead>
                <tbody class="tableValue">
                <tr>
                    <th scope="row">
                        ОГРНИП
                    </th>
                    <td>
                        321665800062794
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        ИНН
                    </th>
                    <td>
                        665801679557
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Вид предпринимательства
                    </th>
                    <td>
                        Индивидуальный предприниматель
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Дата регистрации
                    </th>
                    <td>
                        9 апреля 2021 г.
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Регистратор
                    </th>
                    <td>
                        Инспекция Федеральной налоговой службы по Верх-Исетскому району г.Екатеринбурга
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Дата постановки на учёт
                    </th>
                    <td>
                        9 апреля 2021 г.
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Наименование налогового органа
                    </th>
                    <td>
                        Инспекция ФНС России по Верх-Исетскому району г.Екатеринбурга
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
        <section class="p-0 m-0 col-10">
            <div style="width: 100%; min-height: 60vh; height: 40vh">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A395b067a3d72aa073ffcc90b7b9499c9b026103127768924ab33ed363660d196&amp;max-width=50%;height=100%;lang=ru_RU&amp;scroll=false"></script>
            </div>
        </section>

        @extends('footer')
    </body>
