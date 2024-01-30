<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class ChatController  extends Controller
{

    public function send(Request $request){
        $validation = $request->validate([
            'text' => ['required', 'string']
        ]);

        $user_send_id = $request->user_send_id;
        $user_abon_id = $request->user_abon_id;
        $active = $request->active;
        $text = $validation['text'];

        $user_id = session('user')->id;
        $chat_message = DB::insert("INSERT INTO `chats`( `user_send_id`, `user_abon_id`, `comment` ) VALUES ('{$user_send_id}','{$user_abon_id}','{$text}')");

        $all_sms = Chat::where('user_send_id', $user_id)->where('user_abon_id', $user_abon_id)
            ->orWhere('user_send_id',$user_abon_id )->where('user_abon_id',$user_id )->orderBy(('time_send'))->get();
        $user = DB:: select('select * from users where id = ?', [$user_abon_id]);
        $user = $user[0];
        return back();
    }


    public function create_chat(){
        //
    }

    public function message(Request $request)
    {
        $user_abon_id = (int)$request->user_abon_id;
        $user_id = session('user')->id;
        $all_sms = Chat::where('user_send_id', $user_id)->where('user_abon_id', $user_abon_id)
            ->orWhere('user_send_id',$user_abon_id )->where('user_abon_id',$user_id )->orderBy(('time_send'))->get();
        $user = DB:: select('select * from users where id = ?', [$user_abon_id]);
        $user = $user[0];
        return view('chat.index', compact('all_sms','user' ));
    }
}
