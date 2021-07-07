<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Route::get('/greetings', function(){
	return "hello world";
});

Route::get('/register', function(Request $req){
	// service container will automatically inject 
	//the incoming request into the closure when it is executed
	
	return view('register');
	
});

//Route::get('/practice','PracticeController@indexPractice'); //error binding
Route::get('/practice', [PracticeController::class,'indexPractice']); //laravel 8
	
//Route::post('practice', 'PracticeController@PracticeController')->name($name); //error binding
Route::post('/practice', [PracticeController::class,'storeDataPractice'])->name('store_data_practice');



//test-case, admin page
Route::get('/admin/admin_list_book', [AdminController::class,'listBook'])->name('admin_list_book');
Route::get('/admin/admin_add_book', [AdminController::class,'addBook'])->name('admin_add_book');
Route::post('/admin/admin_save_book', [AdminController::class,'saveBook'])->name('admin_save_book');
Route::get('/admin/admin_update_book/{id}', [AdminController::class,'updateBook'])->name('admin_update_book');
Route::post('/admin/admin_save_update_book', [AdminController::class,'saveUpdateBook'])->name('admin_save_update_book');
Route::get('/admin/admin_save_delete_book/{id}', [AdminController::class,'saveDeleteBook'])->name('admin_save_delete_book');

