<header class="sticky-top bg-primary text-white d-flex justify-content-center">
    <nav class="p-0 m-0 navbar navbar-light navbar-expand-md navbar-expand-md fixed-top d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none">
        <div class="row col-12 d-flex justify-content-end ">
            <button class="navbar-dark navbar-toggler rounded-circle bg-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" style="width: 60px; height: 60px;">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
            <button type="button" class="btn-close text-reset align-self-end" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            <ul class="text-center text-white list-unstyled text-start navbar-nav row col-md-12 mb-2 mb-lg-0 d-flex col justify-content-center align-content-between p-0 m-0">
                <li>
                    <h2 class="fs-6 main-menu-text" style="margin-bottom: 10vh">КОМПАНИЯ-ТЕМА.РФ</h2>
                    <ul class="list-unstyled row d-flex justify-content-center ">
                        @php
                        $links = \App\Models\Descryptions::all();
                        @endphp
                        @guest
                            @foreach($links as $link)
                            <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>

                            @endforeach
                        @else
                            @if(Auth::user()->status == 'admin')
                                <li><a href="/admin/">Заказы пользователей</a></li>
                                @foreach($links as $link)
                                    <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>
                                @endforeach
                            @elseif(Auth::user()->status == 'user')
                                @foreach($links as $link)
                                    <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>
                                @endforeach
                                <li><a href="/cart/">Мой заказы</a></li>
                            @else
                            @endif
                        @endguest
                    </ul>
                    <a  href="/home/" class=" transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                </li>
                <li>
                <li class="nav-item m-2">
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-outline-primary" style="font-size: 70%!important;">Узнать стоимость проекта</div>
                    </div>
                </li>
            </ul>
            <div class="col-md-12 d-flex justify-content-center m-3"><b><a href=":tel" class="transition">+7 963 272 72 82</a></b></div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg col-10 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
        <div class="container-fluid">
            <a class="navbar-brand main-menu-text" href="#">КОМПАНИЯ-ТЕМА.РФ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            СТРАНИЦЫ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @guest
                                @foreach($links as $link)
                                    <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>
                                @endforeach
                            @else
                                @if(Auth::user()->status == 'admin')
                                    <li><a href="/admin/">Заказы пользователей</a></li>
                                    @foreach($links as $link)
                                        <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>
                                    @endforeach
                                @elseif(Auth::user()->status == 'user')
                                    <li><a href="/">Главная</a></li>
                                    @foreach($links as $link)
                                        <li class="text-center"><a href="{{$link['page']}}">{{$link['title']}}</a></li>
                                    @endforeach
                                    <li><a href="/cart/">Мой заказы</a></li>
                                @else
                                @endif
                            @endguest
                        </ul>
                    </li>
                </ul>
                <div class="d-flex row">
                    <div>
                        @guest
                            <a href="/home/">вход</a>
                        @else
                            <a href="/home/">{{ Auth::user()->name }}</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
