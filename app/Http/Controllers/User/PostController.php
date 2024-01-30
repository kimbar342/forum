<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return 'Список постов';
    }

    public function create(){
        return 'Создние постов';
    }
    public function store(Request $request){
        return 'Добавление постов';
    }
    public function show(string $post){
        return "Показ поста {$post}";
    }
    public function edit(string $post){
        return "Редактирование постов {$post}";
    }
    public function update(Request $request, string $post){
        return "Обновление постов";
    }
    public function like(){
        return 'Поставить лайк посту';
    }
    public function delete(string $post){
        return 'Удалить пост';
    }
}
