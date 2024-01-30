@extends('layouts.base')

@section('page.title', 'Вход')


@section('content')
    <div>
        @include('admin.components.admin_menu')
    </div>
    <div>
        @include('includes.errors')
        <h4 class="ms-4 mt-3">
            {{ __('Регистрация нового сотрудника') }}
        </h4>
    </div>
    <div class="container mt-md-4 mt-5">
        <div class="row">
            <div class="col-12 ">
                <div>
                    <div class="card-body">
                        <form action="{{ route('user.update_user') }}" method="post">
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
                                        <label class="form-label"> {{ __('Пароль') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="password" name="password" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Год рождения') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="date" name="birthday" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Должность') }}</label>
                                    </td>

                                    <td class="mb-3 me-5">
                                        <select name="post" class="form-control mr-sm-2 ms-4">
                                            <optgroup label="Руководящий состав">
                                                <option value="{{ __('Директор') }}"> {{ __('Директор') }}</option>
                                                <option value="{{ __('Зам.директора') }}">{{ __('Зам.директора') }}</option>
                                                <option value="{{ __('Директор по развитию') }}">{{ __('Директор по развитию') }}</option>
                                                <option value="{{ __('Финансовый директор') }}">{{ __('Финансовый директор') }}</option>
                                            </optgroup>
                                            <optgroup label="Юридический отдел">
                                                <option value="5">{{ __('Главный юрист') }}</option>
                                                <option value="{{ __('Специалист по претензиям') }}">{{ __('Специалист по претензиям') }}</option>
                                            </optgroup>
                                            <optgroup label="Бухгалтерия">
                                                <option value="{{ __('Главный бухгалтер') }}">{{ __('Главный бухгалтер') }}</option>
                                                <option value="{{ __('Бухгалтер по кадрам') }}">{{ __('Бухгалтер по кадрам') }}</option>
                                                <option value="{{ __('Делопроизводитель') }}">{{ __('Делопроизводитель') }}</option>
                                            </optgroup>
                                            <optgroup label="Отдел оформления">
                                                <option value="{{ __('Менеджер') }}">{{ __('Менеджер') }}</option>
                                                <option value="{{ __('Кассир') }}">{{ __('Кассир') }}</option>
                                                <option value="{{ __('Специалист контактного центра') }}">{{ __('Специалист контактного центра') }}</option>
                                            </optgroup>
                                            <optgroup label="Транспорный отдел">
                                                <option value="{{ __('Логист') }}">{{ __('Логист') }}</option>
                                                <option value="{{ __('Механик') }}">{{ __('Механик') }}</option>
                                                <option value="{{ __('Водитель ам') }}">{{ __('Водитель ам') }}</option>
                                            </optgroup>
                                            <optgroup label="Склад">
                                                <option value="{{ __('Начальник склада') }}">{{ __('Начальник склада') }}</option>
                                                <option value="{{ __('Кладовщик') }}">{{ __('Кладовщик') }}</option>
                                                <option value="{{ __('Грузчик') }}">{{ __('Грузчик') }}</option>
                                                <option value="{{ __('Водитель погрузчика') }}">{{ __('Водитель погрузчика') }}</option>
                                            </optgroup>
                                        </select>
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

                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Текущий статус') }}</label>
                                    </td>
                                    <td class="mb-3">
                                        <select name="position_in_office" class="form-control mr-sm-2 ms-4">
                                            <optgroup label="{{ __('Текущий статус') }}">
                                                <option value="{{ __('Находится на рабочем месте') }}"> {{ __('Находится на рабочем месте') }}</option>
                                                <option value="{{ __('В командировке') }}"> {{ __('В командировке') }}</option>
                                                <option value="{{ __('На больничном') }}"> {{ __('На больничном') }}</option>
                                                <option value="{{ __('В декрете') }}"> {{ __('В декрете') }}</option>
                                            </optgroup>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td >
                                            {{ __('Права администратора') }}
                                    </td>
                                    <td class="mb-3">
                                        <select name="root" class="form-control mr-sm-2 ms-4">
                                            <optgroup label="{{ __('Дать права доступа?') }}">
                                                <option value="{{ __( 'false' ) }}">  {{ __('Нет') }}</option>
                                                <option value="{{ __( 'true' ) }}">  {{ __('Да') }}</option>
                                            </optgroup>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="active" value="{{ __( true) }}">
                            <button type="submit"
                                    class="btn btn-success mt-5">{{ __('Зарегистрировать сотрудника') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
