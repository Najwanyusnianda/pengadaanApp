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
//permintaan

Route::get('/permintaan','PermintaanController@index')->name('permintaan.list');
Route::get('/permintaan/form','PermintaanController@create')->name('permintaan.form');
Route::get('/permintaan/detail','PermintaanController@detail')->name('permintaan.detail');

Route::post('/permintaan/add','PermintaanController@save')->name('permintaan.add');

#-------------------------------
//Disposisi
Route::get('/disposisi','DisposisiController@daftar')->name('disposisi.list');

#-------------------------------
//Handling doc
Route::get('generate-docx', 'DokumenController@generateDocx');


