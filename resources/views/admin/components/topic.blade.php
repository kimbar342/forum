@extends('layouts.base')

@section('page.title', "О нас")


@section('content')
    <div class="justify-content-between d-flex">
        <div>
            @include('admin.components.admin_menu')
        </div>

        <div class="ms-2 mt-3">
            <a href="{{ route('admin.topic.create_topic') }}">
                <button class="btn btn-secondary" style="min-width: 150px" type="button" name="new_topic"
                        id="new_topic">{{ __('Создание новой темы') }}</button>
            </a>
        </div>
    </div>
@endsection
