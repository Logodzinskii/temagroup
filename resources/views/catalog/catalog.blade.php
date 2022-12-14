<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="description" content="{{$offer[0]['meta_descriptions']}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$offer[0]['meta_title']}}</title>
        @include('ElemetsMainPage/script')
        <script>
        $(document).ready(function (){
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
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                }
            );
            $('.open').on('click',function (){
                $('.offer').show();
            });
        });
    </script>
    </head>
    <body class="container-fluid p-0 m-0 row d-flex justify-content-center">
    <x-header></x-header>
        <div class="col-10">
            <h1 class="title-section-dark">{{$offer[0]['meta_title']}}</h1>
            <div class="container" >
                <div class=" row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
                    <div class="col owl-carousel owl-theme owl-loaded "  >
                        <div class="owl-stage-outer" >
                            <div class="owl-stage">
                                @foreach(json_decode($offer[0]['image'],true) as $image)
                                    <div class="owl-item">
                                        <div class="" >
                                            <div class="card_body">
                                                <img src="{{asset($image)}}" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="d-flex justify-content-center" style="width: 100%">
                            <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="blackwhite" data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp,moimir"></div>
                        </div>
                    </div>
                    <div class="col" style="padding-left: 30px">
                        <div class="card-title">
                            <h1>????????????????????????????</h1>
                            <h3 style="color: grey">??????. {{$offer[0]['article']}}</h3>
                        </div>
                        <div class="card-text">
                            <div>
                                <ul class="row d-flex">
                                    <li>{{$offer[0]['configurations']}}</li>
                                </ul>
                                <h2>????????????????????????</h2>
                                <ul class="row d-flex">
                                    <li>{{$offer[0]['options']}}</li>
                                </ul>
                            </div>
                            <h2>????????????</h2>
                            <div>
                                <ul class="row d-flex">
                                    <li>????????????????: {{$offer[0]['delivery_price']}}</li>
                                    <li>????????????: {{$offer[0]['installation_price']}}</li>
                                </ul>
                            </div>
                            <div style="border-bottom: solid grey 1px;">
                                <h2>
                                    <span style="color: darkred">????????:</span> <b>{{$offer[0]['price']}}</b> ??.
                                </h2>
                            </div>
                            <div type="submit" class="btn btn-outline-secondary open">
                                <div class="btn-outline-secondary-inners">????????????</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal offer" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title ">???????????? ?????????????? ???????????</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <section class="modal-body p-0 m-0 d-flex justify-content-around align-items-start flex-wrap bg-dark text-white">
                            <form class="container" id="orderForm">
                                @csrf
                                <h2 class="text-center">?????????????????? ???????????? ???? ????????????</h2>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2 ">
                                    <input type="hidden" name="category" value="{{$offer[0]['category']}}">
                                    <input type="hidden" name="article" value="{{$offer[0]['article']}}">
                                    <input type="hidden" name="sumForm" value="{{$offer[0]['price']}}">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="InputName" class="form-label">???????? ??????</label>
                                            <input type="text" name="firstname" class="form-control" id="InputName" value="" data-valid="0" required>
                                            <div class="valid-feedback">
                                                ok
                                            </div>
                                            <div class="invalid-feedback">
                                                ????????????????????, ???????????????? ???????? ?????? ?? ??????????????.
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <label for="InputEmail" class="form-label">Email ?????? ?????????? ?? ????????</label>
                                            <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" data-valid="0" required>
                                            <div class="valid-feedback">
                                                ok
                                            </div>
                                            <div class="invalid-feedback">
                                                ????????????????????, ?????????????? ???????? ??????????.
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <label for="InputTel" class="form-label">?????? ???????????????????? ??????????????</label>
                                            <input type="tel" name="tel" class="form-control" id="InputTel" data-valid="0"/>
                                            <div class="valid-feedback">
                                                ok
                                            </div>
                                            <div class="invalid-feedback">
                                                ????????????????????, ?????????????? ???????? ??????????.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="Textarea" class="form-label">???????????????????????????? ????????????????????</label>
                                            <textarea class="form-control" name="body" id="Textarea" rows="7" data-valid="0" placeholder="????????????????: ?????????????????? ???? ???????????????????? ??????????, ?????? ?????????????????????????? ?????????????????????????????? ??????????????" required></textarea>
                                        </div>
                                        <input type="hidden"  name="kitchenConfigurations" value="{{$offer[0]['meta_title']}}" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-submit btn btn-sm" disabled>???????????????? ??????????</button>
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
                            <h5 class="modal-title">??????????????????</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bg-success text-white">

                            <p>???????????????????? ???? ???????? ?????????????????? ?? ???????? ????????????????. </p>
                            <p>???? ???????????????? ?? ???????? ?????? ?????????????????? ????????????.</p>

                        </div>
                        <div class="bg-warning">
                            <p>?????????????????????????? ?????????????????? ???????????? ????????????????????????????
                                ?????? ???????????????????? ????????????????.
                                ?????????????????? ?????????????????? ?? ?????????????? ???????????????????????? ???? ???????????????? ??????????????????????????.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <x-footer></x-footer>
    </body>
