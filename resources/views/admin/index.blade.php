@extends('layouts.base')

@section('page.title', "Админ меню")


@section('content')
    <div>
        <ul class="nav">
            <li class="ms-2">
                <a href="{{ route('user.all_user') }}">
                    <button class="btn btn-secondary" style="min-width: 150px" type="button" name="user" id="user">{{ __('Пользователи') }}</button>
                </a>
            </li>

            <li  class="ms-2">
                <a href="{{ route('user.new_user') }}">
                    <button class="btn btn-secondary" style="min-width: 150px" type="button" name="topic" id="topic">{{ __('Новый пользователь') }}</button>
                </a>
            </li>

            <li  class="ms-2">
                <a href="{{ route('topic.index') }}">
                    <button class="btn btn-secondary" style="min-width: 150px" type="button" name="topic" id="topic">{{ __('Новости') }}</button>
                </a>
            </li>

            <li  class="ms-2">
                <a href="{{ route('admin.topic.create_topic') }}">
                    <button class="btn btn-secondary" style="min-width: 150px" type="button" name="topic" id="topic">{{ __('Создать Тему') }}</button>
                </a>
            </li>
        </ul>
    </div>
@endsection
