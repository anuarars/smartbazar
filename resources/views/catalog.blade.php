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
        <form action="{{ route('catalog.index') }}" method="get" id="index-filters-form">
        <aside>
            <button class="btn-pink">Сладости</button>
            <div class="catalog_categories">
                @include('includes.categories_tree', ['categories' => $categories])

            </div>
            <div class="catalog_list">
                <h5 class="headline">Брэнд</h5>
                <input type="text" class="form-control" id="filter" name="brand_filter" onchange="this.form.submit()" placeholder="Я ищу..." value="{{ $brand_filter ?? '' }}">
                <ul id="brand-list">


                    @foreach($brands as $brand)
                        <li>
                            <div class="catalog_checkbox">
                                <input type="checkbox" name="brandsList[]" value="{{ $brand->id }}" onchange="(function() {
                                    document.getElementById('filter').value = '';
                                    document.getElementById('index-filters-form').submit();
                                })();"
                                @if(in_array($brand->id, (array)$brandList ?? -1)) checked @endif>
                            </div>
                            <label for="{{ $brand->title }}">{{ $brand->title }}</label>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="catalog_price_range">
                <h5 class="headline">Цена</h5>
                <ul>
                    <li>
                        <small>От</small>
                        <input name="priceList[]" type="number" onchange="this.form.submit()" value="{{ $price[0] ?? 100}}">
                    </li>
                    <li>
                        <small>До</small>
                        <input name="priceList[]" type="number" onchange="this.form.submit()" value="{{ $price[1] ?? 10000 }}">
                    </li>
                    <button type="submit">Найти</button>

                </ul>
            </div>
            <div class="catalog_list">
                <h5 class="headline">Упаковка</h5>
                <ul>
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
        </form>
        <div class="catalog_content_wrapper">
            <ul class="catalog_sort">
                <li>Сортировать по:</li>
                <li>
                    <a href="">Популярности</a>
                </li>
                <li><a href="#">Рейтингу</a></li>
                <li>@sortablelink('price', 'Цене')</li>
                <li>@sortablelink('discount', 'Скидке')</li>
                <li><a href="#">@sortablelink('created_at', 'Обновлению')</a></li>
            </ul>
            <div class="catalog_content">
                @foreach($products as $product)
                    <div class="product_item">
                        {{ $product->brand->title }}
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
                @endforeach
            </div>
        </div>
    </div>

    {!! $products->appends(\Request::except('page'))->render() !!}

@endsection
