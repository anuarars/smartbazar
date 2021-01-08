@extends('layouts.seller')

@section('body')
<div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Мои товары</div>
  </div>
    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered" id="example">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Название товара</th>
                  <th>Категория</th>
                  <th>Производитель</th>
                  <th>Страна</th>
                  <th>Кол-во</th>
                  <th>Цена</th>
                  <th>Скидка</th>
                  <th>Посмотреть</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
                <tr class="gradeA">
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category->title}}</td>
                    <td class="center">{{$product->brand->title}}</td>
                    <td class="center">{{$product->country->name}}</td>
                    <td class="center">{{$product->count}} {{$product->measure->code}}</td>
                    <td class="center">{{$product->price}}</td>
                    <td class="center">{{$product->discount}}</td>
                    <td class="center"><a href="{{route('seller.product.show', $product)}}" class="btn btn-primary">Посмотреть</a></td>
                </tr>
            @endforeach
          </tbody>
      </table>
    </div>
</div>
@endsection