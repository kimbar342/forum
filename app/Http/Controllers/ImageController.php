<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $avatar = $request->file('avatar')->store('uploads', 'public');
        $result = explode('/', $avatar);
        $avatar = end($result);
        $user = DB::table('users')->where('id', session('user')->id)->update(['avatar' => $avatar]);

        if ($user) {
            $user = auth()->user();
            $result = $user->getOriginal();
            $user = (object)$result;
            session(['success' => __('Изменения прошли удачно!'),
                'user' => $user,
            ]);
            return view('user.profile', compact('user'));
        } else {
            redirect('HTTP_BAD_REQUEST');
        }
    }
}
