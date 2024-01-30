@extends('layouts.base')

@section('page.title', 'Редактировать')


@section('content')
    <div>
        <h4 class="ms-4 mt-3">
            {{ __('Редактирование данных сотрудника') }}
        </h4>
    </div>
    <div class="container mt-md-4 mt-5">
        <div class="row">
            <div class="col-12 ">
                <div>
                    <div class="card-body">
                        <form action="{{ route('user.update') }}" method="POST">
                            @csrf
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Имя') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="first_name" class="form-control ms-4" value="{{ $request->first_name }}" required autofocus>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Фамилия') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="last_name" value="{{ $request->last_name }}" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Отчество') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="surname" value="{{ $request->surname }}" class="form-control  ms-4" required>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Должность') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="post" value="{{ $request->post }}" class="form-control  ms-4" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Город') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <input type="text" name="city" value="{{ $request->city }}" class="form-control ms-4" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="form-label"> {{ __('Текущий статус') }}</label>
                                    </td>

                                    <td class="mb-3">
                                        <select name="position_in_office" class="form-control mr-sm-2 ms-4" value="{{ $request->position_in_office }}">
                                            <optgroup label="{{ __('Текущий статус') }}">
                                                <option value="work"> {{ __('Находится на рабочем месте') }}</option>
                                                <option value="business_trip"> {{ __('В командировке') }}</option>
                                                <option value="sick_leave"> {{ __('На больничном') }}</option>
                                                <option value="maternity_leave"> {{ __('В декрете') }}</option>
                                            </optgroup>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                                <input type="hidden" name="user_id" value="{{ $request->id }}">
                            </table>

                            <button type="submit"
                                    class="btn btn-success mt-5">{{ __('Редактировать данные') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
