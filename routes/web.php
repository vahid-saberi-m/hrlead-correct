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
Route::get('/home',  function () {
    return view('public.public');

});


Route::get('/public/jobpost/{jobpost}', 'CandidatesController@PublicShow');

Route::get('/public/{company}', 'CompaniesController@PublicShow');
$s = 'social.';
Route::get('/social/redirect/{provider}', ['as' => $s . 'redirect', 'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => $s . 'handle', 'uses' => 'Auth\AuthController@getSocialHandle']);
Route::get('/applications/{jobpost}/', 'ApplicationsController@store')->name('application.store');
Route::post('/candidate/exists/{jobpost}/{candidate}', 'CandidatesController@existApply')->name('candidate.existApply');
Route::post('/candidate/new/{jobpost}', 'CandidatesController@newApply')->name('candidate.newApply');
Route::post('/candidate/checkemail/{jobpost}', 'CandidatesController@checkEmail')->name('candidate.checkemail');
Route::get('/email/{candidate}/{jobpost}', 'EmailsController@sendEmail');
Route::get('/apps/show/{application}/', 'ApplicationsController@showApplication');
Route::post('/companies/{company}', 'CompaniesController@update')->name('company.update');

Route::middleware(['auth'])->group(function () {
    Route::resource('applications', 'ApplicationsController');
    Route::resource('candidates', 'CandidatesController');
    Route::resource('CvFolders', 'CvFoldersController');
    Route::resource('CvFolderUsers', 'CvFolderUsersController');
    Route::resource('CvUsers', 'CvUsersController');
    Route::resource('Histories', 'HistoriesController');
    Route::get('jobposts/create/{id?}', 'JobPostsController@create');
    Route::resource('/jobposts', 'JobPostsController');
    Route::resource('JobPostUsers', 'JobPostUsersController');
    Route::resource('user', 'UsersController');
    Route::get('application/{application}/{cvfolder}', 'ApplicationsController@changeCvFolder')->name('application.changeCvFolder');
    Route::resource('questions', 'QuestionsController');
});

Route::group(['middleware'=>['auth','isAdmin']],function () {
    Route::resource('companies', 'CompaniesController');
//    Route::patch('users/{user}/rejected', 'UsersController@rejected')->name('users.rejected')->middleware('isCompanyUser');
    Route::post('/users/{user}/approval', 'UsersController@approval')->name('users.approval')->middleware('isCompanyUser');
    Route::get('/users/index/', 'UsersController@index');
    Route::get('/jobposts.waiting/{id?}', 'JobPostsController@indexWaiting');
    Route::get('/jobposts.approved/{id?}', 'JobPostsController@indexapproved');
    Route::post('jobposts/{jobpost}/approval', 'JobPostsController@approval')->name('jobposts.approved')->middleware('IsCompanyJobPost');
    Route::get('jobposts/{jobpost}/delete', 'JobPostsController@delete')->name('jobposts.rejected')->middleware('IsCompanyJobPost');
    Route::get('jobposts/{jobpost}/expire', 'JobPostsController@expire')->name('jobposts.expire')->middleware('IsCompanyJobPost');
    Route::patch('jobposts/{jobpost}/reactive', 'JobPostsController@reactive')->name('jobposts.reactive')->middleware('IsCompanyJobPost');
    Route::resource('events', 'EventsController');
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