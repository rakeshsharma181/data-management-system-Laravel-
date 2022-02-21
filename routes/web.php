<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('login');
});


    Route::post('submit',[Users::class,'login']);
    Route::group(['middleware'=>'admin_auth'],function (){
    Route::view('admin','admin');
    Route::view('form','form');
    Route::post('create',[users::class,'create']);
    Route::get('list',[users::class,'list']);
    Route::get('edit/{id}',[users::class,'edit']);
    Route::post('edit/update/{id}',[Users::class,'update']);
    Route::get('delete/{id}',[Users::class,'delete']);
    Route::get('download', [UserController::class,'export']);

    Route::post('add_category',[users::class,'add']);
    Route::get('list_category',[users::class,'list_category']);
    Route::get('edit_category/{id}',[users::class,'edit_category']);
    Route::post('update_category/{id}',[Users::class,'update_category']);
    Route::get('delete_category/{id}',[Users::class,'delete_category']);

    Route::post('add_product',[users::class,'add_product']);
    Route::get('list_product',[users::class,'list_product']);
    Route::get('edit_product/{id}',[users::class,'edit_product']);
    Route::post('update_product/{id}',[Users::class,'update_product']);
    Route::get('delete_product/{id}',[Users::class,'delete_product']);


});

Route::get('logout',function()
{
if(session()->has('admin_login'))
{
    session()->pull('admin_login');
}
return redirect('./');
});

Route::view('create_category','create_category');
Route::get('create_product',[users::class,'product']);


