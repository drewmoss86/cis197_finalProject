<?php
use Illuminate\Support\Facades\Input;
use App\Resource;

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

//main page --> cimt.com
Route::redirect('/', '/login');
Route::get('/main', 'MainController@index')->name('main');

Route::get('/login', 'Auth\LoginController@index');
Route::post('login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Auth::routes();

Route::any('/resources/search', 'ResourcesController@search');
Route::get('/resources/report', 'ResourcesController@report');

Route::resource('resources', 'ResourcesController');
// Route::get('/resources', 'ResourcesController@show');
Route::post('/resources', 'ResourcesController@store');


//shortcut for creating routes for CRUD --> cimt.com/
Route::resource('incidents', 'IncidentsController');
Route::post('/incidents', 'IncidentsController@store');
