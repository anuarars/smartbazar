@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-left">Создать категорию</a>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Категории</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Родительская категория</th>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->parent_id}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Категорий пока нет</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    {{$categories->links()}}
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection