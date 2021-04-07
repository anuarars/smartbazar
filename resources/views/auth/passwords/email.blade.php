@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Восстановить пароль</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @include('includes.errors')
                    <form method="POST" action="{{ route('verify.reset') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input 
                                    type="text" 
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" 
                                    value="{{ old('phone') }}" 
                                    required 
                                    autofocus
                                    v-mask="'+7 (###) ### ####'" 
                                    v-model="auth.loginNumber"
                                >

                                @error('phond')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Восстановить
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
