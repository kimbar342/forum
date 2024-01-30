@extends('layouts.base')

@section('page.title', "Профиль")


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
                                <img src="{{ asset('storage/uploads'). "/" . session('user')->avatar }}" alt="image" width="150px" height="150px" style="border-radius: 50%">
                                <h3>{{ session('user')->first_name }}  {{ session('user')->last_name }} </h3>
                                <p>{{ session('user')->post }}</p>
                            </div>
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
                                    <td>{{ session('user')->city }}</td>
                                </tr>
                                <tr>
                                    <td class="active">Пол:</td>
                                    <td>{{ session('user')->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="active">Дата рождения:</td>
                                    <td>{{ session('user')->birthday }}</td>
                                </tr>
                                <tr>
                                    <td class="active">Семейное положение:</td>
                                    <td>{{ session('user')->familyPost }}</td>
                                </tr>
                                <tr>
                                    <td class="active">Должность:</td>
                                    <td>{{ session('user')->post }}</td>
                                </tr>
                                <tr>
                                    <td class="active">Текущий статус:</td>
                                    <td>{{ session('user')->position_in_office }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('user.change_profile')}}">
                <button type="button" class="btn btn-success">{{ __('Изменить данные') }}</button>
            </a>
        </div>
    </div>
@endsection



