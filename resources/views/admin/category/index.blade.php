@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Категории</h4>
                            <a href="{{route('admin.category.create')}}" class="btn btn-warning">Добавить категорию</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Родительская категория</th>
                                        <th scope="col">Редактировать</th>
                                        <th scope="col">Удалить</th>
                                    </tr>
                                    </thead>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td data-label="ID">{{$category->id}}</td>
                                            <td data-label="Название">{{$category->title}}</td>
                                            <td data-label="Родительская категория">{{$category->parent_id}}</td>
                                            <td data-lable="Редактировать"><a class="btn btn-sm btn-info"
                                                    href="{{ route('admin.category.edit', ['category' => $category]) }}">Редактировать</a></td>
                                            <td data-label="Удалить">
                                                <form
                                                    action="{{ route('admin.category.destroy', ['category' => $category]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Категорий пока нет</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection