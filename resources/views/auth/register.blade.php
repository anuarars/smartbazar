@extends('layouts.default')

@section('content')
<register-component></register-component>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register', true) }}">
                        @csrf

                        <div class="form-group row{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="firstname" value="{{ old('firstname') }}"
                                    required
                                    autofocus
                                    >

                             @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Фамилия</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="lastname" value="{{ old('lastname') }}"
                                    required
                                    autofocus
                                    >

                             @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Телефон</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="phone" value="{{ old('phone') }}"
                                    required
                                    autofocus
                                    v-mask="'+7 (###) ### ####'"
                                    v-model="auth.loginNumber"
                                    >

                             @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердить пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-md-6 offset-4">
                            <div class="checkout__agree form-group">
                                <div class="form-check">
                                    <span class="form-check-input input-check">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="checkout-terms">
                                            <span class="input-check__box"></span>
                                            <svg class="input-check__icon" width="9px" height="7px">
                                                <use xlink:href="{{secure_asset('template/images/sprite.svg#check-9x7')}}"></use>
                                            </svg>
                                        </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-terms">
                                        Я согласен с <a target="_blank" href="#">условиями</a>*
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Регистрация
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
