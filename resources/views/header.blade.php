<header class="sticky-top bg-primary text-white d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg col-10">
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
                                <li><a href="/">Главная</a></li>
                                <li><a href="/calculate/modelfirst/">Калькулятор</a></li>
                                <li><a href="/contacts/">Контакты</a></li>
                            @else
                                @if(Auth::user()->status == 'admin')
                                    <li><a href="/admin/">Заказы пользователей</a></li>
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/calculate/modelfirst/">Калькулятор</a></li>
                                    <li><a href="/contacts/">Контакты</a></li>
                                @elseif(Auth::user()->status == 'user')
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/calculate/modelfirst/">Калькулятор</a></li>
                                    <li><a href="/contacts/">Контакты</a></li>
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
