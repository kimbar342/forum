<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ValidateController extends Controller
{

    public function store(Request $request){
        $validated = $request->validate([
            'first_name'=> ['required', 'string', 'max:50'],
            'last_name'=> ['nullable', 'string','max:50'],
            'age' => ['nullable', 'integer', 'min:18', 'max:100'],
            'amount' => ['required', 'numeric', 'min:1', 'max:999'],
            'gender' => ['nullable', 'string', 'in:male, female'],
            'zip' => ['required', 'digits:6'],
            'subscription' => ['nullable', 'boolean'],
            'agreement' => ['accepted'],
            'password' => ['required', 'string', 'min:7', 'confirmed'],//подтверждение пароля второй раз для соотношения
            //'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->synbols(),'confirmed'],//подтверждение пароля второй раз для соотношения
            'current_password' => ['required', 'string', 'current_password'],//подтверждение пароля для операции внутри кабинета
            'email' => ['required', 'string','max:100', 'email', 'exists:users'],//из таблицы базы данных
            'phone' => ['required', 'string', 'unique:users, phone'],//есть ли пользователь с таким номером номера
            //'phone' => ['required', 'string', new Phone, Rule::unique('users', 'phone')->ignore($user)],//кроме себя самого
            'website' => ['nullable', 'string', 'url'],
            'uuid' => ['nullable', 'string', 'uuid'],
            'ip' => ['nullable', 'string', 'ip'],
            'avatar' => ['required', 'file', 'image', 'max:1024'],
            'birth_date' => ['required', 'string', 'date'],
            'services'=>['nullable', 'array', 'min:1', 'max:10'],
            'services.*'=> ['required', 'integer', 'exists:services,service '],
            'delivery'=> ['required', 'array', 'size:2'], //обязательный массив на 2 элемента ['date'=> '2021-10-10', 'time'=>'12:23:00' ]
            'delivery.date' => ['required', 'string', 'date_format:Y.m.d'],
            'delivery.time'=> ['required', 'string', 'time_format:H:i:s'],
            'secret'=> ['required','string' ,function($attribute, $value, \Closure $fail){
                    if($value !== config('example.secter')){
                        $fail(__('Неверный секретны ключ'));
                    }
            }],
        ]);
    }
}
