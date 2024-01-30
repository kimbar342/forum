@extends('layouts.base')
@section('page.title', "Темы")
@section('content')
    <div class="justify-content-between d-flex">
        <div>
            @include('admin.components.admin_menu')
        </div>

        <div class="ms-2 mb-5">
            <a href="{{ route('admin.topic.create_topic') }}">
                <button class="btn btn-secondary" style="min-width: 150px" type="button" name="new_topic"
                        id="new_topic">{{ __('Создание новой темы') }}</button>
            </a>
        </div>
    </div>

    @foreach($all_news as $news)
        <div class="card mb-2">
            <div class="d-flex justify-content-between">
                <div class="card-body col-4">
                    <p>{{ $news->title }}</p>
                    <p>{{ $news->content }}</p>
                </div>
                <div class="d-flex">
                    <ul class="nav d-inline-block">
                        <li class="mb-2" style="min-width: 150px">
                            <form action="{{ route('admin.edit_topic')}}" method="post">
                                @csrf
                                <input type="hidden" name="edit" value="{{ $news->id }}">
                                <input class="btn btn-secondary btn-sm mb-0" style="min-width: 150px" type="submit"
                                       value="{{ __('Редактировать') }}">
                            </form>
                        </li>
                        <li class="mb-2" style="min-width: 150px">
                            <form action="{{ route('admin.topic_delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="destroy" value="{{ $news->id }}">
                                <input style="min-width: 150px" class="btn btn-danger btn-sm mb-0" type="submit"
                                       value="Удалить">
                            </form>
                        </li>
                        @if($news->active === 0)
                            <li class="mb-2" style="min-width: 150px">
                                <form action="{{ route('admin.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="update" value="{{ $news->id }}">
                                    <input style="min-width: 150px" class="btn btn-success btn-sm mb-0" type="submit"
                                           value="Добавить">
                                </form>
                            </li>
                        @endif
                    </ul>


                </div>
            </div>
        </div>
    @endforeach
@endsection
