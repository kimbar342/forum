<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function index()
    {
        $all_users = DB::select('select * from users');
        $all_users = (object)$all_users;
        return view('user.all_user', compact('all_users'));
    }

    public function show_user_page(Request $request)
    {
        $id = $request->user_id;
        $user_data = DB::select('select * from users where id = ?', [$id]);
        $result = $user_data[0];
        return view('user.show_page', compact('result'));
    }

    public function create()
    {
        return view('user.create');
    }



    public function destroy(Request $request)
    {
        $id  = $request->destroy;

        $user = DB::table('users')->where('id',$id) ->delete();
        return view('admin.index');
    }

    public function edit(Request $request)
    {
        $result = explode('/', $request->url());
        $id = end($result);
        $user_request = DB::select('select * from users where id = ?', [$id]);
        $request = $user_request[0];
        return view('user.edit', compact('request'));
    }

    public function block(Request $request)
    {
        $id = $request->block;
        $user = DB::table('users')
            ->where('id', $id)
            ->update(['active'=> false]);
        return view('admin.index');
    }

    public function unblock(Request $request)
    {
        $id = $request->unblock;
        $user = DB::table('users')
            ->where('id', $id)
            ->update(['active'=> true]);
        return view('admin.index');
    }

    public function block_topic(Request $request)
    {

        $id = $request->block_id_user;
        $topic = $request->topic;
        $comment = DB::update("update `users` SET `active` = false  WHERE `id` = {$id}");
        return redirect("topic/{$topic}");
    }

    public function unblock_topic(Request $request)
    {
        $id = $request->unblock_id_user;
        $topic = $request->topic;
        $comment = DB::update("update `users` SET `active` = true  WHERE `id` = {$id}");
        return redirect("topic/{$topic}");
    }


    public function update(Request $request){

        $validate = $request->validate([
            'first_name'=> ['required', 'string', 'max:50'],
            'last_name'=> ['required', 'string', 'max:50'],
            'surname'=> ['required', 'string', 'max:50'],
            'post'=> ['required', 'string', 'max:50'],
            'city'=> ['required', 'string', 'max:50'],
            'position_in_office'=> ['required'],
        ]);
        $id = $request->user_id ;
        $user = DB::table('users')
            ->where('id', $id)
            ->update($validate);
        return view('admin.index');

    }

    public function update_user_admin_panel(Request $request){

        $validate = $request->validate([
            'first_name'=> ['required', 'string', 'max:50'],
            'last_name'=> ['required', 'string', 'max:50'],
            'surname'=> ['required', 'string', 'max:50'],
            'email'=> ['required','string', 'email', 'max:50','unique:users,email'],
            'password'=> ['required', 'string', 'min:7', 'max:50'],
            'birthday'=> ['required', 'date'],
            'post'=> ['required', 'string', 'max:50'],
            'familyPost'=> ['required', 'string', 'max:50'],
            'city'=> ['required', 'string', 'max:50'],
            'gender'=> ['required', 'string', 'max:50'],
            'position_in_office'=> ['required', 'string', 'max:50'],
            'active' => ['required', 'string'] ,
            'root' => ['required', 'string'] ,
        ]);


        $user = User::query()->create(
            array_merge($validate, [
                'avatar'=> 'human.png',
                'password' => bcrypt($validate['password']),
            ])
        );


        /*$user->first_name = $validate['first_name'];
        $user->last_name = $validate['last_name'];
        $user->surname = $validate['surname'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->birthday = $validate['birthday'];
        $user->post = $validate['post'];
        $user->familyPost = $validate['familyPost'];
        $user->city = $validate['city'];
        $user->gender = $validate['gender'];
        $user->position_in_office = $validate['position_in_office'];
        $user->active = $validate['active'];
        $user->root = $validate['root'];*/
        $user->save();

        return view('admin.index');
    }

    public function  change_profile(Request $request)
    {
        return view('user.change_data_profile');
    }



    public function  save_data_change(Request $request)
    {


        $validate = $request->validate([
            'first_name'=>          ['required', 'string', 'max:50'],
            'last_name'=>           ['required', 'string', 'max:50'],
            'surname'=>             ['required', 'string', 'max:50'],
            'email'=>               ['required', 'string', 'email'],
            'familyPost'=>          ['required', 'string', 'max:50'],
            'city'=>                ['required', 'string', 'max:50'],
            'gender'=>              ['required', 'string', 'max:50'],
        ]);
       // dd($validate);
        $id = $request->user_id ;
        $user = DB::table('users')
            ->where('id', $id)
            ->update($validate);
        if($user){
            $user = auth()->user();
            $result = $user->getOriginal();
            $user = (object)$result;
            session(['success'=> __('Изменения прошли удачно!'),
                'user' => $user,
            ]);
            return view('user.profile' , compact('user') );
        }else{
            redirect('HTTP_BAD_REQUEST');
        }
    }
}
