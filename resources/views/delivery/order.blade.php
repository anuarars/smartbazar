@extends('layouts.delivery')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Покупатель</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Имя</b>: {{$order->user->firstname}}</li>
                            <li class="list-group-item"><b>Фамилия</b>: {{$order->user->lastname}}</li>
                            <li class="list-group-item"><b>Телефон</b>: {{$order->user->phone}}</li>
                        </ul>
                    </div>
                <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Продукты</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($order->items as $item)
                                <li class="list-group-item"><b>{{$item->product->title}}</b>: {{$item->pivot->count}} {{$item->product->measure->code}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Адрес</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">{{$order->address()->first()->description}}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Дополнительно</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">{{$order->infoByUser ?? ""}}</li>
                            <li class="list-group-item">{{$order->phone ?? ""}}</li>
                            <li class="list-group-item">Сумма: {{$order->fullPrice()}} тг.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <form action="{{route('delivery.end', $order, true)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Завершить заказ</button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection