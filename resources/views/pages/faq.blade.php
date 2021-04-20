@extends('layouts.default')

@section('content')

    <div class="container">
        <!--
        <div class="main">
            <div class="main_image">
                <img class="main_photo" src="https://pbs.twimg.com/profile_images/942868127775420418/zhf6MXxU.jpg" alt="image">
            </div>
            <div class="main_info">
                <div class="main_info_text">
                    <h2>Бутик №7</h2>
                </div>
                <div class="main_info_price">
                    2 этаж, 3 ряд
                    <hr class="line">
                </div>
            </div>
            <div class="all_the_days">
                <h3>График работы</h3>
                <div class="days">
                    <div class="day_of_the_week">
                        Понедельник:
                    </div>
                    <div class="day_time">
                        10:00-18:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Вторник:
                    </div>
                    <div class="day_time">
                        10:00-18:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Среда:
                    </div>
                    <div class="day_time">
                        10:00-18:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Четверг:
                    </div>
                    <div class="day_time">
                        10:00-18:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Пятница:
                    </div>
                    <div class="day_time">
                        10:00-18:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Суббота:
                    </div>
                    <div class="day_time">
                        11:00-17:00
                    </div>
                </div>
                <div class="days">
                    <div class="day_of_the_week">
                        Воскресенье:
                    </div>
                    <div class="day_time">
                        11:00-17:00
                    </div>
                </div>
            </div>
        </div>
    -->
        <div class="row mx-auto w-100 my-5 my-sm-5 d-flex flex-wrap">
            <div class="col w-100 mt-3 mt-sm-3">
                <img class="w-75" src="https://pbs.twimg.com/profile_images/942868127775420418/zhf6MXxU.jpg" alt="image">
            </div>
            <div class="col w-100 mt-3 mt-sm-3">
                <div>
                    <h2>Бутик №7</h2>
                </div>
                <div>
                    2 этаж, 3 ряд
                    <hr>
                </div>
            </div>
            <div class="col w-100 mt-3 mt-sm-3">
                <div class="all_the_days">
                    <h3>График работы</h3>
                    <div class="days">
                        <div class="day_of_the_week">
                            Понедельник:
                        </div>
                        <div class="day_time">
                            10:00-18:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Вторник:
                        </div>
                        <div class="day_time">
                            10:00-18:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Среда:
                        </div>
                        <div class="day_time">
                            10:00-18:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Четверг:
                        </div>
                        <div class="day_time">
                            10:00-18:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Пятница:
                        </div>
                        <div class="day_time">
                            10:00-18:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Суббота:
                        </div>
                        <div class="day_time">
                            11:00-17:00
                        </div>
                    </div>
                    <div class="days">
                        <div class="day_of_the_week">
                            Воскресенье:
                        </div>
                        <div class="day_time">
                            11:00-17:00
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        
        <!--<div class="cartForBoutique my-5" style="display: flex; flex-direction: row; justify-content: space-around;">-->
        <div class="products-list__body my-5" style="display: flex; flex-direction: row; justify-content: space-around;">
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>    

        <div class="products-list__body my-5" style="display: flex; flex-direction: row; justify-content: space-around;">
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>

            
        </div> 

        <div class="products-list__body my-5" style="display: flex; flex-direction: row; justify-content: space-around;">
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item" >
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="products-list__item">
                <div class="product-card product-card--hidden-actions ">
                    <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href=""></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image product-image">
                        <a href="" class="product-image__body">
                            <img class="product-image__img" src="" alt="">
                        </a>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <a href="product.html"></a>
                        </div>
                        <div class="product-card__rating">
                            <div class="product-card__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <div class="rating__body">
                                            <star-component ></star-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__rating-legend">Отзывов: </div>
                        </div>
                        <div class="input-number product__quantity">
                            <input id="product-quantity"
                                    class="input-number__input form-control form-control-lg"
                                    type="number" min="1" value="1">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </div>
                    <div class="product-card__actions" style="padding: 0 24px 48px;">
                        <div class="product-card__availability" style="display: none;">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                       
                        <div class="product-card__prices">
                            2000 тг
                        </div>
                        <div class="product-card__buttons">
                            <add-to-cart-component>
                            </add-to-cart-component>
                            <like-component >
                            </like-component>
                        </div>
                    </div>
                </div>
            </div>

            
        </div> 
        <!--</div>-->

       

    </div>
@endsection