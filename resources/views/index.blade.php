@extends('layouts.default')

@section('content')
<div class="site__body">
    <div class="slider mt-3">
        <home-slider-component></home-slider-component>
    </div>

    <!-- .block-slideshow -->
{{--    <div class="block-slideshow block-slideshow--layout--with-departments block">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 col-lg-12">--}}
{{--                    <div class="block-slideshow__body">--}}
{{--                        <div class="owl-carousel">--}}
{{--                            <a class="block-slideshow__slide" href="">--}}
{{--                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style = "--}}
{{--                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/table.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;--}}
{{--                                "></div>--}}
{{--                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/basket.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;"--}}
{{--                                ></div>--}}
{{--                                <div class="overlay"></div>--}}
{{--                                <div class="block-slideshow__slide-content">--}}
{{--                                    <div class="block-slideshow__slide-title text-white">Нужно накрыть стол?</div>--}}
{{--                                    <div class="block-slideshow__slide-text text-white">Бысто и недорого?<br></div>--}}
{{--                                    <div class="block-slideshow__slide-button">--}}
{{--                                        <span class="btn btn-primary btn-lg">Закажите сейчас продукты!!!</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="block-slideshow__slide" href="">--}}
{{--                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/basket.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;">--}}
{{--                                </div>--}}
{{--                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/basket.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;"></div>--}}
{{--                                <div class="block-slideshow__slide-content">--}}
{{--                                    <div class="block-slideshow__slide-title text-white">Надоело долго ждать в очередях на кассе?</div>--}}
{{--                                    <div class="block-slideshow__slide-text text-white">В SmartBazar нет никаких очередей</div>--}}
{{--                                    <div class="block-slideshow__slide-button">--}}
{{--                                        <span class="btn btn-primary btn-lg">Не стойте в очереди и закажите</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="block-slideshow__slide" href="">--}}
{{--                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="--}}
{{--                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/table.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;--}}
{{--                                "></div>--}}
{{--                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="--}}
{{--                                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{secure_asset('img/stroyka/table.jpg')}}');--}}
{{--                                -webkit-background-size: cover;--}}
{{--                                -moz-background-size:  cover;--}}
{{--                                -o-background-size: cover;--}}
{{--                                background-size: cover;--}}
{{--                                "></div>--}}
{{--                                <div class="block-slideshow__slide-content">--}}
{{--                                    <div class="block-slideshow__slide-title text-white">Не хотите таскать сумки с базара?</div>--}}
{{--                                    <div class="block-slideshow__slide-text text-white">Не таскайте!!</div>--}}
{{--                                    <div class="block-slideshow__slide-button">--}}
{{--                                        <span class="btn btn-primary btn-lg">Сэкономьте время!</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- .block-slideshow / end -->
    <!-- .block-features -->
    {{-- <div class="block block-features block-features--layout--classic">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#fi-free-delivery-48')}}"></use>
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
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#fi-24-hours-48')}}"></use>
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
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#fi-payment-security-48')}}"></use>
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
                            <use xlink:href="{{secure_asset('template/images/sprite.svg#fi-tag-48')}}"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Большие скидки</div>
                        <div class="block-features__subtitle">Скидки до 90%</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- .block-banner / end -->
    <!-- .block-products -->
    <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h1 class="block-header__title">Скидки</h1>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-products__body">
                <div class="block-products__featured">
{{--                    <div class="block-products__featured-item">--}}
{{--                        <div class="product-card product-card--hidden-actions ">--}}
{{--                            <button class="product-card__quickview" type="button">--}}
{{--                                <svg width="16px" height="16px">--}}
{{--                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#quickview-16')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <span class="fake-svg-icon"></span>--}}
{{--                            </button>--}}
{{--                            <div class="product-card__badges-list">--}}
{{--                                <div class="product-card__badge product-card__badge--new">Новое</div>--}}
{{--                            </div>--}}
{{--                            <div class="product-card__image product-image">--}}
{{--                                <a href="{{route('item', $itemsDiscount->first(), true)}}" class="product-image__body">--}}
{{--                                    <img class="product-image__img" src="{{secure_asset($itemsDiscount->first()->product->galleries->first()->image)}}" alt="{{secure_asset($itemsDiscount->first()->product->galleries->first()->image)}}">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="product-card__info">--}}
{{--                                <div class="product-card__name">--}}
{{--                                    <a href="{{route('item', $itemsDiscount->first(), true)}}">{{$itemsDiscount->first()->product->title}}</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-card__rating">--}}
{{--                                    <div class="product-card__rating-stars">--}}
{{--                                        <div class="rating">--}}
{{--                                            <div class="rating__body">--}}
{{--                                                --}}{{-- <star-component :rating="{{$products->first()->reviews->pluck('rate')->avg() ?? 5}}"></star-component> --}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="product-card__rating-legend">Отзывов: {{$products->first()->reviews->count()}}</div> --}}
{{--                                </div>--}}
{{--                                <ul class="product-card__features-list d-block">--}}
{{--                                    {!!$itemsDiscount->first()->product->description!!}--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="product-card__actions">--}}
{{--                                <div class="product-card__prices">--}}
{{--                                    @if ($itemsDiscount->first()->discount == null)--}}
{{--                                        {{$itemsDiscount->first()->priceAfterFee()}} тг.--}}
{{--                                    @else--}}
{{--                                        <span class="product-card__new-price">--}}
{{--                                            {{$itemsDiscount->first()->afterDiscount}} тг.--}}
{{--                                        </span>--}}
{{--                                        <span class="product-card__old-price">--}}
{{--                                            {{$itemsDiscount->first()->priceAfterFee()}} тг.--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="product-card__buttons">--}}
{{--                                    <add-to-cart-component--}}
{{--                                            :item="{{ $itemsDiscount->first()->id }}"--}}
{{--                                            :home_url = "homeUrl"--}}
{{--                                            :cart="{{ $itemsDiscount->first()->isAddedToCartBy() ? 'true' : 'false' }}"--}}
{{--                                            @click.native="countCart">--}}
{{--                                    </add-to-cart-component>--}}
{{--                                    <like-component--}}
{{--                                        :item={{ $itemsDiscount->first()->id}}--}}
{{--                                        :home_url="homeUrl"--}}
{{--                                        :favorited="{{ $itemsDiscount->first()->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">--}}
{{--                                    </like-component>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="block-products__list" >
                    @foreach ($itemsDiscount as $item)
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions ">
{{--                                <button class="product-card__quickview" type="button" data-toggle="modal" data-target="#productView{{$item->id}}">--}}
{{--                                    <svg width="16px" height="16px">--}}
{{--                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#quickview-16')}}"></use>--}}
{{--                                    </svg>--}}
{{--                                    <span class="fake-svg-icon"></span>--}}
{{--                                </button>--}}
                                <div class="product-card__image product-image">
                                    <a href="{{route('item', $item, true)}}" class="product-image__body">
                                        <img class="product-image__img" src="{{secure_asset($item->product->galleries->first()->image)}}" alt="{{$item->product->galleries->first()->image}}">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{route('item', $item)}}">{{$item->product->title}}</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <star-component
                                                    :rating="{{ $item->avgRating() }}"
                                                ></star-component>
                                            </div>
                                            <div class="product-card__rating-legend">Просмотров: {{$item->views}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card__actions">
                                    <div class="product-card__prices">
                                        @if ($item->discount == null)
                                            {{$item->priceAfterFee()}} тг.
                                        @else
                                            <span class="product-card__new-price">
                                                {{$item->afterDiscount}} тг.
                                            </span>
                                            <span class="product-card__old-price">
                                                {{$item->priceAfterFee()}} тг.
                                            </span>
                                        @endif
                                    </div>
                                    <div class="product-card__buttons">
                                        <add-to-cart-component
                                            :item="{{ $item->id }}"
                                            :home_url = "homeUrl"
                                            :cart="{{ $item->isAddedToCartBy() ? 'true' : 'false' }}"
                                            @click.native="countCart">
                                        </add-to-cart-component>
                                        <like-component
                                            :item={{ $item->id }}
                                            :home_url="homeUrl"
                                            :favorited="{{ $item->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
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
    {{-- <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Скидки</h3>
                <div class="block-header__divider"></div>
            </div>

        </div>
    </div> --}}
    <!-- .block-products / end -->
    <!-- .block-categories -->
<div class="accordion"><accordion-component></accordion-component></div>

    <div class="block block--highlighted block-categories block-categories--layout--classic">
        <div class="container">
            <div class="block-header">
                <h1 class="block-header__title">Популярные категории</h1>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-categories__list">
                @foreach ($categories as $category)
                    <div class="block-categories__item category-card category-card--layout--classic">
                        <div class="category-card__body">
                            <div class="category-card__image">
                                <a href="{{ route('catalog.index', ['category' => $category->id], true) }}"><img src="{{secure_asset($category->image)}}" alt="{{$category->image}}"></a>
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__name">
                                    <a href="#">{{$category->title}}</a>
                                </div>
                                <ul class="category-card__links">
                                    @foreach ($category->children->take(4) as $child)
                                        <li><a href="{{ route('catalog.index', ['category' => $child->id], true) }}">{{$child->title}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="category-card__all">
                                    <a href="{{ route('catalog.index', ['category' => $category->id], true) }}">Показать все</a>
                                </div>
                                {{-- <div class="category-card__products">
                                    8 Products
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- .block-categories / end -->





{{-- @foreach ($products as $product)
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
                                @if ($product->discount == null)
                                {{$product->priceAfterFee()}} тг.
                                @else
                                    <span class="product-card__new-price">
                                        {{$product->afterDiscount}} тг.
                                    </span>
                                    <span class="product-card__old-price">
                                        {{$product->priceAfterFee()}} тг.
                                    </span>
                                @endif
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
                                                        :product="{{ $products->first()->id }}"
                                                        :home_url = "homeUrl"
                                                        :cart="{{ $products->first()->isAddedToCartBy() ? 'true' : 'false' }}"
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
@endforeach --}}

@endsection

