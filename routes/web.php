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
    return view('Admin.layout');
});


//Editor
Route::get('/editor', function () {
    return view('Editor.ckEditor');
    
});
#-------------------------------
//autentikasi
Route::get('/login','AuthController@getLogin')->name('login')->middleware('guest');
Route::get('/register','AuthController@getRegister')->name('get.register')->middleware('guest');

Route::post('/register','AuthController@postRegister')->name('post.register')->middleware('guest');
Route::post('/login','AuthController@postLogin')->name('post.login')->middleware('guest');

Route::get('/logout','AuthController@logout')->name('logout')->middleware('auth');


#-------------------------------
Route::group(['middleware' => ['auth']], function () {
    #-------------------------------   
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');
    #-------------------------------  
    //permintaan

    Route::get('/permintaan','PermintaanController@index')->name('permintaan.list');
    Route::get('/permintaan/form','PermintaanController@create')->name('permintaan.form');
    Route::get('/permintaan/{id}','PermintaanController@detail')->name('permintaan.detail');

    Route::post('/permintaan/add','PermintaanController@save')->name('permintaan.add');

    #-------------------------------
    //Disposisi
    Route::get('/disposisi/form', function () {
        return view('Disposisi.disposisi_form');
    })->name('disposisi.form');
    Route::get('/disposisi','DisposisiController@daftar')->name('disposisi.list');

    Route::post('/disposisi/store','DisposisiController@store')->name('disposisi.store');

    #-------------------------------

    #-------------------------------
    //Handling doc
    Route::get('generate-docx', 'DokumenController@generateDocx');

});
