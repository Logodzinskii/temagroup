
<section class="container-fluid bg-primary row d-flex justify-content-center align-items-center flex-wrap" style="min-height: 90vh">
    <div class="col-12">
        <div class="position-relative" style="height: 120px">
            <h2 class="text-center top-bottom-50 title-section-white title-slide title-slide-left text-white">ГОТОВЫЕ ПРОЕКТЫ</h2>
        </div>
            <div class="" >
            <div class="row d-flex justify-content-between flex-wrap">
                @foreach($complete as $cat)
                    <div class="owl-item-square text-white col-12 col-md-4" style="position: relative">
                        <div class="">
                            <img src="{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                        </div>
                        <div class="card-body d-flex row justify-content-center align-items-baseline" style="position: absolute; top:20px; z-index: 1; width:100%; height: 100%">
                            <p class="card-text fs-5 text-center" style="min-height: 0px; width: 100%"></p>
                            <div class="d-flex justify-content-center align-items-center" >
                                <div class="d-flex justify-content-center container align-items-end flex-wrap" style="height: 100%">
                                    <h2 class="row" style="width: 100%; margin-bottom: 5vh">
                                        <span class="text-center fs-6">{{$cat['meta_title']}}</span>
                                    </h2>
                                    <a href="/catalog/{{$cat['chpu_complite']}}">
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
    <div class="container-fluid d-flex justify-content-center bg-light ">
            <a href="/complete/" class="btn btn-outline-secondary col-12 col-sm-12 col-md-6 " style="margin: 50px 0 50px 0">
                ПОСМОТРЕТЬ РАБОТЫ
                <div class="btn-outline-secondary-inners"></div>
            </a>
    </div>
</section>
