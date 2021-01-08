@extends('layouts.delivery')

@section('body')
	<div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Имя покупателя</th>
                    <td scope="col">{{$order->user->name}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Телефон</th>
                    <td>Mark</td>
                </tr>
                <tr>
                    <th scope="row">Адрес</th>
                    <td>Mark</td>
                </tr>
            </tbody>
        </table>
        <form action="{{route('delivery.end')}}" method="POST" class="text-center">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <button type="submit" class="btn btn-primary">Завершить заказ</button>
        </form>
    </div>
@endsection