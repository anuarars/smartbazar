@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная / </li>
            <li>Избранное</li>
        </ul>
    </div>
    <h2 class="page_title">Избранноe</h2>
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
        <wishlist-component></wishlist-component>
    </div>
@endsection