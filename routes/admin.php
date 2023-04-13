<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\EnsureAuthAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureAuthAdmin::class)->group(function(){
    Route::controller(PostController::class)->group(function () {
        Route::get('/post', 'index')->name('post.index');
        Route::get('/post/create', 'create')->name('post.create');
        Route::post('/post/store', 'store')->name('post.store');
        Route::get('/post/edit/{id}', 'edit')->name('post.edit');
        Route::put('/post/update/{id}', 'update')->name('post.update');
        Route::post('/post/delete/{id}', 'delete')->name('post.delete');
        Route::get('/post/category/{id}', 'category')->name('post.category');
    });
    
    Route::controller(KategoriController::class)->group(function(){
        Route::get('/post/kategori/create','create')->name('kategori.create');
    });

});