@extends('layouts.default')

@section('content')
<div class="site__body">
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Главная</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                            </svg>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Аккаунт
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                            </svg>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Адреса</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>Аккаунт</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="row">
                @include('includes.profile.menu')
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h5>Изменить пароль</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-7 col-xl-6">
                                    <form method="post" action="{{route('profile.password.update')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password-current" placeholder="Действующий пароль" name="password_current">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password-new" placeholder="Новый пароль"
                                            name="password_new">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password-confirm" placeholder="Повторить пароль" name="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            @include('includes.errors')
                                        </div>
                                        <div class="form-group mt-5 mb-0">
                                            <button class="btn btn-primary" type="submit">Изменить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection