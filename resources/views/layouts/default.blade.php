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
    <link rel="icon" href="{{asset('img/logo/logo.svg')}}" type="image/x-icon">  
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
<link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendor/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendor/photoswipe/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendor/photoswipe/default-skin/default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{asset('template/vendor/fontawesome/css/all.min.css')}}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{asset('template/fonts/stroyka/stroyka.css')}}">
    <script src="https://proxyd.tarlanpayments.kz/tarlan/widget-new.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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
                                        <use xlink:href="{{asset('template/images/sprite.svg#menu-18x14')}}"></use>
                                    </svg>
                                </button>
                                <a class="mobile-header__logo" href="/">
                                    <!-- mobile-logo -->
                                    <h3>Smart Bazar</h3>
                                    <!-- mobile-logo / end -->
                                </a>
                                <div class="search search--location--mobile-header mobile-header__search">
                                    <div class="search__body">
                                        <form class="search__form" action="">
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
                                                    <use xlink:href="{{asset('template/images/sprite.svg#search-20')}}"></use>
                                                </svg>
                                            </button>
                                            <button class="search__button search__button--type--close" type="button">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#cross-20')}}"></use>
                                                </svg>
                                            </button>
                                            <div class="search__border"></div>
                                        </form>
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
                                                    <use xlink:href="{{asset('template/images/sprite.svg#search-20')}}"></use>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="indicator indicator--mobile d-sm-flex d-none">
                                        <a href="{{route('wishlist.index')}}" class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#heart-20')}}"></use>
                                                </svg>
                                                <span class="indicator__value">0</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="indicator indicator--mobile">
                                        <a href="{{route('cart.index')}}" class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#cart-20')}}"></use>
                                                </svg>
                                                <span class="indicator__value"></span>
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
                                                <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-down-7x5')}}"></use>
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
                            <a href="{{route('index')}}">
                                <!-- logo -->
                                {{-- <img src="{{asset('img/logo/logo.svg')}}" alt="logo.svg"> --}}
                                <h1>Smart Bazar</h1>
                                <!-- logo / end -->
                            </a>
                        </div>
                        <div class="site-header__search">
                            <div class="search search--location--header ">
                                <div class="search__body">
                                    <form class="search__form" action="">
                                        <input 
                                            class="search__input" 
                                            name="search" 
                                            placeholder="Найти" 
                                            aria-label="Site search" 
                                            type="text" 
                                            autocomplete="off"
                                            v-on:focus="searchFocused = true" 
                                            v-on:blur="searchFocused = !searchFocused"
                                            v-model="search.searchInput"
                                            v-on:keyup="searchProduct"
                                            >
                                        <button class="search__button search__button--type--submit" type="submit">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="{{asset('template/images/sprite.svg#search-20')}}"></use>
                                            </svg>
                                        </button>
                                        <div class="search__border"></div>
                                    </form>
                                    <search-component 
                                        v-if="search.searchShow" 
                                        {{-- v-click-outside="hideSearch" --}}
                                        :search = "search.searchResult"
                                        :home_url = "homeUrl"
                                        >
                                    </search-component>
                                </div>
                            </div>
                        </div>
                        <div class="site-header__phone">
                            <div class="site-header__phone-title">Служба поддержки</div>
                            <div class="site-header__phone-number">+7 (777) 060 0730</div>
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
                                                            <a class="departments__item-link" href="{{ route('catalog.index', ['category' => $category->id]) }}">
                                                                {{$category->title}}
                                                                <svg class="departments__item-arrow" width="6px" height="9px">
                                                                    <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
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
                                                                                        <a href="{{ route('catalog.index', ['category' => $child->id]) }}">{{$child->title}}</a>
                                                                                        <ul class="megamenu__links megamenu__links--level--1">
                                                                                            @foreach ($child->children->take(3) as $grandchild)
                                                                                                <li class="megamenu__item"><a href="{{ route('catalog.index', ['category' => $grandchild->id]) }}">{{$grandchild->title}}</a></li>
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
                                                    <use xlink:href="{{asset('template/images/sprite.svg#menu-18x14')}}"></use>
                                                </svg>
                                                Категории
                                                <svg class="departments__button-arrow" width="9px" height="6px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-down-9x6')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- .departments / end -->
                                    </div>
                                    <!-- .nav-links -->
                                    <div class="nav-panel__nav-links nav-links">
                                        <ul class="nav-links__list">
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('index')}}">
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
                                                <a class="nav-links__item-link" href="{{route('catalog.index')}}">
                                                    <div class="nav-links__item-body">
                                                        Каталог
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                                <a class="nav-links__item-link" href="{{route('info.faq')}}">
                                                    <div class="nav-links__item-body">
                                                        FAQ
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- .nav-links / end -->
                                    <div class="nav-panel__indicators">
                                        @auth
                                        <div class="indicator">
                                            <a href="{{route('wishlist.index')}}" class="indicator__button">
                                                <span class="indicator__area">
                                                    <svg width="20px" height="20px">
                                                        <use xlink:href="{{asset('template/images/sprite.svg#heart-20')}}"></use>
                                                    </svg>
                                                    <span class="indicator__value" v-text="wishlist"></span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="indicator">
                                            <a href="{{route('cart.index')}}" class="indicator__button">
                                                <span class="indicator__area">
                                                    <svg width="20px" height="20px">
                                                        <use xlink:href="{{asset('template/images/sprite.svg#cart-20')}}"></use>
                                                    </svg>
                                                    <span class="indicator__value" v-text="productCount"></span>
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
                                                    <use xlink:href="{{asset('template/images/sprite.svg#person-20')}}"></use>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="indicator__dropdown">
                                                <div class="account-menu">
                                                     @guest
                                                        <form method="POST" action="{{ route('login') }}" class="account-menu__form">
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
                                                                    <a href="{{ route('password.request') }}" class="account-menu__form-forgot-link">Забыли пароль?</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-menu__form-button">
                                                                <button type="submit" class="btn btn-primary btn-sm">Войти</button>
                                                            </div>
                                                            <div class="account-menu__form-link"><a href="{{route('register')}}">Регистрация</a></div>
                                                        </form>
                                                     @endguest
                                                     @auth
                                                        <div class="account-menu__divider"></div>
                                                        <ul class="account-menu__links">
                                                            <li><a href="{{route('profile.index')}}">Профиль</a></li>
                                                            <li><a href="{{route('profile.history')}}">Покупки</a></li>
                                                            <li><a href="{{route('profile.address')}}">Адресс</a></li>
                                                            <li><a href="{{route('profile.password')}}">Пароль</a></li>
                                                        </ul>
                                                        <div class="account-menu__divider"></div>
                                                        <ul class="account-menu__links">
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">Выйти</a></li>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                                                +7 (777) 222 9977</li>
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
                                                            <img src="{{asset('icons/apple.svg')}}" alt="apple">
                                                        </div>
                                                        <div class="helpdesk_contact_img_wrap">
                                                            <img src="{{asset('icons/playmarket.svg')}}" alt="playmarket">
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
                                        <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-up-13x8')}}"></use>
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
                            <use xlink:href="{{asset('template/images/sprite.svg#cross-20')}}"></use>
                        </svg>
                    </button>
                </div>
                <div class="mobilemenu__content">
                    <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                        <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title">
                                <a href="{{route('index')}}" class="mobile-links__item-link">Главная</a>
                            </div>
                        </li>
                        @guest
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="{{route('login')}}" class="mobile-links__item-link">Войти</a>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="{{route('register')}}" class="mobile-links__item-link">Регистрация</a>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="blog-classic.html" class="mobile-links__item-link">Блог</a>
                                </div>
                            </li>
                        @else
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title">
                                    <a href="#" class="mobile-links__item-link">Аккаунт</a>
                                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                        <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--1">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="account-dashboard.html" class="mobile-links__item-link">Профиль</a>
                                            </div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="account-profile.html" class="mobile-links__item-link">Изменить</a>
                                            </div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="account-orders.html" class="mobile-links__item-link">Покупки</a>
                                            </div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title">
                                                <a href="account-addresses.html" class="mobile-links__item-link">Адрес</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                        <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title">
                                <a href="" class="mobile-links__item-link">Категории</a>
                                <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                        <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="mobile-links__item-sub-links" data-collapse-content>
                                <ul class="mobile-links mobile-links--level--1">
                                    @foreach ($categories as $category)
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="" class="mobile-links__item-link">{{$category->title}}</a>
                                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mobile-links__item-sub-links" data-collapse-content>
                                            <ul class="mobile-links mobile-links--level--2">
                                                @foreach ($category->children as $child)
                                                    <li class="mobile-links__item" data-collapse-item>
                                                        <div class="mobile-links__item-title">
                                                            <a href="" class="mobile-links__item-link">{{$child->title}}</a>
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
                                    document.getElementById('logout-form').submit();">Выйти</a>
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
    @if (Auth::check())
        <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser=null;</script>
    @endif
    <!-- photoswipe / end -->
    <!-- js -->
    <script>window.homeUrl='http://smartbazar/public/';</script>
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('template/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('template/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('template/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('template/js/number.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>
    <script src="{{asset('template/js/header.js')}}"></script>
    <script src="{{asset('template/vendor/svg4everybody/svg4everybody.min.js')}}"></script>
    <script>
        svg4everybody();
    </script>
    <script>
        // function loadcart(){
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: "POST",
        //         url: "../modules/LoadCart.php",
        //         datatype: "html",
        //         cache: false,
        //         success: function(data){
        //             if(data!="0"){
        //                 $('#basket').html(data);
        //             }
        //         }
        //     });
        // }
        $('.add-to-cart').click(function(){
            var product_id = $(this).attr("product-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "cart/create",
                data: {product_id: product_id},
                datatype: "html",
                cache: false,
                success: function(data){
                    console.log(data);
                    loadcart();
                }
            });
        });
        $('.input-number__add').click(function(){
            var product_id = $(this).attr("product_id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "cart/update",
                data: "product-id-plus="+product_id,
                datatype: "html",
                cache: false,
                success: function(data){
                    console.log(data);
                }
            });
        });

        $('.input-number__sub').click(function(){
            var product_id = $(this).attr("product_id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "cart/update",
                data: "product-id-minus="+product_id,
                datatype: "html",
                cache: false,
                success: function(data){
                    console.log(data);
                }
            });
        });

        var ratedIndex = -1;

        if(localStorage.getItem('ratedIndex') != null){
            setRate(parseInt(localStorage.getItem('ratedIndex')));
        }

        $('.stars .fa-star').click(function(){
            ratedIndex = parseInt($(this).attr('data-index'));
            $('.stars .fa-star').css('color','green');
            localStorage.setItem('ratedIndex', ratedIndex);
            saveRating();
        })

        $('.stars .fa-star').mouseover(function(){
            var currentIndex = parseInt($(this).attr('data-index'));
            setRate(currentIndex);
        })

        $('.stars .fa-star').mouseleave(function(){
            resetStarColor();
            if(ratedIndex != -1){
                setRate(ratedIndex);
            }
        });

        // $('#add_review').click(function(){
        //     var review_user_id = $('.menu__item-link').attr('user-id');
        //     var review_product_id = $('.update-cart').attr("product-id");
        //     var review_description = $('#review-text').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "../modules/add_review.php",
        //         data: {review_user_id: review_user_id, review_product_id: review_product_id, review_description:review_description},
        //         datatype: "html",
        //         cache: false,
        //         success: function(data){
        //             $('#review-text').val('');
        //         }
        //     });
        // });

        function setRate(max){
            for (var i=0; i <= max; i++){
                $('.stars .fa-star:eq('+i+')').addClass('fa');
            }
        }

        function resetStarColor(){
            $('.stars .fa-star').removeClass('fa');
        }

        // function saveRating(){
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var product_id = $('.update-cart').attr("product-id");
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('rate.add',) }}",
        //         data: {ratedIndex: ratedIndex, product_id:product_id},
        //         datatype: "html",
        //         cache: false,
        //         success: function(data){
        //             $('.rank').html(data);
        //         }
        //     });
        // }

        $(".remove-cart").click(function(){
            console.log('remove');
        });
    </script>
</body>

</html>