@extends('layouts.default')

@section('content')
<style>
   body {
    line-height: 1.6;
  }
  
  table {
    width: 100%;
    table-layout: auto;
  }
  
  table caption {
    font-size: 17px;
    margin: .5em 0 .75em;
  }
  
  table tr {
    background-color: #f8f8f8;
    padding: .35em;
  }
  
  table th,
  table td {
    padding: .625em;
  }
  
  table th {
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: uppercase;
  }
  
  @media screen and (max-width: 865px) {
    table {
      border: 0;
    }
    
    table thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }
    
    table tr {
      border-bottom: 2em solid white;
      display: block;
      
    }
    
    table td {
      border-bottom: 1px solid #ddd;
      display: block;
      font-size: 14px;
      text-align: right;
      padding: 10px!important;
     
    }
    
    table td::before {
      content: attr(data-label);
      float: left;
      font-weight: bold;
      text-transform: uppercase;
    }
    
    table td:last-child {
      border-bottom: 0;
    }
  }
}
</style>
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
                                <div class="card-body p-0">
                                    <div class="table">
                                        <table class="table table-striped table-md">
                                            <thead>
                                                <tr>
                                                    <th scope="col">№</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Статус</th>
                                                    <th scope="col">Сумма</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty(Auth::user()->order))
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td scope="row" data-label="№">{{$order->id}}</td>
                                                            <td data-label="ДАТА">{{$order->created_at}}</td>
                                                            <td data-label="СТАТУС">
                                                                @switch($order->status->name)
                                                                    @case('LOOKING FOR PACKING')
                                                                        Фасовщик принимает заказ
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
                                                            <td data-label="СУММА">{{$order->fullPrice()}} тг.</td>
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