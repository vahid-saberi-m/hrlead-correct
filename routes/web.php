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

Route::get('/UserHome', function () {
    return view('pages.userhome');

});

Route::get('/public/{company}', 'CompaniesController@PublicShow');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);
Route::get('/applications/{jobpost}/', 'ApplicationsController@store')->name('application.store');
Route::post('/candidate/{jobpost}/', 'CandidatesController@store')->name('candidate.apply');




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

//    Route::post('jobposts.approval/approved', [
//        'as'=>'jobposts.approved',
//        'uses'=> 'JobPostsController@approved'
//    ]);
//    Route::patch('jobposts.approval/approved', [
//        'as'=>'jobposts.approved',
//        'uses'=> 'JobPostsController@approved'
//    ]);

    Route::patch('jobposts/{jobpost}/approved', 'JobPostsController@approved')->name('jobposts.approved');
    Route::patch('jobposts/{jobpost}/rejected', 'JobPostsController@rejected')->name('jobposts.rejected');
    Route::patch('users/{user}/rejected', 'UsersController@rejected')->name('users.rejected');
    Route::patch('users/{user}/approved', 'UsersController@approved')->name('users.approved');



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