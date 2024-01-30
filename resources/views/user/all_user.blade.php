@extends('layouts.base')

@section('page.title', "Сотрудники")

@section('content')
    <div class="d-flex justify-content-between">
        <div>
            @include('admin.components.admin_menu')
        </div>
        <div class="ms-2 mb-5">
            <a href="{{ route('user.new_user') }}">
                <button class="btn btn-secondary" style="min-width: 150px" type="button" name="new_user" id="new_user">{{ __('Создать нового пользователи') }}</button>
            </a>
        </div>
    </div>
    @foreach($all_users as $user)

        <div class="card mb-2">
            <div class="d-flex justify-content-between">
                <div class="card-body col-4 d-inline-block">
                    <img alt="avatar"  src="{{ asset('storage/uploads'). "/" . $user->avatar }}"  width="30px" height="30px" style="border-radius: 50%"/>
                    <a href="{{ route("user.user_page.index", $user->id ) }}" style="text-decoration: none;"><p class="fw-semibold">{{ $user->first_name }} {{ $user->last_name }}</p></a>
                </div>
                <div class="d-flex">
                    <ul class="nav d-inline-block">
                        <li class="mb-2">
                            <a href="{{ route('user.edit' , $id = $user->id) }}"><button class="btn btn-secondary btn-sm mb-0" style="min-width: 150px">Редактировать</button></a>
                        </li>
                        <li  class="mb-2">
                            @if($user->active == true)
                                <form action="{{ route('user.block') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="block" value="{{ $user->id }}">
                                    <input style="min-width: 150px" class="btn btn-secondary btn-sm mb-0" type="submit" value="Заблокировать">
                                </form>
                            @else
                                <form action="{{ route('user.unblock') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="unblock" value="{{ $user->id }}">
                                    <input style="min-width: 150px" class="btn btn-secondary btn-sm mb-0" type="submit" value="Разблокировать">
                                </form>
                            @endif
                        </li>
                        <li  class="mb-2">
                            <form action="{{ route('user.destroy') }}" method="post">
                                @csrf
                                <input type="hidden" name="destroy" value="{{ $user->id }}">
                                <input style="min-width: 150px" class="btn btn-danger btn-sm mb-0"  type="submit" value="Удалить">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endsection

