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
/**
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', 'PagesControllers@index'); 

Route::get('/adminSignIn', 'PagesControllers@adminSignIn'); 

Route::get('/patientSignIn', 'PagesControllers@patientSignIn'); 

Route::get('/doctorSignIn', 'PagesControllers@doctorSignIn'); 
Route::get('/specialist', 'PagesControllers@doctorRegister'); 


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Specialist Routes
Route::view('specialist/register','auth.specialist-register')->name('specialist.register');
Route::post('specialist/register','SpecialistRegisterController@specialistRegister')->name('specialist.register');
Route::get('/profile','SpecialistController@index')->middleware('specialist');
Route::post('profile/avatar','SpecialistController@avatar')->name('avatar');

Route::post('profile/create','SpecialistController@store')->name('profile.store');
Route::get('/profile/create','SpecialistController@create')->name('profile.view');

Route::get('/profile/patients','SpecialistController@patients')->middleware('specialist')->name('mypatients');
Route::get('/profile/changepassword','SpecialistController@changePasswordForm')->middleware('specialist')->name('changepassword');
Route::post('/profile/changepassword','SpecialistController@changePassword')->middleware('specialist')->name('changepassword');


//Patient Route
Route::get('/dashboard','PatientController@index')->middleware('patient');