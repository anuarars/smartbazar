@extends('layouts.default')

@section('content')
<div class="site__body">
    <!-- .block-slideshow -->
    <div class="block-slideshow block-slideshow--layout--with-departments block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="block-slideshow__body">
                        <div class="owl-carousel">
                            <a class="block-slideshow__slide" href="">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style = "
                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/table.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;
                                "></div>
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/basket.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;"
                                ></div>
                                <div class="overlay"></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title text-white">Нужно накрыть стол?</div>
                                    <div class="block-slideshow__slide-text text-white">Бысто и недорого?<br></div>
                                    <div class="block-slideshow__slide-button">
                                        <span class="btn btn-primary btn-lg">Закажите сейчас продукты!!!</span>
                                    </div>
                                </div>
                            </a>
                            <a class="block-slideshow__slide" href="">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/basket.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;">
                                </div>
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/basket.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;"></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title text-white">Надоело долго ждать в очередях на кассе?</div>
                                    <div class="block-slideshow__slide-text text-white">В SmartBazar нет никаких очередей</div>
                                    <div class="block-slideshow__slide-button">
                                        <span class="btn btn-primary btn-lg">Не стойте в очереди и закажите</span>
                                    </div>
                                </div>
                            </a>
                            <a class="block-slideshow__slide" href="">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="
                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/table.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;
                                "></div>
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="
                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('img/stroyka/table.jpg')}}');
                                -webkit-background-size: cover;
                                -moz-background-size:  cover;
                                -o-background-size: cover;
                                background-size: cover;
                                "></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title text-white">Не хотите таскать сумки с базара?</div>
                                    <div class="block-slideshow__slide-text text-white">Не таскайте!!</div>
                                    <div class="block-slideshow__slide-button">
                                        <span class="btn btn-primary btn-lg">Сэкономьте время!</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .block-slideshow / end -->
    <!-- .block-features -->
    <div class="block block-features block-features--layout--classic">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{asset('template/images/sprite.svg#fi-free-delivery-48')}}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Быстрая доставка</div>
                        <div class="block-features__subtitle">быстрее не бывает</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{asset('template/images/sprite.svg#fi-24-hours-48')}}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Поддержка 24/7</div>
                        <div class="block-features__subtitle">Звоните в любое время</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{asset('template/images/sprite.svg#fi-payment-security-48')}}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">100% безопасность</div>
                        <div class="block-features__subtitle">100% безопасность</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{asset('template/images/sprite.svg#fi-tag-48')}}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Большие скидки</div>
                        <div class="block-features__subtitle">Скидки до 90%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .block-banner / end -->
    <!-- .block-products -->
    <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Скидки</h3>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-products__body">
                <div class="block-products__featured">
                    <div class="block-products__featured-item">
                        <div class="product-card product-card--hidden-actions ">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="{{asset('template/images/sprite.svg#quickview-16')}}"></use>
                                </svg>
                                <span class="fake-svg-icon"></span>
                            </button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">Новое</div>
                            </div>
                            <div class="product-card__image product-image">
                                <a href="{{route('product', $products->first())}}" class="product-image__body">
                                    <img class="product-image__img" src="{{asset($products->first()->image)}}" alt="{{asset($products->first()->image)}}">
                                </a>
                            </div>
                            <div class="product-card__info">
                                <div class="product-card__name">
                                    <a href="{{route('product', $products->first())}}">{{$products->first()->title}}</a>
                                </div>
                                <div class="product-card__rating">
                                    <div class="product-card__rating-stars">
                                        <div class="rating">
                                            <div class="rating__body">
                                                <star-component :rating="{{$products->first()->reviews->pluck('rate')->avg() ?? 5}}"></star-component>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">Отзывов: {{$products->first()->reviews->count()}}</div>
                                </div>
                                <ul class="product-card__features-list d-block">
                                    {!!$products->first()->description!!}
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__prices">
                                    {{$products->first()->price}} тг.
                                </div>
                                <div class="product-card__buttons">
                                    <add-to-cart-component 
                                            :product="{{ $products->first()->id }}"
                                            :home_url = "homeUrl"
                                            :cart="{{ $products->first()->isAddedToCartBy() ? 'true' : 'false' }}"
                                            @click.native="countCart">
                                    </add-to-cart-component>
                                    <like-component 
                                        :product={{ $products->first()->id }}
                                        :home_url = "homeUrl"
                                        :favorited="{{ $products->first()->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
                                    </like-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products__list">
                    @foreach ($products as $product)
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions ">
                                <button class="product-card__quickview" type="button" data-toggle="modal" data-target="#productView{{$product->id}}">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="{{asset('template/images/sprite.svg#quickview-16')}}"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__image product-image">
                                    <a href="{{route('product', $product)}}" class="product-image__body">
                                        <img class="product-image__img" src="{{asset($product->image)}}" alt="{{$product->image}}">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{route('product', $product)}}">{{$product->title}}</a>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- .block-products / end -->
    <!-- .block-categories -->
    <div class="block block--highlighted block-categories block-categories--layout--classic">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Популярные категории</h3>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-categories__list">
                @foreach ($categories as $category)
                    <div class="block-categories__item category-card category-card--layout--classic">
                        <div class="category-card__body">
                            <div class="category-card__image">
                                <a href=""><img src="{{asset('template/images/categories/category-1.jpg')}}" alt=""></a>
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__name">
                                    <a href="#">{{$category->title}}</a>
                                </div>
                                <ul class="category-card__links">
                                    @foreach ($category->children->take(4) as $child)
                                        <li><a href="">{{$child->title}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="category-card__all">
                                    <a href="">Показать все</a>
                                </div>
                                <div class="category-card__products">
                                    572 Products
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- .block-categories / end -->
</div>





@foreach ($products as $product)
<div class="modal fade" id="productView{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0px!important;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="quickview">
                <button class="quickview__close" type="button" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px">
                        <use xlink:href="{{asset('template/images/sprite.svg#cross-20')}}"></use>
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
                                            <use xlink:href="{{asset('template/images/sprite.svg#zoom-in-24')}}"></use>
                                        </svg>
                                    </button>
                                    <div class="owl-carousel" id="product-image">
                                        @foreach ($product->galleries as $gallery)
                                            <div class="product-image product-image--location--gallery">
                                                <a href="{{asset($gallery->image)}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                                    <img class="product-image__img" src="{{asset($gallery->image)}}" alt="">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        @foreach ($product->galleries as $gallery)
                                            <a href="{{asset($gallery->image)}}" class="product-image product-gallery__carousel-item">
                                                <div class="product-image__body">
                                                    <img class="product-image__img product-gallery__carousel-image" src="{{asset($gallery->image)}}" alt="">
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
                                {{$product->description}}
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
                            <form class="product__options">
                                <div class="form-group product__option">
                                    <label class="product__option-label" for="product-quantity">Кол-во</label>
                                    <div class="product__actions">
                                        <div class="product__actions-item">
                                            <div class="input-number product__quantity">
                                                <input id="product-quantity{{$product->id}}" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item product__actions-item--addtocart">
                                            <button class="btn btn-primary btn-lg" v-on:click="addToCart({{$product->id}})" type="button">В корзину</button>
                                        </div>
                                        <div class="product__actions-item product__actions-item--wishlist">
                                            <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="{{asset('template/images/sprite.svg#wishlist-16')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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