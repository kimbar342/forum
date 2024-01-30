<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TopicController;

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| index - вывод всех записей
| show - показ определенной записи
| create - форма создания записи
| store - обработка создания записи
| edit - форма редактирования записи
| update - обработка обновления редактируемой записи
| destroy - удаление записи
*/
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::redirect('/home', '/')->name('home.redirect');
Route::get('about', [SiteController::class, 'about'])->name('about.index');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function (){
    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::get('confirmation', [LoginController::class, 'confirmation'])->name('login.confirmation');
    Route::post('login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');
});



Route::middleware(['auth', 'active'])->group(function (){
    Route::get('hr', [SiteController::class, 'personnel_department'])->name('personnel_department.index');

    Route::post('registration/order', [SiteController::class, 'registration_order'])->name('registration_order');
});

Route::middleware(['auth', 'active'])->group(function (){
    Route::post('searching/topic', [SearchController::class, 'show_topic'])->name('show_topic')  ;
    Route::post('searching/worker', [SearchController::class, 'show_worker'])->name('show_worker')  ;
    Route::post('searching/post', [SearchController::class, 'show_post'])->name('show_post') ;


    Route::post('posts/edit', [CommentController::class, 'comments_edit'])->name('comments_edit')  ;
    Route::post('posts/destroy', [CommentController::class, 'comments_destroy'])->name('comments_destroy')  ;
    Route::post('posts/save', [CommentController::class, 'save_comment'])->name('save_comment')  ;

    Route::post('posts/add_comment', [CommentController::class, 'add_comment'])->name('add_comment')  ;

    Route::resource('topic', TopicController::class)->except('edit','destroy');

    Route::resource('blog', BlogController::class)->only([
        'index', 'show'
    ]);

    Route::post('chat/send', [ChatController::class, 'send'])->name('send');
    Route::get('chat/send', [ChatController::class, 'send'])->name('send');
    Route::post('create/chat', [ChatController::class, 'create_chat'])->name('create_chat');
});




/*Route::resource('posts/{post}/comments', CommentController::class)->only([
        'show', 'edit', 'create', 'store','update'
    ]);*/
