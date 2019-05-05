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
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/dashboard');
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
    ///permintaan-bagian-priv
    Route::get('/permintaan/form','PermintaanController@create')->name('permintaan.form')->middleware('bagian');
    Route:: get('/permintaan/{bagian}/list','PermintaanController@indexBagian')->name('bagian.permintaan.index');
    Route::get('/permintaan/{bagian}/{id}/edit','PermintaanController@editPermintaan')->name('permintaan.edit');
    Route::delete('/permintaan/{id}/delete','PermintaanController@deletePermintaan')->name('permintaan.delete');
    Route::post('/permintaan/{id}/update','PermintaanController@updatePermintaan')->name('permintaan.update');
    Route::post('/permintaan/add','PermintaanController@save')->name('permintaan.add')->middleware('bagian');
    ///
    
    Route::get('/permintaan/{id}','PermintaanController@detail')->name('permintaan.detail');
    
    Route::get('/table/permintaan','PermintaanController@dataTable')->name('permintaan.table');

    #-------------------------------
    //Disposisi
    Route::get('/disposisi/form','DisposisiController@form_handling')->name('disposisi.form');
    Route::get('/disposisi','DisposisiController@daftar')->name('disposisi.list');
    Route::get('/disposisi/detail/{id}','DisposisiController@detail')->name('disposisi.detail');
    Route::post('/disposisi/store','DisposisiController@store')->name('disposisi.store');
    Route::get('/disposisi/tableMasuk','DisposisiController@tableMasuk')->name('disposisi.tableMasuk');


    #-------------------------------
    //Paket
    Route::get('/paket/pejabat_form','PaketController@penanggungJawabForm')->name('pejabat.form');
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
    Route::get('/user/register/form','UserController@registerUserForm')->name('user.form.register');
    Route::post('/user/postregister','UserController@storeRegister')->name('user.post.register');
    Route::get('/table/user','UserController@tableUser')->name('table.user');
    #-------------------------------
    //Handling  Project setting
    Route::get('/project','ProjectController@index')->name('project.index');
    Route::get('/project/form','ProjectController@form')->name('project.form');
    Route::get('/project/{id}/enrollment','ProjectController@enroll')->name('project.enroll');
    Route::get('/table/project','ProjectController@tableProject')->name('table.project');
    Route::post('/project/enrollment/{id}/store','ProjectController@store_Enrollment'); 
    Route::post('/project/store','ProjectController@store_Project');
    
    

    Route::get('/pejabat/setting','UserSettingController@getPejabatSetting');

});
