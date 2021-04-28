@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Изменить Бутик</h4>
                        </div>
                        <form action="{{route('admin.company.update', $company)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Наименование</label>
                                        <input type="text" class="form-control" value="{{ $company->name }}"
                                               name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>БИН</label>
                                        <input type="number" class="form-control"
                                               name="bin" value="{{ $company->bin }}"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control"
                                               name="email" value="{{ $company->email->name ?? '' }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Телефон</label>
                                        <input type="text" class="form-control"
                                               name="phone" value="{{ $company->phone }}" required autocomplete="phone"
                                               autofocus

                                               v-mask="'+7 (###) ### ####'"/>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Код</label>
                                        <input type="text" class="form-control" value="{{ $company->code }}"
                                               name="code">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Адрес</label>
                                        <input type="text" class="form-control" value="{{ $company->address->description ?? "" }}"
                                               name="address">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>О компании</label>
                                        <textarea class="form-control" name="description">
                                            {{ $company->description }}
												</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <img src="{{ $company->image }}"/>

                                        <label class="file-upload">
                                            <input name="image" type="file" multiple="true"/>
                                            <span class="file-upload_button">Изображения</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Сохранить</button>
                                <button class="btn btn-secondary" type="reset">Заново</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection