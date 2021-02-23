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
                                    <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
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
        <div class="checkout block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                            <div class="card-body">
                                <h3 class="card-title">Адрес доставки</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-first-name">Имя</label>
                                        <input type="text" class="form-control" id="checkout-first-name" placeholder="Имя">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Фамилия</label>
                                        <input type="text" class="form-control" id="checkout-last-name" placeholder="Фамилия">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="checkout-street-address">Улица</label>
                                    <input type="text" class="form-control" id="checkout-street-address" placeholder="Улица">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-address">Дом, Квартира и т.д..</label>
                                    <input type="text" class="form-control" id="checkout-address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Телефон</label>
                                        <input type="text" class="form-control" id="checkout-phone" placeholder="Телефон" value="{{Auth::user()->phone}}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Дополнительный Телефон</label>
                                        <input type="text" class="form-control" id="checkout-phone2" placeholder="Дополнительный Телефон">
                                    </div>
                                </div>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">
                                <h3 class="card-title">Дополнительная информация для доставки</h3>
                                <div class="form-group">
                                    <label for="checkout-comment">Необязательно</label>
                                    <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Ваш заказ</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Продукт</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{$product->title}}</td>
                                                <td>{{number_format($product->price, 0, ' ', ' ')}} тг.</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Сумма</th>
                                            <td>{{number_format($order->products->sum('price'),0, ' ', ' ')}} тг.</td>
                                        </tr>
                                        <tr>
                                            <th>Доставка</th>
                                            <td>1 000 тг.</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Всего</th>
                                            <td>{{number_format($order->products->sum('price')+1000, 0, ' ', ' ')}} тг.</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="checkout__agree form-group">
                                    <div class="form-check">
                                        <span class="form-check-input input-check">
                                            <span class="input-check__body">
                                                <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                <span class="input-check__box"></span>
                                                <svg class="input-check__icon" width="9px" height="7px">
                                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                </svg>
                                            </span>
                                        </span>
                                        <label class="form-check-label" for="checkout-terms">
                                            Я согласен с <a target="_blank" href="#">условиями</a>*
                                        </label>
                                    </div>
                                </div>
                                <a href="{{route('checkout.success', $order->id)}}" class="btn btn-primary btn-xl btn-block">Оплатить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection