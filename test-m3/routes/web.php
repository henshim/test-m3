<?php

use App\Http\Controllers\ShopController;
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

Route::get('/',[ShopController::class,'index'])->name('shop.list');

Route::prefix('shop')->group(function (){
    Route::get('/',[ShopController::class,'index'])->name('shop.list');

    Route::get('/add',[ShopController::class,'add'])->name('shop.add');

    Route::post('/store',[ShopController::class,'store'])->name('shop.store');

    Route::get('/update/{id}',[ShopController::class,'update'])->name('shop.update');

    Route::post('/edit',[ShopController::class,'edit'])->name('shop.edit');

    Route::get('/delete/{id}',[ShopController::class,'delete'])->name('shop.delete');

    Route::post('/search',[ShopController::class,'search'])->name('shop.search');
});
