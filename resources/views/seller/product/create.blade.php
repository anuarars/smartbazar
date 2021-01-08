@extends('layouts.seller')

@section('body')
{{$delimiter = ''}}
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Добавить товар</div>
                </div>
                <div class="panel-body">
                    <form action="{{route('seller.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="country_id">
                                        <option disabled selected>Страна производитель</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category_id">
                                    <option disabled selected>Категория товара</option>
                                    @include('includes.categories', $categories)
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="price" placeholder="Цена">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="brand_id">
                                        <option disabled selected>Брэнд</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="measure_id">
                                        <option disabled selected>Единица измерения</option>
                                    @foreach ($measures as $measure)
                                        <option value="{{$measure->id}}">{{$measure->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="count" placeholder="Количество">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="discount" placeholder="Скидка">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea name="description" placeholder="Описание" class="form-control" id="description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="file" name="image" class="form-control" id="image">
                            <label for="image">Загрузить главное изображение товара</label>
                        </div>
                        <div class="col-md-12">
                            <input type="file" name="gallery[]" multiple="true" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Добавить товар</button>
                        </div>
                    </form>
                </div>
                @include('includes.errors')
            </div>
        </div>
    </div>
@endsection