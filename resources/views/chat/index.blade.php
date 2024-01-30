@extends('layouts.base')

@section('page.title', 'Страничка пользователя')


@section('content')
    <div>
        <a href="{{route('home.index')}}">
            <button type="button" class="btn btn-success">{{ __('Назад') }}</button>
        </a>
    </div>
    <div style="max-width: 600px; margin: 0 auto">
        <div class="d-flex">
            <div style="height: 600px; border:solid 1px #ddd; overflow-y: scroll;width: 80% " id="chat">
                <div class="m-2 p-2" style="font-family: Roboto,sans-serif; font-size: 1rem;border-radius: 30px">

                    @if(empty($all_sms))
                        <div>
                            {{ __('Сообщений пока нет') }}
                        </div>
                    @else
                        @foreach($all_sms as $message)

                            <div class="col-md-8" id="message" style="width: 100%">
                                <div class="message-wrapper" >
                                    <ul class="messages">
                                        @if($message->user_send_id   === session('user')->id)
                                        <li class="message clearfix">
                                            <div class="sent">
                                                <div style="overflow: auto">{{ $message->comment }}</div>
                                                <p class="date">{{ date('d M y, h:i ', strtotime( $message->time_send)) }}</p>
                                            </div>
                                        </li>
                                        @else
                                        <li class="message clearfix">
                                            <div class="received">
                                                <p>{{ $message->comment }}</p>
                                                <p class="date">{{ date('d M y, h:i ', strtotime( $message->time_send)) }}</p>
                                            </div>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div style="height: 600px; border:solid 1px #ddd; width: 20%">
                <div>
                    <img src="{{ asset('storage/uploads'). "/" . $user->avatar }}" alt="image"
                         width="30px" height="30px" style="border-radius: 50%">
                </div>
                <div>
                    {{ $user->first_name }}
                </div>
                <div>
                    {{ $user->last_name }}
                </div>
                <div>
                    {{ $user->surname }}
                </div>
                <div>
                    {{ $user->post }}
                </div>
            </div>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="mt-5" style="max-width: 600px; margin: 0 auto">
            @include('includes.errors')
            <form role="form" action="{{ route('send', ) }}" method="post">
                @csrf
                <div class="form-group d-flex" style="max-height: 40px">
                    <input type="hidden" name="user_send_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                    <input type="hidden" name="user_abon_id" value="{{ $user->id }}">
                    <input type="hidden" name="active" value="1">
                    <textarea name="text" class="form-control rounded" required></textarea>
                    <button type="submit" class="btn btn-success ms-3" data-original-title="" title="">Отправить
                    </button>
                </div>
            </form>
        </div>
    @endif
    <script type="text/javascript">
        var block = document.getElementById("chat");
        block.scrollTop = block.scrollHeight;
    </script>
@endsection
