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
                        <li class="breadcrumb-item active" aria-current="page">Бутики</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>Бутики</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
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
            <div class="col-12">
                <h4>Товары в бутике</h4>
                <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false" data-mobile-grid-columns="2">
                    <div class="products-list__body">
                        @foreach ($products as $product)
                            <div class="products-list__item">
                                <div class="product-card product-card--hidden-actions ">
                                    <div class="product-card__image product-image">
                                        <a href="{{route('product', $product->id, true)}}" class="product-image__body">
                                            <img class="product-image__img" src="{{secure_asset($product->galleries()->first()->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="{{route('boutique.show', $product->id, true)}}">{{$product->name}}</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <star-component></star-component>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">4 Отзыва</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection