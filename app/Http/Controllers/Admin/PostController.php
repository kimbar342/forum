<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return 'Список постов admin';
    }

    public function create(){
        return 'Создние постов admin';
    }
    public function store(Request $request){
        return 'Добавление постов admin';
    }
    public function show(string $post){
        return "Показ поста {$post} admin";
    }
    public function edit(string $post){
        return "Редактирование постов {$post} admin";
    }
    public function update(Request $request, string $post){
        return "Обновление постов admin";
    }
    public function like(){
        return 'Поставить лайк посту admin';
    }
    public function delete(string $post){
        return 'Удалить пост admin';
    }
}
