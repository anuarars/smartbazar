@extends('layouts.app')

@section('content')
    <main>
        <div class="slider">
            <slider-component></slider-component>
        </div>
        <div class="main-bg">
            <div class="products_body_wrapper">
                <div class="title_default">
                    <div class="title_default_main">
                        <img src="{{asset('icons/arrow_down.svg')}}" alt="arrow_down">
                        <span>Актуальное в декабре</span>
                    </div>
                    <div class="title_default_link">
                        <a href="#">Все</a>
                        <img src="{{asset('icons/arrow_right_black.svg')}}" alt="arrow_right_black">
                    </div>
                </div>
                <div class="products_body">
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
                <button class="pink_btn_lg">Все категории</button>
            </div>
        </div>
        <div class="main-bg">
            <div class="products_body_wrapper">
                <div class="title_default">
                    <div class="title_default_main">
                        <img src="{{asset('icons/discount.svg')}}" alt="discount">
                        <span>Мега скидки</span>
                    </div>
                    <div class="title_default_link">
                        <a href="#">Все</a>
                        <img src="{{asset('icons/arrow_right_black.svg')}}" alt="arrow_right_black">
                    </div>
                </div>
                <div class="products_body">
                    <div class="product_item">
                        <div class="product_item_image">
                            <img src="https://via.placeholder.com/500/500" alt="">
                        </div>
                        <star-component></star-component>
                        <div class="product_item_title">Продукция такая.</div>
                        <div class="product_item_country">Lorem.</div>
                        <div class="product_item_seller">Lorem.</div>
                        <div class="product_item_info">
                            <div class="product_item_price">
                                <div class="new_price">200 tg</div>
                                <div class="old_price">500 tg</div>
                            </div>
                            <div class="product_item_place">Lorem.</div>
                        </div>
                        <button>Купить</button>
                    </div>
                    <div class="product_item">
                        <a href="#" class="product_item_image">
                            <img src="https://via.placeholder.com/500/500" alt="">
                            <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite">
                        </a>
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
                        <button>Купить</button>
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
                        <button>Купить</button>
                    </div>
                </div>
                <button class="pink_btn_lg">Показать больше</button>
            </div>
        </div>
    </main>
@endsection