@extends('layouts.packer')

@section('content')
<div class="section">
    <div class="section-body">
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4>Заказ # {{$order->id}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('packer.order', $order->id)}}" class="btn btn-success">Перейти</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection