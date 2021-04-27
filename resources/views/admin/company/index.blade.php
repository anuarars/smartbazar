@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Страницы</h4>
                            <a href="{{route('admin.company.create')}}" class="btn btn-warning">Добавить организацию</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">Название</th>
                                        <th scope="col">Телефон</th>
                                        <th scope="col">Редактировать</th>
                                        <th scope="col">Удалить</th>
                                    </tr>
                                    </thead>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td data-label="Название">{{$company->name}}</td>
                                            <td data-label="ЧПУ">{{$company->phone}}</td>
                                            <td data-label="Посмотреть"><a href="{{route('admin.company.edit', $company)}}" class="btn btn-info">Редактировать</a></td>
                                            <td data-label="Посмотреть">
                                                <form action="{{route('admin.company.destroy', $company)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger" type="submit">
                                                        Удалить
                                                    </button>
                                                </form></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                             {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
