@extends('layouts.default')

@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Главная</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="{{secure_asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Избранное</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Избранное</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <wishlist-component
                :home_url = "homeUrl"
            ></wishlist-component>
        </div>
    </div>
@endsection