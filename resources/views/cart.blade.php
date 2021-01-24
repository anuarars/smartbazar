@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная / </li>
            <li>Оформление Заказа</li>
        </ul>
    </div>
    <h2 class="page_title">Оформление Заказа</h2>
    <div class="inner_container">
        <div class="cart_wrapper">
            <div class="cart_payment">
                <div class="cart_payment_address">
                    <fieldset class="xs-title">Способ оплаты:</fieldset>
                    <fieldset class="xs-title">Наличие товара (услуги) было указанно правильно?</fieldset>
                    <select name="">
                        <option value="" selected disabled>Выберите способ оплаты</option>
                        <option value="">Card</option>
                        <option value="">Kaspi</option>
                        <option value="">Наличка</option>
                    </select>
                    <select name="">
                        <option value="" selected disabled>Выберите регион</option>
                    </select>
                    <input type="text" placeholder="Адрес">
                </div>
                <div class="cart_payment_user">
                    <fieldset class="xs-title">Информация о получателе:</fieldset>
                    <input type="text" placeholder="Имя">
                    <input type="text" placeholder="Фамилия">
                    <input type="text" placeholder="Телефон">
                    <input type="email" placeholder="Email">
                    <textarea name="" rows="4" placeholder="Уточнение к заказу"></textarea>
                </div>
                <div class="cart_price">
                    <div class="cart_price_discount">
                        <span class="text text-skyblue">Экономия</span>
                        <span class="text text-skyblue">2 395 Тг</span>
                    </div>
                    <div class="cart_price_price">
                        <span class="text">К оплате </span>
                        <h2>5 205 Тг.</h2>
                    </div>
                </div>
                <button class="btn-pink-rounded w-100">Подтвердить заказ</button>
                <div class="sm-text text-center">Подтверждая заказ вы соглашаетесь с <a href="#" class="text-skyblue">политикой конфедициальности</a></div>
            </div>
            <div class="cart_products">
                <div class="cart_products_card">
                    <ul>
                        <li class="cart_card_title">Ваш заказ</li>
                        <li class="cart_company">
                            <div class="cart_company_img">
                                <img src="{{asset('icons/test/company_small.svg')}}" alt="">
                            </div>
                            <div class="cart_company_desc">
                                <h3>Модная лавка</h3>
                                <span class="text text-skyblue">
                                    <img src="{{asset('icons/product/small_phone.svg')}}" alt="">+77771235678
                                </span>
                            </div>
                        </li>
                        <li class="cart_product">
                            <div class="cart_product_img">
                                <img src="{{asset('icons/test/product_small.svg')}}" alt="">
                            </div>
                            <div class="cart_product_desc">
                                <h3>Красный марципан</h3>
                                <span>Цена: 5 205 Тг.</span>
                                <span>Количество 1 шт.</span>
                                <span>Наличие: В наличии</span>
                            </div>
                        </li>
                        <li class="cart_price">
                            <div class="cart_price_discount">
                                <span class="text text-skyblue">Экономия</span>
                                <span class="text text-skyblue">2 395 Тг</span>
                            </div>
                            <div class="cart_price_price">
                                <span class="text">К оплате </span>
                                <h2>5 205 Тг.</h2>
                            </div>
                        </li>
                        <li class="cart_mention">
                            Защищаем покупки на 50 000 тг при оформлении заказа
                        </li>
                    </ul>
                </div>
                <div class="cart_products_card">
                    <ul>
                        <li class="cart_card_title">Ваш заказ</li>
                        <li class="cart_company">
                            <div class="cart_company_img">
                                <img src="{{asset('icons/test/company_small.svg')}}" alt="">
                            </div>
                            <div class="cart_company_desc">
                                <h3>Модная лавка</h3>
                                <span class="text text-skyblue">
                                    <img src="{{asset('icons/product/small_phone.svg')}}" alt="">+77771235678
                                </span>
                            </div>
                        </li>
                        <li class="cart_product">
                            <div class="cart_product_img">
                                <img src="{{asset('icons/test/product_small.svg')}}" alt="">
                            </div>
                            <div class="cart_product_desc">
                                <h3>Красный марципан</h3>
                                <span>Цена: 5 205 Тг.</span>
                                <span>Количество 1 шт.</span>
                                <span>Наличие: В наличии</span>
                            </div>
                        </li>
                        <li class="cart_price">
                            <div class="cart_price_discount">
                                <span class="text text-skyblue">Экономия</span>
                                <span class="text text-skyblue">2 395 Тг</span>
                            </div>
                            <div class="cart_price_price">
                                <span class="text">К оплате </span>
                                <h2>5 205 Тг.</h2>
                            </div>
                        </li>
                        <li class="xs-title">
                            Защищаем покупки на 50 000 тг при оформлении заказа
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection