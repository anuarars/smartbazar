@extends('layouts.seller')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Добавить товар</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{route('seller.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Наименование">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control
                                            @error('country_id') is-invalid @enderror" name="country_id">
                                                <option disabled selected>Страна производитель</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
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
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                                                <option disabled selected>Производитель</option>
                                                <option value="">Другое</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->title}}</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select-component :parent_id="2" :items="{{ $categories->toJson() }}" :home_url="homeUrl"></select-component>

                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    Выберите категорию товара
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Цена" id="newPrice">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control @error('measure_id') is-invalid @enderror" name="measure_id">
                                                <option disabled selected>Единица измерения</option>
                                            @foreach ($measures as $measure)
                                                <option value="{{$measure->id}}" >{{$measure->title}}</option>
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
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('count') is-invalid @enderror" name="count" placeholder="Количество">
                                        @error('count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="discountPercent" name="discount" placeholder="Скидка в % не обязательно">
                                        <small id="priceAfterCalc" class="text-success font-weight-bold"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <editor :inputName="'description'"></editor>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="file-upload">
                                        <input type="file" id="image" name="image"/>
                                      <span class="file-upload_button">Изображение</span>
                                    </label>
                                </div>

                                <div class="col-md-12">
                                    <label class="file-upload">
                                        <input name="gallery[]" type="file" multiple="true" />
                                      <span class="file-upload_button">Изображения для галереи</span>
                                    </label>
                                </div>

                                <div class="col-md-12 mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Добавить товар</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
