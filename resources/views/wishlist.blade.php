@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная / </li>
            <li>Избранное</li>
        </ul>
    </div>
    <h2 class="page_title">Избранное</h2>
    <div class="inner_container">
        <div class="wishlist_sort">
            <div class="wishlist_sort_inputs">
                <div class="wishlist_sort_inputs_wrap">
                    <label>Категория товара</label>
                    <select name="">
                        <option value="" selected>Все категории</option>
                        <option value="">test</option>
                        <option value="">test</option>
                        <option value="">test</option>
                    </select>
                </div>
                <div class="wishlist_sort_inputs_wrap">
                    <label>Продавец</label>
                    <select name="">
                        <option value="" selected>Все продавцы</option>
                        <option value="">test</option>
                        <option value="">test</option>
                        <option value="">test</option>
                    </select>
                </div>
            </div>
            <div class="wishlist_sort_buttons">
                <button>Скидка</button>
                <button>В наличии</button>
            </div>
        </div>
        <div class="wishlist_search">
            <input type="text" placeholder="Поиск товаров">
        </div>
        <div class="wishlist_items">
            <ul>
                <li class="wishlist_items_head">
                    <ul>
                        <li>Название</li>
                        <li>Продавец</li>
                        <li></li>
                    </ul>
                </li>
                @foreach ($wishlists as $wishlist)
                    <li class="wishlist_item_single">
                        <ul>
                            <li>
                                <div class="wishlist_product_image">
                                    <img src="{{$wishlist->product->image}}" alt="product_image">
                                </div>
                                <div class="wishlist_product_description">
                                    <h5>{{$wishlist->product->title}}</h5>
                                    <h6 class="wishlist_product_status">В наличии</h6>
                                    <h6 class="wishlist_product_price">Код/Артикул: <span>000148</span></h6>
                                    <h6 class="wishlist_product_price">{{$wishlist->product->price}} Тг.</h6>
                                </div>
                            </li>
                            <li>
                                <div class="wishlist_company">
                                    <h6 class="wishlist_company_name">{{$wishlist->product->company->name}}</h6>
                                    <star-component></star-component>
                                    <h6 class="wishlist_company_comments">2 отзыва о продавце</h6>
                                </div>
                            </li>
                            <li>
                                <button class="btn-pink-rounded">Купить</button>
                                <img src="{{asset('icons/trash.svg')}}" alt="trash.svg">
                            </li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection