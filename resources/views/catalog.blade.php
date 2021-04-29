@extends('layouts.default')

@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Главная</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Каталог</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Каталог</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">
                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                        <div class="block-sidebar__backdrop"></div>
                        <div class="block-sidebar__body">
                            <div class="block-sidebar__header">
                                <div class="block-sidebar__title">Фильтры</div>
                                <button class="block-sidebar__close" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#cross-20')}}"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                    <h4 class="widget-filters__title widget__title">Фильтры</h4>
                                    <div class="widget-filters__list">
                                        @foreach ($categories as $category)

                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>
                                                        {{$category->title}}
                                                        <svg class="filter__arrow" width="12px" height="7px">
                                                            <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-categories">
                                                                <ul class="filter-categories__list">
                                                                    @foreach ($category->children as $child)
                                                                        <li class="filter-categories__item filter-categories__item--parent">
                                                                            <svg class="filter-categories__arrow" width="6px" height="9px">
                                                                                <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-left-6x9')}}"></use>
                                                                            </svg>
                                                                            <a href="{{ route('catalog.index', ['category' => $child->id], true) }}">{{$child->title}}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

{{--                                    <div class="widget-filters__item">--}}
{{--                                        <div class="filter filter--opened" data-collapse-item>--}}
{{--                                            <button type="button" class="filter__title" data-collapse-trigger>--}}
{{--                                                Price--}}
{{--                                                <svg class="filter__arrow" width="12px" height="7px">--}}
{{--                                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                            <div class="filter__body" data-collapse-content>--}}
{{--                                                <div class="filter__container">--}}
{{--                                                    <div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1130">--}}
{{--                                                        <div class="filter-price__slider"></div>--}}
{{--                                                        <div class="filter-price__title">Price: $<span class="filter-price__min-value"></span> – $<span class="filter-price__max-value"></span></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{-- <form action="{{ request()->url() }}" method="get">
                                        <div class="widget-filters__actions d-flex">
                                            <button class="btn btn-primary btn-sm" type="submit">Фильтр</button>
                                            <button class="btn btn-secondary btn-sm" type="reset">Сбросить</button>
                                        </div>
                                    </form> --}}
                                </div>
                            </div>

                            <div class="block-sidebar__item d-none d-lg-block">
                                <div class="widget-products widget">
                                    <h4 class="widget__title">Последние товары</h4>
                                    <div class="widget-products__list">
                                        @foreach ($latest_items as $item)
                                            <div class="widget-products__item">
                                                <div class="widget-products__image">
                                                    <div class="product-image">
                                                        <a href="{{route('item', $item->id, true)}}" class="product-image__body">
                                                            <img class="product-image__img" src="{{secure_asset($item->product->galleries->first()->image)}}" alt="{{$item->product->galleries->first()->image}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="widget-products__info">
                                                    <div class="widget-products__name">
                                                        <a href="{{route('item', $item->id, true)}}">{{$item->product->title}}</a>
                                                    </div>
                                                    <div class="widget-products__prices">
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
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options view-options--offcanvas--mobile">
                                    <div class="view-options__filters-button">
                                        <button type="button" class="filters-button">
                                            <svg class="filters-button__icon" width="16px" height="16px">
                                                <use xlink:href="{{secure_asset('template/images/sprite.svg#filters-16')}}"></use>
                                            </svg>
                                            <span class="filters-button__title">Фильтры</span>
                                        </button>
                                    </div>
                                    <div class="view-options__layout">
{{--                                        <div class="layout-switcher">--}}
{{--                                            <div class="layout-switcher__list">--}}
{{--                                                <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button  layout-switcher__button--active ">--}}
{{--                                                    <svg width="16px" height="16px">--}}
{{--                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#layout-grid-16x16')}}"></use>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                                <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button ">--}}
{{--                                                    <svg width="16px" height="16px">--}}
{{--                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#layout-grid-with-details-16x16')}}"></use>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                                <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button ">--}}
{{--                                                    <svg width="16px" height="16px">--}}
{{--                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#layout-list-16x16')}}"></use>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="view-options__divider"></div>
                                    <div class="view-options__control">
                                        <label for="">Сортировать по</label>
                                        <div>
{{--                                            <a href="{{URL::current()}}">По Дате</a>--}}
{{--                                            <i class="fa fa-sort"></i>--}}
                                            <a href="{{URL::current()."?sort=name"}}">Названию (A-Z)</a>
                                            <i class="fa fa-sort"></i>
{{--                                            <a href="{{URL::current()."?sort=price_desc"}}">Цене</a>--}}
{{--                                            <i class="fa fa-sort"></i>--}}
{{--                                            <a href="{{URL::current()."?sort=rate"}}">Рейтингу</a>--}}
{{--                                            <i class="fa fa-sort"></i>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                                <div class="products-list__body">
                                    @foreach ($products as $product)
                                        <div class="products-list__item">
                                            <div class="product-card product-card--hidden-actions ">
                                                <button class="product-card__quickview" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="{{secure_asset('template/images/sprite.svg#quickview-16')}}"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon"></span>
                                                </button>
                                                <div class="product-card__image product-image">
                                                    <a href="{{route('product', $product->id, true)}}" class="product-image__body">
                                                        <img class="product-image__img" src="{{secure_asset($product->galleries->first()->image ?? "")}}" alt="{{$product->galleries->first()->image ?? ""}}">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{route('product', $product->id, true)}}">{{$product->title}}</a>
                                                    </div>
                                                    {{-- <div class="product-card__rating">
                                                        <div class="product-card__rating-stars">
                                                            <div class="rating">
                                                                <div class="rating__body">
                                                                    <div class="rating__body">
                                                                        <star-component :rating="{{$item->reviews->pluck('rate')->avg() ?? 5}}"></star-component>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__rating-legend">Отзывов: {{$item->first()->reviews->count()}}</div>
                                                    </div> --}}
                                                </div>
                                                <div class="product-card__actions">
                                                    {{-- <div class="product-card__prices">
                                                        @if ($product->item->first()->discount == null)
                                                            {{$product->item->first()->priceAfterFee()}} тг.
                                                        @else
                                                            <span class="product-card__new-price">
                                                                {{$product->item->first()->afterDiscount}} тг.
                                                            </span>
                                                            <span class="product-card__old-price">
                                                                {{$product->item->first()->priceAfterFee()}} тг.
                                                            </span>
                                                        @endif
                                                    </div> --}}
                                                    {{-- <div class="product-card__buttons">
                                                        <add-to-cart-component
                                                            :item="{{ $item->id }}"
                                                            :home_url = "homeUrl"
                                                            :cart="{{ $item->isAddedToCartBy() ? 'true' : 'false' }}"
                                                            @click.native="countCart">
                                                        </add-to-cart-component>
                                                        <like-component
                                                            :item={{ $item->id }}
                                                            :home_url = "homeUrl"
                                                            :favorited="{{ $item->isFavoritedBy() ? 'true' : 'false' }}" @click.native="countWishlist">
                                                        </like-component>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="products-view__pagination">
                                <ul class="pagination justify-content-center">
                                    {{ $products->onEachSide(1)->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
