@extends('layouts.packer')

@section('body')
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Продавец</th>
                    <th scope="col">Местоположение</th>
                    <th scope="col">Общая сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->pivot->count}}</td>
                        <td>{{$product->user->name}}</td>
                        <td>{{$product->company->name}}</td>
                        <td>{{$product->get_price_for_count()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <form action="{{route('notification.delivery')}}" method="POST" id="package_ready" class="text-center">
        @csrf
        <input type="hidden" name="order_id" value="{{$order->id}}">
        <button type="submit" class="btn btn-primary">Передать курьеру</button>
    </form>
</div>
@endsection