<?php

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
Route::resource('companies', 'CompaniesController@show');

Route::middleware(['auth'])-> group(function (){
Route::resource('applications', 'ApplicationsController');
Route::resource('candidates', 'CandidatesController');

Route::resource('companies', 'CompaniesController');
Route::resource('Cv_folders', 'Cv_foldersController');
Route::resource('Cv_folderUsers', 'Cv_folderUsersController');
Route::resource('Cv_ids', 'Cv_idsController');
Route::resource('histories', 'HistoriesController');
Route::get('job_posts/create/{id?}', 'Job_postsController@create');
Route::resource('job_posts', 'Job_postsController');
Route::resource('job_postUsers', 'job_postUsersController');
Route::resource('users', 'UsersController');
});

Route::get('/]', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
