
<h1 class="text-center"> Выберите конфигурацию кухни </h1>


    <h2></h2>


<section class="p-0 m-0 row col-12 col-md-12 col-lg-12 col-xl-12 d-flex flex-nowrap justify-content-center" style="min-height: 50vh">
            <div class="col-8 col-md-5 col-lg-5 col-xl-5 p-0 m-0">
                <div class="owl-carousel owl-theme" data-id="1">
                    <div class="item" data-price="15000">
                        <img src="{{asset('images/projects/p1/item/ai11.png')}} " alt="ai11"  height="112" />
                    </div>
                    <div class="myitem" data-price="45000">
                        <img src="{{asset('images/projects/p1/item/ai12.png')}} " alt="ai12" height="112"/>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" data-id="2">
                    <div class="item" data-price="15000">
                        <div>
                            <img src="{{asset('images/projects/p1/item/ai21.png')}} " alt="ai21" height="160"/>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" data-id="3">
                    <div class="item" data-price="15000">
                        <div>
                            <img src="{{asset('images/projects/p1/item/ai31.png')}} " alt="ai31" height="160"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-3 col-xl-3 p-0 m-0">
                <div>
                    <div class="owl-carousel owl-theme" data-id="4">
                        <div class="item" data-price="15000">
                            <div  >
                                <img src="{{asset('images/projects/p1/item/ai41.png')}} " alt="ai41" height="90" />
                            </div>
                        </div>
                        <div class="item" data-price="25000">
                            <div >
                                <img src="{{asset('images/projects/p1/item/ai42.png')}} " alt="ai42" height="90" />
                            </div>
                        </div>
                        <div class="item" data-price="0">
                            <div >

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="owl-carousel owl-theme" data-id="5">
                        <div class="item" data-price="15000">
                            <div>
                                <img src="{{asset('images/projects/p1/item/ai51.png')}} " alt="ai51"  height="339"/>
                            </div>
                        </div>
                        <div class="item" data-price="25000">
                            <div>
                                <img src="{{asset('images/projects/p1/item/ai52.png')}} " alt="ai52" height="339" />
                            </div>
                        </div>
                        <div class="item" data-price="0">
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h1 class="text-center">Укажите размеры вашей кухни </h1>
        <section class="col-12 col m-0 col-lg-12 d-flex justify-content-around flex-wrap bg-primary" style="min-height: 20vh; padding-top: 20px; padding-bottom: 20px; padding-left: 0; padding-right: 0;">
            <div class="col-12 col-lg-8 d-flex justify-content-around align-items-center flex-wrap">
                @foreach($parametrs as $param)
                    <div class="card d-flex row justify-content-center flex-wrap" style="min-width: 30vw; min-height: 5vh">
                        <h5 class="card-title bg-dark bg-gradient text-white" style="border-radius: 3px; padding: 10px 0px 10px 0px">{{ $param['titleCard'] }}&nbsp;</h5>
                        <div class="input-group mb-3 bg-white text-dark" id="size{{$param['id']}}">
                            <span class="input-group-text" id="basic-addon1">мм</span>
                            <input type="number" name="param" class="form-control" placeholder="{{ $param['placeholderInput'] }}" aria-label="Длинна, мм" aria-describedby="basic-addon1">
                        </div>
                        <div class="errorValidate" style="visibility: hidden"></div>
                    </div>
                @endforeach
            </div>
        </section>
