@extends('layouts.default')

@section('content')
<div class="site__body">
    <div class="block order-success">
        <div class="container">
            <div class="order-success__body">
                <div class="order-success__header">
                    <svg class="order-success__icon" width="100" height="100">
                        <use xlink:href="images/sprite.svg#check-100"></use>
                    </svg>
                    <h1 class="order-success__title">Спасибо!</h1>
                    <div class="order-success__subtitle">Покупка успешно совершена</div>
                    <div class="order-success__actions">
                        <a href="{{route('index', true)}}" class="btn btn-xs btn-secondary">Вернуться на главную</a>
                    </div>
                </div>
                <div class="order-success__meta">
                    <ul class="order-success__meta-list">
                        <li class="order-success__meta-item">
                            <span class="order-success__meta-title">Номер заказа:</span>
                            <span class="order-success__meta-value">#{{$order->id}}</span>
                        </li>
                        <li class="order-success__meta-item">
                            <span class="order-success__meta-title">Дата заказа</span>
                            <span class="order-success__meta-value">{{$order->created_at}}</span>
                        </li>
                        <li class="order-success__meta-item">
                            <span class="order-success__meta-title">Сумма:</span>
                            <span class="order-success__meta-value">{{$order->fullPrice()}} тг.</span>
                        </li>
                        <li class="order-success__meta-item">
                            <span class="order-success__meta-title">Способ оплаты:</span>
                            <span class="order-success__meta-value">Карточка</span>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="order-list">
                        <table>
                            <thead class="order-list__header">
                                <tr>
                                    <th class="order-list__column-label" colspan="2">Продукт</th>
                                    <th class="order-list__column-quantity">Кол-во</th>
                                    <th class="order-list__column-total">Сумма</th>
                                </tr>
                            </thead>
                            <tbody class="order-list__products">
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td class="order-list__column-image">
                                            <div class="product-image">
                                                <a href="" class="product-image__body">
                                                    <img class="product-image__img" src="{{secure_asset($product->galleries->first()->image)}}" alt="{{$product->image}}">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="order-list__column-product">
                                            <a href="">{{$product->title}}</a>
                                        </td>
                                        <td class="order-list__column-quantity" data-title="Qty:">{{$product->pivot->count}}</td>
                                        <td class="order-list__column-total">{{$product->priceForCount()}} тг.</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody class="order-list__subtotals">
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Сумма</th>
                                    <td class="order-list__column-total">{{$order->fullPrice()}} тг.</td>
                                </tr>
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Доставка</th>
                                    <td class="order-list__column-total">{{$order->deliveryprice}}</td>
                                </tr>
                            </tbody>
                            <tfoot class="order-list__footer">
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Общая сумма</th>
                                    <td class="order-list__column-total">{{$order->fullPriceWithDelivery()}} тг.</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row mt-3 no-gutters mx-n2">
                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                        <div class="card address-card">
                            <div class="address-card__body">
                                <div class="address-card__badge address-card__badge--muted">Адрес</div>
                                <div class="address-card__name">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</div>
                                <div class="address-card__row">
                                    {{$order->address->home}}<br>
                                    {{$order->address->street}}<br>
                                    {{$order->address->unit}}
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Телефон</div>
                                    <div class="address-card__row-content">{{Auth::user()->phone}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection