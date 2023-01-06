<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$project[0]['meta_descriptions']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$project[0]['meta_title']}}</title>
        @include('ElemetsMainPage/script')
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
    <script src="https://yastatic.net/share2/share.js"></script>
    </head>
    <body class="container-fluid p-0 m-0 row d-flex justify-content-center">
    <x-header></x-header>
        <div class="col-12 col-sm-10">
            <h1 class="title-section-dark">{{$project[0]['meta_title']}}</h1>
            <div class="" >
                <div class="row d-flex justify-content-between flex-wrap col-12">
                                @foreach($project as $cat)
                                    <div class="owl-item-square text-white col-12 col-md-6">
                                        <div class="">
                                            <img src="/{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                                        </div>
                                    </div>
                                    <div class="card-body d-flex row justify-content-center align-items-baseline col-12 col-md-6">
                                        <p class="card-text fs-5 text-center" style="min-height: 0px; width: 100%"></p>
                                        <div class="d-flex justify-content-center align-items-center" >
                                            <div class="d-flex justify-content-center container align-items-end flex-wrap">
                                                <p class="fs-3">
                                                    {{$cat['meta_descriptions']}}
                                                </p>
                                                <p>Поделиться этим проектом в социальных сетях</p>
                                                <div class="d-flex justify-content-center" style="width: 100%">
                                                    <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="blackwhite" data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp,moimir"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
            </div>

        <div class="container-fluid d-flex justify-content-center bg-light ">
            <a href="/complete/" class="open btn btn-outline-secondary col-12 col-sm-12 col-md-6 " style="margin: 50px 0 50px 0">
                ПОСМОТРЕТЬ ДРУГИЕ ПРОЕКТЫ
                <div class="btn-outline-secondary-inners"></div>
            </a>
        </div>
    <x-footer></x-footer>
    </body>
