<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Список Постов в блоге';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Создать пост в блоге';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Добавить пост в блоге';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'Показать пост в блоге';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Редактировать пост в блоге';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'Обновить пост в блоге';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Удалить пост в блоге';
    }
}
