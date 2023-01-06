<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$descryptions['descryption']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$descryptions['title']}}</title>
        @include('ElemetsMainPage/script')
    </head>
    <body class="container-fluid p-0 m-0">
        <x-header></x-header>
        @include('ElemetsMainPage/indexSection')
        @include('ElemetsMainPage/portfolio')
        @include('ElemetsMainPage/visualSection')
        @include('ElemetsMainPage/offersSection')
        @include('ElemetsMainPage/infoSection')
        @include('ElemetsMainPage/deliverySection')
        @include('ElemetsMainPage/checkSection')
        @include('ElemetsMainPage/infoVisitors')
        @include('ElemetsMainPage/formSection')
        @include('ElemetsMainPage/modalForm')
        <x-footer></x-footer>
    </body>
