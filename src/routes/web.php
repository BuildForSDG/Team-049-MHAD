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
Route::post('/adminSignIn', 'adminControllers@adminSignIn');
Route::get('/adminReset', 'adminControllers@ResetRequest');
Route::POST('/adminReset', 'adminControllers@adminReset');

Route::get('/patientSignIn', 'PagesControllers@patientSignIn')->name('patientSignin'); 
Route::post('/patientSignIn', 'PatientController@patientSignIn');
Route::get('/patientReset', 'PatientController@ResetRequest');
Route::POST('/patientReset', 'PatientController@patientReset');

Route::get('/doctorSignIn', 'PagesControllers@doctorSignIn')->name('specialistLogin');
Route::POST('/doctorSignIn', 'SpecialistController@specialistSign');
Route::get('/doctorReset', 'SpecialistController@ResetRequest');
Route::POST('/doctorReset', 'SpecialistController@specialistReset');

Route::get('/specialist', 'PagesControllers@doctorRegister')->name('specialistRegister'); 
Route::POST('/specialist', 'SpecialistController@specialistRegister');

Route::POST('/phq9', 'PatientsPHQControllers@store'); 

Route::get('/Admin', 'backendControllers@dashboad');
Route::get('/logout', 'backendControllers@logout')->name('logout');

Route::middleware('specialist')->group(function () {
    Route::get('/profile', 'SpecialistController@profile')->name('specialistProfile');
    Route::post('/profile', 'SpecialistController@profileUpdate');
    Route::get('/reset', 'SpecialistController@reset');
    Route::post('/reset', 'SpecialistController@resetUpdate');

    Route::resource('/patient', 'PatientManagementControllers');
    Route::get('/patient', 'PatientManagementControllers@index')->name('record');
    Route::get('/phq9', 'PatientManagementControllers@phq9Results')->name('phq9');
    Route::get('/patientprofile', 'PatientManagementControllers@patientProfile');

    Route::resource('treatment', 'PatientTreatmentControllers@index'); 
    Route::get('/tcreate', 'PatientTreatmentControllers@create')->name('addtreatment');
    Route::get('/treatment', 'PatientTreatmentControllers@show')->name('treatments');
    Route::post('/tcreate', 'PatientTreatmentControllers@storeTreatment');
    Route::resource('tsearch', 'PatientTreatmentControllers@search');

    Route::get('newschedule', 'PatientFollowUpControllers@create')->name('newschedule');
    Route::post('/newschedule', 'PatientFollowUpControllers@store');
    Route::get('schedule', 'PatientFollowUpControllers@show')->name('schedules');


    Route::resource('complaintsearch', 'PatientComplaintControllers@search');
    Route::get('complaint', 'PatientComplaintControllers@show')->name('complains');
});
Route::middleware('patient')->group(function () {
    Route::get('/myprofile', 'PatientController@profile');
    Route::get('/preset', 'PatientController@reset');
    Route::post('/preset', 'PatientController@resetUpdate');
});
Route::middleware('admin')->group(function () {
    Route::get('/myprofile', 'PatientController@profile');
    Route::get('/preset', 'PatientController@reset');
    Route::post('/preset', 'PatientController@resetUpdate');
}); 

Route::get('newcomplain', 'PatientComplaintControllers@create')->name('newcomplain');
Route::post('/newcomplain', 'PatientComplaintControllers@store');
