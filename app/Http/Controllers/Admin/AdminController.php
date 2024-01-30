<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function create_topic(){

        return view('admin.topic.create_topic');
    }
}
