@extends('layouts.seller')

@section('body')
    <div class="col-md-12">
        <div class="card">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$product->country->name}}</li>
                <li class="list-group-item">{{$product->brand->title}}</li>
                <li class="list-group-item">{{$product->category->title}}</li>
            </ul>
            <div class="card-body">
                <h2>Цена: </h2><p>{{$product->price}}</p>
                <h2>Кол-во: </h2><p>{{$product->count}} {{$product->measure->code}}</p>
                <h2>Скидка: </h2><p>{{$product->discount}}</p>
            </div>
            @isset($product->galleries)
                @foreach ($product->galleries as $gallery)
                    <img src="{{ asset($gallery->image) }}" alt="">
                @endforeach
            @endisset
        </div>
    </div>
@endsection