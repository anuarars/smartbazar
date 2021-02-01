@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная / </li>
            <li>Избранное</li>
        </ul>
    </div>
    <div class="inner_container">
        <div class="single_product_wrapper">
            <div class="single_product_main_info">
                <div class="single_product_main_image">
                    <img src="{{asset('icons/test/product.svg')}}" alt="">
                </div>
                <div class="single_product_main_desc">
                    <h3>{{$product->title}}</h3>
                    <a href="#" class="text-skyblue">Все предложения продавца</a>
                    <h5 class="text-pink">Нет в наличии</h5>
                    <h1>{{$product->price}} тг.</h1>
                    <div class="single_product_main_desc_buttons">
                        <button class="btn-pink-rounded">Купить</button>
                        <button class="btn-pink-rounded-outline">Написать</button>
                        <img src="{{asset('icons/heart.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="single_product_company_info">
                <div class="single_product_company_img">
                    <img src="{{asset('icons/test/logo.svg')}}" alt="">
                </div>
                <fieldset>{{$product->company->name}}</fieldset>
                <ul>
                    <li><img src="{{asset('icons/product/small_location.svg')}}" alt=""><span>Продавец из: <span class="text-skyblue">г. Алматы</span></span></li>
                    <li><img src="{{asset('icons/product/small_branch.svg')}}" alt=""><span class="text-skyblue">Филиалы</span></li>
                    <li><img src="{{asset('icons/product/small_checkmark.svg')}}" alt=""><span class="text-skyblue">График работы</span></li>
                    <li><img src="{{asset('icons/product/small_phone.svg')}}" alt=""><span class="text-skyblue">+7 показать номер</span></li>
                    <li><img src="{{asset('icons/product/small_email.svg')}}" alt=""><span class="text-skyblue">zakazberry@yandex.kz</span></li>
                </ul>
                <fieldset>Рейтинг продавца</fieldset>
                <star-component></star-component>
                <ul>
                    <li><img src="{{asset('icons/product/small_ok.svg')}}" alt=""><span class="text-skyblue">77% положительных из 14 отзывов за год</span></li>
                    <li><img src="{{asset('icons/product/small_comment.svg')}}" alt=""><span class="text-skyblue">Всего 14 отзывов</span></li>
                </ul>
                <fieldset>Достижение продавца</fieldset>
                <div class="certificates">
                    <img src="{{asset('icons/test/certificate.svg')}}" alt="">
                    <span>Быстрое обслуживание</span>
                </div>
            </div>
            <div class="single_product_terms">
                <ul>
                    <li>Способы оплаты</li>
                    <li>Безналичный расчет</li>
                    <li>Подробнее</li>
                </ul>
                <ul>
                    <li>Способы доставки</li>
                    <li>Самовывоз, доставка курьером</li>
                    <li>Подробнее</li>
                </ul>
                <ul>
                    <li>Условия возврата</li>
                    <li>Регионы доставки</li>
                </ul>
                <ul>
                    <li>Защищаем покупки</li>
                    <li>Возмещаем до 50 000 тгпри заказе через корзину SmartBazar.kz</li>
                    <li>Подробнее</li>
                </ul>
            </div>
        </div>
        <div class="review">
            <div class="review_header">
                <h3>Характеристики</h3>
                <h3>Отзывы о <span class="text-skyblue">TOO «Berry Company»</span></h3>
            </div>
            <div class="review_desc">
                <ul class="review_desc_desc">
                    <li class="sm-title">Основные атрибуты</li>
                    <li class="text">Производитель <span>ASSA FOODS</span></li>
                    <li class="text">Страна производитель <span>Турция</span></li>
                    <li class="sm-title">Основные атрибуты</li>
                    <li class="text">Вес <span>250.0</span></li>
                    <li class="text">Тип  <span>Фасованные</span></li>
                    <li class="text">Вид кондитерских изделий   <span>Лукум</span></li>
                    <h3>Описание</h3>
                    <li class="text">
                        Идеальным подарком на любой праздник, будь то свадьба, день рождения или 8 марта, станет набор конфет с марципаном. Сердечки с шампанским в молочном шоколаде настроят на романтический лад, ассорти из 4 вкусов совершенно точно оценят коллеги, а вариации с малиновой панна-коттой не оставят равнодушным ни одного гурмана! Марципан-стики или марципановый картофель станут прекрасным дополнением к чашке чая или кофе в дружеской компании, а конфеты без шоколада позволят насладиться истинным вкусом настоящего марципана. К
                    </li>
                </ul>
                <div class="review_desc_comments">
                    <button class="btn-pink-rounded">Добавить отзыв о продавце</button>
                    <div class="review_desc_comments_card">
                        <star-component></star-component>
                        <div class="review_desc_comments_card_header">
                            <span class="text">Отлично</span>
                            <span class="text">06.12.2020</span>
                        </div>
                        <div class="review_desc_comments_card_body">
                            Все отлично! Регулярно делаю заказы в этом магазине. Персонал вежлив, консультации развернутые. При наличии товаров в магазине всегда оперативно отправляют заказ. В Нур-Султан получаю посылки в день заказа! Был у них в Караганде, тоже все очень понравилось. Рекомендую!
                        </div>
                    </div>
                    <div class="review_desc_comments_card">
                        <star-component></star-component>
                        <div class="review_desc_comments_card_header">
                            <span class="text">Отлично</span>
                            <span class="text">06.12.2020</span>
                        </div>
                        <div class="review_desc_comments_card_body">
                            Все отлично! Регулярно делаю заказы в этом магазине. Персонал вежлив, консультации развернутые. При наличии товаров в магазине всегда оперативно отправляют заказ. В Нур-Султан получаю посылки в день заказа! Был у них в Караганде, тоже все очень понравилось. Рекомендую!
                        </div>
                    </div>
                    <a href="#" class="text-skyblue">Все отзывы</a>
                </div>
            </div>
        </div>
        <div class="product_sellers">
            <ul>
                <li class="md-title">Продавец</li>
                <li class="md-title">Рейтинг продавца</li>
                <li class="md-title">Цена товара</li>
                <li class="md-title">Наличие</li>
                <li></li>
            </ul>
            <ul>
                <li class="text">
                    <span>TOO «Berry Company»</span>
                    <span>ТЦ «Асем» Бутик N25</span>
                </li>
                <li class="text">
                    <star-component></star-component>
                    <span class="text-skyblue">20 отзывов</span>
                </li>
                <li class="text">1 210 тг</li>
                <li class="text">В наличии</li>
                <li>
                    <button class="btn-pink-rounded">Купить</button>
                </li>
            </ul>
            <ul>
                <li class="text">
                    <span>TOO «Berry Company»</span>
                    <span>ТЦ «Асем» Бутик N25</span>
                </li>
                <li class="text">
                    <star-component></star-component>
                    <span class="text-skyblue">20 отзывов</span>
                </li>
                <li class="text">1 210 тг</li>
                <li class="text">В наличии</li>
                <li>
                    <button class="btn-pink-rounded">Купить</button>
                </li>
            </ul>
            <ul>
                <li class="text">
                    <span>TOO «Berry Company»</span>
                    <span>ТЦ «Асем» Бутик N25</span>
                </li>
                <li class="text">
                    <star-component></star-component>
                    <span class="text-skyblue">20 отзывов</span>
                </li>
                <li class="text">1 210 тг</li>
                <li class="text">В наличии</li>
                <li>
                    <button class="btn-pink-rounded">Купить</button>
                </li>
            </ul>
            <ul>
                <li class="text">
                    <span>TOO «Berry Company»</span>
                    <span>ТЦ «Асем» Бутик N25</span>
                </li>
                <li class="text">
                    <star-component></star-component>
                    <span class="text-skyblue">20 отзывов</span>
                </li>
                <li class="text">1 210 тг</li>
                <li class="text">В наличии</li>
                <li>
                    <button class="btn-pink-rounded">Купить</button>
                </li>
            </ul>
            <ul>
                <li class="text">
                    <span>TOO «Berry Company»</span>
                    <span>ТЦ «Асем» Бутик N25</span>
                </li>
                <li class="text">
                    <star-component></star-component>
                    <span class="text-skyblue">20 отзывов</span>
                </li>
                <li class="text">1 210 тг</li>
                <li class="text">В наличии</li>
                <li>
                    <button class="btn-pink-rounded">Купить</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="products_body_wrapper">
        <div class="title_default">
            <div class="title_default_main">
                <img src="{{asset('icons/arrow_down.svg')}}" alt="discount">
                <span>Cмотрите также</span>
            </div>
            <div class="title_default_link">
                <a href="#">Все</a>
                <img src="{{asset('icons/arrow_right_black.svg')}}" alt="arrow_right_black">
            </div>
        </div>
        <div class="products_body">
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
        </div>
        <button class="pink_btn_lg">Показать больше</button>
    </div>
    <div class="products_body_wrapper">
        <div class="title_default">
            <div class="title_default_main">
                <img src="{{asset('icons/arrow_down.svg')}}" alt="discount">
                <span>Вы просматривали</span>
            </div>
            <div class="title_default_link">
                <a href="#">Все</a>
                <img src="{{asset('icons/arrow_right_black.svg')}}" alt="arrow_right_black">
            </div>
        </div>
        <div class="products_body">
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
            <div class="product_item">
                <a href="#" class="product_item_image">
                    <img src="https://via.placeholder.com/500/500" alt="">
                </a>
                <a href="#" class="add_to_favorite">
                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                </a>
                <star-component
                ></star-component>
                <div class="product_item_title">description</div>
                <div class="product_item_country">10%</div>
                <div class="product_item_seller">company</div>
                <div class="product_item_info">
                    <div class="product_item_price">
                        <div class="new_price">1766 тг.</div>
                        <div class="old_price">6000 тг.</div>
                    </div>
                    <div class="product_item_place">Lorem.</div>
                </div>
                <button>В корзину</button>
            </div>
        </div>
        <button class="pink_btn_lg">Показать больше</button>
    </div>
@endsection