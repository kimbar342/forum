@extends('layouts.base')

@section('page.title', 'Пост')


@section('content')
    <h3>{{ __('Вот что нашлось') }}</h3>

    @if(!\PHPUnit\Framework\isEmpty($worker))
        <h3>Никто не найден</h3>
    @else
        @foreach($worker as $value)

            <div class="container mt-md-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <a href="{{route('user.show_user_page' , ['user_id' => $value->id])}}" style="text-decoration: none;">
                                    <h4>{{$value->first_name}}  {{$value->last_name}}</h4>
                                </a>
                            </div>
                            <div class="mb-4">
                                {{ $value->post }}

                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('user.message', ['user_abon_id'=> $value->id] ) }}">
                                        <button type="button" class="btn btn-success">Отправить сообщение</button>
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <h6 class="ms-4">

                                    </h6>
                                </div>
                                <div class="d-flex">
                                    <h6 class="ms-4">
                                        {{ $value->birthday }}
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
