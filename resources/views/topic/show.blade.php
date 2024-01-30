@extends('layouts.base')

@section('page.title', $post->title )

@section('content')
    @if(empty($post))
        <div>
            <p>
                {{ __('Нет комментариев!') }}
            </p>
        </div>
    @else

        <div class="container mt-md-4" style="max-width: 1000px">
            <div>
                <a href="{{route('home.index')}}">
                    <button type="button" class="btn btn-success">{{ __('Назад') }}</button>
                </a>
            </div>
            <h2 class="mt-3">{{$post->title}}</h2>
            <div class="mb-4 mt-5">
                <div class="mb-4">
                    {{$post->content}}
                </div>
            </div>

            @foreach($all_topic_comment as $result)
                <div class="row mb-2">
                    <div class="card">
                        <div class="d-flex mb-0 py-1">
                            <div class="d-flex me-5" style="height: 100%; width: 25%">
                                <ul class="mb-0 p-0 py-0 d-grid  justify-content-between">
                                    <li class="d-flex">
                                        @include('includes.status')
                                        <img src="{{ asset('storage/uploads'). "/" . $result->avatar }}" alt="image"
                                             width="30px" height="30px" style="border-radius: 50%">

                                        <a href="{{ route('user.show_user_page' , ['user_id' => $result->user_id]) }}">{{ $result->first_name }}</a>
                                    </li>
                                    <li class="d-flex">
                                        @if(Auth::check())
                                            @if(session('user')->root == 1)
                                                @if($result->active == 1)
                                                    <form action="{{ route('user.block_topic') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="block_id_user"
                                                               value="{{ $result->user_id }}">
                                                        <input type="hidden" name="topic"
                                                               value="{{ $result->topic_id }}">
                                                        <input style="min-width: 153px"
                                                               class="btn btn-secondary btn-sm mb-0"
                                                               type="submit" value="Заблокировать">
                                                    </form>
                                                @else
                                                    <form action="{{ route('user.unblock_topic') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="unblock_id_user"
                                                               value="{{ $result->user_id }}">
                                                        <input type="hidden" name="topic"
                                                               value="{{ $result->topic_id }}">
                                                        <input style="min-width: 153px"
                                                               class="btn btn-secondary btn-sm mb-0"
                                                               type="submit" value="Разблокировать">
                                                    </form>
                                                @endif
                                            @endif
                                        @endif
                                    </li>
                                    @if(Auth::check())
                                        @if(session('user')->id === $result->user_id || session('user')->root === 1)
                                            <li class="d-flex">
                                                <form method="post" action="{{ route('comments_destroy') }}">
                                                    @csrf
                                                    <input type="hidden" name="delete" value="{{ $result->id }}">
                                                    <input type="hidden" name="topic" value="{{ $result->topic_id }}">
                                                    <input style="min-width: 70px"
                                                           class="btn btn-primary btn-sm mt-1 me-1 "
                                                           type="submit" value="Удалить">
                                                </form>
                                                <form method="post" action="{{ route('comments_edit') }}">
                                                    @csrf
                                                    <input type="hidden" name="edit" value="{{ $result->id }}">
                                                    <input type="hidden" name="topic" value="{{ $result->topic_id }}">
                                                    <input style="min-width: 70px"
                                                           class="btn btn-primary btn-sm mt-1 me-1 "
                                                           type="submit" value="Изменить">
                                                </form>
                                            </li>

                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between" style="width: 100%">
                                <div class="d-flex" style="width: 100%">
                                    @if(!session('action'))
                                        <div>
                                            <p>{{ $result->comment }}</p>
                                            <span class="date">{{ date('d M y, h:i ', strtotime( $result->published_at)) }}</span>
                                        </div>
                                    @else
                                        <div style="width: 100%">
                                            <form class="form" action="{{ route('save_comment') }}" method="post"
                                                  style="width: 100%">
                                                @csrf
                                                <input type="hidden" name="postId" value="">
                                                <textarea name="message" class="form-control"
                                                          style="width: 100%;min-height:80px ">{{ $result->comment }}</textarea>
                                                <input type="hidden" name="edit" value="{{ $result->id }}">
                                                <input type="hidden" name="topic" value="{{ $result->topic_id }}">
                                                <input class="btn btn-primary btn-sm mt-1" type="submit" name="editSave"
                                                       value="Сохранить">
                                                <a href="{{ redirect("topic/{$result->topic_id}") }}"><input
                                                        class="btn btn-secondary btn-sm mt-1" type="button"
                                                        name="cancel"
                                                        value="Отмена"></a>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="mt-5" style="max-width: 600px; margin: 0 auto">
                <form role="form" action="{{ route('add_comment') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="userId" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <input type="hidden" name="topicId" value="{{ $post->id }}">
                        <input type="hidden" name="published_at" value="date()">
                        <input type="hidden" name="active" value="1">
                        <label>Ответить</label>
                        <textarea name="text" class="form-control rounded" style="height: 100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mt-3" data-original-title="" title="">
                            Отправить
                        </button>
                    </div>
                </form>
            </div>
        @endif
    @endif
@endsection


