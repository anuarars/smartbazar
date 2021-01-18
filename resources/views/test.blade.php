@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная/</li>
            <li>Продукты/</li>
            <li>Сладости/</li>
            <li>Конфеты</li>
        </ul>
    </div>
    <div class="catalog">
        <aside>
            <button class="btn-pink">Сладости</button>
            <div class="catalog_categories">
                <ul>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                    <li><a href="#">Категрия товара</a></li>
                </ul>
            </div>
            <div class="catalog_list">
                <h5 class="headline">Брэнд</h5>
                <input type="text" placeholder="Я ищу">
                <ul>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                </ul>
            </div>
            <div class="catalog_price_range">
                <h5 class="headline">Цена</h5>
                <ul>
                    <li>
                        <small>От</small>
                        <input type="text">
                    </li>
                    <li>
                        <small>До</small>
                        <input type="text">
                    </li>
                </ul>
            </div>
            <div class="catalog_list">
                <h5 class="headline">Упаковка</h5>
                <ul>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                </ul>
            </div>
            <div class="catalog_list">
                <h5 class="headline">Вид начинки</h5>
                <ul>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                    <li><div class="catalog_checkbox"><input type="checkbox"></div>Брэнд</li>
                </ul>
            </div>
            <div class="catalog_colors">

            </div>
            <div class="catalog_stars">
                <star-component></star-component>
            </div>
        </aside>
        <div class="catalog_content_wrapper">
            <ul class="catalog_sort">
                <li>Сортировать по:</li>
                <li>
                    <a href="">Популярности</a>
                </li>
                <li><a href="#">Рейтингу</a></li>
                <li><a href="#">Цене</a></li>
                <li><a href="#">Скидке</a></li>
                <li><a href="#">Обновлению</a></li>
            </ul>
            <div class="catalog_content">
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
    </div>
@endsection