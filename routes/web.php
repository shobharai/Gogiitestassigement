<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userscontroller;

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


route::get('/',[userscontroller::class,'viewindex']);

route::any('savefromdata',[userscontroller::class,'savefromdata']);
route::get('fromlisting',[userscontroller::class,'fromlisting']);
route::get('index',[userscontroller::class,'index']);
route::get('editfrom/{id}', [userscontroller::class, 'editfrom']);
Route::post('/saveeditfrom', [userscontroller::class, 'saveeditfrom'])->name('save.edit');
Route::delete('/delete/{id}', [userscontroller::class, 'delete'])->name('delete.user');



