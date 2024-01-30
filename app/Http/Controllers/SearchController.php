<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function show_topic(Request $request)
    {
        $search = $request->topic;

        $topic = (object)DB::select("select * from topics where title LIKE '%".$search."%'");
        return view('search.show_topic', compact('topic'));
    }


    public function show_worker(Request $request)
    {
        $search = $request->worker;
        $worker = (object)DB::select("select * from users where last_name LIKE '%".$search."%' ");
        return view('search.show_worker', compact('worker'));
    }


    public function show_post(Request $request)
    {
        $search = $request->post;
        $post = (object)DB::select('select * from users where post= ?' ,[$search]);
        return view('search.show_post', compact('post'));
    }
}
