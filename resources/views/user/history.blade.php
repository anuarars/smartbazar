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
                            <li class="breadcrumb-item active" aria-current="page">Аккаунт</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Аккаунт</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    @include('includes.profile.menu')
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="dashboard">
                            <div class="dashboard__orders card">
                                <div class="card-header">
                                    <h5>Последние покупки</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>№</th>
                                                    <th>Дата</th>
                                                    <th>Статус</th>
                                                    <th>Сумма</th>
                                                    <th>Действие</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <th>{{ $order->id }}</th>
                                                        <th>{{ $order->updated_at }}</th>
                                                        <th>{{ $order->status->name }}</th>
                                                        <th>{{ $order->fullPrice() }}</th>
                                                        <th>
                                                            <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#orderModal-{{$order->id}}">Увидеть продукты</button>
                                                        </th>

                                                    </tr>
                                                    <div class="modal fade" id="orderModal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Продукты</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                @foreach($order->products as $product)

                                                                    <div class="modal-body">
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">
                                                                                {{ $product->title }}
                                                                                <img src="{{ $product->galleries()->first()->image }}" width="70px"/>
                                                                                <rate-component
                                                                                    :home_url="homeUrl"
                                                                                    :product="{{$product}}"
                                                                                    :order_id="{{$order->id}}"
                                                                                    :reviewed="{{ $product->isReviewedByAuthUser() ? 'true' : 'false' }}"
                                                                                ></rate-component>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
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
