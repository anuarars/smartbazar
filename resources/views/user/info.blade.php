@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    {{-- @include('includes.alerts') --}}
    <div class="row">
        <div class="col-md-6">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Ваши данные</h4>
                </div>
                <form action="{{route('profile.info.update')}}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Имя</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Имя" value="{{Auth::user()->firstname}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Фамилия</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Фамилия" value="{{Auth::user()->lastname}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Логин</label>
                            <input type="text" class="form-control" name="login" placeholder="Логин" value="{{Auth::user()->login}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Телефон</label>
                            <input 
                                type="text" 
                                class="form-control"
                                name="phone"
                                placeholder="Телефон" 
                                value="{{Auth::user()->phone}}"
                                v-mask="'+7 (###) ### ####'" 
                                v-model="auth.loginNumber"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection