
<section class="container-fluid bg-primary row d-flex justify-content-center align-items-center flex-wrap" style="min-height: 90vh">
    <h2 class="text-white text-center title-section-white">ПОРТФОЛИО ПРОЕКТОВ</h2>
    <div class="owl-carousel owl-theme owl-loaded side col-10">
        <div class="owl-stage-outer">
            <div class="owl-stage blur">
                @for ($i = 1; $i <= 19; $i++)
                    <div class="owl-item">
                        <img src="{{asset('images/resoultProject/'. $i . '.jpg')}}" alt="мебель на заказ. Компания-тема."/>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center bg-light ">
        <div class="btn btn-outline-secondary col-12 col-sm-12 col-md-6 " style="margin: 50px 0 50px 0">
            ПОСМОТРЕТЬ РАБОТЫ
            <div class="btn-outline-secondary-inners"></div>
        </div>
    </div>
</section>
