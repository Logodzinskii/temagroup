<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description">
        <title>Мебель на заказ</title>
        @include('ElemetsMainPage/script')
        <script type="text/javascript" src="{{asset('js/calculate_slider.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function (){

            })
        </script>
    </head>
    <body class="container-fluid p-0 m-0">
    <x-header></x-header>
        @include('calculateSelf')
        @include('calculateForm')
    <x-footer></x-footer>
    </body>
