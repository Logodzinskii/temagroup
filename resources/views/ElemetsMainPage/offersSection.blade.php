<section class="container-fluid bg-light row d-flex justify-content-center align-items-center flex-wrap">
    @if(count($catalog) > 0)
        <h1 class="text-center title-section-dark ">Готовые решения</h1>
    @endif
    <div class="container top-bottom-50">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-between" >
            @foreach($catalog as $cat)
                    <div class="owl-item text-white " style="position: relative">
                        <div class="">
                            <img src="{{json_decode($cat['image'], true)[0]}}" alt="компания-тема кухня">
                        </div>
                        <div class="card-body" style="position: absolute; top:0; z-index: 1">
                            <p class="card-text fs-4 text-center title-section-offer" style="min-height: 120px">{{$cat['meta_descriptions']}}</p>
                            <div class="d-flex justify-content-between " >
                                <div class="d-flex justify-content-center container align-items-end flex-wrap" style="height: 100%">
                                    <h2 class="row" style="width: 100%; margin-bottom: 5vh">
                                       <span class="text-center">{{$cat['price']}} &#8381;</span>
                                    </h2>
                                    <a href="/catalog/{{$cat['chpu']}}">
                                    <div class="row btn btn-outline-primary">

                                            ПОДРОБНЕЕ

                                        <div class="btn-outline-primary-inners"></div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dark-fon"></div>
                    </div>

            @endforeach

        </div>
    </div>
</section>
