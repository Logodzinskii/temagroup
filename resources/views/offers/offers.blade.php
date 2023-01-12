<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$descryptions[0]['descryption']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$descryptions[0]['title']}}</title>
        @include('ElemetsMainPage/script')
        <script>
            $(document).ready(function (){
                $('.open').on('click',function(e){

                    var sum = $(this).data('sum');
                    $('input[name="sumForm"]').val(sum);
                })
            })
        </script>
    </head>
    <body class="container-fluid p-0 m-0">
        <x-header></x-header>
        @h2dk(КУХНИ)
        @php
        $i=0;
        $arr=[0,1,2,3,4,5,6,7,8];
        $res=array_chunk($arr,3);
        @endphp
        @foreach($type as $card)
        <section class="d-flex row justify-content-center " style="margin-bottom: 100px;">
            <div class="col-12 col-sm-10 d-flex justify-content-between row flex-wrap">
                <div class="col-12 col-sm-8" >
                    <p class="fs-2">{{$card['titleOffer']}}</p>
                    <img src="/images/offers/ikitchen/img_{{$res[$i][0]}}.png" alt="Прямые кухни от Компания-тема.рф" height="380px"/>
                </div>
                <div class="col-12 col-sm-4" style="padding-top: 60px">
                    <img src="/images/offers/ikitchen/img_{{$res[$i][1]}}.png" class="img-fluid col-10 m-1" alt="Прямые кухни от Компания-тема.рф"/>
                    <img src="/images/offers/ikitchen/img_{{$res[$i][2]}}.png" class="img-fluid col-10 m-1" alt="Прямые кухни от Компания-тема.рф"/>
                </div>
            </div>
            <div class="col-12 col-sm-10 d-flex justify-content-between row flex-wrap">
                <div class="col-12 col-sm-8">
                    <p>ХАРАКТЕРИСТИКИ:</br> {{$card['optionsOffer']}}</p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="fs-2">ЦЕНА: ОТ {{$card['priceOffers']}}</p>
                </div>
            </div>
            <a href="#form" class="col-10 col-sm-4 d-flex justify-content-center open" data-sum="{{$card['priceOffers']}}">
                <div class="btn btn-outline-secondary ">
                    ЗАКАЗАТЬ
                    <div class="btn-outline-secondary-inners"></div>
                </div>
            </a>
        </section>
            @php
            $i++;
            @endphp
        @endforeach
        @include('ElemetsMainPage/formSection')
        <x-footer></x-footer>
    </body>
