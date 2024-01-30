@extends('layouts.base')

@section('page.title', "Отдел кадров")


@section('content')
    <div>
        <h4 class="ms-4 mt-3">
            {{ __('Изменение статуса') }}
        </h4>
    </div>
    <div class="container mt-md-4 mt-5">
        <div class="row">
            <div class="col-12 ">
                <div>
                    <div class="card-body">
                        <form action="{{ route('registration_order') }}" method="post">
                            @csrf
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Номер приказа') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="number" name="num_order" class="form-control ms-4" aria-describedby="emailHelp" required autofocus>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Дата приказа') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="date" name="date_order" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('На основании чего') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="basis" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td class=" align-text-top">
                                        <label class="form-label align-text-top"> {{ __('ФИО сотрудника') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="last_name" class="form-control  ms-4" placeholder="Фамилия" required>
                                        <input type="text" name="first_name" class="form-control  ms-4" placeholder="Имя" required>
                                        <input type="text" name="surname" class="form-control  ms-4" placeholder="Отчество" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Дата рождения') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="date" name="birthday" class="form-control  ms-4" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Именить статус на : ') }}</label>
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
                                </tbody>
                            </table>
                            <button type="submit"
                                    class="btn btn-success mt-5">{{ __('Зарегистрировать изменения') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

