<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function comments_edit(Request $request)
    {
        $path = $request->getPathInfo();

        $id = $request->delete;
        $id_topic = $request->topic;
        $comment = DB::table('comments')->where('id', [$id])->delete();
        return redirect("topic/{$id_topic}")->with('action', 'edit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function comments_destroy(Request $request)
    {
        $id = $request->delete;
        $id_topic = $request->topic;
        $comment = DB::table('comments')->where('id', [$id])->delete();
        return redirect("topic/{$id_topic}");
    }


    public function save_comment(Request $request)
    {
        $id_topic = $request->topic;
        $comment = $request->message;
        $id = $request->edit;
        $comment = DB::update("update `comments` SET `comment` = '{$comment}' WHERE `id` = {$id}");
        return redirect("topic/{$id_topic}");

    }

    public function add_comment(Request $request)
    {
        $user_id = $request->userId;
        $topic_id = $request->topicId;
        $published_at = now();
        $active = $request->active;
        $comment = $request->text;
        $comment = DB::insert("INSERT INTO `comments`( `user_id`, `topic_id`, `comment`, `published_at`, `active`) VALUES ({$user_id}, {$topic_id},'{$comment}','{$published_at}','{$active}')");
        return redirect("topic/{$topic_id}");

    }
}
