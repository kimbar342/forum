@extends('layouts.base')

@section('page.title', "Create topic")
@section('content')

    <div class="ms-4">
        <h3>
            {{ __('Редактировать тему') }}
        </h3>
    </div>
    <div class="container mt-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.save_edit_topic_admin') }}" method="POST">
                            @csrf
                            <div class="">
                                <label class="form">Название</label>
                                <input type="text" name="title" class="form-control" required value="{{ $result->title }}">
                            </div>
                            <div class="mb-3">
                                <label class="form">Текст</label>
                                <textarea style="height: 150px" type="text" name="text" class="form-control" required>{{ $result->content }}</textarea>
                            </div>
                            <input type="hidden" name="topic_id" value="{{ $result->id }}">
                            <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
