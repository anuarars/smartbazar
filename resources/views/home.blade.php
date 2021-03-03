@extends('layouts.default')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    {{-- @include('includes.alerts') --}}
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img class="mt-5 w-100" src="#"> --}}
                    {{-- <span class="font-weight-bold">Name</span> --}}
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Профиль</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Имя</label><input type="text" name="name" class="form-control" placeholder="Имя" value="{{Auth::user()->firstname}}"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Фамилия</label><input type="text" name="name" class="form-control" placeholder="Фамилия" value="{{Auth::user()->lastname}}"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Телефон</label><input type="text" name="name" class="form-control" placeholder="Телефон" value="{{Auth::user()->phone}}"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Пароль</label><input type="password" name="password" class="form-control"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Подтвердить пароль</label><input type="password" name="password_confirmation" class="form-control"></div>
                    </div>
                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" type="button">Изменить Профиль</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Адресс</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Область</label>
                            <select name="region_id" class="form-control">
                                <option value="#" selected>test
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels">Район</label><input type="text" class="form-control" name="district" placeholder="Район"></div>
                        <div class="col-md-12"><label class="labels">Город/Село</label><input type="text" class="form-control" name="town" placeholder="Город/Село"></div>
                        <div class="col-md-3"><label class="labels">Дом</label><input type="text" class="form-control" name="home" placeholder="Дом"></div>
                        <div class="col-md-6"><label class="labels">Улица</label><input type="text" class="form-control" name="street" placeholder="Улица"></div>
                        <div class="col-md-3"><label class="labels">Офис</label><input type="text" class="form-control" name="unit" placeholder="Офис"></div>
                        <div class="col-md-12"><label class="labels">Индекс</label><input type="text" class="form-control" name="postcode" placeholder="Индекс"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
