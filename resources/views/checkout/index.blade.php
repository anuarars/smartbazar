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
                            <li class="breadcrumb-item active" aria-current="page">Оплата</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Оплата</h1>
                </div>
            </div>
        </div>
        <checkout-component
            :user = "{{Auth::user()}}"
            :order = "{{$order->load('items.product')}}"
            :sum = "{{$order->fullPrice()}}"
            :home_url = "homeUrl"
            :deliveryprice = "{{$order->deliveryPrice}}"
        >
        </checkout-component>
    </div>
@endsection