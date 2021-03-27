@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Введите код из СМС, отправленный на номер {{Auth::user()->phone}}</div>
                <div class="card-body">
                    <form class="d-inline" method="POST" action="{{ route('verify.code', true) }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone_verify_code">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Подтвердить</button>.
                    </form>
                    <form action="{{route('verify.resend', true)}}" method="POST">
                        @csrf
                        <button class="btn btn-warning w-100">Отправить заново</button>
                    </form>
                @include('includes.errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
