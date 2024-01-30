<?php
/**
 * User
 *| index - вывод всех записей
 * | show - показ определенной записи
 * | create - форма создания записи
 * | store - обработка создания записи
 * | edit - форма редактирования записи
 * | update - обработка обновления редактируемой записи
 * | destroy - удаление записи
 */

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->as('user.')->middleware(['auth', 'active'])->group(function (){
    Route::get('posts', [PostController::class , 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class , 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('post');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('posts.like')->whereNumber('post');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->whereNumber('post');
    Route::get('{user}/profile', [SiteController::class  , 'profile'])->name('user_profile.profile');
    Route::get('page/{user}', [SiteController::class  , 'user_page'])->name('user_page.index');
    Route::get('show/user/page/{user_id}', [UserController::class  , 'show_user_page'])->name('show_user_page');
    Route::get('change/profile/edit', [UserController::class  , 'change_profile'])->name('change_profile');
    Route::post('save/data/change', [UserController::class  , 'save_data_change'])->name('save_data_change');
    Route::post('image/upload', [ImageController::class  , 'upload'])->name('upload');
    Route::get('message', [ChatController::class  , 'message'])->name('message');
    Route::get('all_user' , [UserController::class, 'index'])->name('all_user');
    Route::get('create_user' , [UserController::class, 'create'])->name('new_user');
    Route::get('edit/{id}', [UserController::class  , 'edit'])->name('edit');
    Route::post('destroy', [UserController::class  , 'destroy'])->name('destroy');
    Route::post('block', [UserController::class  , 'block'])->name('block');
    Route::post('unblock', [UserController::class  , 'unblock'])->name('unblock');
    Route::post('block/topic', [UserController::class  , 'block_topic'])->name('block_topic');
    Route::post('unblock/topic', [UserController::class  , 'unblock_topic'])->name('unblock_topic');
    Route::post('update', [UserController::class  , 'update'])->name('update');
    Route::post('update_user', [UserController::class, 'update_user_admin_panel'])->name('update_user');
});
