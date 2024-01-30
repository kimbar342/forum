@extends('layouts.base')

@section('page.title', "О нас")


@section('content')
    <div class="d-flex justify-content-between">
        <div>
            @include('admin.components.admin_menu')
        </div>
        <div class="mt-3 ms-2">
            <a href="{{ route('admin.register.store') }}">
                <button class="btn btn-secondary" style="min-width: 150px" type="button" name="new_user" id="new_user">{{ __('Создать нового пользователи') }}</button>
            </a>
        </div>
    </div>

    @php('all users')
@endsection

