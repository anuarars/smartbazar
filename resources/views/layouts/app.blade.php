<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('icons/favicon.ico')}}" type="image/x-icon">

    {{-- <script src="{{ asset('js/app.js', true) }}" defer></script>

    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
    <link rel="icon" href="{{asset('icons/favicon.ico', true)}}" type="image/x-icon">   --}}
</head>
<body>
    <div id="app">
        <header>
            <div class="container_nav">
                <nav class="menu_nav">
   <ul class="nav-list nav-list-mobile">
       <li class="nav-item">
          <div class="mobile-menu">
            <span class="line line-top"></span>
            <span class="line line-bottom"></span>       
       </div> 
       </li>
       <li class="nav-item">
           <a href="#" class="nav-link nav-link-smartb"></a>
       </li>
       <li class="nav-item nav-item-hidden">
           <a href="#" class="nav-link nav-link-cart"></a>
       </li>
   </ul>
   <!--work under-->
   <ul class="nav-list nav-list-larger">
       <li class="nav-item nav-item-hidden">
           <a href="#" class="nav-link nav-link-smartb"></a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link"></a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">Кабинет</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">О компании</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">Доставка</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">Гарантии, обмен и возврат</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">Оплата</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link">Нур-султан</a>
       </li>
       <li class="nav-item">
           <a href="" class="nav-link nav-link-search"></a>
       </li><li class="nav-item">
           <a href="" class="nav-link nav-link-cart"></a>
       </li>
   </ul>
   <!--larger-->
                </nav>
            </div>
            <script>
               const selectElement=(element) => document.querySelector(element);
               selectElement('.mobile-menu').addEventListener('click',()=>{
                   selectElement('header').classList.toggle('active');
               })
               </script>
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
                            <ul class="megamenu_categories w-100">
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Категория</a>
                                    <ul>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                        <li><a href="">Категория2</a></li>
                                    </ul>
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
        <transition name="fade">
            <div class="smb_modal" v-if="!hiddenAuth">
                <div class="modal_container" v-click-outside="hideAuth">
                    <div class="login-btn splits">
                        <p>Зарегистрированы?</p>
                        <button v-on:click="slideLogin" :class="{'active' : isActive}">Войти</button>
                    </div>
                    <div class="rgstr-btn splits">
                        <p>Не зарегистрированы?</p>
                        <button v-on:click="slideRegister" :class="{'active' : !isActive}">Регистрация</button>
                    </div>
                    <div class="wrapper" :class="{'move' : isMove}">
                        <form id="loginUser" method="POST" action="{{ route('login') }}" tabindex="500">
                            <h3>Войти</h3>
                            <div class="phone">
                                <input
                                    type="text"
                                    name="phone"
                                    v-mask="'+7 (###) ### ####'"
                                    v-model="auth.loginNumber"
                                >
                                <label>Телефон</label>
                                <small v-if="errors.login.phoneRequired" class="text-danger">Введите ваш телефон</small>
                            </div>
                            <div class="passwd">
                                <input
                                    type="password"
                                    name="password"
                                    v-model="auth.loginPassword">
                                <label>Пароль</label>
                                <small v-if="errors.login.passwordRequired" class="text-danger">Введите пароль</small>
                            </div>
                            <div v-if="errors.login.loginMatch" class="text-danger">
                                Введеные вами данные не совпадают
                            </div>
                            <div class="submit">
                                <button type="button" class="dark" v-on:click="validateLogin">Войти</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('register') }}" id="register" tabindex="502">
                            @csrf
                            <h3>Регистрация</h3>
                            <div class="login">
                                <input
                                    type="text"
                                    name="login"
                                    v-model="auth.registerLogin">
                                <label>Логин</label>
                                <small v-if="errors.register.loginRequired" class="text-danger" v-text="errors.register.loginRequired.toString()"></small>
                            </div>
                            <div class="phone">
                                <input
                                    type="text"
                                    name="phone"
                                    v-mask="'+7 (###) ### ####'"
                                    v-model="auth.registerNumber"
                                >
                                <label>Телефон</label>
                                <small v-if="errors.register.phoneRequired" class="text-danger" v-text="errors.register.phoneRequired.toString()"></small>
                            </div>
                            <div class="passwd">
                                <input
                                    type="password"
                                    name="password"
                                    v-model="auth.registerPassword"
                                >
                                <label>Пароль</label>
                            </div>
                            <div class="passwd_confirm">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    v-model="auth.registerConfirm"
                                >
                                <label>Повторите Пароль</label>
                                <small v-if="errors.register.passwordRequired" class="text-danger" v-text="errors.register.passwordRequired.toString()"></small>
                            </div>
                            <div class="submit">
                                <button class="dark" type="button" v-on:click="validateRegister">Регистрация</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </transition>
    </div>
    @if (Auth::check())
        <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser=null;</script>
    @endif
</body>
</html>
