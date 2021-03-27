@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->fitstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary float-left">Edit</a>
                                    <form action="{{route('admin.user.destroy', $user->id)}}" method="post" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection