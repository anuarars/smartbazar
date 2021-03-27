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
                                        <th scope="col">Посмотреть</th>
                                    </tr>
                                    </thead>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td data-label="Название">{{$company->name}}</td>
                                            <td data-label="ЧПУ">{{$company->phone}}</td>
                                            <td data-label="Посмотреть"><a href="{{route('admin.company.show', $company)}}" class="btn btn-primary">Посмотреть</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- {{ $companies->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection