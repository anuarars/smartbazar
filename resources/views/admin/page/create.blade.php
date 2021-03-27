@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Добавить Страницу</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.page.store') }}" method="post">
                                @csrf
                                <div class="form-inline pb-2">
                                    <input type="text" name="title" class="form-control" placeholder="Название страницы...">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="active" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Опубликовать</span>
                                    </label>
                                </div>
                
                                <editor :inputname="'body'"></editor>
                
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Сохранить</button>
                                    <button class="btn btn-secondary" type="reset">Заново</button>
                                </div>
                            </form>
                            @include('includes.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection