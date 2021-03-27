@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        <input type="text" class="form-control" name="title" placeholder="Название категории">
        <textarea name="description" class="form-control" placeholder="Описание"></textarea>
        <label for="">Родительская категория</label>
        <select name="parent_id" class="form-control">
            <option value="0">Без родительской категории</option>
            @include('includes.categories', $categories)
        </select>
        <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
</div>
@endsection