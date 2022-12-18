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
<section class="col-10">
    <h1 class="main-menu-text">Корпусная мебель</h1>
    <p></p>
</section>
</body>
