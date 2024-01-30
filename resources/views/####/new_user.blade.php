@extends('layouts.base')

@section('page.title', "О нас")


@section('content')
    @include('admin.components.admin_menu')

    <div class="container mt-md-4">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Логин</label>
                                <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required
                                       autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('new user') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
