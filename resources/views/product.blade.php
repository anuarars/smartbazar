@extends('layouts.default')

@section('content')
<div class="site__body">
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Главная</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                            </svg>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content">
                    <!-- .product__gallery -->
                    <div class="product__gallery">
                        <div class="product-gallery">
                            <div class="product-gallery__featured">
                                <button class="product-gallery__zoom">
                                    <svg width="24px" height="24px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#zoom-in-24')}}"></use>
                                    </svg>
                                </button>
                                <div class="owl-carousel" id="product-image">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="product-image product-image--location--gallery">
                                            <a href="{{secure_asset($gallery->image)}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                                <img class="product-image__img" src="{{secure_asset($gallery->image)}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-gallery__carousel">
                                <div class="owl-carousel" id="product-carousel">
                                    @foreach ($product->galleries as $gallery)
                                        <a href="{{secure_asset($gallery->image)}}" class="product-image product-gallery__carousel-item">
                                            <div class="product-image__body">
                                                <img class="product-image__img product-gallery__carousel-image" src="{{secure_asset($gallery->image)}}" alt="">
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .product__gallery / end -->
                    <!-- .product__info -->
                    <div class="product__info">
                        <div class="product__wishlist-compare">
                            <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                <svg width="16px" height="16px">
                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#wishlist-16')}}"></use>
                                </svg>
                            </button>
                        </div>
                        <h1 class="product__name">{{$product->title}}</h1>
                        <div class="product__rating">
                            <div class="product__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <star-component
                                            :rating="{{$product->reviews->pluck('rate')->avg() ?? 5}}"
                                        ></star-component>
                                    </div>
                                </div>
                            </div>
                            <div class="product__rating-legend">
                                <a href="">Отзывы: {{$product->reviews->count()}}</a><span>/</span><a href="#tab-reviews">Оставить отзыв</a>
                            </div>
                        </div>
                        <div class="product__description">
                            {!!$product->description!!}
                        </div>
                        <ul class="product__features">
                            <li>Speed: 750 RPM</li>
                            <li>Power Source: Cordless-Electric</li>
                            <li>Battery Cell Type: Lithium</li>
                            <li>Voltage: 20 Volts</li>
                            <li>Battery Capacity: 2 Ah</li>
                        </ul>
                        <ul class="product__meta">
                            <li class="product__meta-availability">В наличии: <span class="text-success">Да</span></li>
                            <li>Производитель: <a href="">{{$product->brand->title ?? ""}}</a></li>
                        </ul>
                    </div>
                    <!-- .product__info / end -->
                    <!-- .product__sidebar -->
                    <div class="product__sidebar">
                        <div class="product__availability">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                        <div class="product__prices">
                            {{$product->price}} тг.
                        </div>
                        <!-- .product__options -->
                        <div class="product__options">
                            <div class="form-group product__option">
                                <div class="product__actions">
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>
                                    <div class="product__actions-item product__actions-item--addtocart">
                                        <button class="btn btn-primary btn-lg">В корзину</button>
                                    </div>
                                    <like-component 
                                        :product={{ $product->id }}
                                        :home_url = "homeUrl"
                                        :favorited="{{ $product->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
                                    </like-component>
                                </div>
                            </div>
                        </div>
                        <!-- .product__options / end -->
                    </div>
                    <!-- .product__end -->
                    <div class="product__footer">

                    </div>
                </div>
            </div>
            <div class="product-tabs  product-tabs--sticky">
                <div class="product-tabs__list">
                    <div class="product-tabs__list-body">
                        <div class="product-tabs__list-container container">
                            <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Описание</a>
                            <a href="#tab-specification" class="product-tabs__item">Характеристики</a>
                            <a href="#tab-reviews" class="product-tabs__item">Отзывы</a>
                            <a href="#tab-company" class="product-tabs__item">Продавец</a>
                        </div>
                    </div>
                </div>
                <div class="product-tabs__content">
                    <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                        <div class="typography">
                            <h3>Описание товара</h3>
                            <p>
                                {!!$product->description!!}
                            </p>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-specification">
                        <div class="spec">
                            <h3 class="spec__header">Характеристики</h3>
                            <div class="spec__section">
                                {{-- <h4 class="spec__section-title">General</h4>
                                <div class="spec__row">
                                    <div class="spec__name">Material</div>
                                    <div class="spec__value">Aluminium, Plastic</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Engine Type</div>
                                    <div class="spec__value">Brushless</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Battery Voltage</div>
                                    <div class="spec__value">18 V</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Battery Type</div>
                                    <div class="spec__value">Li-lon</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Number of Speeds</div>
                                    <div class="spec__value">2</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Charge Time</div>
                                    <div class="spec__value">1.08 h</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Weight</div>
                                    <div class="spec__value">1.5 kg</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-reviews">
                        <div class="reviews-view">
                            <div class="reviews-view__list">
                                <h3 class="reviews-view__header">Отзывы</h3>
                                <div class="reviews-list">
                                    <ol class="reviews-list__content">
                                        @foreach ($reviews as $review)
                                            <li class="reviews-list__item">
                                                <div class="review">
                                                    <div class="review__content">
                                                        <div class="review__author">{{$review->user->firstname}} {{$review->user->lastname}}</div>
                                                        <div class="review__rating">
                                                            <div class="rating">
                                                                <div class="rating__body">
                                                                    <star-component
                                                                        :rating="{{$review->rate}}"
                                                                    ></star-component>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review__text">{{$review->description}}</div>
                                                        <div class="review__date">{{$review->created_at}}</div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                    <div class="reviews-list__pagination">
                                        <ul class="pagination justify-content-center">
                                            {{$reviews->links()}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @guest
                                <div class="row mt-5">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="reviews-view__header text-success">Войти, чтобы оставить отзыв</a>
                                    </div>
                                </div>
                            @else
                                <h3 class="reviews-view__header">Оставить отзыв</h3>
                                <div class="row">
                                    <rate-component
                                        :home_url = "homeUrl"
                                        :product = "{{$product}}"
                                    ></rate-component>
                                </div>
                            @endguest                       
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-company">
                        <div class="spec">
                            <h3 class="spec__header">Продавец</h3>
                            <div class="spec__section">
                            
                            </div>             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .block-products-carousel -->
    <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Похожие Товары</h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list">
                    <button class="block-header__arrow block-header__arrow--left" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-left-7x11')}}"></use>
                        </svg>
                    </button>
                    <button class="block-header__arrow block-header__arrow--right" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-right-7x11')}}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    @foreach ($cat_products as $product)
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card product-card--hidden-actions ">
                                <button class="product-card__quickview" type="button" data-toggle="modal" data-target="#productView{{$product->id}}">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#quickview-16')}}"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__image product-image">
                                    <a href="{{route('product', $product, true)}}" class="product-image__body">
                                        <img class="product-image__img" src="{{secure_asset($product->galleries->first()->image)}}" alt="{{$product->galleries->first()->image}}">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{route('product', $product, true)}}">{{$product->title}}</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body">
                                                    <star-component :rating="{{$product->reviews->pluck('rate')->avg() ?? 5}}"></star-component>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">Просмотров: {{$product->views}}</div>
                                    </div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">
                                        @if ($product->discount == null)
                                            {{$product->price}} тг.
                                        @else
                                            <span class="product-card__new-price">
                                                {{$product->afterDiscount}} тг.
                                            </span>
                                            <span class="product-card__old-price">
                                                {{$product->price}} тг.
                                            </span>
                                        @endif
                                    </div>
                                    <div class="product-card__buttons">
                                        <add-to-cart-component 
                                            :product="{{ $product->id }}"
                                            :home_url = "homeUrl"
                                            :cart="{{ $product->isAddedToCartBy() ? 'true' : 'false' }}"
                                            @click.native="countCart">
                                        </add-to-cart-component>
                                        <like-component 
                                            :product={{ $product->id }}
                                            :home_url = "homeUrl"
                                            :favorited="{{ $product->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
                                        </like-component>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- .block-products-carousel / end -->
</div>



@foreach ($cat_products as $product)
<div class="modal fade" id="productView{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0px!important;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="quickview">
                <button class="quickview__close" type="button" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px">
                        <use xlink:href="{{secure_asset('template/images/sprite.svg#cross-20')}}"></use>
                    </svg>
                </button>
                <div class="product product--layout--quickview" data-layout="quickview">
                    <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <button class="product-gallery__zoom">
                                        <svg width="24px" height="24px">
                                            <use xlink:href="{{secure_asset('template/images/sprite.svg#zoom-in-24')}}"></use>
                                        </svg>
                                    </button>
                                    <div class="owl-carousel" id="product-image">
                                        @foreach ($product->galleries as $gallery)
                                            <div class="product-image product-image--location--gallery">
                                                <a href="{{secure_asset($gallery->image)}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                                    <img class="product-image__img" src="{{secure_asset($gallery->image)}}" alt="">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        @foreach ($product->galleries as $gallery)
                                            <a href="{{secure_asset($gallery->image)}}" class="product-image product-gallery__carousel-item">
                                                <div class="product-image__body">
                                                    <img class="product-image__img product-gallery__carousel-image" src="{{secure_asset($gallery->image)}}" alt="">
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .product__gallery / end -->
                        <!-- .product__info -->
                        <div class="product__info">
                            <h1 class="product__name">{{$product->title}}</h1>
                            <div class="product__rating">
                                <div class="product__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body">
                                            <star-component></star-component>
                                        </div>
                                    </div>
                                </div>
                                <div class="product__rating-legend">
                                    <a href="">Просмотров: 7</a><span>/</span><a href="">Оставить отзыв</a>
                                </div>
                            </div>
                            <div class="product__description">
                                {!!$product->description!!}
                            </div>
                            <ul class="product__meta">
                                <li class="product__meta-availability">В наличии: <span class="text-success">Да</span></li>
                                <li>Производитель: <a href="">{{$product->brand->title ?? ""}}</a></li>
                            </ul>
                        </div>
                        <!-- .product__info / end -->
                        <!-- .product__sidebar -->
                        <div class="product__sidebar">
                            <div class="product__prices">
                                {{$product->price}} тг.
                            </div>
                            <!-- .product__options -->
                            <div class="product__options">
                                <div class="form-group product__option">
                                    <div class="product__actions">
                                        <div class="product__actions-item">
                                            <div class="input-number product__quantity">
                                                <input id="product-quantity{{$product->id}}" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item product__actions-item--addtocart">
                                            <div class="product-card__buttons">
                                                <add-to-cart-component 
                                                    :product="{{ $product->id }}"
                                                    :home_url = "homeUrl"
                                                    :cart="{{ $product->isAddedToCartBy() ? 'true' : 'false' }}"
                                                    @click.native="countCart">
                                            </add-to-cart-component>
                                            </div>
                                        </div>
                                        <like-component 
                                            :product={{ $product->id }}
                                            :home_url = "homeUrl"
                                            :favorited="{{ $product->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
                                        </like-component>
                                    </div>
                                </div>
                            </div>
                            <!-- .product__options / end -->
                        </div>
                        <!-- .product__end -->
                        <div class="product__footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection