<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function about()
    {
        return view('about.index');
    }

    public function personnel_department()
    {
        return view('personnel_department.index');
    }

    public function admin_panel()
    {
        //возвращает профиль админа
        return view('admin.index');
    }

    public function profile($user){
        //возвращает профиль пользователя
        $user_request = DB::select('select * from users where id = ?', [$user]);
        $user = $user_request[0];
        session(['user'=> $user]);
        return view('user.profile', compact('user'));
    }

    public function user_page(Request $request){
        $result = explode('/', $request->url());
        $id = (int)end($result);
        $user_request = DB::select('select * from users where id = ?', [$id]);
        $result = $user_request[0];
        return view('user.show_page', compact('result'));
    }


    public function registration_order(Request $request)
    {
        $validation= $request->validate([
            'num_order' => ['required', 'string'],
            'date_order' => ['required', 'date'],
            'basis' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'birthday' => ['required', 'date'],
            'position_in_office' => ['required', 'string'],
        ]);

        $user = DB::table('table_orders')->insert([
            $validation
        ]);

        $position = $validation['position_in_office'];
        $update_user= DB::update("UPDATE `users`, table_orders SET users.position_in_office = '{$position}' WHERE users.birthday = table_orders.birthday
               and users.first_name = table_orders.first_name
               and users.last_name = table_orders.last_name
               and users.surname = table_orders.surname");

        if($update_user){
            session(['success'=> __('Приказ успешно зарегистртрован!')
            ]);
            return view('personnel_department.index' , compact('user') );
        }else{
            redirect('HTTP_BAD_REQUEST');
        }

    }
}
