@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Добавить Категорию</h4>
                        </div>
                        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="category">Название категории</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="Название категории...">
                                        <label for="category">Родитель Категории</label>
                                        <select-component :parent_id="2" :items="{{ $categories->toJson() }}"
                                                          :home_url="homeUrl"></select-component>

                                        <label for="category">Описание</label>
                                        <editor :inputname="'description'"></editor>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <label class="file-upload">
                                        <input name="image" type="file"/>
                                        <span class="file-upload_button">Изображения</span>
                                    </label>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Сохранить</button>
                                    <button class="btn btn-secondary" type="reset">Заново</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection