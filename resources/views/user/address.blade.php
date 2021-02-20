@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    {{-- @include('includes.alerts') --}}
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Адресс</h4>
                    </div>
                    <form action="{{route('profile.address.update')}}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Город</label>
                                <input type="text" class="form-control" name="city" placeholder="Город">
                            </div>
                            <div class="col-md-3">
                                <label class="labels">Дом</label>
                                <input type="text" class="form-control" name="home" placeholder="Дом">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Улица</label>
                                <input type="text" class="form-control" name="street" placeholder="Улица">
                            </div>
                            <div class="col-md-3">
                                <label class="labels">Офис</label>
                                <input type="text" class="form-control" name="unit" placeholder="Офис">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Индекс</label>
                                <input type="text" class="form-control" name="postcode" placeholder="Индекс">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection