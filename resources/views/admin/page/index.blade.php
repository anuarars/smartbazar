@extends('layouts.admin')

@section('content')
    <style>

    </style>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Страницы</h4>
                            <a href="{{route('admin.page.index')}}" class="btn btn-warning">Добавить страницу</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">ЧПУ</th>
                                        <th scope="col">Изменить</th>
                                        <th scope="col">Посмотреть</th>
                                    </tr>
                                    </thead>
                                    @foreach ($pages as $p)
                                        <tr>
                                            <td data-label="ID">{{$p->id}}</td>
                                            <td data-label="Название">{{$p->title}}</td>
                                            <td data-label="ЧПУ">{{$p->slug}}</td>
                                            <td data-label="Редактировать"><a href="{{route('admin.page.edit', $p)}}" class="btn btn-info">Редактировать</a></td>
                                            <td data-label="Посмотреть"><a href="{{route('admin.page.show', $p)}}" class="btn btn-primary">Посмотреть</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $pages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
