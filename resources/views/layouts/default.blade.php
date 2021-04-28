<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <title>Smart Bazar</title>
    <link rel="icon" href="{{secure_asset('img/logo/logo.svg')}}" type="image/x-icon">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
<link rel="stylesheet" href="{{secure_asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('template/vendor/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('template/vendor/photoswipe/photoswipe.css')}}">
    <link rel="stylesheet" href="{{secure_asset('template/vendor/photoswipe/default-skin/default-skin.css')}}">
    <link rel="stylesheet" href="{{secure_asset('template/vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('template/css/style.css')}}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{secure_asset('template/vendor/fontawesome/css/all.min.css')}}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{secure_asset('template/fonts/stroyka/stroyka.css')}}">
    <script src="https://proxyd.tarlanpayments.kz/tarlan/widget-new.js"></script>
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
</head>

<body>
    <!-- site -->
    <div id="app">
        <div class="site">
            <!-- mobile site__header -->
            <header class="site__header d-lg-none">
                <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
                    <div class="mobile-header__panel">
                        <div class="container">
                            <div class="mobile-header__body">
                                <button class="mobile-header__menu-button">
                                    <svg width="18px" height="14px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#menu-18x14')}}"></use>
                                    </svg>
                                </button>
                                <a class="mobile-header__logo" href="/">
                                    <!-- mobile-logo -->
                                    <h3>Smart Bazar</h3>
                                    <!-- mobile-logo / end -->
                                </a>
                                <div class="search search--location--mobile-header mobile-header__search">
                                    <div class="search__body">
                                        <div class="search__form">
                                            <input
                                                class="search__input"
                                                name="search"
                                                placeholder="Найти..."
                                                aria-label="Site search"
                                                type="text"
                                                autocomplete="off"
                                                v-model="search.searchInput"
                                                v-on:keyup="searchProduct"
                                            >
                                            <button class="search__button search__button--type--submit" type="submit">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#search-20')}}"></use>
                                                </svg>
                                            </button>
                                            <button class="search__button search__button--type--close" type="button">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#cross-20')}}"></use>
                                                </svg>
                                            </button>
                                            <div class="search__border"></div>
                                        </div>
                                        <mobile-search-component
                                            v-if="search.searchShow"
                                            v-click-outside="hideSearch"
                                            :search = "search.searchResult"
                                            :home_url = "homeUrl"
                                        >
                                        </mobile-search-component>
                                    </div>
                                </div>
                                <div class="mobile-header__indicators">
                                    <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                                        <button class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#search-20')}}"></use>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="indicator indicator--mobile d-sm-flex">
                                        <a href="{{route('wishlist.index', true)}}" class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#heart-20')}}"></use>
                                                </svg>
                                                <span class="indicator__value" v-text="wishlist"></span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="indicator indicator--mobile">
                                        <a href="{{route('cart.index', true)}}" class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#cart-20')}}"></use>
                                                </svg>
                                                <span class="indicator__value" v-text="itemCount"></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- mobile site__header / end -->
            <!-- desktop site__header -->
            <header class="site__header d-lg-block d-none">
                <div class="site-header">
                    <div class="top-header grey-bg">
                        <div class="container">
                            <div class="top_header_nav">
                                <ul class="about">
                                    <li>
                                        <a href="#">О компании</a>
                                    </li>
                                    <li>
                                        <a href="#">Доставка</a>
                                    </li>
                                    <li>
                                        <a href="#">Гарантии, обмен и возврат</a>
                                    </li>
                                    <li>
                                        <a href="#">Оплата</a>
                                    </li>
                                </ul>
                                <ul class="account">
                                    <li>
                                        <img src="{{asset('icons/location.svg')}}" alt="location">
                                        <a href="#">Нур-Султан (Астана)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- .topbar -->
                    {{-- <div class="site-header__topbar topbar">
                        <div class="topbar__container container">
                            <div class="topbar__row">
                                <div class="topbar__item topbar__item--link">
                                    <a class="topbar-link" href="#">О нас</a>
                                </div>
                                <div class="topbar__item topbar__item--link">
                                    <a class="topbar-link" href="#">Контакты</a>
                                </div>
                                <div class="topbar__item topbar__item--link">
                                    <a class="topbar-link" href="#">Блог</a>
                                </div>
                                <div class="topbar__spring"></div>
                                <div class="topbar__item">
                                    <div class="topbar-dropdown">
                                        <button class="topbar-dropdown__btn" type="button">
                                            Аккаунт
                                            <svg width="7px" height="5px">
                                                <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-7x5')}}"></use>
                                            </svg>
                                        </button>
                                        <div class="topbar-dropdown__body">
                                            <!-- .menu -->
                                            <div class="menu menu--layout--topbar ">
                                                <div class="menu__submenus-container"></div>
                                                <ul class="menu__list">
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="{{route('profile.index')}}">
                                                            Профиль
                                                        </a>
                                                    </li>
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="account-profile.html">
                                                            Изменить профиль
                                                        </a>
                                                    </li>
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="account-orders.html">
                                                            История покупок
                                                        </a>
                                                    </li>
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="account-addresses.html">
                                                            Адрес
                                                        </a>
                                                    </li>
                                                    <li class="menu__item">
                                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                        <div class="menu__item-submenu-offset"></div>
                                                        <a class="menu__item-link" href="account-login.html">
                                                            Выйти
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .menu / end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- .topbar / end -->
                    <div class="site-header__middle container">
                        <div class="site-header__logo">
                            <a href="{{route('index', true)}}">
                                <!-- logo -->
                                {{-- <img src="{{secure_asset('img/logo/logo.svg')}}" alt="logo.svg"> --}}
                                <h1>Smart Bazar</h1>
                                <!-- logo / end -->
                            </a>
                        </div>
                        <div class="site-header__search">
                            <search-component :home_url="homeUrl"></search-component>
                        </div>
                        <div class="site-header__phone">
                            <div class="site-header__phone-title">Служба поддержки</div>
                            <div class="site-header__phone-number">+7 (771) 222 9777</div>
                        </div>
                    </div>
                    <div class="site-header__nav-panel">
                        <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                        <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
                            <div class="nav-panel__container container">
                                <div class="nav-panel__row">
                                    <div class="nav-panel__departments">
                                        <!-- .departments -->
                                        <div class="departments " data-departments-fixed-by="">
                                            <div class="departments__body">
                                                <div class="departments__links-wrapper">
                                                    <div class="departments__submenus-container"></div>
                                                    <ul class="departments__links">
                                                        @foreach ($categories as $category)
                                                        <li class="departments__item">
                                                            <a class="departments__item-link" href="{{ route('catalog.index', ['category' => $category->id], true) }}">
                                                                {{$category->title}}
                                                                <svg class="departments__item-arrow" width="6px" height="9px">
                                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--xl">
                                                                <!-- .megamenu -->
                                                                <div class="megamenu  megamenu--departments ">
                                                                    <div class="megamenu__body">
                                                                        <div class="row">
                                                                            @foreach ($category->children as $child)
                                                                            <div class="col-3">
                                                                                <ul class="megamenu__links megamenu__links--level--0">
                                                                                    <li class="megamenu__item  megamenu__item--with-submenu ">
                                                                                        <a href="{{ route('catalog.index', ['category' => $child->id], true) }}">{{$child->title}}</a>
                                                                                        <ul class="megamenu__links megamenu__links--level--1">
                                                                                            @foreach ($child->children->take(3) as $grandchild)
                                                                                                <li class="megamenu__item"><a href="{{ route('catalog.index', ['category' => $grandchild->id], true) }}">{{$grandchild->title}}</a></li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- .megamenu / end -->
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button class="departments__button" v-on:click.prevent="hiddenCategory = !hiddenCategory">
                                                <svg class="departments__button-icon" width="18px" height="14px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#menu-18x14')}}"></use>
                                                </svg>
                                                Категории
                                                <svg class="departments__button-arrow" width="9px" height="6px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-9x6')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- .departments / end -->
                                    </div>
                                    <!-- .nav-links -->
                                    <div class="nav-panel__nav-links nav-links">
                                        <ul class="nav-links__list">
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('index', true)}}">
                                                    <div class="nav-links__item-body">
                                                        Главная
                                                    </div>
                                                </a>
                                            </li>
                                            {{-- <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="#">
                                                    <div class="nav-links__item-body">
                                                        Аккаунт
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="#">
                                                    <div class="nav-links__item-body">
                                                        Блог
                                                    </div>
                                                </a>
                                            </li> --}}
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('catalog.index', true)}}">
                                                    <div class="nav-links__item-body">
                                                        Каталог
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('info.faq', true)}}">
                                                    <div class="nav-links__item-body">
                                                        FAQ
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('boutique.index', true)}}">
                                                    <div class="nav-links__item-body">
                                                        Бутики
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- .nav-links / end -->
                                    <div class="nav-panel__indicators">
                                        @auth
                                        <div class="indicator">
                                            <a href="{{route('wishlist.index', true)}}" class="indicator__button">
                                                <span class="indicator__area">
                                                    <svg width="20px" height="20px">
                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#heart-20')}}"></use>
                                                    </svg>
                                                    <span class="indicator__value" v-text="wishlist"></span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="indicator">
                                            <a href="{{route('cart.index', true)}}" class="indicator__button">
                                                <span class="indicator__area">
                                                    <svg width="20px" height="20px">
                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#cart-20')}}"></use>
                                                    </svg>
                                                    <span class="indicator__value" v-text="itemCount"></span>
                                                </span>
                                            </a>
                                            {{-- <div class="indicator__dropdown">
                                                <div class="dropcart dropcart--style--dropdown">
                                                    <dropdown-cart-component>
                                                    </dropdown-cart-component>
                                                </div>
                                            </div> --}}
                                        </div>
                                        @endauth
                                        <div class="indicator indicator--trigger--click">
                                            <a href="#" class="indicator__button">
                                                <span class="indicator__area">
                                                    <svg width="20px" height="20px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#person-20')}}"></use>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="indicator__dropdown">
                                                <div class="account-menu">
                                                     @guest
                                                        <form method="POST" action="{{secure_url('login')}}" class="account-menu__form">
                                                            @csrf
                                                            <div class="account-menu__form-title">Войти в аккаунт</div>
                                                            <div class="form-group">
                                                                <input
                                                                    id="header-signin-email" type="text"
                                                                    class="form-control form-control-sm @error('phone') is-invalid @enderror" placeholder="Телефон"
                                                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                                                    v-mask="'+7 (###) ### ####'"
                                                                    v-model="auth.loginNumber"
                                                                >
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="header-signin-password" class="sr-only">Пароль</label>
                                                                <div class="account-menu__form-forgot">
                                                                    <input
                                                                        id="header-signin-password" type="password"
                                                                        v-model="auth.loginPassword"
                                                                        class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required placeholder="Пароль" autocomplete="current-password"
                                                                    >
                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <a href="{{ route('password.request', true) }}" class="account-menu__form-forgot-link">Забыли пароль?</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-menu__form-button">
                                                                <button type="submit" class="btn btn-primary btn-sm" id="loginDefault">Войти</button>
                                                            </div>
                                                            <div class="account-menu__form-link"><a href="{{route('register', true)}}">Регистрация</a></div>
                                                        </form>
                                                     @endguest
                                                     @auth
                                                        <div class="account-menu__divider"></div>
                                                        <ul class="account-menu__links">
                                                            <li><a href="{{route('profile.index', true)}}">Профиль</a></li>
                                                            <li><a href="{{route('profile.history', true)}}">Покупки</a></li>
                                                            <li><a href="{{route('profile.address', true)}}">Адрес</a></li>
                                                            <li><a href="{{route('profile.password', true)}}">Пароль</a></li>
                                                        </ul>
                                                        <div class="account-menu__divider"></div>
                                                        <ul class="account-menu__links">
                                                            <li><a href="{{ route('logout', true) }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();" id="logoutMain">Выйти</a></li>
                                                            <form id="logout-form" action="{{ route('logout', true) }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </ul>
                                                     @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- desktop site__header / end -->
            <!-- site__body -->
            @yield('content')
            <!-- site__body / end -->
            <!-- site__footer -->
            <footer class="site__footer">
                <div class="subscribe">
                    <div class="container"><div class="subscribe_inner"><div class="subscribe_banner"><svg xmlns="http://www.w3.org/2000/svg" width="308.323" height="270.064" viewBox="0 0 308.323 270.064"><g id="Сгруппировать_721" data-name="Сгруппировать 721" transform="translate(-318.005 -101.631)"><path id="Контур_1220" data-name="Контур 1220" d="M603.974,366.4c28.315.385,60.482,1.157,60.482,1.157s7.645,0,7.645-4.3c0-1.664-.6-8.949-19.551-3,1.333-.82,8.493-3.522,5.72-7.665-1.751-2.616-5.226-.417-6.432.578,2.122-2.873,2.892-15.207-4.681-21.222-11.325-9-22.236-1.246-24.284,2.988-1.039-4.156-5.808-7.3-8.948-8.083-7.163-1.778-11.83-1.251-18.517,1.872-2.366,1.1-5.534,4.878-7.106,6.962-2.463,3.264-2.847,7.605-2.982,11.692q-.153,4.6-.041,9.207" transform="translate(-45.774 -38.406)" fill="#d6f2ff"></path> <path id="Контур_1221" data-name="Контур 1221" d="M599.994,369.7l61.856.843c.692.009,2.873-.665-.885-3.089-3.183-2.052-13.244-.206-13.244-.206s2.341-.939,2.33-2.151a3.282,3.282,0,0,0-2.032-2.779,7.528,7.528,0,0,0-3.568-.47,22.729,22.729,0,0,0-7.187,1.609,2.084,2.084,0,1,0-2.417-3.384c1.545-2.092,3.934-11.367-3.408-15.455-9.2-5.123-16.192-.907-17.683,2.176-.757-3.026-4.23-5.318-6.516-5.885-5.217-1.3-8.614-.912-13.484,1.362-1.723.8-4.029,3.553-5.174,5.07-1.794,2.378-2.073,5.538-2.172,8.514q-.112,3.351-.031,6.7" transform="translate(-45.964 -40.86)" fill="#b8dff2"></path> <path id="Контур_1222" data-name="Контур 1222" d="M507.857,366.4c-28.315.385-60.482,1.157-60.482,1.157s-7.644,0-7.644-4.3c0-1.664.6-8.949,19.55-3-1.333-.82-8.493-3.522-5.72-7.665,1.751-2.616,5.226-.417,6.433.578-2.122-2.873-2.892-15.207,4.68-21.222,11.325-9,22.236-1.246,24.284,2.988,1.038-4.156,5.808-7.3,8.948-8.083,7.163-1.778,11.829-1.251,18.517,1.872,2.365,1.1,5.533,4.878,7.105,6.962,2.464,3.264,2.847,7.605,2.983,11.692q.153,4.6.041,9.207" transform="translate(-20.851 -38.406)" fill="#d6f2ff"></path> <path id="Контур_1223" data-name="Контур 1223" d="M513.926,369.7l-61.856.843c-.692.009-2.873-.665.885-3.089,3.183-2.052,13.244-.206,13.244-.206s-2.342-.939-2.331-2.151a3.282,3.282,0,0,1,2.032-2.779,7.527,7.527,0,0,1,3.568-.47,22.729,22.729,0,0,1,7.187,1.609,2.084,2.084,0,1,1,2.417-3.384c-1.546-2.092-3.935-11.367,3.408-15.455,9.2-5.123,16.192-.907,17.684,2.176.756-3.026,4.229-5.318,6.516-5.885,5.216-1.3,8.614-.912,13.483,1.362,1.723.8,4.03,3.553,5.174,5.07,1.794,2.378,2.073,5.538,2.172,8.514q.112,3.351.031,6.7" transform="translate(-22.749 -40.86)" fill="#b8dff2"></path> <g id="Сгруппировать_646" data-name="Сгруппировать 646" transform="translate(426.466 212.222)"><path id="Контур_1224" data-name="Контур 1224" d="M491.2,318.422c-.052.052.578-4.967-6.21-10.609-6.883-5.958-22.992-6.865-24.492-12.137-1.555-5.639,8.371-3.364,13.139-6.916,4.818-3.64,6.481-5.375.562-7.2-5.9-1.723-9.486-2.6-8.96-7.585.53-5.048-9.625-3.615-14.214-7.808-4.744-4.208-1.44-8.874,8.222-7.612,9.47,1.476,9.976-.058,7.377-1.807-2.553-1.73-10.634-5.092-6.839-7.32,3.894-2.248,8.952.607,6.466-2.915-2.448-3.545-8.868-6.577-5.266-9.8,3.6-3.268,11.918-2.084,15.715,7.729,3.7,9.774,4.986,12.525,9.472,14.008,4.365,1.512,9.1-2.9,14.412-.344,5.259,2.619,3.685,7.752.065,10.9-3.7,3.147-9.988,9.5-6.917,12.933,2.939,3.447,7.366-.751,12.217-1.1,5.385-.384,10.94,4.753,5.229,11.493-5.894,6.617-14.424,11.438-16.274,27.929Q493.071,319.306,491.2,318.422Z" transform="translate(-448.885 -235.08)" fill="#d6f2ff"></path> <g id="Сгруппировать_645" data-name="Сгруппировать 645" transform="translate(5.306 2.025)"><g id="Сгруппировать_639" data-name="Сгруппировать 639" transform="translate(10.998)" opacity="0.7"><path id="Контур_1225" data-name="Контур 1225" d="M496.646,320.132a.284.284,0,0,1-.288-.25c-7.057-58.435-27.52-81.654-27.725-81.881a.285.285,0,1,1,.422-.383c.208.23,20.791,23.584,27.869,82.2a.285.285,0,0,1-.248.317A.181.181,0,0,1,496.646,320.132Z" transform="translate(-468.559 -237.524)" fill="#f0fbff"></path></g> <g id="Сгруппировать_640" data-name="Сгруппировать 640" transform="translate(7.125 13.315)" opacity="0.7"><path id="Контур_1226" data-name="Контур 1226" d="M479.583,260.355a.282.282,0,0,1-.184-.061,31.561,31.561,0,0,0-15.252-6.134.284.284,0,0,1-.261-.307.277.277,0,0,1,.307-.261,32.179,32.179,0,0,1,15.562,6.256.285.285,0,0,1-.172.507Z" transform="translate(-463.885 -253.591)" fill="#f0fbff"></path></g> <g id="Сгруппировать_641" data-name="Сгруппировать 641" transform="translate(29.207 23.439)" opacity="0.7"><path id="Контур_1227" data-name="Контур 1227" d="M490.823,279.8a.28.28,0,0,1-.207-.083.284.284,0,0,1,0-.4,112.841,112.841,0,0,1,16.88-13.461.285.285,0,0,1,.307.481,112.229,112.229,0,0,0-16.785,13.382A.285.285,0,0,1,490.823,279.8Z" transform="translate(-490.531 -265.808)" fill="#f0fbff"></path></g> <g id="Сгруппировать_642" data-name="Сгруппировать 642" transform="translate(0 25.784)" opacity="0.7"><path id="Контур_1228" data-name="Контур 1228" d="M483.5,276.449a.287.287,0,0,1-.128-.026c-12.9-6.082-27.671-7.206-27.818-7.216a.285.285,0,0,1-.263-.3.271.271,0,0,1,.3-.264c.148.01,15.026,1.143,28.019,7.268a.285.285,0,0,1-.114.543Z" transform="translate(-455.287 -268.638)" fill="#f0fbff"></path></g> <g id="Сгруппировать_643" data-name="Сгруппировать 643" transform="translate(11.671 57.152)" opacity="0.7"><path id="Контур_1229" data-name="Контур 1229" d="M493.936,313.473a.276.276,0,0,1-.143-.034c-8.8-4.783-24.014-6.365-24.168-6.381a.285.285,0,0,1-.254-.312.282.282,0,0,1,.312-.254c.153.015,15.484,1.608,24.382,6.447a.285.285,0,0,1,.114.386A.281.281,0,0,1,493.936,313.473Z" transform="translate(-469.37 -306.49)" fill="#f0fbff"></path></g> <g id="Сгруппировать_644" data-name="Сгруппировать 644" transform="translate(36.687 48.485)" opacity="0.7"><path id="Контур_1230" data-name="Контур 1230" d="M499.848,315.759a.265.265,0,0,1-.122-.024.285.285,0,0,1-.144-.375c4.915-11.036,16.439-19.2,16.555-19.278a.285.285,0,1,1,.327.467c-.115.08-11.512,8.154-16.363,19.043A.282.282,0,0,1,499.848,315.759Z" transform="translate(-499.557 -296.031)" fill="#f0fbff"></path></g></g></g> <g id="Сгруппировать_654" data-name="Сгруппировать 654" transform="translate(558.69 160.091)"><path id="Контур_1231" data-name="Контур 1231" d="M633.284,257.318c.056.048-.972-4.906,5.346-11.07,6.387-6.488,22.373-8.674,23.448-14.049,1.1-5.745-8.613-2.687-13.649-5.847-5.092-3.244-6.888-4.841-1.133-7.132,5.747-2.187,9.249-3.343,8.328-8.275-.93-4.99,9.306-4.37,13.547-8.914,4.394-4.573.729-8.961-8.8-6.934-9.322,2.225-9.949.736-7.5-1.214,2.407-1.928,10.195-5.923,6.234-7.84-4.06-1.931-8.875,1.318-6.678-2.392,2.158-3.729,8.316-7.262,4.47-10.188-3.846-2.971-12.046-1.128-15.05,8.956-2.908,10.037-3.972,12.882-8.327,14.718-4.231,1.855-9.3-2.167-14.394.805-5.034,3.028-3.055,8.02.8,10.869,3.942,2.842,10.714,8.672,7.925,12.341-2.654,3.67-7.4-.162-12.266-.12-5.4.046-10.525,5.61-4.3,11.874,6.4,6.127,15.289,10.252,18.446,26.544Q631.493,258.349,633.284,257.318Z" transform="translate(-608.439 -172.175)" fill="#d6f2ff"></path> <g id="Сгруппировать_653" data-name="Сгруппировать 653" transform="translate(5.603 2.036)"><g id="Сгруппировать_647" data-name="Сгруппировать 647" transform="translate(16.977)" opacity="0.7"><path id="Контур_1232" data-name="Контур 1232" d="M635.988,259.192a.284.284,0,0,0,.268-.272c2.382-58.812,20.931-83.586,21.117-83.83a.285.285,0,1,0-.451-.347c-.189.245-18.846,25.165-21.236,84.153a.285.285,0,0,0,.273.3A.166.166,0,0,0,635.988,259.192Z" transform="translate(-635.686 -174.631)" fill="#f0fbff"></path></g> <g id="Сгруппировать_648" data-name="Сгруппировать 648" transform="translate(28.21 12.964)" opacity="0.7"><path id="Контур_1233" data-name="Контур 1233" d="M649.542,198.246a.286.286,0,0,0,.178-.076,31.568,31.568,0,0,1,14.715-7.329.285.285,0,0,0,.236-.327.278.278,0,0,0-.327-.236,32.185,32.185,0,0,0-15.015,7.476.285.285,0,0,0-.013.4A.288.288,0,0,0,649.542,198.246Z" transform="translate(-649.24 -190.274)" fill="#f0fbff"></path></g> <g id="Сгруппировать_649" data-name="Сгруппировать 649" transform="translate(5.089 26.155)" opacity="0.7"><path id="Контур_1234" data-name="Контур 1234" d="M639.491,218.8a.285.285,0,0,0,.168-.5,112.909,112.909,0,0,0-17.9-12.073.285.285,0,0,0-.269.5,112.275,112.275,0,0,1,17.8,12A.283.283,0,0,0,639.491,218.8Z" transform="translate(-621.341 -206.192)" fill="#f0fbff"></path></g> <g id="Сгруппировать_650" data-name="Сгруппировать 650" transform="translate(23.916 24.825)" opacity="0.7"><path id="Контур_1235" data-name="Контур 1235" d="M644.361,214.6a.284.284,0,0,0,.125-.036c12.374-7.09,27.009-9.386,27.155-9.408a.284.284,0,0,0,.239-.324.272.272,0,0,0-.324-.24c-.148.022-14.888,2.336-27.352,9.476a.285.285,0,0,0,.157.532Z" transform="translate(-644.059 -204.588)" fill="#f0fbff"></path></g> <g id="Сгруппировать_651" data-name="Сгруппировать 651" transform="translate(18.347 57.024)" opacity="0.7"><path id="Контур_1236" data-name="Контур 1236" d="M637.64,252.337a.279.279,0,0,0,.139-.045c8.389-5.469,23.432-8.257,23.583-8.285a.285.285,0,1,0-.1-.56c-.152.028-15.306,2.836-23.791,8.368a.284.284,0,0,0,.172.522Z" transform="translate(-637.339 -243.442)" fill="#f0fbff"></path></g> <g id="Сгруппировать_652" data-name="Сгруппировать 652" transform="translate(0 51.687)" opacity="0.7"><path id="Контур_1237" data-name="Контур 1237" d="M633.434,255.359a.273.273,0,0,0,.119-.034.283.283,0,0,0,.114-.385c-5.778-10.609-17.915-17.828-18.037-17.9a.285.285,0,0,0-.29.491c.122.07,12.126,7.212,17.827,17.68A.284.284,0,0,0,633.434,255.359Z" transform="translate(-615.2 -237.002)" fill="#f0fbff"></path></g></g></g> <g id="Сгруппировать_656" data-name="Сгруппировать 656" transform="translate(457.95 118.448)"><rect id="Прямоугольник_1876" data-name="Прямоугольник 1876" width="123.71" height="210.702" rx="17.217" transform="translate(6.671)" fill="#fff" stroke="#2a4282" stroke-miterlimit="10" stroke-width="1.188"></rect> <rect id="Прямоугольник_1877" data-name="Прямоугольник 1877" width="114.141" height="210.702" rx="17.217" transform="translate(6.671)" fill="#2a4282"></rect> <path id="Контур_1238" data-name="Контур 1238" d="M604.83,143.821V321.313a9.628,9.628,0,0,1-9.628,9.628H511a9.628,9.628,0,0,1-9.628-9.628V143.821a5.924,5.924,0,0,1,5.924-5.924h91.612A5.924,5.924,0,0,1,604.83,143.821Z" transform="translate(-489.359 -124.66)" fill="#c7e9ff"></path> <path id="Контур_1239" data-name="Контур 1239" d="M587.071,130.712a2.232,2.232,0,1,1-2.232-2.232A2.232,2.232,0,0,1,587.071,130.712Z" transform="translate(-503.274 -123.047)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.992"></path> <path id="Контур_1240" data-name="Контур 1240" d="M572.2,132.1H550.4a1.175,1.175,0,0,1-1.171-1.171h0a1.175,1.175,0,0,1,1.171-1.171h21.8a1.174,1.174,0,0,1,1.17,1.171h0A1.174,1.174,0,0,1,572.2,132.1Z" transform="translate(-497.556 -123.267)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.992"></path> <g id="Сгруппировать_655" data-name="Сгруппировать 655" transform="translate(0 13.237)"><path id="Контур_1241" data-name="Контур 1241" d="M602.608,139.409v10.525l-12.072,5.37L488.4,150.915l12.07-13.012H601.1a1.5,1.5,0,0,1,1.063.443A1.481,1.481,0,0,1,602.608,139.409Z" transform="translate(-487.137 -137.898)" fill="#e56e82"></path> <rect id="Прямоугольник_1878" data-name="Прямоугольник 1878" width="86.307" height="6.036" transform="translate(8.674 8.705)" fill="#f8798a"></rect> <path id="Контур_1242" data-name="Контур 1242" d="M529.91,164.8h0a7.385,7.385,0,0,1-7.385-7.385v-5H537.3v5A7.386,7.386,0,0,1,529.91,164.8Z" transform="translate(-492.982 -140.384)" fill="#f8798a"></path> <path id="Контур_1243" data-name="Контур 1243" d="M565.56,164.8h0a7.386,7.386,0,0,1-7.386-7.385v-5h14.772v5A7.385,7.385,0,0,1,565.56,164.8Z" transform="translate(-499.089 -140.384)" fill="#f8798a"></path> <path id="Контур_1244" data-name="Контур 1244" d="M600.842,137.9H500.088a2.779,2.779,0,0,0-1.949.8l-10.368,10.341a3.038,3.038,0,0,0-.893,2.148l0,3.744a7.386,7.386,0,0,0,7.613,7.382,7.59,7.59,0,0,0,7.158-7.692v-4.69H575.5v4.69a7.592,7.592,0,0,0,7.159,7.692,7.386,7.386,0,0,0,7.613-7.382l0-3.687a3.16,3.16,0,0,1,.931-2.239l4.544-4.528,6.153-6.133A1.5,1.5,0,0,0,600.842,137.9Z" transform="translate(-486.876 -137.898)" fill="#f8798a"></path> <path id="Контур_1245" data-name="Контур 1245" d="M516.773,137.9l-11.379,11.341a2.357,2.357,0,0,0-.694,1.67v3.714a7.592,7.592,0,0,0,7.159,7.692,7.386,7.386,0,0,0,7.613-7.382v-4.024a2.359,2.359,0,0,1,.693-1.67L531.544,137.9Z" transform="translate(-489.929 -137.897)" fill="#fff5f4"></path> <path id="Контур_1246" data-name="Контур 1246" d="M552.452,137.9l-11.536,11.469a1.918,1.918,0,0,0-.565,1.361v4.2a7.385,7.385,0,0,0,7.385,7.385h0a7.385,7.385,0,0,0,7.385-7.385v-4.2a1.919,1.919,0,0,1,.566-1.361L567.223,137.9Z" transform="translate(-496.036 -137.897)" fill="#fff5f4"></path> <path id="Контур_1247" data-name="Контур 1247" d="M588.131,137.9l-11.2,11.1a3.164,3.164,0,0,0-.936,2.247v3.374a7.591,7.591,0,0,0,7.158,7.692,7.386,7.386,0,0,0,7.612-7.382v-3.684a3.164,3.164,0,0,1,.936-2.247l11.2-11.1Z" transform="translate(-502.142 -137.897)" fill="#fff5f4"></path></g></g> <g id="Сгруппировать_657" data-name="Сгруппировать 657" transform="translate(318.005 329.151)"><line id="Линия_448" data-name="Линия 448" x2="308.322" fill="none" stroke="#2a4282" stroke-miterlimit="10" stroke-width="1.188"></line></g> <g id="Сгруппировать_665" data-name="Сгруппировать 665" transform="translate(318.005 273.161)"><g id="Сгруппировать_659" data-name="Сгруппировать 659" transform="translate(0 16.968)"><path id="Контур_1248" data-name="Контур 1248" d="M337.27,364.935a12.666,12.666,0,0,0-5.13-8.614c-4.837-3.649-8.962-3.278-8.352-7.506s-3.941-1.917-5.3-8.338-.055-13.8,6.164-10.622,2.742,10.816,6.911,12.157,6.743.418,6.786,5.959-1.409,7.312.487,9.823,1.983,7.923,1.983,7.923" transform="translate(-318.005 -329.092)" fill="#618cd1"></path> <g id="Сгруппировать_658" data-name="Сгруппировать 658" transform="translate(1.026 5.673)"><path id="Контур_1249" data-name="Контур 1249" d="M331.036,344.617c-1.2-3.049-1.482-4.7-.771-6.408" transform="translate(-321.065 -336.327)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1250" data-name="Контур 1250" d="M335.724,352.367a5.7,5.7,0,0,1,1.818-5.716" transform="translate(-322.042 -337.773)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1251" data-name="Контур 1251" d="M338.482,357.848a5.7,5.7,0,0,1,1.818-5.716" transform="translate(-322.515 -338.712)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1252" data-name="Контур 1252" d="M342.017,366.657a6.435,6.435,0,0,1,.175-3.342" transform="translate(-323.12 -340.627)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1253" data-name="Контур 1253" d="M331.981,349.56c-1.815-1.173-6.482-4.153-10.255-2.39" transform="translate(-319.668 -337.769)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1254" data-name="Контур 1254" d="M335.5,356.157c-.752-.951-4.739-2.363-8.449-.465" transform="translate(-320.58 -339.161)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1255" data-name="Контур 1255" d="M339.455,362.707a5.863,5.863,0,0,0-4.441-1.871" transform="translate(-321.944 -340.197)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1256" data-name="Контур 1256" d="M340.152,365.893c-.8-3.287-7.709-21.273-16.964-29.955" transform="translate(-319.919 -335.938)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1.725"></path> <path id="Контур_1257" data-name="Контур 1257" d="M328.1,342.515c-2.9-2.254-4.854-4.7-8.854-4.537" transform="translate(-319.243 -336.286)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path></g></g> <g id="Сгруппировать_661" data-name="Сгруппировать 661" transform="translate(24.397 12.925)"><path id="Контур_1258" data-name="Контур 1258" d="M349.059,364.5s-2.891-5.965-.936-8.837,4.9-3.544,4.054-7.414-4.258-7.255-2.953-11.2,7.666-3.369,9.272-6.677,1.676-7.021,5.46-5.994,7.14,5.657,3.1,10.245-3.77,5.484-3.533,8.778-6.359,5.18-7.188,7.82,2.242,5.619.265,6.977-4.71,3.814-4.572,7.138" transform="translate(-347.445 -324.213)" fill="#4978c4"></path> <g id="Сгруппировать_660" data-name="Сгруппировать 660" transform="translate(2.906 4.981)"><path id="Контур_1259" data-name="Контур 1259" d="M359.882,340.24c.608-3.221.569-4.9-.45-6.438" transform="translate(-352.404 -330.837)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1260" data-name="Контур 1260" d="M356.261,347.819c.009-2.663-1.042-7.754-2.595-8.578" transform="translate(-351.416 -331.769)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1261" data-name="Контур 1261" d="M354.318,354.416c.009-2.663-.859-6.57-2.413-7.394" transform="translate(-351.114 -333.101)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1262" data-name="Контур 1262" d="M351.752,365.641a6.444,6.444,0,0,0-.8-3.25" transform="translate(-350.951 -335.734)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1263" data-name="Контур 1263" d="M357.995,344.982c1.644-2.713,3.316-4.388,8.446-6.153" transform="translate(-352.158 -331.698)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1264" data-name="Контур 1264" d="M355.566,352.575c.56-1.076,3.873-4.073,7.422-3.769" transform="translate(-351.742 -333.403)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1265" data-name="Контур 1265" d="M352.906,361.876a5.859,5.859,0,0,1,4.009-2.674" transform="translate(-351.286 -335.188)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1266" data-name="Контур 1266" d="M351.245,364.6c.169-3.379,4.8-24.106,12.254-34.376" transform="translate(-351.001 -330.224)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1.725"></path> <path id="Контур_1267" data-name="Контур 1267" d="M360.829,337.609c2.428-2.762,3.882-5.528,7.84-6.124" transform="translate(-352.643 -330.44)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path></g></g> <g id="Сгруппировать_663" data-name="Сгруппировать 663" transform="translate(9.48)"><path id="Контур_1268" data-name="Контур 1268" d="M341.5,359.762s1.767-6.858.52-8.833-5.092-5.716-5.715-10.08,1.974-8,1.454-11.535-8.314-8.522-8.314-12.782,4.215-9.977,9.8-7.171,3.713,8.73,6.311,12.782,11.223,12.886,6.547,19.745-6.339,12.061-5.508,16.631" transform="translate(-329.445 -308.616)" fill="#6d97e4"></path> <g id="Сгруппировать_662" data-name="Сгруппировать 662" transform="translate(2.334 4.992)"><path id="Контур_1269" data-name="Контур 1269" d="M347.473,338.316a11.064,11.064,0,0,1,2.845-7.228" transform="translate(-334.867 -317.457)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1270" data-name="Контур 1270" d="M348.344,347.347c.618-2.591,1.905-4.014,3.609-4.449" transform="translate(-335.016 -319.48)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1271" data-name="Контур 1271" d="M344.368,325.631c-.064-2.949-.19-5.9.614-7.864" transform="translate(-334.327 -315.176)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1272" data-name="Контур 1272" d="M348.491,353.478c.618-2.591,1.981-4.014,3.685-4.449" transform="translate(-335.041 -320.531)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1273" data-name="Контур 1273" d="M348.174,362.984a6.9,6.9,0,0,1,1.28-3.134" transform="translate(-334.987 -322.384)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1274" data-name="Контур 1274" d="M346.812,343.883c-.864-2.23-2.165-6.208-6.33-6.166" transform="translate(-333.669 -318.593)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1275" data-name="Контур 1275" d="M347.037,350.139c-.291-1.178-2.984-4.424-7.148-4.233" transform="translate(-333.568 -319.994)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1276" data-name="Контур 1276" d="M347.625,358.142c-.167-1.2-2.292-3.277-3.476-3.543" transform="translate(-334.297 -321.485)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1277" data-name="Контур 1277" d="M345.7,359.2c.632-3.325,4.09-28.476-8.027-44.561" transform="translate(-333.188 -314.64)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1.725"></path> <path id="Контур_1278" data-name="Контур 1278" d="M345.308,333.608c-1.71-3.255-2.332-4.84-6.039-6.352" transform="translate(-333.461 -316.801)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path> <path id="Контур_1279" data-name="Контур 1279" d="M340.444,321.168c-2.944-2.2-4.187-3.367-8.183-3.137" transform="translate(-332.261 -315.216)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.863"></path></g></g> <g id="Сгруппировать_664" data-name="Сгруппировать 664" transform="translate(11.576 48.759)"><path id="Контур_1280" data-name="Контур 1280" d="M356.141,371.624l-.117.6-2.393,11.63H337.18l-2.393-11.63-.117-.6Z" transform="translate(-332.436 -368.168)" fill="#dae2f2"></path> <path id="Контур_1281" data-name="Контур 1281" d="M356.141,371.624l-.117.6H334.788l-.117-.6Z" transform="translate(-332.436 -368.168)" fill="#9abeea" opacity="0.3" style="mix-blend-mode: multiply; isolation: isolate;"></path> <rect id="Прямоугольник_1879" data-name="Прямоугольник 1879" width="25.938" height="3.462" rx="1.2" fill="#dae2f2"></rect></g></g> <g id="Сгруппировать_672" data-name="Сгруппировать 672" transform="translate(346.532 224.165)"><g id="Сгруппировать_666" data-name="Сгруппировать 666" transform="translate(0 21.418)"><path id="Контур_1282" data-name="Контур 1282" d="M459.815,375.191c-2.169,17.129-52.713,21.633-79.705,11.521-32.56-12.188-32.143-83.824-20.351-100.9,8.226-11.917,23.02-15.868,36.532-.01a64.29,64.29,0,0,1,7.747,11.687c7.85,14.846,12.177,39.274,23.406,45.572l11.343,3.868s.375.177,1.032.543C444.29,349.867,461.712,360.251,459.815,375.191Z" transform="translate(-352.428 -275.337)" fill="#c7e9ff"></path> <path id="Контур_1283" data-name="Контур 1283" d="M441.38,349l-11.343-3.868c-11.229-6.3-15.556-30.725-23.406-45.571a64.29,64.29,0,0,0-7.747-11.687c-8.653.479-8.06-.409-8.06-.409s-14.023,2.685-16.357,14.24a8.235,8.235,0,0,0-.344,2.426c-1.625-1.005-6.274-1.328-6.476-1.08-.293.359,4.17,1.564,6.472,3.671,0,0-4.235-.565-6.546.283a50.916,50.916,0,0,1,6.6,1.828s-7.353,2.811-6.539,2.929a59.9,59.9,0,0,0,6.72-.42c.315,4.291.919,8.531,1.588,15.821.69,7.523,4.044,21.624,8.5,28.417a65.991,65.991,0,0,0-5.808,4.6c-3.3,2.954-1.954,3.844.392,2.867s9.8-3.372,9.8-3.372-5.238,4.336-4.847,4.8,5.245-2.821,7.644-3.683l.007,0a35.869,35.869,0,0,0,12.3,1.047c.781,2.472,2.113,5.876,5.719,5.861,2.937-.013,3.218-3.374,6.125-4.909,7.89-4.164,19.241-9.707,23.287-9.9a3.2,3.2,0,0,0,3.346-3.336C441.756,349.182,441.38,349,441.38,349Z" transform="translate(-355.022 -277.415)" fill="#abd7ef" opacity="0.44" style="mix-blend-mode: multiply; isolation: isolate;"></path> <path id="Контур_1284" data-name="Контур 1284" d="M384.619,279.691a14.47,14.47,0,0,0-15.181,3.873c-6.565,6.958-7.894,35.107,2.348,72.467,8.14,29.694,61.98,23.8,61.98,23.8s18.683-2.158,25.112-10.807" transform="translate(-354.462 -275.958)" fill="none" stroke="#72b1cc" stroke-miterlimit="10" stroke-width="0.959"></path> <path id="Контур_1285" data-name="Контур 1285" d="M397.439,366.894c-4.147,2.788-12.685,5.129-17.08,7.507s-10.224,10.191-11.991,14.865" transform="translate(-355.159 -291.02)" fill="none" stroke="#72b1cc" stroke-miterlimit="10" stroke-width="0.959"></path> <path id="Контур_1286" data-name="Контур 1286" d="M379.719,291.51a22.153,22.153,0,0,0-16.626-4.453" transform="translate(-354.255 -277.308)" fill="none" stroke="#72b1cc" stroke-miterlimit="10" stroke-width="0.959"></path></g> <path id="Контур_1287" data-name="Контур 1287" d="M434.036,308.2c-1.827-.239-11.985-14.274-15.581-18.551a9.945,9.945,0,0,0-6-3.171c-2.732,2.334-3.272,7.154-1.641,10.254,6.836,12.993,17.666,20.591,21.894,22.416C429.423,314.75,434.036,308.2,434.036,308.2Z" transform="translate(-362.272 -255.828)" fill="#f2cfaa"></path> <path id="Контур_1288" data-name="Контур 1288" d="M426.555,299.182c0,1.5-1.137,4.608-1.9,6.255a12.584,12.584,0,0,1-2.054,3.2,16.173,16.173,0,0,1-2.95,2.6c-.219.167-2.94-5.964-3.43-6.59-.031-.031-.052-.052-.063-.052a2.9,2.9,0,0,1-1.021-.563c-.636-.469-1.262-.97-1.888-1.47a5.136,5.136,0,0,1-1.376-1.512,5.367,5.367,0,0,1-.334-2.731l-.146-12.782a10.342,10.342,0,0,1,7.84,3.763,20.327,20.327,0,0,1,1.366,1.9C422.457,293.99,424.7,296.4,426.555,299.182Z" transform="translate(-362.529 -255.666)" fill="#f8798a"></path> <line id="Линия_449" data-name="Линия 449" x1="0.697" y2="9.339" transform="translate(72.92 14.32)" fill="#bfbfbf"></line> <path id="Контур_1289" data-name="Контур 1289" d="M429.643,278.227" transform="translate(-365.655 -254.414)" fill="#bfbfbf"></path> <line id="Линия_450" data-name="Линия 450" y1="2.397" x2="0.079" transform="translate(49.967 21.391)" fill="#ccc"></line> <rect id="Прямоугольник_1880" data-name="Прямоугольник 1880" width="9.464" height="17.839" rx="1.603" transform="translate(66.067 16.937) rotate(-6.406)" fill="#2a4282"></rect> <path id="Контур_1290" data-name="Контур 1290" d="M444.167,282.716a17.436,17.436,0,0,1-.157,5.579c-.012.018-.008.034-.014.043-.01.065-.018.1-.018.1a5.352,5.352,0,0,0-.278,1.695c.25,10-.28,21.279-.823,24.264-.563,3.091-3,5.148-6.125,3.454a7.529,7.529,0,0,1-3.245-4.478c1.222-6.784,6.16-25.173,6.157-25.33-2.731-3.515-.987-6.912.885-8.719a1.382,1.382,0,0,1,1.383-.393A5.394,5.394,0,0,1,444.167,282.716Z" transform="translate(-366.316 -254.527)" fill="#f2cfaa"></path> <path id="Контур_1291" data-name="Контур 1291" d="M410.643,349.744s41.1-13.292,53.162-7.206,7.539,14.952-2.139,18.8c-9.06,3.6-30.568,4.774-30.568,4.774Z" transform="translate(-362.4 -265.157)" fill="#4a4251"></path> <path id="Контур_1292" data-name="Контур 1292" d="M447.039,354.53s7.662-6.989,16.09-7.816a30.681,30.681,0,0,0-18.381,6.591C435.62,360.314,447.039,354.53,447.039,354.53Z" transform="translate(-367.636 -266.145)" fill="#38323f"></path> <g id="Сгруппировать_667" data-name="Сгруппировать 667" transform="translate(20.26)"><path id="Контур_1293" data-name="Контур 1293" d="M403.528,266.7l-11.9-14.85c-11-1.375-12.881,9.415-12.436,17.343s-2.314,9.767-2.314,9.767a20.1,20.1,0,0,0,4.657,1.925c.074-.09.152-.177.222-.272a7.9,7.9,0,0,0,.719-1.227,10.074,10.074,0,0,0,.515-1.345,10.257,10.257,0,0,1-.349,1.411,8.219,8.219,0,0,1-.584,1.351c-.038.067-.084.13-.123.2a29.54,29.54,0,0,0,3.754.772c.019-.058.042-.114.06-.172a7.969,7.969,0,0,0,.253-1.4,10.062,10.062,0,0,0,.018-1.44,10.106,10.106,0,0,1,.159,1.445,8.112,8.112,0,0,1-.083,1.469c-.008.05-.022.1-.031.15a33.137,33.137,0,0,0,6.932.143,29.082,29.082,0,0,0,11.828-3.373c-.112-.166-.216-.336-.312-.509a7.074,7.074,0,0,1-.486-1.167,8.747,8.747,0,0,1-.284-1.217,8.643,8.643,0,0,0,.427,1.162,6.851,6.851,0,0,0,.6,1.061q.182.251.385.482a14.631,14.631,0,0,0,2.645-1.872C403.69,274.2,403.528,266.7,403.528,266.7Z" transform="translate(-376.876 -249.876)" fill="#1b3266"></path> <path id="Контур_1294" data-name="Контур 1294" d="M391.546,272.849s1.624,7.537.878,10.52-4.294,4.437-4.294,4.437,7.029,6.423,13.341,4.429,3.32-8.735,3.32-8.735-2.8-.6-3.424-1.522-.892-4.763-.892-4.763Z" transform="translate(-378.804 -253.493)" fill="#f2cfaa"></path> <path id="Контур_1295" data-name="Контур 1295" d="M399.205,254.532c3.682.98,5.79,4.167,6.725,9.867s1.091,11.711-2.96,12.805-8.919-3.422-10.522-7.084S390.8,252.3,399.205,254.532Z" transform="translate(-379.4 -250.315)" fill="#f2cfaa"></path> <path id="Контур_1296" data-name="Контур 1296" d="M399.5,268.049c-.215-1.253.055-1.785.6-1.878s1.151.289,1.365,1.542-.064,1.725-.606,1.818S399.71,269.3,399.5,268.049Z" transform="translate(-380.738 -252.347)" fill="#381c0e"></path> <path id="Контур_1297" data-name="Контур 1297" d="M407.17,266.376c-.169-1.091-.008-1.545.341-1.613s.752.278.92,1.37,0,1.492-.347,1.56S407.338,267.467,407.17,266.376Z" transform="translate(-382.054 -252.107)" fill="#381c0e"></path> <path id="Контур_1298" data-name="Контур 1298" d="M400.407,263.2a1.836,1.836,0,0,0-2.461.906l-.033-.016a1.607,1.607,0,0,1,2.5-.9" transform="translate(-380.479 -251.79)" fill="#381c0e" stroke="#381c0e" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.481"></path> <path id="Контур_1299" data-name="Контур 1299" d="M405.441,261.831c.533-.657,1.3-1.141,1.953-.469l-.03.032a1.541,1.541,0,0,0-1.907.437" transform="translate(-381.769 -251.47)" fill="#381c0e" stroke="#381c0e" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.481"></path> <path id="Контур_1300" data-name="Контур 1300" d="M407.408,273.819c-.248.948-.4,1.833-1.72,1.831-.865-.032-1.667-.633-1.553-.951l.046-.03c1.494.717,2.222.762,3.117-.865,0,0,.093-.185.109-.165S407.408,273.819,407.408,273.819Z" transform="translate(-381.544 -253.628)" fill="#381c0e"></path> <path id="Контур_1301" data-name="Контур 1301" d="M396.219,269.663l-4.354.346" transform="translate(-379.443 -252.947)" fill="none" stroke="#858585" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.215"></path> <path id="Контур_1302" data-name="Контур 1302" d="M391.488,268.838s-2-1.42-2.634.855,2.158,4.99,3.956,3.9" transform="translate(-378.912 -252.731)" fill="#f2cfaa"></path> <path id="Контур_1303" data-name="Контур 1303" d="M394.648,257.29a8.2,8.2,0,0,1-1.539,4.906c-1.739,2.5-1.193,5.608-.522,6.374a5.641,5.641,0,0,1-2.479-4.446s-1.409-7.258,2.618-9.591l.322-3.526s1.193-2.139,5.529-1.333,6.7,6.512,6.627,9.049A6.183,6.183,0,0,0,401,257.605C398.244,257.747,396.687,258.45,394.648,257.29Z" transform="translate(-379.102 -249.492)" fill="#1b3266"></path> <path id="Контур_1304" data-name="Контур 1304" d="M405.109,265.963s.98,3.25,1.681,3.935-.8,1.251-.8,1.251" transform="translate(-381.712 -252.313)" fill="none" stroke="#bd633f" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.481"></path> <path id="Контур_1305" data-name="Контур 1305" d="M403.661,267.716a2.024,2.024,0,0,1,2.672-.852" transform="translate(-381.464 -252.426)" fill="none" stroke="#858585" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.215"></path> <path id="Контур_1306" data-name="Контур 1306" d="M400.223,272.141c.056.513-.771,1.023-1.846,1.14s-1.991-.2-2.048-.717.771-1.023,1.846-1.14S400.166,271.628,400.223,272.141Z" transform="translate(-380.208 -253.245)" fill="#d9592a" opacity="0.25" style="isolation: isolate;"></path> <path id="Контур_1307" data-name="Контур 1307" d="M408.067,270.088a1.021,1.021,0,0,0,1.154.721q-.065-.915-.18-1.854l-.023,0A1.055,1.055,0,0,0,408.067,270.088Z" transform="translate(-382.217 -252.826)" fill="#d9592a" opacity="0.25" style="isolation: isolate;"></path> <path id="Контур_1308" data-name="Контур 1308" d="M397.068,269.676a3.108,3.108,0,1,1,3.3,2.155A2.816,2.816,0,0,1,397.068,269.676Z" transform="translate(-380.333 -252.463)" fill="none" stroke="#858585" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.215"></path> <path id="Контур_1309" data-name="Контур 1309" d="M406.918,267.558a1.589,1.589,0,1,1,1.76,1.605A1.691,1.691,0,0,1,406.918,267.558Z" transform="translate(-382.02 -252.252)" fill="none" stroke="#858585" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.215"></path></g> <path id="Контур_1310" data-name="Контур 1310" d="M423.6,310.746a16.172,16.172,0,0,1-2.95,2.6c-.219.167-2.94-5.964-3.43-6.59.021-4.566.073-8.914.073-8.914A123.009,123.009,0,0,0,423.6,310.746Z" transform="translate(-363.527 -257.774)" fill="#ef6a80"></path> <path id="Контур_1311" data-name="Контур 1311" d="M387.535,351.456c3.975,2.215,3.66-7.6,4.383-7.488,7.774,1.287,27.231-4.219,29.641-7.434-1.708-3.366-10.351-41.633-10.98-42.64-2.518-4.036-2.31-7.159-3.589-8.352-3.7-.283-4.269-.486-5.459-.555.474,1.985,1.712,6.264-1.417,8.421-6.487.491-10.448-6.154-10.448-6.154a35.658,35.658,0,0,0-6.819,3.763,8.885,8.885,0,0,0-2.707,3c-5.149,11.249.933,35.054,4.44,47.148C385.508,344.372,384.668,349.305,387.535,351.456Z" transform="translate(-356.835 -255.572)" fill="#f8798a"></path> <path id="Контур_1312" data-name="Контур 1312" d="M380.923,305.251l2.781,15.838s5.213-.11,7.124-.868c0,0,11.5,10.959,15.35,10.432s-8.964-18.833-8.964-18.833Z" transform="translate(-357.309 -259.043)" fill="#ef6a80"></path> <path id="Контур_1313" data-name="Контур 1313" d="M430.031,348.6" transform="translate(-365.721 -266.468)" fill="#f1f1f1"></path> <g id="Сгруппировать_668" data-name="Сгруппировать 668" transform="translate(27.835 33.943)"><path id="Контур_1314" data-name="Контур 1314" d="M408.5,319c-1.281-2.15-7.479-8.151-14.6-18.968a8.814,8.814,0,0,0-5.849-3.487c-2.937,2.07-2.259,8.616-.72,11.763,5.8,11.86,16.82,20.278,18.416,20.419C402.89,324.035,408.5,319,408.5,319Z" transform="translate(-386.017 -291.494)" fill="#f2cfaa"></path> <path id="Контур_1315" data-name="Контур 1315" d="M422.22,298.855c0,.008-.008.017-.016.025a8.537,8.537,0,0,0-1.914,3.232c-2.537,8.915-3.86,19.375-5.022,21.7,0,0-2,8.373-9.07,1.772-.183-1.488,7.011-19.011,9.212-24.388a7.226,7.226,0,0,0,.467-2.9,10.031,10.031,0,0,1,3.909-7.783C420.761,289.878,425.017,294.57,422.22,298.855Z" transform="translate(-389.473 -290.451)" fill="#f2cfaa"></path></g> <g id="Сгруппировать_669" data-name="Сгруппировать 669" transform="translate(22.819 35.875)"><path id="Контур_1316" data-name="Контур 1316" d="M382.406,293.128s-3.99,2.839-1.77,9.6c.675,2.054,3.99,14.332,3.99,14.332s6.637-.107,9.343-2c5.557-3.883,5.863-6.912,5.863-6.912s-2.42-2.915-4.163-5.388c-1.039-1.473,1.492-.961,1.492-.961l-3.989-9.016Z" transform="translate(-379.964 -292.782)" fill="#f8798a"></path></g> <path id="Контур_1317" data-name="Контур 1317" d="M435.614,364.117l-18.372,2.508s-11.143,3.806-18.206,2.274c-13.878-3.01-10.2-17.714-8.164-20.351,8.362-10.808,25.356-10.762,25.356-10.762Z" transform="translate(-358.669 -264.616)" fill="#564b5e"></path> <path id="Контур_1318" data-name="Контур 1318" d="M467.939,404.469s-4.937-5.352-2.513-8.556,5.358-1.707,7.53.2,11.468,9.3,5.453,14.13Z" transform="translate(-371.669 -274.253)" fill="#d35974"></path> <g id="Сгруппировать_670" data-name="Сгруппировать 670" transform="translate(84.36 114.483)"><path id="Контур_1319" data-name="Контур 1319" d="M459.665,387.639a24.123,24.123,0,0,0,3.022,2.969c.4.3,2.735,1.454,4,2.34,1.348.943,1.658,1.638,3.076,2.733a14.107,14.107,0,0,1,3.429,3.241c.885,1.962-3.932,5.232-5.3,5.205-1.017-.021-4.244-5.171-4.97-5.755a23.275,23.275,0,0,1-2.889-3.267,21.32,21.32,0,0,0-5.811-4.652" transform="translate(-454.225 -387.639)" fill="#f2cfaa"></path></g> <path id="Контур_1320" data-name="Контур 1320" d="M470.841,405.049s4-1.718,3.754-5.276c0,0,3.994,3.387,5.312,6.228s-.367,6.722-4.815,6.716c-3.795-.007-6.71-7.469-6.71-7.469A2.779,2.779,0,0,0,470.841,405.049Z" transform="translate(-372.29 -275.234)" fill="#f8798a"></path> <path id="Контур_1321" data-name="Контур 1321" d="M442.377,367.919l-7.748-4.583A26.127,26.127,0,0,1,430.3,364.9c-.7.148-1.763.27-2.891.448a8.583,8.583,0,0,0-3.844.016c-2.476.593-1.91,1.018-3.749,3.07s-5.59,1.734-6.934,3.5,1.132,7.358,4.174,7.358c1.629,0,2-1.946,2.9-2.794s8.12-4.594,8.12-4.594V371.9c.8-.351,1.695-.806,2.806-1.359C434.363,368.81,442.377,367.919,442.377,367.919Z" transform="translate(-362.72 -268.993)" fill="#f2cfaa"></path> <path id="Контур_1322" data-name="Контур 1322" d="M412.984,356.648c12.238,22.417,37.912,31.933,37.912,31.933s-23.753-27.492-33.918-35.3C413.424,350.545,411.292,353.548,412.984,356.648Z" transform="translate(-362.7 -267.086)" fill="#89a5af" opacity="0.48" style="mix-blend-mode: multiply; isolation: isolate;"></path> <path id="Контур_1323" data-name="Контур 1323" d="M451.707,387.3c1.193.627,5.44-4.557,5.779-5.808,0,0-6.722-8.718-8.868-11.259-6.35-7.518-12.613-17.518-18.377-25.483-2.813-3.892-6.9-8.255-12.381-6.6-4.492,1.356-7.266,6.448-6.959,10.544s2.868,7.358,5.487,10.314C416.388,359,436.137,379.1,451.707,387.3Z" transform="translate(-362.44 -264.616)" fill="#564b5e"></path> <path id="Контур_1324" data-name="Контур 1324" d="M443.69,279.244l-1.618-3.081s-1.962-3.731-2.657-3.444c-.41.169-.331.548.027,1.435,0,0,.407,1.027.754,1.832-.748-.881-2.416-2.745-2.9-2.426-.37.245-.22.6.3,1.4,0,0,.435.678.87,1.327-.814-.893-1.871-1.92-2.238-1.677s-.22.6.3,1.4c0,0,1.262,1.966,1.637,2.41a4.077,4.077,0,0,1,.443,1.116,12.024,12.024,0,0,0-1.412-1.783c-.407-.331-.915-.293-.915.2s1.332,2.126,1.549,2.813,1.187,4.3,1.187,4.3l.2-3.563.793-1.755c.119.493.2.866.2.866l.67-1.482c.029.6.039,1.069.039,1.069Z" transform="translate(-366.748 -253.468)" fill="#f2cfaa"></path> <path id="Контур_1325" data-name="Контур 1325" d="M419.93,292.007s1.983-3.084,2.634-4.128a6.617,6.617,0,0,1,2.542-2.349c.391,0,.326.835-.2,1.608a40.592,40.592,0,0,0-1.792,3.77Z" transform="translate(-363.991 -255.665)" fill="#f2cfaa"></path> <g id="Сгруппировать_671" data-name="Сгруппировать 671" transform="translate(109.544 122.9)"><path id="Контур_1326" data-name="Контур 1326" d="M494.584,400.83s-6.176-1.945-7.927-1.41a3.129,3.129,0,0,0-1.119,5.155c1.848,1.994,8.585,3.267,11.332,3.453,4.3.292,7.563-3.109,6.042-4.813s-8.037-2.336-8.037-2.336" transform="translate(-484.615 -398.057)" fill="#d35974"></path> <path id="Контур_1327" data-name="Контур 1327" d="M493.694,398.192c-1.095.963-1.865,4.794-1.425,7.472a25.181,25.181,0,0,0,6.718,1.115c5.547-.271,6.777-5.661,3.318-7.03a34.119,34.119,0,0,0-6.59-1.849A2.4,2.4,0,0,0,493.694,398.192Z" transform="translate(-485.905 -397.795)" fill="#f8798a"></path></g></g> <g id="Сгруппировать_677" data-name="Сгруппировать 677" transform="translate(582.21 225.415)"><g id="Сгруппировать_674" data-name="Сгруппировать 674" transform="translate(17.646 0)"><g id="Сгруппировать_673" data-name="Сгруппировать 673"><path id="Контур_1328" data-name="Контур 1328" d="M661.024,252.455A1.455,1.455,0,1,1,659.568,251,1.455,1.455,0,0,1,661.024,252.455Z" transform="translate(-658.114 -251.001)" fill="#e56e82"></path> <path id="Контур_1329" data-name="Контур 1329" d="M667.847,252.455A1.455,1.455,0,1,1,666.392,251,1.455,1.455,0,0,1,667.847,252.455Z" transform="translate(-659.283 -251.001)" fill="#e56e82"></path> <path id="Контур_1330" data-name="Контур 1330" d="M674.67,252.455A1.455,1.455,0,1,1,673.215,251,1.455,1.455,0,0,1,674.67,252.455Z" transform="translate(-660.451 -251.001)" fill="#e56e82"></path></g></g> <g id="Сгруппировать_676" data-name="Сгруппировать 676" transform="translate(0 6.15)"><rect id="Прямоугольник_1881" data-name="Прямоугольник 1881" width="31.865" height="31.471" rx="4.141" fill="#4f78d3"></rect> <g id="Сгруппировать_675" data-name="Сгруппировать 675" transform="translate(2.571 4.572)"><path id="Контур_1331" data-name="Контур 1331" d="M643.025,283.4s-3.206-.357-3.049-1.3,4.277-3.767,6.906-4.539c.054,1.317,2.5,2.078,4.119,1.884,2.861-.342,5.042-5.246,5.624-6.762a19.443,19.443,0,0,1,4.3-7.093c1.952-1.9,2.235-1.633,2.235-1.633a6.649,6.649,0,0,1,2.567,6.726c-.351,1.885-1.318,4.637-2.583,3.994a11.1,11.1,0,0,0-1.3-.52l-2.35,1.824-2.082,2.586-2.552,4.767-3.341,1.038Z" transform="translate(-639.931 -263.94)" fill="#fff"></path> <path id="Контур_1332" data-name="Контур 1332" d="M639.968,283.467a62.481,62.481,0,0,0,11.656,1.775c2.194-.071,2.774-.9,3.693-2.484a33.986,33.986,0,0,1,3.894-5.91,26,26,0,0,1,6.529-4.9,13.525,13.525,0,0,1-.364,3.37,61.041,61.041,0,0,0-1.146,6.164c-.241,2.543-.3,5.51-.3,5.51s.415-.032-.961-.032c0-1.879-.7-9.77-1-10.111s-.836-.664-1.91.31a12.5,12.5,0,0,0-3.671,5.54c-1.389,3.717-2.979,4.4-4.05,4.465-2.6.162-10.162-.757-12.151-1.908A3.123,3.123,0,0,1,639.968,283.467Z" transform="translate(-639.923 -265.312)" fill="#e8e8e8"></path></g></g></g> <g id="Сгруппировать_683" data-name="Сгруппировать 683" transform="translate(482.833 171.851)"><rect id="Прямоугольник_1882" data-name="Прямоугольник 1882" width="77.718" height="67.924" rx="9.192" fill="#4f78d3"></rect> <g id="Сгруппировать_678" data-name="Сгруппировать 678" transform="translate(7.359 4.762)"><path id="Контур_1333" data-name="Контур 1333" d="M529.084,193.763a1.65,1.65,0,1,1-1.651-1.651A1.651,1.651,0,0,1,529.084,193.763Z" transform="translate(-525.783 -192.112)" fill="none" stroke="#fefef4" stroke-miterlimit="10" stroke-width="0.772"></path> <circle id="Эллипс_105" data-name="Эллипс 105" cx="1.65" cy="1.65" r="1.65" transform="translate(6.414 0)" fill="none" stroke="#fefef4" stroke-miterlimit="10" stroke-width="0.772"></circle> <circle id="Эллипс_106" data-name="Эллипс 106" cx="1.65" cy="1.65" r="1.65" transform="translate(12.827 0)" fill="none" stroke="#fefef4" stroke-miterlimit="10" stroke-width="0.772"></circle></g> <line id="Линия_451" data-name="Линия 451" x2="77.67" transform="translate(0 13.295)" fill="none" stroke="#fefef4" stroke-miterlimit="10" stroke-width="0.772"></line> <g id="Сгруппировать_682" data-name="Сгруппировать 682" transform="translate(5.57 22.901)"><g id="Сгруппировать_680" data-name="Сгруппировать 680" transform="translate(41.085)"><path id="Контур_1334" data-name="Контур 1334" d="M575.267,214l.638,1.293,1.427.207-1.032,1.006.244,1.421-1.276-.671-1.276.671.244-1.421L573.2,215.5l1.427-.207Z" transform="translate(-573.202 -214)" fill="#ffb53e"></path> <path id="Контур_1335" data-name="Контур 1335" d="M582.313,214l.638,1.293,1.427.207-1.032,1.006.244,1.421-1.276-.671-1.276.671.244-1.421-1.032-1.006,1.427-.207Z" transform="translate(-574.409 -214)" fill="#ffb53e"></path> <path id="Контур_1336" data-name="Контур 1336" d="M589.358,214l.638,1.293,1.427.207-1.032,1.006.244,1.421-1.276-.671-1.276.671.244-1.421-1.032-1.006,1.427-.207Z" transform="translate(-575.616 -214)" fill="#ffb53e"></path> <path id="Контур_1337" data-name="Контур 1337" d="M596.4,214l.638,1.293,1.427.207-1.032,1.006.244,1.421-1.276-.671-1.276.671.244-1.421-1.032-1.006,1.427-.207Z" transform="translate(-576.823 -214)" fill="#ffb53e"></path> <path id="Контур_1338" data-name="Контур 1338" d="M603.449,214l.638,1.293,1.427.207-1.032,1.006.244,1.421-1.276-.671-1.276.671.244-1.421-1.032-1.006,1.427-.207Z" transform="translate(-578.029 -214)" fill="#ffb53e"></path> <g id="Сгруппировать_679" data-name="Сгруппировать 679" transform="translate(0.95 8.652)" opacity="0.55"><line id="Линия_452" data-name="Линия 452" x1="6.659" transform="translate(0 7.841)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_453" data-name="Линия 453" x1="16.724" transform="translate(9.545 7.841)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_454" data-name="Линия 454" x1="26.268" transform="translate(0 3.921)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_455" data-name="Линия 455" x1="11.147" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_456" data-name="Линия 456" x1="12.346" transform="translate(13.922)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_457" data-name="Линия 457" x1="21.606" transform="translate(0 11.762)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line> <line id="Линия_458" data-name="Линия 458" x1="21.606" transform="translate(0 15.46)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.567"></line></g></g> <path id="Контур_1339" data-name="Контур 1339" d="M596.009,256.149H577.255a4.2,4.2,0,0,1-4.2-4.2h0a4.2,4.2,0,0,1,4.2-4.2h18.755a4.2,4.2,0,0,1,4.2,4.2h0A4.2,4.2,0,0,1,596.009,256.149Z" transform="translate(-532.092 -219.783)" fill="#fff"></path> <text id="ORDER" transform="translate(46.287 32.368)" fill="#ffc359" font-size="3" font-family="Montserrat-Bold, Montserrat" font-weight="700" letter-spacing="0.1em"><tspan x="0" y="0">ORDER</tspan></text> <path id="Прямоугольник_1883" data-name="Прямоугольник 1883" d="M5.584,0H30.559a5.584,5.584,0,0,1,5.584,5.584V30.766a5.583,5.583,0,0,1-5.583,5.583H5.583A5.583,5.583,0,0,1,0,30.766V5.584A5.584,5.584,0,0,1,5.584,0Z" transform="translate(0 0.003)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.593"></path> <g id="Сгруппировать_681" data-name="Сгруппировать 681" transform="translate(3.49 6.956)"><path id="Контур_1340" data-name="Контур 1340" d="M554.688,237.012c-.263-1.719-.093-10.715-.525-14.218a8.093,8.093,0,0,0-7.882,1.752c-4.428,11.434-12.637,14.143-12.637,14.143l.068.078-.043,0c-.011-.027-.013-.057-.025-.083-3.99-.167-4.956,1.26-4.956,1.26s1.294.825,2.515,1.49l-.229.506,6.672,1.388s15.991.538,16.885-.576S554.952,238.73,554.688,237.012Z" transform="translate(-527.982 -222.394)" fill="#fff"></path> <path id="Контур_1341" data-name="Контур 1341" d="M548.287,247.242c-2.022.028-4.18.026-6.217.023-1.9,0-3.7-.006-5.232.017a23.165,23.165,0,0,1-8.884-1.878,1.464,1.464,0,0,1,.588-1.827c.37.133,4.751,2.1,8.7,2.048,1.556-.022,3.362-.02,5.275-.017,4.5.006,11.663-.089,12.33-.322a1.772,1.772,0,0,1-.116,1.638C553.125,247.121,550.812,247.206,548.287,247.242Z" transform="translate(-527.835 -226.022)" fill="#e8e8e8"></path> <path id="Контур_1342" data-name="Контур 1342" d="M545.988,232.4c-.115.148-.232.294-.349.438l1.888,2.417a.273.273,0,0,0,.43-.335Z" transform="translate(-530.885 -224.107)" fill="#e2e2e2"></path> <path id="Контур_1343" data-name="Контур 1343" d="M544.594,234.081q-.184.211-.367.417l1.665,2.131a.272.272,0,1,0,.429-.336Z" transform="translate(-530.643 -224.396)" fill="#e2e2e2"></path> <path id="Контур_1344" data-name="Контур 1344" d="M543.134,235.682c-.128.134-.255.266-.383.4l1.495,1.914a.272.272,0,0,0,.429-.336Z" transform="translate(-530.39 -224.67)" fill="#e2e2e2"></path> <path id="Контур_1345" data-name="Контур 1345" d="M541.614,237.2c-.133.128-.266.254-.4.376l1.373,1.759a.272.272,0,1,0,.429-.335Z" transform="translate(-530.128 -224.931)" fill="#e2e2e2"></path> <path id="Контур_1346" data-name="Контур 1346" d="M540.037,238.654c-.139.123-.277.243-.412.359l1.3,1.664a.273.273,0,0,0,.429-.336Z" transform="translate(-529.855 -225.179)" fill="#e2e2e2"></path> <path id="Контур_1347" data-name="Контур 1347" d="M538.4,240.032c-.147.118-.288.232-.427.341L539.249,242a.273.273,0,1,0,.43-.336Z" transform="translate(-529.573 -225.415)" fill="#e2e2e2"></path></g></g></g> <g id="Сгруппировать_687" data-name="Сгруппировать 687" transform="translate(337.391 191.608)"><g id="Сгруппировать_685" data-name="Сгруппировать 685" transform="translate(0 0)"><g id="Сгруппировать_684" data-name="Сгруппировать 684"><rect id="Прямоугольник_1884" data-name="Прямоугольник 1884" width="35.957" height="32.557" rx="8.196" fill="none" stroke="#c7e9ff" stroke-miterlimit="10" stroke-width="1.127"></rect></g></g> <g id="Сгруппировать_686" data-name="Сгруппировать 686" transform="translate(7.65 7.024)"><path id="Контур_1348" data-name="Контур 1348" d="M365.389,232.075l1.046,8.033h2.388c.118-.537,1.579-8.925,1.776-9.654S365.389,232.075,365.389,232.075Z" transform="translate(-353.157 -220.674)" fill="#d1546f"></path> <path id="Контур_1349" data-name="Контур 1349" d="M367.84,229.877,363,232.9l-4.678,5.029s-7.129.04-7.495-.159c-.118-.065-.172-.065-.19-.037a.623.623,0,0,0,.158.483,4.294,4.294,0,0,0,1.862,1.05,12,12,0,0,0,5.943.525c1.621-.349,2.291-2.587,2.71-3.183a9.8,9.8,0,0,1,5.281-3.872,3.149,3.149,0,0,0,1.382-1.587C368.293,230.149,367.84,229.877,367.84,229.877Z" transform="translate(-350.629 -220.6)" fill="#d1546f"></path> <path id="Контур_1350" data-name="Контур 1350" d="M368.129,227.8a20.538,20.538,0,0,0-1.264-3.791c-.132-.324-1.212-4.215-.906-5.141a27.266,27.266,0,0,0-6.6.054c.318.907-.907,10.288-2.869,12.91a8.453,8.453,0,0,1-4.138,2.9c-1.824.487-1.711,1.079-1.711,1.079a11.162,11.162,0,0,0,7.51,1.533c1.814-.382,1.968-1.849,2.779-2.994a10.2,10.2,0,0,1,5.383-4.119A2.461,2.461,0,0,0,368.129,227.8Z" transform="translate(-350.631 -218.682)" fill="#f8798a"></path></g></g> <g id="Сгруппировать_692" data-name="Сгруппировать 692" transform="translate(423.87 219.682)"><g id="Сгруппировать_689" data-name="Сгруппировать 689" transform="translate(0 0)"><g id="Сгруппировать_688" data-name="Сгруппировать 688" transform="translate(2.225 13.574)"><path id="Контур_1351" data-name="Контур 1351" d="M452.372,263.479l-3.934,2.1,1.967-5.114" transform="translate(-448.438 -260.463)" fill="#4f78d3"></path></g> <circle id="Эллипс_107" data-name="Эллипс 107" cx="8.315" cy="8.315" r="8.315" transform="translate(0 16.155) rotate(-76.265)" fill="#4f78d3"></circle></g> <g id="Сгруппировать_691" data-name="Сгруппировать 691" transform="translate(5.169 4.468)"><g id="Сгруппировать_690" data-name="Сгруппировать 690" transform="translate(3.329)"><path id="Контур_1352" data-name="Контур 1352" d="M456.074,259.041c1.812.031,3.646.056,5.313-.06.528-.036.984-.875.343-1.139a1.185,1.185,0,0,0,.66-.574.566.566,0,0,0-.321-.748c.628.156.876-.842.386-1.163a1.467,1.467,0,0,0,.53-.849.851.851,0,0,0-.382-.879,1.373,1.373,0,0,0-.653-.113l-2.261-.017a5.218,5.218,0,0,0-.334-3.5c-.181-.312-.665-.686-1.051-.447-.361.225-.261.785-.243,1.138a3.982,3.982,0,0,1-2.055,3.634S456.092,257.446,456.074,259.041Z" transform="translate(-456.007 -249.474)" fill="#fdfdfd"></path></g> <rect id="Прямоугольник_1885" data-name="Прямоугольник 1885" width="2.739" height="4.714" transform="translate(0 4.848)" fill="#fdfdfd"></rect></g></g> <g id="Сгруппировать_695" data-name="Сгруппировать 695" transform="translate(482.833 253.579)"><path id="Контур_1353" data-name="Контур 1353" d="M592.017,290.1H519.458a2.556,2.556,0,0,1-2.556-2.555h0a2.556,2.556,0,0,1,2.556-2.556h72.559a2.555,2.555,0,0,1,2.555,2.556h0A2.555,2.555,0,0,1,592.017,290.1Z" transform="translate(-516.902 -284.986)" fill="#fff"></path> <path id="Контур_1354" data-name="Контур 1354" d="M592.473,288.07l-6.353,34.6h-59.6l-6.353-34.6" transform="translate(-517.462 -285.514)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></path> <line id="Линия_459" data-name="Линия 459" y2="34.598" transform="translate(38.835 2.555)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <g id="Сгруппировать_693" data-name="Сгруппировать 693" transform="translate(12.626 2.555)"><line id="Линия_460" data-name="Линия 460" x2="0.934" y2="34.598" transform="translate(17.473)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_461" data-name="Линия 461" x2="1.868" y2="34.598" transform="translate(8.737)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_462" data-name="Линия 462" x2="2.801" y2="34.598" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line></g> <g id="Сгруппировать_694" data-name="Сгруппировать 694" transform="translate(46.899 2.555)"><line id="Линия_463" data-name="Линия 463" x1="0.934" y2="34.598" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_464" data-name="Линия 464" x1="1.868" y2="34.598" transform="translate(7.803)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_465" data-name="Линия 465" x1="2.801" y2="34.598" transform="translate(15.605)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line></g> <line id="Линия_466" data-name="Линия 466" x2="68.327" transform="translate(4.705 12.875)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_467" data-name="Линия 467" x2="65.627" transform="translate(6.046 20.734)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <line id="Линия_468" data-name="Линия 468" x2="62.741" transform="translate(7.489 28.594)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.254"></line> <path id="Контур_1355" data-name="Контур 1355" d="M520.169,288.07v9.253a6.339,6.339,0,0,0,6.339,6.339h59.626a6.338,6.338,0,0,0,6.338-6.339V288.07" transform="translate(-517.462 -285.514)" fill="none" stroke="#f8798a" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2.254"></path> <path id="Контур_1356" data-name="Контур 1356" d="M521.666,287.68a1.887,1.887,0,1,1-1.887-1.888A1.887,1.887,0,0,1,521.666,287.68Z" transform="translate(-517.072 -285.124)" fill="#f8798a"></path> <path id="Контур_1357" data-name="Контур 1357" d="M608.914,287.68a1.887,1.887,0,1,1-1.887-1.888A1.887,1.887,0,0,1,608.914,287.68Z" transform="translate(-532.016 -285.124)" fill="#f8798a"></path></g> <g id="Сгруппировать_700" data-name="Сгруппировать 700" transform="translate(497.405 295.613)"><g id="Сгруппировать_699" data-name="Сгруппировать 699" transform="translate(1.253 0.899)"><g id="Сгруппировать_698" data-name="Сгруппировать 698"><rect id="Прямоугольник_1886" data-name="Прямоугольник 1886" width="49.597" height="49.596" fill="#e89c03"></rect> <rect id="Прямоугольник_1887" data-name="Прямоугольник 1887" width="20.719" height="49.596" transform="translate(49.162)" fill="#f5a905"></rect> <g id="Сгруппировать_697" data-name="Сгруппировать 697" transform="translate(4.188 41.051)"><g id="Сгруппировать_696" data-name="Сгруппировать 696"><rect id="Прямоугольник_1888" data-name="Прямоугольник 1888" width="9.508" height="4.075" fill="#fec00d"></rect> <rect id="Прямоугольник_1889" data-name="Прямоугольник 1889" width="3.179" height="4.075" transform="translate(10.454)" fill="#fec00d"></rect> <rect id="Прямоугольник_1890" data-name="Прямоугольник 1890" width="3.179" height="4.075" transform="translate(18.087)" fill="#fec00d"></rect> <rect id="Прямоугольник_1891" data-name="Прямоугольник 1891" width="1.294" height="4.075" transform="translate(14.954)" fill="#fec00d"></rect></g></g></g></g> <rect id="Прямоугольник_1892" data-name="Прямоугольник 1892" width="50.414" height="8.402" fill="#fec00d"></rect> <rect id="Прямоугольник_1893" data-name="Прямоугольник 1893" width="22.313" height="8.402" transform="translate(50.414)" fill="#fecd40"></rect></g> <g id="Сгруппировать_706" data-name="Сгруппировать 706" transform="translate(563.019 287.324)"><g id="Сгруппировать_704" data-name="Сгруппировать 704" transform="translate(0)"><path id="Контур_1358" data-name="Контур 1358" d="M667.581,382.334H613.663l4.039-56.52,4.645-.012,41.517-.1,3.207,48.8Z" transform="translate(-613.663 -325.707)" fill="#6569ce"></path> <g id="Сгруппировать_703" data-name="Сгруппировать 703" transform="translate(14.732 3.462)"><g id="Сгруппировать_701" data-name="Сгруппировать 701" transform="translate(0 0.041)"><path id="Контур_1359" data-name="Контур 1359" d="M631.44,331.5h0a1.728,1.728,0,0,1,1.846-1.568h0a1.586,1.586,0,1,1,.005,3.128h0A1.728,1.728,0,0,1,631.44,331.5Zm1.848-.972a1,1,0,1,0,0,1.935h0a1,1,0,1,0,0-1.935Zm-1.557.971h0Z" transform="translate(-631.44 -329.934)" fill="#543ace"></path></g> <g id="Сгруппировать_702" data-name="Сгруппировать 702" transform="translate(18.381)"><path id="Контур_1360" data-name="Контур 1360" d="M653.62,331.452l.3,0-.3,0a1.433,1.433,0,0,1,.433-1.013,1.992,1.992,0,0,1,1.411-.555h.008a1.726,1.726,0,0,1,1.848,1.559,1.443,1.443,0,0,1-.561,1.127,2.026,2.026,0,0,1-1.285.442h0A1.729,1.729,0,0,1,653.62,331.452Zm1.845-.971a1.4,1.4,0,0,0-.989.381.827.827,0,0,0-.259.588h0a1.142,1.142,0,0,0,1.254.965h0a1.436,1.436,0,0,0,.907-.306.865.865,0,0,0,.342-.664,1.14,1.14,0,0,0-1.252-.965Z" transform="translate(-653.62 -329.884)" fill="#543ace"></path></g></g></g> <g id="Сгруппировать_705" data-name="Сгруппировать 705" transform="translate(15.898 4.427)"><path id="Контур_1361" data-name="Контур 1361" d="M642.172,343.059c.172,0,.346,0,.524-.009,3.378-.113,5.953-1.2,7.656-3.233,2.817-3.365,2.18-8.057,2.151-8.255a.6.6,0,0,0-1.183.169c.007.044.588,4.376-1.889,7.327-1.474,1.756-3.755,2.7-6.775,2.8-2.924.087-5.1-.672-6.555-2.287-2.633-2.931-1.985-7.748-1.978-7.8a.6.6,0,0,0-1.183-.169c-.031.22-.736,5.406,2.267,8.758A8.9,8.9,0,0,0,642.172,343.059Z" transform="translate(-632.846 -331.048)" fill="#543ace"></path></g> <path id="Контур_1362" data-name="Контур 1362" d="M667.581,382.353H613.663l4.038-56.52,4.645-.012c.3,2.316,6.355,44.926,44.725,48.7Z" transform="translate(-613.663 -325.727)" fill="#6569ce" opacity="0.3" style="mix-blend-mode: multiply; isolation: isolate;"></path></g> <g id="Сгруппировать_709" data-name="Сгруппировать 709" transform="translate(548.479 313.396)"><g id="Сгруппировать_708" data-name="Сгруппировать 708" transform="translate(0)"><path id="Контур_1363" data-name="Контур 1363" d="M654.657,399.3h-58.54l6.45-42.028,2.72-.012,43.441-.1,5.286,37.585Z" transform="translate(-596.117 -357.167)" fill="#ffc359"></path> <g id="Сгруппировать_707" data-name="Сгруппировать 707" transform="translate(17.441 3.842)"><path id="Контур_1364" data-name="Контур 1364" d="M617.163,363.151a1.577,1.577,0,1,0,1.547-1.3A1.442,1.442,0,0,0,617.163,363.151Z" transform="translate(-617.163 -361.812)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.728"></path> <path id="Контур_1365" data-name="Контур 1365" d="M639.342,363.1a1.577,1.577,0,1,0,1.547-1.3A1.442,1.442,0,0,0,639.342,363.1Z" transform="translate(-620.962 -361.803)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.728"></path></g></g> <path id="Контур_1366" data-name="Контур 1366" d="M637.4,363.363s1.507,10.672-9.235,11.039-9.145-11-9.145-11" transform="translate(-600.025 -358.228)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.456"></path> <path id="Контур_1367" data-name="Контур 1367" d="M654.657,399.322h-58.54l6.451-42.028,2.721-.012.012.012s-2.542,41.232,48.716,37.478Z" transform="translate(-596.117 -357.187)" fill="#eebe6a" opacity="0.3" style="mix-blend-mode: multiply; isolation: isolate;"></path></g> <g id="Сгруппировать_712" data-name="Сгруппировать 712" transform="translate(337.915 341.223)"><g id="Сгруппировать_711" data-name="Сгруппировать 711" transform="translate(0)"><path id="Контур_1368" data-name="Контур 1368" d="M384.365,421.218H342.03l4.665-30.394,1.967-.009,31.416-.069,3.823,27.181Z" transform="translate(-342.03 -390.746)" fill="#ffc359"></path> <g id="Сгруппировать_710" data-name="Сгруппировать 710" transform="translate(12.613 2.778)"><path id="Контур_1369" data-name="Контур 1369" d="M357.25,395.074a1.14,1.14,0,1,0,1.119-.937A1.043,1.043,0,0,0,357.25,395.074Z" transform="translate(-357.25 -394.105)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.527"></path> <path id="Контур_1370" data-name="Контур 1370" d="M373.289,395.036a1.141,1.141,0,1,0,1.119-.937A1.043,1.043,0,0,0,373.289,395.036Z" transform="translate(-359.997 -394.099)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.527"></path></g></g> <path id="Контур_1371" data-name="Контур 1371" d="M371.883,395.227s1.09,7.718-6.679,7.984-6.613-7.952-6.613-7.952" transform="translate(-344.856 -391.514)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.053"></path> <path id="Контур_1372" data-name="Контур 1372" d="M384.365,421.232H342.03l4.665-30.394,1.967-.009.008.009s-1.838,29.818,35.231,27.1Z" transform="translate(-342.03 -390.761)" fill="#eebe6a" opacity="0.3" style="mix-blend-mode: multiply; isolation: isolate;"></path></g> <g id="Сгруппировать_719" data-name="Сгруппировать 719" transform="translate(387.583 185.62)"><g id="Сгруппировать_718" data-name="Сгруппировать 718"><g id="Сгруппировать_716" data-name="Сгруппировать 716"><g id="Сгруппировать_715" data-name="Сгруппировать 715"><g id="Сгруппировать_713" data-name="Сгруппировать 713"><rect id="Прямоугольник_1894" data-name="Прямоугольник 1894" width="57.197" height="18.109" rx="5.053" fill="#c7e9ff"></rect></g> <g id="Сгруппировать_714" data-name="Сгруппировать 714" transform="translate(4.146 15.351)"><path id="Контур_1373" data-name="Контур 1373" d="M408.572,221.5s-1.6,11.439-1.6,10.738,8.094-9.772,8.094-9.772Z" transform="translate(-406.968 -221.504)" fill="#c7e9ff"></path></g></g></g> <g id="Сгруппировать_717" data-name="Сгруппировать 717" transform="translate(2.446 4.833)"><path id="Контур_1374" data-name="Контур 1374" d="M410.739,211.615l3.064.491-2.254,2.133.48,3.066-2.725-1.484-2.768,1.4.569-3.05-2.19-2.2,3.077-.4,1.414-2.762Z" transform="translate(-404.916 -208.812)" fill="#ffb53e"></path> <path id="Контур_1375" data-name="Контур 1375" d="M423.843,211.615l3.064.491-2.254,2.133.48,3.066-2.725-1.484-2.768,1.4.569-3.05-2.19-2.2,3.077-.4,1.414-2.762Z" transform="translate(-407.16 -208.812)" fill="#ffb53e"></path> <path id="Контур_1376" data-name="Контур 1376" d="M436.947,211.615l3.064.491-2.254,2.133.48,3.066-2.725-1.484-2.767,1.4.569-3.05-2.19-2.2,3.077-.4,1.414-2.762Z" transform="translate(-409.405 -208.812)" fill="#ffb53e"></path> <path id="Контур_1377" data-name="Контур 1377" d="M450.857,214.238l.486,3.063-2.624-1.419-.1-.056-2.764,1.4.56-3.053-2.185-2.194,3.072-.4,1.419-2.764,1.335,2.8,3.063.495Z" transform="translate(-411.65 -208.812)" fill="#fff"></path> <path id="Контур_1378" data-name="Контур 1378" d="M463.154,211.615l3.064.491-2.254,2.133.48,3.066-2.725-1.484-2.768,1.4.569-3.05-2.19-2.2,3.077-.4,1.414-2.762Z" transform="translate(-413.894 -208.812)" fill="#fff"></path></g></g> <path id="Контур_1379" data-name="Контур 1379" d="M448.719,208.812v7.069l-.1-.056-2.764,1.4.56-3.053-2.185-2.194,3.072-.4Z" transform="translate(-409.204 -203.979)" fill="#ffb53e"></path></g> <g id="Сгруппировать_720" data-name="Сгруппировать 720" transform="translate(346.273 101.631)"><circle id="Эллипс_108" data-name="Эллипс 108" cx="2.836" cy="2.836" r="2.836" transform="translate(267.829 114.797)" fill="#c7e9ff"></circle> <circle id="Эллипс_109" data-name="Эллипс 109" cx="2.836" cy="2.836" r="2.836" transform="translate(274.383 168.695)" fill="#c7e9ff"></circle> <path id="Контур_1380" data-name="Контур 1380" d="M435.762,180.643a1.721,1.721,0,1,1-1.721-1.721A1.721,1.721,0,0,1,435.762,180.643Z" transform="translate(-365.854 -114.87)" fill="#c7e9ff"></path> <circle id="Эллипс_110" data-name="Эллипс 110" cx="1.721" cy="1.721" r="1.721" transform="translate(4.766 43.073)" fill="#c7e9ff"></circle> <path id="Контур_1381" data-name="Контур 1381" d="M418.1,115.559a1.722,1.722,0,1,1-1.722-1.722A1.721,1.721,0,0,1,418.1,115.559Z" transform="translate(-362.829 -103.722)" fill="#c7e9ff"></path> <circle id="Эллипс_111" data-name="Эллипс 111" cx="2.582" cy="2.582" r="2.582" transform="translate(110.355 108.388)" fill="#c7e9ff"></circle> <circle id="Эллипс_112" data-name="Эллипс 112" cx="2.582" cy="2.582" r="2.582" transform="translate(0 139.031)" fill="#c7e9ff"></circle> <circle id="Эллипс_113" data-name="Эллипс 113" cx="2.582" cy="2.582" r="2.582" transform="translate(98.589 61.469)" fill="#c7e9ff"></circle> <circle id="Эллипс_114" data-name="Эллипс 114" cx="2.582" cy="2.582" r="2.582" transform="translate(268.083 48.28)" fill="#c7e9ff"></circle> <path id="Контур_1382" data-name="Контур 1382" d="M527.3,103.352a1.721,1.721,0,1,1-1.721-1.721A1.721,1.721,0,0,1,527.3,103.352Z" transform="translate(-381.534 -101.631)" fill="#c7e9ff"></path> <path id="Контур_1383" data-name="Контур 1383" d="M649.637,177.531a1.722,1.722,0,1,1-1.721-1.722A1.721,1.721,0,0,1,649.637,177.531Z" transform="translate(-402.489 -114.337)" fill="#c7e9ff"></path> <path id="Контур_1384" data-name="Контур 1384" d="M661.235,121.568a1.722,1.722,0,1,1-1.722-1.721A1.722,1.722,0,0,1,661.235,121.568Z" transform="translate(-404.475 -104.751)" fill="#c7e9ff"></path> <path id="Контур_1385" data-name="Контур 1385" d="M463.731,315.6a1.722,1.722,0,1,1-1.722-1.721A1.721,1.721,0,0,1,463.731,315.6Z" transform="translate(-370.645 -137.987)" fill="#c7e9ff"></path></g></g></svg></div> <div class="subscribe_info"><div class="subscribe_info_text"><strong><h6>Покупать легко со SmartBazar.kz!</h6></strong> <p>Подпишитесь на рассылку об акциях и скидках</p></div> <div class="subscribe_info_form"><form action="" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Введите ваш email адрес"> <button type="submit">Подпишитесь</button></form></div></div> <div class="subscribe_banner">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="264.917" height="238.725" viewBox="0 0 264.917 238.725"><g id="Сгруппировать_747" data-name="Сгруппировать 747" transform="translate(-328.4 -115.023)"><path id="Контур_1386" data-name="Контур 1386" d="M444.1,115.052l0,0c.016-.01.031-.023.048-.032Z" transform="translate(-21.854)" fill="#56438c"></path> <g id="Сгруппировать_746" data-name="Сгруппировать 746" transform="translate(328.4 130.475)"><g id="Сгруппировать_722" data-name="Сгруппировать 722" transform="translate(21.814 8.263)"><path id="Контур_1387" data-name="Контур 1387" d="M575.122,187.549c-12.249-16.4-31.089-26.694-50.406-33.468-34.625-12.142-73.856-14.159-107.533.407s-60.311,47.465-61.786,84.127c-1.29,32.073,9.447,68.367,34.308,88.672s58.232,28.589,90.254,26.368c39.544-2.742,67.633-18.837,93.34-49.009a31.513,31.513,0,0,0,7.245-16.5c.5-4.049-1.106-10.029-6.542-8.206a37.331,37.331,0,0,0-4.075,2.149c-1.387.665-3.144.956-4.392.057-1.282-.924-1.533-2.715-1.517-4.3.137-13.126,11.6-21.955,17.606-32.618C591.669,227.392,587.372,203.949,575.122,187.549ZM420.633,170.307a14.744,14.744,0,0,1-5.259,4.73,10.634,10.634,0,0,1-4.417,1.792,4.111,4.111,0,0,1-4.091-1.93,5.109,5.109,0,0,1,.432-4.451,14.22,14.22,0,0,1,9.9-7.509C421.734,162.131,422.621,166.94,420.633,170.307Zm14.3-6.289a4.076,4.076,0,0,1-4.029,2.545,4.158,4.158,0,0,1-3.612-3.129c-.846-3.661,3.307-6.04,6.255-3.961A4,4,0,0,1,434.933,164.019Zm106.252,159.7a2.583,2.583,0,0,1-.248-2.8c1.119-2.4,6.877-8.936,8.032-3.821C549.728,320.462,544.3,327.07,541.184,323.72Z" transform="translate(-355.293 -144.26)" fill="#b9f3ff"></path> <path id="Контур_1388" data-name="Контур 1388" d="M650.257,279.074c-1.371-1.339-3.6-1.276-5.423-.692a12.575,12.575,0,0,0-7.852,7.531c-1,2.719-1.577,8.325,1.42,10.137,2.786,1.685,7.152-.706,9.006-2.772a17.837,17.837,0,0,0,3.716-8.208C651.579,283.007,651.768,280.551,650.257,279.074Z" transform="translate(-408.347 -169.519)" fill="#b9f3ff"></path></g> <g id="Сгруппировать_745" data-name="Сгруппировать 745"><g id="Сгруппировать_724" data-name="Сгруппировать 724" transform="translate(61.091 0.875)"><path id="Контур_1389" data-name="Контур 1389" d="M590.544,182.072l.008,0-.038-.069a10.8,10.8,0,0,0-.763-1.4l-5.48-10.037-2.018,5.062L506.9,150.5c-6.8-2.269-15.131,1.691-18.6,8.848L412.533,315.678l-7.47.659,6.24,11.425.011-.014a10.74,10.74,0,0,0,6.667,6.216l77.126,25.724c6.8,2.269,15.128-1.7,18.594-8.852l76.36-157.553A13.232,13.232,0,0,0,590.544,182.072Z" transform="translate(-403.971 -137.929)" fill="#797c99"></path> <g id="Сгруппировать_723" data-name="Сгруппировать 723"><path id="Контур_1390" data-name="Контур 1390" d="M500.186,135.791l77.126,25.724c6.8,2.269,9.5,9.908,6.033,17.065L506.986,336.134c-3.466,7.151-11.793,11.12-18.594,8.851l-77.126-25.724c-6.8-2.269-9.505-9.916-6.04-17.068l76.36-157.553C485.055,137.482,493.384,133.522,500.186,135.791Z" transform="translate(-403.717 -135.152)" fill="#495375"></path> <path id="Контур_1391" data-name="Контур 1391" d="M493.5,342.039a8.03,8.03,0,0,1-2.537-.4l-77.126-25.724a6.08,6.08,0,0,1-3.8-3.467,8.728,8.728,0,0,1,.491-7.13l76.36-157.554a12.11,12.11,0,0,1,10.375-6.854,8.025,8.025,0,0,1,2.541.4l77.126,25.725a6.072,6.072,0,0,1,3.8,3.461,8.737,8.737,0,0,1-.493,7.134L503.87,335.184A12.111,12.111,0,0,1,493.5,342.039Z" transform="translate(-404.805 -136.24)" fill="#96e4ff"></path> <path id="Контур_1392" data-name="Контур 1392" d="M561.777,195.326c-4.932.681-10.123,2.495-14.7.543-4.367-1.861-6.679-6.52-9.54-10.307a32.427,32.427,0,0,0-57.409,12.013c-2.225,9.31-.36,19.625-4.685,28.165-3.085,6.093-8.844,10.281-13.992,14.771s-10.127,10.077-10.639,16.887c-.824,10.94,10.078,21.754,5.422,31.688-1.654,3.528-4.972,5.939-7.381,9-6.766,8.6-5.4,21.484.291,30.826q1.059,1.737,2.271,3.353l46.123,15.384a8.03,8.03,0,0,0,2.537.4,12.111,12.111,0,0,0,10.374-6.856l69.179-142.736A30.8,30.8,0,0,0,561.777,195.326Z" transform="translate(-411.383 -142.25)" fill="#6bc5ff"></path></g></g> <g id="Сгруппировать_744" data-name="Сгруппировать 744"><g id="Сгруппировать_729" data-name="Сгруппировать 729" transform="translate(0 48.851)"><g id="Сгруппировать_725" data-name="Сгруппировать 725" transform="translate(31.613 0)"><path id="Контур_1393" data-name="Контур 1393" d="M368.543,228.417a1.168,1.168,0,0,1-1.168-1.168v-31.78a1.168,1.168,0,0,1,2.3-.3L377.89,226.5a1.169,1.169,0,0,1-2.261.593l-5.918-22.564v22.723A1.168,1.168,0,0,1,368.543,228.417Z" transform="translate(-367.375 -194.3)" fill="#422c4f"></path></g> <g id="Сгруппировать_727" data-name="Сгруппировать 727" transform="translate(0 25.213)"><path id="Контур_1394" data-name="Контур 1394" d="M328.4,316.509l6.658-91.125h24.15l-6.658,91.125Z" transform="translate(-328.4 -225.384)" fill="#df8d6d"></path> <g id="Сгруппировать_726" data-name="Сгруппировать 726" transform="translate(24.15)"><path id="Контур_1395" data-name="Контур 1395" d="M385.723,316.509H358.174l6.658-91.125h14.232Z" transform="translate(-358.174 -225.384)" fill="#bd6c67"></path> <path id="Контур_1396" data-name="Контур 1396" d="M375.156,225.385v82.558l.179-1.648a367.1,367.1,0,0,0-.179-80.91Z" transform="translate(-361.382 -225.385)" fill="#a64f5a"></path> <path id="Контур_1397" data-name="Контур 1397" d="M358.174,335.735l13.774-8.566,13.774,8.566Z" transform="translate(-358.174 -244.61)" fill="#a64f5a"></path></g></g> <g id="Сгруппировать_728" data-name="Сгруппировать 728" transform="translate(9.598)"><path id="Контур_1398" data-name="Контур 1398" d="M341.4,228.993a1.154,1.154,0,0,1-.316-.044,1.168,1.168,0,0,1-.809-1.441l2.336-8.312a1.173,1.173,0,0,1,.221-.424l19.679-24.045a1.169,1.169,0,0,1,2,1.135l-8.6,23.947-1.394,8.21a1.168,1.168,0,0,1-2.3-.391l1.41-8.312a1.209,1.209,0,0,1,.052-.2l6.341-17.664L344.8,220.064l-2.27,8.077A1.168,1.168,0,0,1,341.4,228.993Z" transform="translate(-340.233 -194.3)" fill="#422c4f"></path></g></g> <g id="Сгруппировать_731" data-name="Сгруппировать 731" transform="translate(19.415 26.575)"><path id="Контур_1399" data-name="Контур 1399" d="M355.077,184.278l-1.674,2.206a5.239,5.239,0,0,0,.012,6.351l6.464,8.445.569-.93a9.25,9.25,0,0,0-.883-10.863Z" transform="translate(-352.337 -170.132)" fill="#eba58e"></path> <g id="Сгруппировать_730" data-name="Сгруппировать 730" transform="translate(1.213)"><path id="Контур_1400" data-name="Контур 1400" d="M428.105,237.442l-16.354,9.87-15.834-59.739a25.7,25.7,0,0,0-17.908-18.161l-8.47-2.373a5.45,5.45,0,0,0-5.727,1.844l-8.786,10.983a5.451,5.451,0,0,0,.436,7.294l7.586,7.453.915-1.35a6.829,6.829,0,0,0-.543-8.365l-1.053-1.187,6.717-6.133,6.619,6.62-7.255,3.869a6.894,6.894,0,0,0-2.463,2.216h0a4.671,4.671,0,0,0,1.7,6.758l1.5.784,1.974-2.334a8.615,8.615,0,0,1,5.871-3.021l2.376-.195,8.839,57.812A24.865,24.865,0,0,0,424.453,268.3l16.75-8.866Z" transform="translate(-353.832 -166.837)" fill="#f2c9ad"></path> <path id="Контур_1401" data-name="Контур 1401" d="M444.561,253.883l-3.386,2.043a32.342,32.342,0,0,0,7.558,24.678l8.926-4.724Z" transform="translate(-370.288 -183.279)" fill="#422c4f"></path></g> <path id="Контур_1402" data-name="Контур 1402" d="M364.355,186.211l1.713-.4a7.759,7.759,0,0,1,5.19.584l3.652,1.789,2.78-1.483-6.619-6.62Z" transform="translate(-354.607 -169.338)" fill="#eba58e"></path></g> <g id="Сгруппировать_733" data-name="Сгруппировать 733" transform="translate(92.825 59.62)"><path id="Контур_1403" data-name="Контур 1403" d="M506.5,224.7l-20.8-2.344A27.353,27.353,0,0,0,466.85,227.2l-24.009,16.965h0a49.408,49.408,0,0,0,13.078,28.809l.55.588L473.99,261.1c2.337,45.166,36.182,86.674,36.182,86.674l59.985-123.768-27.9-14.362a18.661,18.661,0,0,0-20.528,2.291Z" transform="translate(-442.841 -207.577)" fill="#d53873"></path> <g id="Сгруппировать_732" data-name="Сгруппировать 732" transform="translate(48.316 7.938)"><path id="Контур_1404" data-name="Контур 1404" d="M536.788,229a17.964,17.964,0,0,0-1.481-6.036,9.537,9.537,0,0,0-4.16-4.507,12.25,12.25,0,0,0-5.29-1.075,14.745,14.745,0,0,1,1.846.743,8.385,8.385,0,0,1,4.179,4.163c.861,2.138.474,4.574-.221,6.77a25.984,25.984,0,0,1-6.329,10.42l7.946,7.513A32.79,32.79,0,0,0,536.788,229Z" transform="translate(-506.738 -217.366)" fill="#f0bf6c"></path> <path id="Контур_1405" data-name="Контур 1405" d="M504.76,228.015a13.566,13.566,0,0,1,.98-5.992,5.532,5.532,0,0,0-1.124,1.29,15.461,15.461,0,0,0-2.151,9.262,20.558,20.558,0,0,0,3.725,9.6,61.4,61.4,0,0,0,6.773,7.89l3.8-8.875a23.544,23.544,0,0,1-7.254-3.807A13.674,13.674,0,0,1,504.76,228.015Z" transform="translate(-502.408 -218.243)" fill="#f0bf6c"></path> <path id="Контур_1406" data-name="Контур 1406" d="M528.092,222.282a8.385,8.385,0,0,0-4.179-4.163,14.746,14.746,0,0,0-1.846-.743c-.439-.011-.878-.015-1.313-.013a33.333,33.333,0,0,0-7.906.772,16.887,16.887,0,0,0-6.568,3.007,13.4,13.4,0,0,0,3.768,15.363,23.544,23.544,0,0,0,7.254,3.807l1.477-3.451,2.762,2.611a25.984,25.984,0,0,0,6.329-10.42C528.566,226.856,528.954,224.421,528.092,222.282Z" transform="translate(-502.949 -217.363)" fill="#eba25d"></path></g> <path id="Контур_1407" data-name="Контур 1407" d="M540.587,321.853c-2.188-.638-3.533-3.444-4.152-5.638s-.96-4.58-2.419-6.332c-1.587-1.907-4.323-2.824-5.336-5.088-1.488-3.325,1.686-7.1,1.031-10.682-.431-2.357-2.4-4.074-3.656-6.117a12.648,12.648,0,0,1-1.638-8.508,7.845,7.845,0,0,0-.873-5.324,16.622,16.622,0,0,1-1.982-8.01c-.059-3.811.737-7.577,1.059-11.375s.27-8.333-1.605-11.651l.738-1.725,1.183,1.119c1.1,1.042,1.3,4.852,1.48,6.3a32.1,32.1,0,0,1,.094,7.087c-.414,4.247-1.78,9.465-.583,13.728.792,2.817,2.088,4.093,2.446,7,.277,2.24.013,4.526.352,6.757a9.029,9.029,0,0,0,2.359,5.208c1.332,1.3,2.7,2.862,2.9,4.785.3,2.747-1.441,5.21-1.552,7.925a5.74,5.74,0,0,0,1.393,4.183c1.113,1.172,2.8,1.552,3.966,2.661,1.538,1.456,1.862,3.733,2.4,5.78s1.7,4.289,3.789,4.657" transform="translate(-457.607 -213.966)" fill="#f0bf6c"></path> <path id="Контур_1408" data-name="Контур 1408" d="M533.5,267.087c.436,1.857-.322,3.625-1.693,3.946s-2.835-.924-3.27-2.782.322-3.625,1.693-3.946S533.067,265.229,533.5,267.087Z" transform="translate(-459.005 -218.283)" fill="#f0bf6c"></path> <path id="Контур_1409" data-name="Контур 1409" d="M539.148,291.157c.436,1.858-.322,3.625-1.693,3.946s-2.835-.924-3.271-2.782.322-3.625,1.693-3.946S538.713,289.3,539.148,291.157Z" transform="translate(-460.071 -222.829)" fill="#f0bf6c"></path> <ellipse id="Эллипс_115" data-name="Эллипс 115" cx="2.549" cy="3.456" rx="2.549" ry="3.456" transform="translate(77.836 84.487) rotate(-13.2)" fill="#f0bf6c"></ellipse> <path id="Контур_1410" data-name="Контур 1410" d="M451.7,246.009c.3,17.54,8.7,24.775,14.286,28.9l2.471-1.757c-12.071-6-15.285-23.773-14.262-28.9Z" transform="translate(-444.515 -214.503)" fill="#f0bf6c"></path> <path id="Контур_1411" data-name="Контур 1411" d="M477.49,266.655c-.908-13.762,2.856-29.675,2.856-29.675-7.337,4.251-12.415,13.062-13.641,21.452a27.173,27.173,0,0,1-1.146,6.126c-.8,2.023-2.284,3.7-3.274,5.632s-1.4,5.6-.059,7.32Z" transform="translate(-446.342 -213.131)" fill="#422c4f" opacity="0.3"></path> <path id="Контур_1412" data-name="Контур 1412" d="M577.47,245.2a32.692,32.692,0,0,1-21.159-26.052,18.942,18.942,0,0,0,1.7,15.2c1.425,2.5,3.455,4.707,4.271,7.466.771,2.6.368,5.386.238,8.1s.1,5.657,1.848,7.734A80.448,80.448,0,0,1,577.47,245.2Z" transform="translate(-464.105 -209.764)" fill="#422c4f" opacity="0.3"></path> <path id="Контур_1413" data-name="Контур 1413" d="M507.2,336.589a185.028,185.028,0,0,0,15.124,22.669l43.517-89.788-13.964-1.1C549.587,292.806,530.109,323.709,507.2,336.589Z" transform="translate(-454.998 -219.06)" fill="#422c4f" opacity="0.3"></path> <path id="Контур_1414" data-name="Контур 1414" d="M508.2,267.332a168.665,168.665,0,0,1-23.733-1.28,6.049,6.049,0,0,0,.217,3.483,72.725,72.725,0,0,0,23.526,1.853C508.131,270.315,508.282,268.4,508.2,267.332Z" transform="translate(-450.672 -218.622)" fill="#f0bf6c"></path> <path id="Контур_1415" data-name="Контур 1415" d="M508.541,277.079a66.812,66.812,0,0,1-23.945-1.831,46.566,46.566,0,0,0,3.017,17.836,3.924,3.924,0,0,0,2.347,2.323c2.157.784,4.344,1.638,6.5,2.427a6.271,6.271,0,0,0,3.814.146c2.482-.68,5.009-1.289,7.511-1.939a3.863,3.863,0,0,0,2.791-4.727A65.913,65.913,0,0,1,508.541,277.079Z" transform="translate(-450.722 -220.359)" fill="#ff7094"></path></g> <g id="Сгруппировать_734" data-name="Сгруппировать 734" transform="translate(137.934 55.518)"><path id="Контур_1416" data-name="Контур 1416" d="M498.454,214.2l6.735,10.61a27.119,27.119,0,0,0,12.012,7.495c8.956-10.318,7.106-13.822,7.106-13.822l-7.56-15.964Z" transform="translate(-498.454 -202.52)" fill="#f2c9ad"></path> <path id="Контур_1417" data-name="Контур 1417" d="M508.741,219.953a14.015,14.015,0,0,0,7.235-8.986,15.868,15.868,0,0,0-.007-7.835l-17.514,11.184,4.351,6.855A12.51,12.51,0,0,0,508.741,219.953Z" transform="translate(-498.454 -202.636)" fill="#422c4f"></path></g> <g id="Сгруппировать_743" data-name="Сгруппировать 743" transform="translate(107.303)"><g id="Сгруппировать_735" data-name="Сгруппировать 735" transform="translate(2.546)"><path id="Контур_1418" data-name="Контур 1418" d="M470.591,144.595c.822-2.507,3.487-4.048,6.112-4.318a19.406,19.406,0,0,1,7.753,1.284c1.838.582,3.665,1.2,5.485,1.834-1.2-2.625-2.7-5.561-5.1-6.712a22.8,22.8,0,0,0-7.934-2.537,13.728,13.728,0,0,0-8.391,1.722,9.572,9.572,0,0,0-4.648,7,16.383,16.383,0,0,0,1.022,6.25l1.664,5.534a7.222,7.222,0,0,0,1.016,2.334c1.2,1.586,3.437,1.907,5.424,1.866.12,0,.24-.011.36-.015l-2.3-8.222C470.5,148.649,469.953,146.538,470.591,144.595Z" transform="translate(-463.83 -134.074)" fill="#992d72"></path> <path id="Контур_1419" data-name="Контур 1419" d="M491.448,144.826c-1.82-.635-3.647-1.252-5.485-1.834a19.406,19.406,0,0,0-7.753-1.284c-2.625.27-5.29,1.811-6.112,4.318-.638,1.943-.087,4.054.465,6.024l2.3,8.222a25.734,25.734,0,0,0,15.515-5.954,6.961,6.961,0,0,0,2.59-3.584,7.134,7.134,0,0,0-.844-4.416C491.908,145.845,491.684,145.34,491.448,144.826Z" transform="translate(-465.338 -135.505)" fill="#7f2062"></path></g> <path id="Контур_1420" data-name="Контур 1420" d="M493.422,207.4h0a21.61,21.61,0,0,1-21.61-21.61V174.3a21.61,21.61,0,0,1,21.61-21.61h0a21.61,21.61,0,0,1,21.61,21.61v11.486A21.61,21.61,0,0,1,493.422,207.4Z" transform="translate(-462.791 -137.59)" fill="#f2c9ad"></path> <path id="Контур_1421" data-name="Контур 1421" d="M493.631,166.789a28,28,0,0,0,9.9-11.625,21.5,21.5,0,0,0-10.036-2.473h0a21.612,21.612,0,0,0-21.3,17.955A28.237,28.237,0,0,0,493.631,166.789Z" transform="translate(-462.864 -137.59)" fill="#eba58e"></path> <g id="Сгруппировать_738" data-name="Сгруппировать 738" transform="translate(9.021 31.225)"><g id="Сгруппировать_736" data-name="Сгруппировать 736" transform="translate(16.793 0.367)"><path id="Контур_1422" data-name="Контур 1422" d="M499.381,173.07a8.22,8.22,0,0,0-6.865,2.537l13.033,1.4A8.221,8.221,0,0,0,499.381,173.07Z" transform="translate(-492.516 -173.022)" fill="#6a3649"></path></g> <g id="Сгруппировать_737" data-name="Сгруппировать 737"><path id="Контур_1423" data-name="Контур 1423" d="M476.211,172.6a5.653,5.653,0,0,1,5.1,2.728l-9.5,1.023A5.653,5.653,0,0,1,476.211,172.6Z" transform="translate(-471.812 -172.569)" fill="#6a3649"></path></g> <ellipse id="Эллипс_116" data-name="Эллипс 116" cx="1.835" cy="2.19" rx="1.835" ry="2.19" transform="translate(20.061 9.449)" fill="#422c4f"></ellipse> <ellipse id="Эллипс_117" data-name="Эллипс 117" cx="1.835" cy="2.19" rx="1.835" ry="2.19" transform="translate(2.913 9.449)" fill="#422c4f"></ellipse> <path id="Контур_1424" data-name="Контур 1424" d="M489.8,198.026l-6.88.272c.633.956,1.272,2.167,2.369,2.5a3.067,3.067,0,0,0,2.522-.458A7.343,7.343,0,0,0,489.8,198.026Z" transform="translate(-473.91 -177.378)" fill="#eba58e"></path> <path id="Контур_1425" data-name="Контур 1425" d="M502.792,201.048a55.442,55.442,0,0,1-15.8,5.748c2.188,2.622,5.48,4.732,8.88,4.421a7.725,7.725,0,0,0,5.593-3.287A8.961,8.961,0,0,0,502.792,201.048Z" transform="translate(-474.679 -177.949)" fill="#fff"></path> <path id="Контур_1426" data-name="Контур 1426" d="M514.889,193.663a4.542,4.542,0,1,1-4.542-4.542A4.543,4.543,0,0,1,514.889,193.663Z" transform="translate(-478.233 -175.696)" fill="#eba7ac"></path> <path id="Контур_1427" data-name="Контур 1427" d="M477.2,197.817c.38,2.48-.014,4.6-.882,4.731s-1.879-1.769-2.26-4.249.014-4.6.882-4.731S476.814,195.338,477.2,197.817Z" transform="translate(-472.208 -176.535)" fill="#eba7ac"></path></g> <g id="Сгруппировать_739" data-name="Сгруппировать 739" transform="translate(0 10.134)"><path id="Контур_1428" data-name="Контур 1428" d="M512.931,185.429l-2.706,1.715a8.512,8.512,0,0,1-2.493-6.019v-4.743a3.271,3.271,0,0,0-1.465-2.728l-3.35-2.218a5.334,5.334,0,0,1-2.389-4.447v-8.427a34.174,34.174,0,0,1-35.633,4.957,8,8,0,0,1-3.6-2.648,3.25,3.25,0,0,1,.286-4.139c1.969-1.672,5.083.526,7.528-.311,2.01-.688,2.754-3.058,3.842-4.883a10.537,10.537,0,0,1,11.288-4.688c2.307.578,4.4,1.953,6.764,2.2,3.506.371,6.792-1.783,10.3-2.1,4.219-.379,8.353,2.038,10.867,5.446s3.61,7.672,4.044,11.885a44.417,44.417,0,0,1-2.912,20.9C513.328,184.878,512.907,185.738,512.931,185.429Z" transform="translate(-460.69 -146.568)" fill="#6a3649"></path> <path id="Контур_1429" data-name="Контур 1429" d="M505.108,146.957c-3.511.315-6.8,2.469-10.3,2.1-2.364-.251-4.457-1.626-6.764-2.2a10.373,10.373,0,0,0-7.212.924,10.291,10.291,0,0,1,2.454-.261,5.517,5.517,0,0,1,4.763,2.544,13.036,13.036,0,0,1,.912,3.6,10.8,10.8,0,0,0,10.09,8.54,30.862,30.862,0,0,0,5.284-3.631v3.674a54.494,54.494,0,0,0,5.542-1.06,20.755,20.755,0,0,0,6.037-2.518c.9-.578,1.712-1.132,2.488-1.681a18.56,18.56,0,0,0-2.423-4.576C513.461,148.995,509.327,146.579,505.108,146.957Z" transform="translate(-464.494 -146.568)" fill="#422c4f"></path></g> <g id="Сгруппировать_741" data-name="Сгруппировать 741" transform="translate(23.56 0.758)"><g id="Сгруппировать_740" data-name="Сгруппировать 740" transform="translate(6.792)"><path id="Контур_1430" data-name="Контур 1430" d="M531.744,146.629a5.485,5.485,0,0,0-.386-.6,47.781,47.781,0,0,0-10.465-9.925,5.98,5.98,0,0,0-3.207-1.059,57.646,57.646,0,0,0-9.88.424,5.812,5.812,0,0,0-2.491,1.057l-7.2,5.241,19.417,16.166a9.567,9.567,0,0,1,1.552,2.587A38.736,38.736,0,0,0,531.744,146.629Z" transform="translate(-498.111 -135.009)" fill="#f0bf6c"></path> <path id="Контур_1431" data-name="Контур 1431" d="M536.971,150.05a5.512,5.512,0,0,0-.344-.715,38.736,38.736,0,0,1-12.664,13.9c1.27,2.808,2.858,8.228,2.858,17.786a88.662,88.662,0,0,0,9.345-6.169,8.3,8.3,0,0,0,3.155-6.06C539.564,164.4,539.523,156.584,536.971,150.05Z" transform="translate(-502.994 -137.715)" fill="#d53873"></path></g> <path id="Контур_1432" data-name="Контур 1432" d="M489.737,137.29c4.463,4.2,2.768,12.391,7.253,16.568,2.42,2.253,5.988,2.673,9.293,2.787s6.792.084,9.663,1.724a25.9,25.9,0,0,0-9.51-13.415C501.44,142.308,489.737,137.29,489.737,137.29Z" transform="translate(-489.737 -135.44)" fill="#d53873"></path></g> <g id="Сгруппировать_742" data-name="Сгруппировать 742" transform="translate(48.923 42.528)"><circle id="Эллипс_118" data-name="Эллипс 118" cx="7.56" cy="7.56" r="7.56" fill="#f2c9ad"></circle> <circle id="Эллипс_119" data-name="Эллипс 119" cx="4.849" cy="4.849" r="4.849" transform="translate(2.711 2.711)" fill="#eba58e"></circle></g></g> <path id="Контур_1433" data-name="Контур 1433" d="M586.233,243.871l-8.508,1.758A19.622,19.622,0,0,0,562.1,263.744l-.747,13.271a14.873,14.873,0,0,0,1.107,6.684,26.593,26.593,0,0,0,9.66,11.584,2.257,2.257,0,0,0,2.531-.053l.037-.028a2.276,2.276,0,0,0,.156-3.6,16.864,16.864,0,0,1-5.194-8.059,14.938,14.938,0,0,0,10.686,4.4c5.1-.088,8.406-5.641,10.195-11.153a2.994,2.994,0,0,0-2.763-3.933,9.673,9.673,0,0,1-3.777-.792l.089-4.13a27.224,27.224,0,0,0-3.1-13.228h0Z" transform="translate(-372.397 -154.812)" fill="#f2c9ad"></path></g></g></g></g>
                                            </svg>
                                        </div></div></div></div>
                <div class="site-footer">
                    <div class="container">
                        <div class="site-footer__widgets">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="site-footer__widget footer-contacts">
                                        <h5 class="footer-contacts__title">Контакты</h5>
                                        <ul class="footer-contacts__contacts">
                                            <li><i class="footer-contacts__icon far fa-envelope"></i> info@smartbazar.kz</li>
                                            <li><i class="footer-contacts__icon fas fa-mobile-alt"></i>
                                                +7 (771) 222 9777</li>
                                            <li><i class="footer-contacts__icon far fa-clock"></i>24/7</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2">
                                    <div class="site-footer__widget footer-links">
                                        <h5 class="footer-links__title">Информация</h5>
                                        <ul class="footer-links__list">
                                            <li class="footer-links__item"><a href="" class="footer-links__link">О нас</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Доставка</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Конфиденциальность</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Брэнды</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Контакты</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Возврат</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Карта Сайта</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2">
                                    <div class="site-footer__widget footer-links">
                                        <h5 class="footer-links__title">Аккаунт</h5>
                                        <ul class="footer-links__list">
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Покупки</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Избранное</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Рассылка</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Конкурсы</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Сертификаты</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="site-footer__widget footer-newsletter">
                                        <div class="helpdesk">
                                            <div class="container">
                                                <div class="helpdesk_inner">
                                                    <div class="helpdesk_contact">

                                                        <span style="font-weight:900; font-size:20px; ">Всегда рядом !</span>

                                                        <div class="helpdesk_contact_img_wrap">
                                                            <img src="{{secure_asset('icons/apple.svg')}}" alt="apple">
                                                        </div>
                                                        <div class="helpdesk_contact_img_wrap">
                                                            <img src="{{secure_asset('icons/playmarket.svg')}}" alt="playmarket">
                                                        </div>
                                                    </div>
                                        <div class="footer-newsletter__text footer-newsletter__text--social">
                                            Мы в социальных сетях
                                        </div>
                                        <!-- social-links -->
                                        <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                                            <ul class="social-links__list">
                                                <li class="social-links__item">
                                                    <a class="social-links__link social-links__link--type--rss" href="" target="_blank">
                                                        <i class="fas fa-rss"></i>
                                                    </a>
                                                </li>
                                                <li class="social-links__item">
                                                    <a class="social-links__link social-links__link--type--youtube" href="" target="_blank">
                                                        <i class="fab fa-youtube"></i>
                                                    </a>
                                                </li>
                                                <li class="social-links__item">
                                                    <a class="social-links__link social-links__link--type--facebook" href="" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li class="social-links__item">
                                                    <a class="social-links__link social-links__link--type--twitter" href="" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="social-links__item">
                                                    <a class="social-links__link social-links__link--type--instagram" href="" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- social-links / end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="totop">
                        <div class="totop__body">
                            <div class="totop__start"></div>
                            <div class="totop__container container"></div>
                            <div class="totop__end">
                                <button type="button" class="totop__button">
                                    <svg width="13px" height="8px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-up-13x8')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- site__footer / end -->
        </div>
        <!-- site / end -->
        <!-- quickview-modal -->
        <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content"></div>
            </div>
        </div>
        <!-- quickview-modal / end -->
        <!-- mobilemenu -->
        <div class="mobilemenu">
            <div class="mobilemenu__backdrop"></div>
            <div class="mobilemenu__body">
                <div class="mobilemenu__header">
                    <div class="mobilemenu__title">Меню</div>
                    <button type="button" class="mobilemenu__close">
                        <svg width="20px" height="20px">
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#cross-20')}}"></use>
                        </svg>
                    </button>
                </div>
                <div class="mobilemenu__content">
                    <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                        <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title">
                                <a href="{{route('index', true)}}" class="mobile-links__item-link">Главная</a>
                            </div>
                        </li>
                        @guest
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="{{route('login', true)}}" class="mobile-links__item-link">Войти</a>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="{{route('register', true)}}" class="mobile-links__item-link">Регистрация</a>
                                </div>
                            </li>
                        @else
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="#" class="mobile-links__item-link">Аккаунт</a>
                                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                        <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--1">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="{{route('profile.index', true)}}" class="mobile-links__item-link">Профиль</a>
                                            </div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="{{route('profile.history', true)}}" class="mobile-links__item-link">Покупки</a>
                                            </div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="{{route('profile.address', true)}}" class="mobile-links__item-link">Адрес</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                        <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title">
                                <a href="{{route('catalog.index', true)}}" class="mobile-links__item-link">Категории</a>
                                <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="mobile-links__item-sub-links" data-collapse-content>
                                <ul class="mobile-links mobile-links--level--1">
                                    @foreach ($categories as $category)
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="{{ route('catalog.index', ['category' => $category->id], true) }}" class="mobile-links__item-link">{{$category->title}}</a>
                                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mobile-links__item-sub-links" data-collapse-content>
                                            <ul class="mobile-links mobile-links--level--2">
                                                @foreach ($category->children as $child)
                                                    <li class="mobile-links__item" data-collapse-item>
                                                        <div class="mobile-links__item-title">
                                                            <a href="{{ route('catalog.index', ['category' => $child->id], true) }}" class="mobile-links__item-link">{{$child->title}}</a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @guest
                        @else
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="blog-classic.html" class="mobile-links__item-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" id="logoutMobile">Выйти</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <!-- mobilemenu / end -->
        <!-- photoswipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span>{!! json_encode(env('APP_URL')) !!}</span>
    @if (Auth::check())
        <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser=null;</script>
    @endif
    <!-- photoswipe / end -->
    <!-- js -->
    <script>window.homeUrl={!! json_encode(env('APP_URL')); !!};</script>
    <script src="{{secure_asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{secure_asset('template/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{secure_asset('template/js/number.js')}}"></script>
    <script src="{{secure_asset('template/js/main.js')}}"></script>
    <script src="{{secure_asset('template/js/header.js')}}"></script>
    <script src="{{secure_asset('template/vendor/svg4everybody/svg4everybody.min.js')}}"></script>
    <script>
        svg4everybody();
    </script>
</body>

</html>