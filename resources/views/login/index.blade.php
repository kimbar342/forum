@extends('layouts.base')

@section('page.title', 'Вход')


@section('content')
    <div class="container mt-md-4">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('login.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" aria-describedby="emailHelp" autofocus>
                                @error('email')
                                    <div class="small text-danger pt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="small text-danger pt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Войти') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
