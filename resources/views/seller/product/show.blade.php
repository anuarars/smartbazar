@extends('layouts.seller')

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4>Изображения</h4>
            </div>
            <div class="card-body">
              <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                @foreach ($product->galleries as $gallery)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{asset($gallery->image)}}" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="{{asset($gallery->image)}}" alt="{{asset($gallery->image)}}">
                        </a>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>












    {{-- <div class="col-md-12">
        <div class="card">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$product->country->name}}</li>
                <li class="list-group-item">{{$product->brand_id ?? ""}}</li>
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
    </div> --}}
@endsection