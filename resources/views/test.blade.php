<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                                    <a href="#">Нур-Султан (Астана)</a>
                                </li>
                                <li>
                                    <a href="#">Кабинет</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-header mt-3">
                    <div class="container">
                        <div class="bottom_header_nav">
                            <div class="logo">
                                <div class="logo-img">
                                    <svg id="Компонент_207_1" data-name="Компонент 207 – 1" xmlns="http://www.w3.org/2000/svg" width="75.889" height="60.323" viewBox="0 0 75.889 60.323">
                                        <g id="Сгруппировать_635" data-name="Сгруппировать 635" transform="translate(0 7.234)">
                                          <path id="Контур_1218" data-name="Контур 1218" d="M172.59,163.585q-.323,0-.65-.026L144.326,161.3a10.067,10.067,0,0,1-8.9-7.446l-5.384-20.349c-.955-3.618-1.942-7.359-6.16-8.493l-12.007-2.469a1.682,1.682,0,0,1,.678-3.3l12.144,2.5c6.15,1.619,7.566,6.983,8.6,10.9l.069.262L138.68,153a6.7,6.7,0,0,0,5.92,4.954l27.614,2.254a4.594,4.594,0,0,0,4.8-3.355l5.087-18.44-35.261-2.9a2.338,2.338,0,0,0-2.459,2.9l1.574,6.224a5.077,5.077,0,0,0,4.4,3.795l16.624,1.675a1.8,1.8,0,1,0,.346-3.583l-13.961-1.291a1.682,1.682,0,1,1,.31-3.35l13.96,1.291a5.164,5.164,0,1,1-.993,10.28l-16.624-1.675a8.45,8.45,0,0,1-7.324-6.317l-1.574-6.224a5.7,5.7,0,0,1,6-7.081l39.309,3.229-6.167,22.355A7.965,7.965,0,0,1,172.59,163.585Z" transform="translate(-110.534 -119.218)" fill="#fff"/>
                                        </g>
                                        <circle id="Эллипс_3" data-name="Эллипс 3" cx="4.579" cy="4.579" r="4.579" transform="translate(28.569 51.166)" fill="#fff"/>
                                        <circle id="Эллипс_4" data-name="Эллипс 4" cx="2.766" cy="2.766" r="2.766" transform="translate(54.957 54.37)" fill="#fff"/>
                                        <circle id="Эллипс_5" data-name="Эллипс 5" cx="4.018" cy="4.018" r="4.018" transform="translate(24.878 11.038)" fill="#ff6700"/>
                                        <circle id="Эллипс_6" data-name="Эллипс 6" cx="5.431" cy="5.431" r="5.431" transform="translate(29.503)" fill="#fff200"/>
                                        <circle id="Эллипс_7" data-name="Эллипс 7" cx="1.9" cy="1.9" r="1.9" transform="translate(35.25 11.817)" fill="#fff200"/>
                                        <circle id="Эллипс_8" data-name="Эллипс 8" cx="4.392" cy="4.392" r="4.392" transform="translate(42.056 3.796)" fill="#ff6700"/>
                                        <circle id="Эллипс_9" data-name="Эллипс 9" cx="3.574" cy="3.574" r="3.574" transform="translate(47.912 12.86)" fill="#ff6700"/>
                                        <circle id="Эллипс_10" data-name="Эллипс 10" cx="3.574" cy="3.574" r="3.574" transform="translate(63.085 14.426)" fill="#fff200"/>
                                        <circle id="Эллипс_11" data-name="Эллипс 11" cx="2.383" cy="2.383" r="2.383" transform="translate(40.623 14.682)" fill="#fff200"/>
                                        <circle id="Эллипс_12" data-name="Эллипс 12" cx="2.99" cy="2.99" r="2.99" transform="translate(53.845 5.431)" fill="#fff200"/>
                                        <circle id="Эллипс_13" data-name="Эллипс 13" cx="2.383" cy="2.383" r="2.383" transform="translate(56.322 15.617)" fill="#fff200"/>
                                        <circle id="Эллипс_14" data-name="Эллипс 14" cx="2.009" cy="2.009" r="2.009" transform="translate(59.826 10.571)" fill="#ff6700"/>
                                      </svg>                                      
                                </div>                      
                                <div class="logo-title">
                                    <a href="#">smart bazar</a>
                                </div>
                            </div>
                            <div class="search">
                                <input type="text" id="search" placeholder="Поиск товаров">
                            </div>
                            <div class="items">
                                <div class="wishlist">
                                    <div class="circle-badge">12</div>
                                    <img src="{{asset('icons/heart.png')}}" alt="favourites.png">
                                </div>
                                <div class="basket">
                                    <div class="circle-badge">6</div>
                                    <img src="{{asset('icons/basket.png')}}" alt="basket.png">
                                </div>
                                <div class="basket_description">
                                    <span class="basket_count">Всего товаров: 3 шт</span>
                                    <span class="basket_price">На сумму: 5600 тг</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </section>
        <section id="menu">
            <div class="menu grey-bg mt-2">
                <div class="container">
                    <div class="d-flex justify-content-between align-center">
                        <div class="dropdown_nav">
                            <a href="#">Каталог товаров</a>
                        </div>
                        <div class="menu_nav">
                            <ul>
                                <li><a href="#">Акции</a></li>
                                <li><a href="#">Хлебобулочные</a></li>
                                <li><a href="#">Мясная продукция</a></li>
                                <li><a href="#">Бытовая химия</a></li>
                                <li><a href="#">Крупы и сыпучие</a></li>
                                <li><a href="#">Тысяча мелочей</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="main">
            <div class="container">
                <main>
                    <div class="slider mt-3">
                        <slider-component></slider-component>
                    </div>
                    <div class="main-bg mt-5">
                        <div class="title_default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.179" height="22.179" viewBox="0 0 22.179 22.179">
                                <g id="Icon_exit_solid" transform="translate(22.179) rotate(90)">
                                <path id="Path" d="M4.436,0A4.436,4.436,0,0,0,0,4.436V9.98H11.739L9.2,7.438a1.109,1.109,0,1,1,1.568-1.568L15.2,10.305a1.109,1.109,0,0,1,0,1.568l-4.436,4.436A1.109,1.109,0,1,1,9.2,14.741L11.739,12.2H0v5.545a4.436,4.436,0,0,0,4.436,4.436H17.743a4.436,4.436,0,0,0,4.436-4.436V4.436A4.436,4.436,0,0,0,17.743,0Z" fill="#ea4967"/>
                                </g>
                            </svg>
                            <strong class="ml-2">Актуальное в декабре</strong>
                        </div>
                        <div class="products_body mt-3">
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <div class="product_item_category">
                                    <span>Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="pink_btn_lg">Все категории</button>
                    <div class="main-bg mt-5">
                        <div class="title_default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                <g id="Icon_discount_solid" transform="translate(0)">
                                    <g id="Icon_discount_solid-2" data-name="Icon_discount_solid" transform="translate(0 0)">
                                        <path id="Shape" d="M11,22A11,11,0,1,1,22,11,11.012,11.012,0,0,1,11,22Zm3.85-8.8a1.65,1.65,0,1,0,1.65,1.65A1.652,1.652,0,0,0,14.85,13.2Zm.55-7.7a1.093,1.093,0,0,0-.778.322l-8.8,8.8a1.1,1.1,0,1,0,1.555,1.555l8.8-8.8A1.1,1.1,0,0,0,15.4,5.5Zm-8.25,0A1.65,1.65,0,1,0,8.8,7.15,1.651,1.651,0,0,0,7.15,5.5Z" fill="#ea4967"/>
                                    </g>
                                </g>
                            </svg>                              
                            <strong class="ml-2">Мега скидки</strong>
                        </div>
                        <div class="products_body mt-3">
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                            <div class="product_item">
                                <div class="product_item_image">
                                    <img src="https://via.placeholder.com/500/500" alt="">
                                </div>
                                <star-component></star-component>
                                <div class="product_item_title">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="product_item_country">Lorem.</div>
                                <div class="product_item_seller">Lorem.</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">200 tg</div>
                                        <div class="old_price">500 tg</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </section>
    </div>
</body>
</html>