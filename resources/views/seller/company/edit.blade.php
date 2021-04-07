@extends('layouts.seller')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <img alt="image" src="{{secure_asset('template/images/banners/banner-1-mobile.jpg')}}"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">{{Auth::user()->company->name}}</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Социальные сети</div>
                            </div>
                            <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <div class="w-100 d-sm-none"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Карточка компании</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4">
                            <p class="clearfix">
                                <span class="float-left">
                                    БИН
                                </span>
                                <span class="float-right text-muted">
                                    {{$company->bin}}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Телефон
                                </span>
                                <span class="float-right text-muted">
                                    {{$company->phone}}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Наименование
                                </span>
                                <span class="float-right text-muted">
                                    <a href="#">{{$company->name}}</a>
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Email
                                </span>
                                <span class="float-right text-muted">
                                    {{$company->email->name ?? ""}}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Основные продажи</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title">Фрукты</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-primary" data-width="70%"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title">Косметика</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-warning" data-width="80%"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title">Гаджеты</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-green" data-width="48%"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                    aria-selected="true">Информация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                    aria-selected="false">Изменить</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="row">
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Наименование</strong>
                                        <br>
                                        <p class="text-muted">{{$company->name}}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Телефон</strong>
                                        <br>
                                        <p class="text-muted">{{$company->phone}}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">{{$company->email->name ?? ""}}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Рынок</strong>
                                        <br>
                                        <p class="text-muted">Неизвестно</p>
                                    </div>
                                </div>
                                <p class="m-t-30">
                                    {{$company->description}}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="{{route('seller.company.profile.update', true)}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Изменить</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Наименование</label>
                                                <input type="text" class="form-control" value="{{$company->name}}"
                                                    name="name">
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>БИН</label>
                                                <input type="text" class="form-control" value="{{$company->bin}}"
                                                    name="bin">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control"
                                                    value="{{$company->email->name ?? ""}}" name="email">
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Телефон</label>
                                                <input type="text" class="form-control"
                                                    value="{{$company->phone}}" name="phone">
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>О компании</label>
                                                <textarea class="form-control" name="description">{{$company->description ?? ""}}
												</textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="file-upload">
                                                    <input name="image" type="file" multiple="true" />
                                                    <span class="file-upload_button">Изображения</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
