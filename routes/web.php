<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{name}', static function (string $name): string {
    return("Welcome, {$name}! <br> <br> News Agregator Project info. <br> <br>
           Lorem ipsum dolor sit amet,
    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
     mollit anim id est laborum.");
});

Route::get('/info/{project}', static function (string $project): string {
    return("{$project} info. <br> <br> Lorem ipsum dolor sit amet,
    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
     mollit anim id est laborum.");
});

//---------------------- News ------------------------------------------------


/*Route::get('/news/{title}', static function (string $title): string {

    return("{$title}  <br> <br> At vero eos et accusamus et iusto odio dignissimos ducimus qui
    blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
    excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia
    deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis
    est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
    nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda
    est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum
    necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
    Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores
    alias consequatur aut perferendis doloribus asperiores repellat.");
});*/

Route::get('/newsId/{id}', static function (int $id): string {

    return "News with #ID {$id}";
});

Route::group(['prefix' => "news"], function(){

    Route::get('list', [NewsController::class, 'index'])
        ->name('news.index');

    Route::get('{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
            ->name('news.show');

    Route::get('categories/list', [CategoryController::class, 'index'])
        ->name('news.categories');

    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
        ->where('id', '[1-9]+')
            ->name('news.categories');

});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::resource('categories', AdminCategoryController::class);
//        ->name('news');

    Route::resource('news', AdminNewsController::class);
        //->name('news.show');

});

Route::get('/welcome', [WelcomeController::class, 'index']);

