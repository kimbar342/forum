@extends('layouts.base')
@section('content')
    <h1 class="mt-5 container">Последние новости</h1>
    <div class="d-flex flex-row justify-content-between">
        <div style="width: 70%" class="mr-5">

            @if(empty($all_news))
                <div>
                    {{ __('Нет ни одного поста') }}
                </div>
            @else
                @foreach($all_news as $post)
                    @if($post->active == 1 )
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
                                               {{ $post->published_at }}
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <div class="mb-4 mt-5 ">
            <div>

            </div>
            <div>

            </div>
        </div>
    </div>
@endsection



