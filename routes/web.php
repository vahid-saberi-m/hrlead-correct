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

Route::get('/userhome', ['middleware' => 'isAdmin', function () {
    return view('pages.userhome');

}]);


Route::get('/public/{company}', 'CompaniesController@PublicShow');
$s = 'social.';
Route::get('/social/redirect/{provider}', ['as' => $s . 'redirect', 'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => $s . 'handle', 'uses' => 'Auth\AuthController@getSocialHandle']);
Route::get('/applications/{jobpost}/', 'ApplicationsController@store')->name('application.store');
Route::get('/application/{application}/', 'ApplicationsController@show')->name('application.show');
Route::post('/candidate/{jobpost}/', 'CandidatesController@store')->name('candidate.apply');
Route::get('/email/{candidate}/{jobpost}', 'EmailsController@sendEmail');

Route::middleware(['auth'])->group(function () {
    Route::resource('applications', 'ApplicationsController');
    Route::resource('candidates', 'CandidatesController');
    Route::resource('CvFolders', 'CvFoldersController');
    Route::resource('CvFolderUsers', 'CvFolderUsersController');
    Route::resource('CvUsers', 'CvUsersController');
    Route::resource('Histories', 'HistoriesController');
    Route::get('jobposts/create/{id?}', 'JobPostsController@create');
    Route::resource('/jobposts', 'JobPostsController')->middleware('IsCompanyJobPost');
    Route::resource('JobPostUsers', 'JobPostUsersController');
    Route::resource('user', 'UsersController');
    Route::get('application/{application}/{cvfolder}', 'ApplicationsController@changeCvFolder')->name('application.changeCvFolder');
});

Route::group(['middleware'=>['auth','isAdmin']],function () {
    Route::resource('companies', 'CompaniesController');
    Route::patch('users/{user}/rejected', 'UsersController@rejected')->name('users.rejected')->middleware('isCompanyUser');
    Route::patch('users/{user}/approved', 'UsersController@approved')->name('users.approved')->middleware('isCompanyUser');
    Route::get('/users/index/', 'UsersController@index');
    Route::get('/jobposts.waiting/{id?}', 'JobPostsController@indexWaiting')->middleware('IsCompanyJobPost');
    Route::get('/jobposts.approved/{id?}', 'JobPostsController@indexapproved')->middleware('IsCompanyJobPost');
    Route::patch('jobposts/{jobpost}/approved', 'JobPostsController@approved')->name('jobposts.approved')->middleware('IsCompanyJobPost');
    Route::patch('jobposts/{jobpost}/rejected', 'JobPostsController@rejected')->name('jobposts.rejected')->middleware('IsCompanyJobPost');
    Route::patch('jobposts/{jobpost}/expire', 'JobPostsController@expire')->name('jobposts.expire')->middleware('IsCompanyJobPost');
    Route::patch('jobposts/{jobpost}/reactive', 'JobPostsController@reactive')->name('jobposts.reactive')->middleware('IsCompanyJobPost');
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