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
                <div class="row m-0">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="product_item">
                            <div class="product_item_image">
                                <img src="https://via.placeholder.com/500/500" alt="">
                            </div>
                            <div class="product_item_category">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
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
                <div class="row m-0">
                    @foreach ($products as $product)
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                            <div class="product_item">
                                <a href="{{route('product', $product)}}" class="product_item_image">
                                    <img src="{{$product->image}}" alt="{{$product->image}}">
                                </a>
                                <a href="#" class="add_to_favorite" @click.prevent="addWishlist({{$product->id}})">
                                    <img src="{{asset('icons/heart.svg')}}" alt="heart" class="favorite_like" @click.prevent="addWishlist({{$product->id}})">
                                </a>
                                <star-component
                                    :rating = "{{$product->avgRating()}}"
                                ></star-component>
                                <div class="product_item_title">{{$product->description}}</div>
                                <div class="product_item_country">{{$product->discountPercent}}</div>
                                <div class="product_item_seller">{{$product->company->name}}</div>
                                <div class="product_item_info">
                                    <div class="product_item_price">
                                        <div class="new_price">{{$product->discountPercent}} тг.</div>
                                        <div class="old_price">{{$product->price}} тг.</div>
                                    </div>
                                    <div class="product_item_place">Lorem.</div>
                                </div>
                                <button v-on:click="addToCart({{$product->id}})">В корзину</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="pink_btn_lg">Показать больше</button>
            </div>
        </div>
    </main>
@endsection