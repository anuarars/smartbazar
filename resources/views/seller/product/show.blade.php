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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
          <div class="card">
              <div class="padding-20">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                             aria-selected="true">Информация</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                             aria-selected="false">Изменить</a>
                      </li>
                  </ul>
                  <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                          <div class="row">
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Наименование</strong>
                                  <br>
                                  <p class="text-muted">{{$product->title . " (" . $product->sku . ")" }}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Категория</strong>
                                  <br>
                                  <p class="text-muted">{{$product->category->title}}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Страна производитель</strong>
                                  <br>
                                  <p class="text-muted">{{$product->country->name}}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Производитель</strong>
                                  <br>
                                  <p class="text-muted">{{ $product->brand->title ?? "Неизвестно" }}</p>
                              </div>
                          </div>
                          <p class="m-t-30">
                              {{$product->description}}
                          </p>
                          <div class="row">
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Количество на складе</strong>
                                  <br>
                                  <p class="text-muted">{{$product->count }}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                  <strong>Цена со скидкой</strong>
                                  <br>
                                  <p class="text-success">{{$product->afterDiscount}}</p>
                              </div>
                              <div class="col-md-1 col-6 b-r">
                                  <strong>Цена</strong>
                                  <br>
                                  <p class="text-muted">{{$product->price}}</p>
                              </div>

                              <div class="col-md-1 col-6 b-r">
                                  <strong>Скидка</strong>
                                  <br>
                                  <p class="text-muted">{{$product->discount}} <span class="font-bold text-success">%</span></p>
                              </div>

                          </div>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                          <form method="post" action="{{route('seller.product.update', ['product' => $product])}}">
                              @csrf
                              @method('PUT')

                              <div class="card-header">
                                  <h4>Изменить</h4>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="form-group col-md-6 col-12">
                                          <label>Наименование</label>
                                          <input type="text" class="form-control" value="{{$product->title ?? ""}}" name="title">
                                      </div>
                                      <div class="form-group col-md-3 col-12">
                                          <label>Страна производитель</label>
                                          <select class="form-control
                                            @error('country_id') is-invalid @enderror" name="country_id">
                                              <option disabled>Страна производитель</option>
                                              @foreach ($countries as $country)
                                                  <option value="{{$country->id}}" @if($country === $product->country) selected @endif>{{$country->name}}</option>
                                              @endforeach
                                          </select>
                                          @error('country_id')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    Выберите страну где произведен товар
                                                </strong>
                                            </span>
                                          @enderror
                                      </div>
                                      <div class="form-group col-md-3 col-12">
                                          <label for="brand">Производитель</label>
                                          <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                                              <option disabled selected>Производитель</option>
                                              <option value="">Другое</option>
                                              @foreach ($brands as $brand)
                                                  <option value="{{$brand->id}}" @if($brand == $product->brand) selected @endif>{{$brand->title}}</option>
                                              @endforeach
                                          </select>
                                          @error('brand_id')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-6 col-12">
                                          <label for="category">Категория</label>
                                          <select-component :parent_id="2" :items="{{ $categories->toJson() }}" :home_url="homeUrl" :value="{{ $product->category_id }}"></select-component>
                                          @error('category_id')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    Выберите категорию товара
                                                </strong>
                                            </span>
                                          @enderror
                                      </div>
                                      <div class="form-group col-md-3 col-12">
                                          <label for="category">Единица измерения</label>
                                          <select class="form-control @error('measure_id') is-invalid @enderror" name="measure_id">
                                              <option disabled selected>Единица измерения</option>
                                              @foreach ($measures as $measure)
                                                  <option value="{{$measure->id}}" @if($measure->id == $product->measure->id) selected @endif>{{$measure->title}}</option>
                                              @endforeach
                                          </select>
                                          @error('measure_id')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                          @enderror
                                      </div>
                                      <div class="form-group col-md-3 col-12">
                                          <label>Количество</label>
                                          <input type="number" class="form-control @error('count') is-invalid @enderror" name="count" value="{{ $product->count }}">
                                          @error('count')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="row">

                                      <div class="form-group col-md-6 col-12">
                                          <label>Цена со скидкой</label>
                                          <input type="number" class="form-control" value="{{$product->afterDiscount ?? ""}}" name="price_after_discount" disabled>
                                      </div>

                                      <div class="form-group col-md-3 col-12">
                                          <label>Цена</label>
                                          <input type="number" class="form-control" value="{{$product->price ?? ""}}" name="price">
                                      </div>
                                      <div class="form-group col-md-3 col-12">
                                          <label>Скидка</label>
                                          <input type="number" class="form-control" value="{{$product->discount ?? ""}}" name="discount">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <textarea name="description" placeholder="Описание" class="form-control @error('description') is-invalid @enderror" id="productDescription">{{ $product->description }}</textarea>
                                              @error('description')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button class="btn btn-primary">Сохранить</button>
                              </div>
                          </form>
                      </div>
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
