@extends('layouts.admin')

@section('content')

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Пользователи</h4>
                            <a href="{{route('admin.user.create')}}" class="btn btn-warning">Добавить организацию</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Фамилия</th>
                                        <th scope="col">Телефон</th>
                                        <th scope="col">Редактировать</th>
                                        <th scope="col">Удалить</th>
                                        <th scope="col">Роли</th>
                                    </tr>
                                    </thead>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th data-label="ID">{{$user->id}}</th>
                                            <td data-label="Имя">{{$user->firstname}}</td>
                                            <td data-label="Фамилия">{{$user->lastname}}</td>
                                            <td data-label="Телефон">{{$user->phone}}</td>
                                            <td data-label="Редактировать">
                                                <a href="{{route('admin.user.edit', $user->id)}}"
                                                   class="btn btn-primary">Edit</a>
                                            </td>
                                            <td data-label="Удалить">
                                                <form action="{{route('admin.user.destroy', $user->id)}}" method="post"
                                                >
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <td data-label="Роли">{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
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
