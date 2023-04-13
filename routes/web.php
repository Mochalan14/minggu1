<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Http\Middleware\EnsureAuthAdmin;
use App\Http\Middleware\EnsureAuthMember;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// });



Route::get('/', [HomeController::class, 'index']);

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/tentang', function(){return view('tentang');});
    Route::get('/minggu2', 'minggu2')->name('minggu2');
});




Route::middleware(EnsureAuthMember::class)->group(function () {
    Route::prefix('post')->name('post.')->group(function () {
    Route::get('/',[PublicPostController::class,'index'])->name('index');
    });
});

Auth::routes();
Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'tes'])->name('beranda');
Route::get('/teslogout', [App\Http\Controllers\HomeController::class, 'teslogout'])->name('teslogout');

// Route::middleware(EnsureAuthAdmin::class)->group(function(){
//     Route::controller(PostController::class)->group(function () {
//         Route::get('/post', 'index')->name('post.index');
//         Route::get('/post/create', 'create')->name('post.create');
//         Route::post('/post/store', 'store')->name('post.store');
//         Route::get('/post/edit/{id}', 'edit')->name('post.edit');
//         Route::put('/post/update/{id}', 'update')->name('post.update');
//         Route::post('/post/delete/{id}', 'delete')->name('post.delete');
//         Route::get('/post/category/{id}', 'category')->name('post.category');
        
//     });

//     Route::controller(KategoriController::class)->group(function(){
//         Route::get('/post/kategori/create','create')->name('kategori.create');
//     });
// });