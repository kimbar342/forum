@extends('layouts.base')

@section('page.title', 'Пост')


@section('content')
    <h3>{{ __('Вот что нашлось') }}</h3>
@php
//dd($topic)
 @endphp
    <div class="mb-5">
        @if(!\PHPUnit\Framework\isEmpty($topic))
            <h3>Ни одной темы не найдено</h3>
        @else
            @foreach($topic as $post)
                <div class="container mt-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <a href="{{route('topic.show', $post->id )}}" style="text-decoration: none;">
                                        <h4>{{$post->title}}</h4>
                                    </a>
                                </div>
                                <div class="mb-4">
                                    {{$post->content}}
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>

                                    </div>
                                    <div class="d-flex">
                                        <h6 class="ms-4">
                                            {{ $post->created_at }}
                                        </h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
