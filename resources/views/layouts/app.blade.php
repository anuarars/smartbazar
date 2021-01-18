<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('icons/favicon.ico')}}" type="image/x-icon">  
</head>
<body>
    <div id="app">
        <section id="header">
            <header>
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
                                @guest
                                    <li>
                                        <a href="#" @click.prevent="hiddenAuth = !hiddenAuth">Войти/Регистрация</a>
                                    </li>
                                @else
                                    <li>
                                        <img src="{{asset('icons/cabinet.svg')}}" alt="cabinet">
                                        <a href="#">Кабинет</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         Выйти
                                     </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-header">
                    <div class="container">
                        <div class="bottom_header_nav" :class="{removeBasket: searchFocused}">
                            <a href="{{ url('/') }}" class="logo">
                                <div class="logo_img">
                                  <img src="{{asset('icons/logo.svg')}}" alt="logo">                     
                                </div>                      
                                <div class="logo_title">smart bazar</div>
                            </a>
                            <div class="search">
                                <input 
                                    type="text" 
                                    id="search" 
                                    placeholder="Поиск товаров" 
                                    v-on:focus="searchFocused = true" 
                                    v-on:blur="searchFocused = !searchFocused">
                                <img src="{{asset('icons/search.svg')}}" alt="search">
                            </div>
                            <div v-if="!searchFocused" class="items">
                                <a href="{{route('wishlist.index')}}" class="wishlist">
                                    <div class="circle-badge" v-text="wishlist"></div>
                                    <img src="{{asset('icons/heart.svg')}}" alt="heart">
                                </a>
                                <div class="basket">
                                    <div class="circle-badge">6</div>
                                    <img src="{{asset('icons/basket.svg')}}" alt="basket">
                                </div>
                                <div class="basket_description">
                                    <span class="basket_count">Всего товаров: 3 шт</span>
                                    <span class="basket_price">На сумму: 5600 тг</span>
                                </div>
                                <div class="hamburger">
                                    <img src="{{asset('icons/hamburger.svg')}}" alt="hamburger">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </section>
        <section id="menu">
            <div class="menu grey-bg">
                <div class="container">
                    <div class="dropdown_nav">
                        <a href="#" v-on:click.prevent="hiddenMenu = !hiddenMenu">
                            <img src="{{asset('icons/dropdown.svg')}}" alt="dropdown">
                            <span>Каталог товаров</span>
                            <img src="{{asset('icons/arrow_right.svg')}}" alt="arrow_right">
                        </a>
                        <div class="megamenu" v-if="!hiddenMenu">
                            <ul class="megamenu_categories">
                                <li class="megamenu_category">Аксессуары и украшения 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                    <div class="megamenu_submenu">
                                        <ul>
                                            <li>Бакалея
                                                <ul>
                                                    <li><a href="#">Пищевые добавки</a></li>
                                                    <li><a href="#">Консервы</a></li>
                                                    <li><a href="#">Пряности, специи, приправы</a></li>
                                                    <li><a href="#">Мука и отруби</a></li>
                                                    <li><a href="#">Смотреть больше</a></li>
                                                </ul>
                                            </li>
                                            <li>Сладости</li>
                                            <li>Детское питание</li>
                                            <li>Напитки</li>
                                            <li>Мясо и мясная продукция</li>
                                            <li>Замороженные полуфабрикаты</li>
                                            <li>Молочные продукты</li>
                                            <li>Рыба и морепродукты</li>
                                            <li>Готовые блюда</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="megamenu_category">Материалы для ремонта 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Одежда и обувь 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                                <li class="megamenu_category">Категория 
                                    <img src="{{asset('icons/arrow_small.svg')}}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="main">
            <div class="container">
                @yield('content')
            </div>
        </section>
        <section id="footer">
            <footer>
                <div class="subscribe">
                    <div class="container">
                        <div class="subscribe_inner">
                            <div class="subscribe_banner">
                                <img src="{{asset('icons/banner_phone.svg')}}" alt="banner_phone">                                               
                            </div>
                            <div class="subscribe_info">
                                <div class="subscribe_info_text">
                                    <h5>Покупать легко со SmartBazar.kz!</h5>
                                    <p>Подпишитесь на рассылку об акциях и скидках</p>
                                </div>
                                <div class="subscribe_info_form">
                                    <input type="text" placeholder="Введите ваш email адрес">
                                    <button type="submit">Подпишитесь</button>
                                </div>
                            </div>
                            <div class="subscribe_banner">
                               <img src="{{asset('icons/banner_basket.svg')}}" alt="banner_basket">          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular">
                    <div class="container">
                        <div class="popular_title">
                            Популярные запросы
                        </div>
                        <div class="popular_inner">
                            <ul>
                                <li><a href="#">Платья женские</a></li>
                                <li><a href="#">Новогодние гирлянды</a></li>
                                <li><a href="#">Искусственные ели</a></li>
                                <li><a href="#">Детские игрушки</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Шапки и шарфы</a></li>
                                <li><a href="#">Мобильные телефоны</a></li>
                                <li><a href="#">Планшеты</a></li>
                                <li><a href="#">Товары для офиса</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Декоративная косметика</a></li>
                                <li><a href="#">Спортивное питание</a></li>
                                <li><a href="#">Сладкие подарки</a></li>
                                <li><a href="#">Куртки мужские</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Электроинструменты</a></li>
                                <li><a href="#">Детская одежда</a></li>
                                <li><a href="#">Шины и диски</a></li>
                                <li><a href="#">Алкогольные напитки</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Тренажеры</a></li>
                                <li><a href="#">Окна и двери</a></li>
                                <li><a href="#">Мужские куртки</a></li>
                                <li><a href="#">Елочные игрушки</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="helpdesk">
                    <div class="container">
                        <div class="helpdesk_inner">
                            <div class="helpdesk_contact">
                                <div class="helpdesk_contact_img_wrap">
                                    <img src="{{asset('icons/footer_logo.svg')}}" alt="footer_logo">             
                                </div>
                                <span>SMART BAZAR</span>
                                <ul>
                                    <li>Служба поддержки</li>
                                    <li>+7-771-222-97-77</li>
                                    <li>info@smartbazar.kz</li>
                                </ul>
                                <div class="helpdesk_contact_img_wrap">
                                    <img src="{{asset('icons/apple.svg')}}" alt="apple">
                                </div>
                                <div class="helpdesk_contact_img_wrap">
                                    <img src="{{asset('icons/playmarket.svg')}}" alt="playmarket">
                                </div>
                            </div>
                            <div class="helpdesk_col_wrap">
                                <h2>Покупателям</h2>
                                <ul>
                                    <li><a href="">Как покупать</a></li>
                                    <li><a href="">Как оставить отзыв</a></li>
                                    <li><a href="">Рекомендации по безопасным покупкам</a></li>
                                    <li><a href="">Программ защиты покупателей</a></li>
                                </ul>
                            </div>
                            <div class="helpdesk_col_wrap">
                                <h2>Продавцам</h2>
                                <ul>
                                    <li><a href="">Создать сайт на SmarBazar.kz</a></li>
                                    <li><a href="">Тарифы</a></li>
                                    <li><a href="">Отзывы клиентов</a></li>
                                    <li><a href="">Пользовательское соглашение</a></li>
                                    <li><a href="">Политика конфиденциальности</a></li>
                                    <li><a href="">Правила пользования порталом</a></li>
                                </ul>
                            </div>
                            <div class="helpdesk_col_wrap">
                                <h2>О нас</h2>
                                <ul>
                                    <li><a href="">О SmartBazar.kz</a></li>
                                    <li><a href="">Справка и FAQ</a></li>
                                    <li><a href="">Администрация</a></li>
                                    <li><a href="">Защита легальности контента</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <span>Copyright © 2020 Smart Bazar all rights reserved. Design by Artix Production</span>
                </div>
            </footer>
        </section>
        <transition name="bounce">
            <div class="smb_modal" v-if="!hiddenAuth">
                <div class="modal_container">
                    <div class="auth" v-if="isLogin">
                        <a href="#" @click.prevent="hiddenAuth = true" class="close_modal">
                            <img src="{{asset('icons/close.svg')}}" alt="close">
                        </a>
                        <h4>Войти в аккаунт</h4>
                        <small>Войдите, чтобы мы могли сохранить для вас товар</small>
                        <form class="login_inputs_wrapper" action="{{ route('login') }}" id="loginUser" method="POST">
                            @csrf
                            <input 
                                type="text"
                                v-mask="'+7 (###) ### ####'" 
                                placeholder="Телефон"
                                required
                                name="phone"
                             />
                            <input type="password" 
                                placeholder="Пароль"
                                name="password">
                        </form>
                        <div class="auth_buttons">
                            <button v-on:click="loginUser($event)">Войти</button>
                            <button v-on:click="isLogin = false">Регистрация</button>
                        </div>
                        <span>Нет профиля?
                            <a href="#">Зарегистрируйтесь</a>
                        </span>
                    </div>
                    <div class="register" v-if="!isLogin">
                        <a href="#" @click.prevent="hiddenAuth = true" class="close_modal">
                            <img src="{{asset('icons/close.svg')}}" alt="close">
                        </a>
                        <h4>Зарегистрируйтесь</h4>
                        <div class="register_top_buttons">
                            <button>Компания</button>
                            <button>Клиент</button>
                        </div>
                        <form method="POST" action="{{ route('register') }}" id="registerUser">
                            @csrf
                            <register-component></register-component>
                        </form>
                        <div class="register_bottom_buttons">
                            <button v-on:click.prevent="isLogin = true">Войти</button>
                            <button v-on:click="registerUser($event)">Регистрация</button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</body>
</html>