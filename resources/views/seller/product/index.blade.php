@extends('layouts.seller')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>"{{Auth::user()->company->name}}"</h4>
                        <a href="{{route('seller.product.create')}}" class="btn btn-warning">Добавить Товар</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Скидка в %</th>
                                    <th>Посмотреть</th>
                                </tr>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->count}} ({{$product->measure->title}})</td>
                                    <td>{{$product->price}} тг.</td>
                                    <td>{{$product->discount}}</td>
                                    <td><a href="{{route('seller.product.show', $product)}}" class="btn btn-primary">Посмотреть</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection