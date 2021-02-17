<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); //? Это стандартаня надпись и так делать не красиво


// Route::get('/', 'MainController@index') //? Так указывали метод до laravel 8

Route::get('/', [MainController::class, 'index']); //?Подкючаем контроллер в виде массива и первым параметром идет название и обозночение что это класс через : а вторым название метода который будет использовать
// Route::view('/', 'main.index');

//? Страница контакты
Route::get('/contacts', [MainController::class, 'contacts']);
Route::post('/contacts', [MainController::class, 'getContacts']);

Route::get('/sale', [StoreController::class, 'sale']);

Route::get('/reviews ', [ReviewController::class, 'reviews']);
Route::post('/reviews ', [ReviewController::class, 'getReviews']);

Route::get('/news', [NewsController::class, 'news']);


Route::get('/category/{slug}' ,[StoreController::class ,'category']);

Route::get('/product/{product:slug}' ,[StoreController::class ,'product']);
Route::post('/product/{slug}' ,[StoreController::class ,'getProductReview']);

Route::post('/cart/add' ,[CartController::class ,'add']);



Auth::routes();


//? admin panel
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/slider', SliderController::class);

});


//? File Server Manadger
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

