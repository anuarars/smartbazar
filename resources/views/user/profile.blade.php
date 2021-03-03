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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty(Auth::user()->order))
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td><a href="">{{$order->id}}</a></td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                @switch($order->status->name)
                                                                    @case('LOOKING FOR PACKING')
                                                                        Фасовзщик принимает заказ
                                                                        @break
                                                                    @case('AT PACKING')
                                                                        Фасуется
                                                                        @break
                                                                    @case('DRIVING')
                                                                        В пути с курьером
                                                                        @break
                                                                    @case('LOOKING FOR DRIVER')
                                                                        Ждет водителя
                                                                        @break
                                                                    @case('DELIVERED')
                                                                        Доставлен
                                                                        @break
                                                                    @case('ACCEPTED')
                                                                        Принят
                                                                        @break
                                                                    @default
                                                                @endswitch
                                                            </td>
                                                            <td>{{$order->count()}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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