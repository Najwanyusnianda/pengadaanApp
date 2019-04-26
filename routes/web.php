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
})->middleware('auth');


//Editor
Route::get('/editor', function () {
    return view('Editor.ckEditor');
    
})->middleware('guest');
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
    //Bagian (subject matter)
    Route::get('/bagian/index', 'BagianController@index')->name('bagian.index')->middleware('bagian');


    #-------------------------------   
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');
    #-------------------------------  
    //permintaan

    Route::get('/permintaan','PermintaanController@index')->name('permintaan.list');
    Route::get('/permintaan/form','PermintaanController@create')->name('permintaan.form');
    Route::get('/permintaan/{id}','PermintaanController@detail')->name('permintaan.detail');
    Route::post('/permintaan/add','PermintaanController@save')->name('permintaan.add');
    Route::get('/table/permintaan','PermintaanController@dataTable')->name('permintaan.table');

    #-------------------------------
    //Disposisi
    Route::get('/disposisi/form','DisposisiController@form_handling')->name('disposisi.form');
    Route::get('/disposisi','DisposisiController@daftar')->name('disposisi.list');
    Route::get('/disposisi/detail/{id}','DisposisiController@detail')->name('disposisi.detail');
    Route::post('/disposisi/store','DisposisiController@store')->name('disposisi.store');

    #-------------------------------
    //Paket
    Route::get('/paket','PaketController@index')->name('paket.index');
    Route::get('/paket/1/detail','PaketController@detail')->name('paket.detail');
    #-------------------------------
    //Handling doc
    Route::get('/generate-docx', 'DokumenController@generateDocx');
    Route::get('/generate-temp', 'DokumenController@generateTemp');
    Route::post('/store_temp', 'DokumenController@storeTemplate')->name('temp.docx');

    #-------------------------------
    //Handling template

    Route::get('/temp_template', function () {
        return view('Template.temp_template');
        
    });


    Route::get('/generate-pdf', 'PdfController@export_pdf');

    #-------------------------------
    //Handling notifikasi
    Route::get('/markAsRead', 'NotificationController@readNotif');

    #-------------------------------
    //Handling user
    Route::get('/user/list','UserController@index')->name('user_list.index');
    Route::get('/user/list_bagian','UserController@indexBagian')->name('user_list.indexBagian');


    

});
