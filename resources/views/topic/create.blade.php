@extends('layouts.base')

@section('page.title', "Create topic")
@section('content')

    <div class="ms-4">
        <h3>
            {{ __('Добавить тему') }}
        </h3>
    </div>
    <div class="container mt-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('topic.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <label class="form">Название</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form">Текст</label>
                                <textarea style="height: 150px" type="password" name="text" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Отправить на модерацию') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
