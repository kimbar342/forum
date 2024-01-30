<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_news = DB::select('select * from topics ORDER BY `published_at` desc');
        $all_news = (object)$all_news;
        return view('topic.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->request );
        $validate = $request->validate(
            [
                'title' => ['required', 'string', 'max:50'],
                'text' => ['required', 'string'],
            ]
        );

        $topic = Topic::query()->create([
             'title' => $validate['title'],
             'content' => $validate['text'],
             'user_id' => Auth::user()->id,
             'active' => 0,
        ]);
        return redirect('/');
    }

    public function store_admin(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => ['required', 'string', 'max:50'],
                'text' => ['required', 'string'],
            ]
        );
        $title = $validate['title'];
        $text = $validate['text'];
        $user_id = $request->id;
        $topic = DB::insert("INSERT INTO `topics`( `user_id`, `title`, `content` ) VALUES ('{$user_id}','{$title}','{$text}')");


        $all_news = DB::select("select * from topics ORDER BY `published_at` desc ");
        $all_news = (object)$all_news;
        return view('topic.index', compact('all_news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_topic_comment = DB::select("SELECT
        comments.id, `user_id`, `topic_id`, `comment`, users.active,`first_name`, `last_name`, `surname`, `email`,`position_in_office`,
                `avatar`,`root`,`published_at`
                 FROM comments, users WHERE users.id = `user_id` AND `topic_id` = ? ", [$id]);
        $post = DB::select('select * from topics where id = ? ', [$id]);

        $post = $post[0];
        return view('topic.show', compact('post', 'all_topic_comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function edit_topic(Request $request)
    {
        $topic = $request->edit;
        $sql = DB::select("SELECT * FROM topics WHERE id = ? ", [$topic]);
        $result = $sql[0];
        return view('topic.edit',compact('result'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $update_topic= $request->update;
        $update = DB::table('topics')->where('id', $update_topic)->update(['active' => 1]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {

         $id = $request->destroy;
         $result = DB::table('topics')->delete("{$id}");

        $all_news = DB::select("select * from topics ORDER BY `published_at` desc ");
        $all_news = (object)$all_news;
        return view('topic.index', compact('all_news'));
    }

    public function save_edit_topic_admin(Request $request)
    {
        $title = $request->title;
        $text = $request->text;
        $topic_id = $request->topic_id;

        $result = DB::update("UPDATE `topics` SET `title`='{$title}',`content`='{$text}' WHERE  `id` = '{$topic_id}'");


        $all_news = DB::select("select * from topics ORDER BY `published_at` desc ");
        $all_news = (object)$all_news;
        return view('topic.index', compact('all_news'));
    }



}
