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


//Route::resource('Companies', 'Companies/CompaniesController@show', ['only' => [
//    'index', 'show'
//]]);
Route::get('/UserHome', function () {
    return view('pages.userhome');

});

//Route::get('companies/{id?}', function ($id){
//    route('CompaniesController'). $id ;
//});

Route::middleware(['auth'])->group(function () {
    Route::resource('applications', 'ApplicationsController');
    Route::resource('candidates', 'CandidatesController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('CvFolders', 'CvFoldersController');
    Route::resource('CvFolderUsers', 'CvFolderUsersController');
    Route::resource('CvUsers', 'CvUsersController');
    Route::resource('Histories', 'HistoriesController');
    Route::get('jobposts/create/{id?}', 'JobPostsController@create');
    Route::resource('/jobposts', 'JobPostsController');
    Route::resource('JobPostUsers', 'JobPostUsersController');
    Route::resource('user', 'UsersController');



    Route::get('/jobposts.waiting/{id?}', 'JobPostsController@indexWaiting');
    Route::get('/users/index/', 'UsersController@index');
    Route::get('/jobposts.approved/{id?}', 'JobPostsController@indexapproved');
    Route::post('jobposts.approval/approved', [
        'as'=>'jobposts.approved',
        'uses'=> 'JobPostsController@approved'
    ]);

    //    Route::post('jobposts.approval/rejected', [
//        'as'=>'jobposts.rejected',
//        'uses'=> 'JobPostsController@rejected'
//    ]);


});

Route::get('/]', function () {
    return view('welcome');
});
Route::get('/login]', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('test/aka/{param}', 'Test\TestController@amghezi');
Route::resource('test', 'Test\TestController');

Route::get('/app', function () {
    return view('layouts.testarea');
});