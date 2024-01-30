@extends('layouts.base')

@section('page.title', 'Страничка пользователя')


@section('content')
    <div class="container mt-5">
        <div id="main">
            <div class="row" id="real-estates-detail">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="{{ asset('storage/uploads'). "/" . $result->avatar }}" alt="image" width="150px" height="150px" style="border-radius: 50%">
                                <h3>{{ $result->first_name }} {{ $result->last_name }}</h3>
                                <p>{{ $result->post }}</p>
                                @include('includes.status')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="panel">
                        <div class="panel-body">

                            <div id="myTabContent" class="tab-content">

                                <table class="table table-th-block">
                                    <tbody>
                                    <tr>
                                        <td class="active">Город:</td>
                                        <td>{{ $result->city }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active">Пол:</td>
                                        <td>{{ $result->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active">Год рождения:</td>
                                        <td>{{ $result->birthday }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active">Семейное положение:</td>
                                        <td>{{ $result->familyPost }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active">Текущий статус:</td>
                                        <td>{{ $result->position_in_office }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('user.message', ['user_abon_id'=> $result->id] ) }}">
                    <button type="button" class="btn btn-success">Отправить сообщение</button>
                </a>
            </div>
        </div>
    </div>
@endsection
