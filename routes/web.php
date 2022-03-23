<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UserdetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TestController;
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





Auth::routes();
Route::get('/test/first','TestController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/userdetail', 'UserdetailController@index')->name('index');
Route::get('/userdetail','UserdetailController@create')->name('create');
Route::post('userdetail','UserdetailController@store')->name('store');



Route::group(['middleware' => ['auth','isAdmin']], function(){

    //Route::get('/dashboard', function () {
        //return view('admin.dashboard');
   // });
    Route::resource('/employee','AllusersController');
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
   Route::get('/admin.accountview', 'AdminController@adminacc')->name('adminacc');
   Route::POST('admin.accountview/{user}','AdminController@modify')->name('userrole.update');
   Route::get('admin.{user}/userrole-edit','AdminController@show')->name('userrole.edit');

    //Route::get('/admin/{id}/viewuser','AdminController@show')->name('userview');


    Route::get('/admin.position','PositionController@index');
    Route::get('/admin.position-create','PositionController@create')->name('pos-create');
    Route::post('/position','PositionController@store');
    Route::get('/admin.position','PositionController@view')->name('pos-view');
    Route::get('position/{position}/position-edit','PositionController@edit')->name('position.edit');
    Route::POST('position.update/{position}','PositionController@modify')->name('position.update');
    Route::POST('position.delete','PositionController@remove')->name('position.delete');


    Route::get('/admin.skills','SkillsController@index');
    Route::get('/admin.skills-create','SkillsController@create')->name('add-skills');
    Route::post('/skill','SkillsController@store');
    Route::get('/admin.skills','SkillsController@view');
    Route::get('skills/{skill}/skill-edit','SkillsController@edit')->name('skill-edit');
    Route::POST('skills/{skill}','SkillsController@modify')->name('skill-update');
    Route::POST('skills.delete','SkillsController@remove')->name('skill.delete');
});




