@extends('layouts.seller')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                @include('includes.errors')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>"{{Auth::user()->company->name}}"</h4>
                        <a href="{{route('seller.product.create', true)}}" class="btn btn-warning">Добавить Товар</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Количество</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Скидка в %</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                </thead> 
                                @foreach ($products as $product)
                                <tr>
                                    <td data-label="ID">{{$product->id}}</td>
                                    <td data-label="Название">{{$product->title}}</td>
                                    <td data-label="Категория">{{$product->category->title}}</td>
                                    <td data-label="Количество"> {{$product->count}} ({{$product->measure->title}})</td>
                                    <td data-label="Цена">{{$product->price}} тг.</td>
                                    <td data-label="Скидка в %">{{$product->discount}}</td>
                                    <td data-label="Посмотреть">
                                        <a href="{{route('seller.product.show', $product)}}" class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        {{-- <a href="{{route('seller.product.destroy', $product)}}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
                                        <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('removeProduct{{$product->id}}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="removeProduct{{$product->id}}" action="{{route('seller.product.destroy', $product)}}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
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