<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/company', 'App\Http\Controllers\Auth\LoginController@showCompanyLoginForm');
Route::get('/login/staff', 'App\Http\Controllers\Auth\LoginController@showStaffLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegistrationForm');
Route::get('/register/company', 'App\Http\Controllers\Auth\RegisterController@showCompanyRegisterForm');
Route::get('/register/staff', 'App\Http\Controllers\Auth\RegisterController@showStaffRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/company', 'App\Http\Controllers\Auth\LoginController@companyLogin');
Route::post('/login/staff', 'App\Http\Controllers\Auth\LoginController@staffLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/company', 'App\Http\Controllers\Auth\RegisterController@createCompany');
Route::post('/register/staff', 'App\Http\Controllers\Auth\RegisterController@createStaff');

Route::view('/home', 'home')->middleware('auth');

Route::view('/admin', 'home');
Route::view('/company', 'home');
Route::view('/staff', 'home');

Route::get('/logout', function () {
    return view('home');
});



