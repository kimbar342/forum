
@extends('layouts.base')

@section('page.title', 'Тема')


@section('content')
    <div>
        @include('admin.components.admin_menu')
    </div>
    <div class="container mt-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.topic.store_admin') }}" method="POST">
                            @csrf
                            <div class="">
                                <label class="form">Название</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form">Текст</label>
                                <textarea style="height: 150px" type="text" name="text" class="form-control" required></textarea>
                            </div>
                            <input type="hidden" name="id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                            <button type="submit" class="btn btn-primary">{{ __('Добавить тему!') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
