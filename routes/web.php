<?php

declare(strict_types=1);

use App\Http\Controllers\NewsController;
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

//в данном случае метод get() - это не статический метод, а динамический.
// А Route - это ФАСАД (прослойка через кот. мы получаем объект singleton и обращаемся к конечному методу get() в нем)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function(string $name): string {
   return "Hello, {$name}";
});

Route::get('/info', static function(string $info): string {
    return "{$info}";
});

Route::group(['prefix' => ''], static function() { //группировка
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
        ->name('news.show');
});

