<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
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
// 
 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::match(['get', 'post'],'/search/plate', [HomeController::class,'searchPlate'])->name('searchPlate');
Route::match(['get', 'post'],'/search/chasis', [HomeController::class,'searchChasis'])->name('searchChasis');
Route::match(['get', 'post'],'/search/tel', [HomeController::class,'searchTel'])->name('searchTel');
Route::match(['get', 'post'],'/search/name', [HomeController::class,'searchName'])->name('searchName');
Route::match(['get', 'post'],'/search/ro',['uses'=>'HomeController@searchRO','as'=>'searchRO']);

Route::get('/car/create', [HomeController::class,'carCreate'])->name('carCreate');
Route::get('/customer/create', [HomeController::class,'customerCreate'])->name('customerCreate');
Route::get('/ro/{car_id}/create', [HomeController::class,'ROCreate'])->name('ROCreate');

Route::get('/ro/{ro_id}/edit', [HomeController::class,'ROEdit'])->name('ROEdit');
Route::get('/ro/{cust_id}/{car_id}/show', [HomeController::class,'ROShow'])->name('ROShow');
Route::post('/ro/update', [HomeController::class,'ROUpdate'])->name('ROUpdate');
Route::get('/ro/{roID}/print', [HomeController::class,'print'])->name('ROPrint');

Route::post('/car/store', [HomeController::class,'carStore'])->name('carStore');
Route::post('/customer/store', [HomeController::class,'customerStore'])->name('customerStore');
Route::post('/ro/store', [HomeController::class,'ROStore'])->name('ROStore');
Route::post('/complaint/store', [HomeController::class,'complaintStore'])->name('complaintStore');


Route::get('/car/{cust_id}/show', [HomeController::class,'carShow'])->name('carShow');
Route::get('/complaint/{ro_id}/show', [HomeController::class,'complaintsShow'])->name('complaintsShow');
Route::get('/complaint/{complaint_id}/edit', [HomeController::class,'complaintsEdit'])->name('complaintsEdit');
Route::post('/complaint/update', [HomeController::class,'complaintsUpdate'])->name('complaintsUpdate');
Route::get('/complaint/{ro_id}/more', [HomeController::class,'complaintsMore'])->name('complaintsMore');
Route::post('/complaint/more/store', [HomeController::class,'complaintsMoreStore'])->name('complaintsMoreStore');

Route::get('/user/create', [HomeController::class,'userCreate'])->name('userCreate');
Route::post('/user/store', [HomeController::class,'userStore'])->name('userStore');
Route::get('/user/{id}/edit', [HomeController::class,'userEdit'])->name('userEdit');
Route::post('/user/update', [HomeController::class,'userUpdate'])->name('userUpdate');

//Route::get('/vin/check', 'HomeController@vinCheck'[HomeController::class,'index'])->name('vinCheck');
Route::get('vin/search',[HomeController::class,'searchForVIN'])->name('searchVIN');

Route::get('ro/status/show',[HomeController::class,'statusShow'])->name('status.show');
Route::get('ro/status/json',[ApiController::class,'statusJson'])->name('status.json');
Route::get('ro/status/change',[HomeController::class,'statusChange'])->name('status.change');

Route::get('ro/status/edit/{id}',[HomeController::class,'statusEdit'])->name('status.edit');
Route::post('ro/status/update',[HomeController::class,'statusUpdate'])->name('status.update');

