@extends('layouts.base')

@section('page.title', "О нас")


@section('content')
    <h1>Изменение данных</h1>
    <div class="container mt-5">
        <div id="main">
            <div class="row" id="real-estates-detail">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="{{ asset('storage/uploads'). "/" . session('user')->avatar }}" alt="image" width="130px" height="130px" style="border-radius: 50%">
                                <h3>{{ session('user')->first_name }}  {{ session('user')->last_name }} </h3>
                                <p>{{ session('user')->post }}</p>
                            </div>
                        </div>
                    </div>
                   @include('includes.errors')
                    <div class="mb-2">
                        <form action="{{ route('user.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                        </form>
                    </div>

                </div>
            </div>
            <div class="container mt-md-4 mt-5">
                <div class="row">
                    <div class="col-12 ">
                        <div>
                            <div class="card-body">
                                <form action="{{ route('user.save_data_change') }}" method="post">
                                    @csrf

                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Имя') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <input type="text" name="first_name" class="form-control ms-4" aria-describedby="emailHelp" required autofocus>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Фамилия') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <input type="text" name="last_name" class="form-control  ms-4" required>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Отчество') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <input type="text" name="surname" class="form-control  ms-4" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('E-mail') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <input type="email" name="email" class="form-control  ms-4" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Семейное положение') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <select name="familyPost" class="form-control mr-sm-2 ms-4">
                                                    <option value="{{ __('Женат') }}"> {{ __('Женат') }}</option>
                                                    <option value="{{ __('Замужем') }}">{{ __('Замужем') }}</option>
                                                    <option value="{{ __('Не женат') }}">{{ __('Не женат') }}</option>
                                                    <option value="{{ __('Не замужем') }}">{{ __('Не замужем') }}</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Город') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <input type="text" name="city" class="form-control ms-4" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="form-label"> {{ __('Пол') }}</label>
                                            </td>

                                            <td class="mb-3">
                                                <select name="gender" class="form-control mr-sm-2 ms-4">
                                                    <option value="{{ __('Мужской') }}"> {{ __('Мужской') }}</option>
                                                    <option value="{{ __('Женский') }}">{{ __('Женский') }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="user_id" value="{{ session('user')->id }}">
                                    <button type="submit" class="btn btn-success mt-5">{{ __('Сохранить') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




