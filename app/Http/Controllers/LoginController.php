<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use function Sodium\compare;

class LoginController extends Controller
{
    public function index(){
        //return app('view')->make("login.index");
        //return View::make('login.index');
        $foo = session()->get('foo');
        //dump($foo);
        return view('login.index');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'email'=> ['required','string', 'email'],
            'password'=> ['required', 'string', 'min:7', 'max:50'],
        ]);

        //cheyanne.tremblay@example.net
        //password
        if(Auth::attempt($validate)){
            $user = auth()->user();
            $result = $user->getOriginal();
            $user = (object)$result;
            session(['success'=> __('Авторизация прошла удачно!'),
                'user' => $user,
            ]);
            $all_users = DB::select('select * from users');
            $all_news = DB::select('select * from topics ORDER BY `published_at` desc');
            $all_news = (object)$all_news;
            return view('home.index', compact('all_news', 'all_users', 'user'));
        }
        else{
            session(['danger' => __('Авторизация прошла не удачно!')]);
            return redirect('login');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
