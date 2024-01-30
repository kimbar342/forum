<?php
/**
 * Admin
 *
 */

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->middleware(['auth', 'active'])->group(function (){
    Route::get('posts', [PostController::class , 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class , 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('post');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('posts.like')->whereNumber('post');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->whereNumber('post');
    Route::get('admin/panel' , [SiteController::class, 'admin_panel'])->name('admin_panel.index');
    Route::get('admin/create/topic' , [AdminController::class, 'create_topic'])->name('topic.create_topic');
    Route::post('topic/delete', [TopicController::class , 'delete'])->name('topic_delete');
    Route::post('topic/edit', [TopicController::class , 'edit_topic'])->name('edit_topic');
    Route::post('topic/update', [TopicController::class , 'update'])->name('update');
    Route::post('topic/save/admin', [TopicController::class , 'save_edit_topic_admin'])->name('save_edit_topic_admin');
    Route::get('topic/edit', [TopicController::class , 'edit_topic'])->name('edit_topic');
    Route::post('topic/store_admin', [TopicController::class, 'store_admin'])->name('topic.store_admin')  ;
});
