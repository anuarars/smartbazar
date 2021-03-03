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
                    @include('includes.errors')
                    <div class="addresses-list">
                        <a href="#" class="addresses-list__item addresses-list__item--new" data-toggle="modal" data-target="#addAddress">
                            <div class="addresses-list__plus"></div>
                            <button class="btn btn-secondary btn-sm">
                                Новый адрес
                            </button>
                        </a>
                        <div class="addresses-list__divider"></div>
                        @if (Auth::user()->address)
                            @foreach (Auth::user()->address as $address)
                                <div class="addresses-list__item card address-card">
                                    <div class="address-card__body">
                                        <div class="address-card__name">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</div>
                                        <div class="address-card__row">
                                            <strong>
                                                {{$address->name}}
                                            </strong><br>
                                            {{$address->home}}, {{$address->street}} {{$address->unit}}
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Телефон</div>
                                            <div class="address-card__row-content">{{Auth::user()->phone}}</div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="#" data-toggle="modal" data-target="#addressUpdate{{$address->id}}">Изменить</a>&nbsp;&nbsp;
                                            <a href="#" class="text-danger" onclick="event.preventDefault();
                                            document.getElementById('profileRemove{{$address->id}}').submit();">Удалить</a>

                                            <form action="{{route('profile.address.destroy', $address->id)}}" method="POST" id="profileRemove{{$address->id}}">
                                                @method('DELETE')
                                                @csrf         
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0px!important;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="quickview">
                <button class="quickview__close" type="button" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px">
                        <use xlink:href="{{asset('template/images/sprite.svg#cross-20')}}"></use>
                    </svg>
                </button>
                <form action="{{route('profile.address.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Название адреса, например Домашний" name="name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Дом" name="home">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Улица" name="street">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="№" name="unit">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@if (Auth::user()->address)
    @foreach (Auth::user()->address as $address)
        <div class="modal fade" id="addressUpdate{{$address->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0px!important;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="quickview">
                        <button class="quickview__close" type="button" data-dismiss="modal" aria-label="Close">
                            <svg width="20px" height="20px">
                                <use xlink:href="{{asset('template/images/sprite.svg#cross-20')}}"></use>
                            </svg>
                        </button>
                        <form action="{{route('profile.address.update', $address->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Название адреса, например Домашний" name="name" value="{{$address->name}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Дом" name="home" value="{{$address->home}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Улица" name="street" value="{{$address->street}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="№" name="unit" value="{{$address->unit}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success w-100">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection