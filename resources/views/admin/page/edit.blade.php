@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Редактирование страницы
        </div>
        <div class="card-body">
            {{ $errors }}
            <form action="{{ route('admin.page.update', ['page' => $page]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-inline pb-2">
                    <input type="text" name="title" class="form-control" placeholder="Название страницы..." value="{{ $page->title }}">
                    <label class="custom-switch mt-2">
                        <input type="checkbox" name="active" class="custom-switch-input" {{ $page->active ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Опубликовать</span>
                    </label>
                </div>

                <editor :inputname="'body'" :inputvalue="{{ json_encode($page->body) }}"></editor>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
@endsection
