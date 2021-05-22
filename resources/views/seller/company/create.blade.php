@extends('layouts.default')

@section('content')
    <register-component></register-component>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация компании</div>

                    <div class="card-body">
                        <form action="{{route('admin.company.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Наименование</label>
                                        <input type="text" class="form-control" value=""
                                               name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>БИН</label>
                                        <input type="number" class="form-control"
                                               name="bin"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control"
                                               name="email">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Телефон</label>
                                        <input id="header-signin-email" type="text"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               placeholder="Телефон"
                                               name="phone" value="{{ old('phone') }}" required
                                               autocomplete="phone" autofocus
                                               v-mask="'+7 (###) ### ####'"
                                               v-model="auth.loginNumber"/>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Код</label>
                                        <input type="text" class="form-control" value=""
                                               name="code">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Адрес</label>
                                        <input type="text" class="form-control" value=""
                                               name="address">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>О компании</label>
                                        <textarea class="form-control" name="description">
												</textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <label class="file-upload">
                                            <input name="image" type="file" accept="image/*"/>
                                            <span class="file-upload_button">Изображения</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <select class="form-control form-control-sm" name="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
