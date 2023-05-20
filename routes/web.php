<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('welcome',[UsersController::class,'index']);
Route::post('addUser',[UsersController::class,'addUser']);
Route::get('edituser/{id}',[UsersController::class,'edituser']);
Route::post('updateUser',[UsersController::class,'updateUser']);
Route::get('deleteuser/{id}',[UsersController::class,'deleteuser']);
Route::get('softdelete/{id}',[UsersController::class,'softdelete']);
Route::get('/', function () {
    return view('login');
});

Route::post('/checklogin', [MainController::class, 'checklogin']);
