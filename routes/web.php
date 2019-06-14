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
    
})->middleware('auth');
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
    Route::get('/disposisi/masuk','DisposisiController@disposisiMasuk')->name('disposisi.masuk');
    Route::get('/disposisi/diteruskan','DisposisiController@disposisiDiteruskan')->name('disposisi.diteruskan');
    Route::get('/disposisi/tableMasuk','DisposisiController@tableMasuk')->name('disposisi.tableMasuk');


    #-------------------------------
    //Paket
    Route::get('/paket/pejabat_form','PaketController@penanggungJawabForm')->name('pejabat.form');
    Route::get('/paket','PaketController@index')->name('paket.index');
    Route::get('/paket/{person}','PaketController@indexMe')->name('paket.index.me');

    Route::get('/table/paket','PaketController@paketTable')->name('table.paket');
    //Route::get('/paket/detail/{id}','PaketController@detailTemp');
    Route::get('/paket/{id}/detail','PaketController@detail')->name('paket.detail');
    //handling jadwal
    Route::get('/paket/{id}/pilih_kegiatan','PaketController@kegiatan')->name('paket.pilihKegiatan');
    Route::post('/paket/{id}/kegiatan/store','PaketController@kegiatanStore')->name('paket.pilihKegiatan.store');
    Route::get('/paket/{id}/jadwal','PaketController@jadwalIndex')->name('paket.jadwal');
    Route::post('/paket/{id}/jadwal/store','PaketController@jadwalStore')->name('paket.jadwal.store');
    //persiapan
    Route::get('/paket/{id}/persiapan','PaketController@persiapan')->name('paket.persiapan');
    Route::get('/paket/{id}/detail/spesifikasi','PaketController@spesifikasi')->name('paket.detail.spek');
    Route::post('/paket/{id}/spesifikasi/store','PaketController@spesifikasiStore')->name('paket.detail.spek.store');
    Route::get('/paket/{id}/detail/hps','PaketController@hps')->name('paket.detail.hps');
    Route::post('/paket/{id}/hps/store','PaketController@hpsStore')->name('paket.detail.hps.store');

    
    
    //penawaran
    Route::get('/paket/{id}/pembukaan','PaketController@pembukaan')->name('paket.pembukaan');
    Route::get('/paket/{id}/detail/penyedia','PaketController@formPenyedia')->name('paket.detail.penyedia');
    Route::post('/paket/{id}/penyedia/store','PaketController@storePenyedia')->name('paket.detail.penyedia.store');
    Route::get('/paket/{id}/detail/jadwal_penawaran','PaketController@jadwalPenawaran')->name('paket.detail.jadwal_penawaran');
    Route::post('/paket/{id}/jadwal_penawaran/store','PaketController@jadwalPenawaranStore')->name('paket.jadwal_penawaran.store');

    Route::get('/paket/{id}/detail/klarifikasi_teknis','PaketController@klarifikasi_teknis')->name('paket.detail.klarifikasi_teknis');
    Route::post('/paket/{id}/klarifikasi_teknis/store','PaketController@klarifikasi_teknis_store')->name('paket.klarifikasi_teknis.store');
    Route::get('/paket/{id}/detail/evaluasi_penawaran','PaketController@formPembukaanPenawaran')->name('paket.detail.pembukaan_evaluasi');


    Route::post('/paket/pejabat/{id}/store','PaketController@pjStore')->name('pejabat.store');
    Route::post('/paket/store_kak','PaketController@storeKak');
     
    #-------------------------------
    //berkas
    Route::get('berkas/{id}/bahps','BerkasController@generateBahps')->name('doc.bahps');
    Route::get('berkas/{id}/spek_teknis','BerkasController@generateSpesifikasi')->name('doc.spekTeknis');
    Route::get('berkas/{id}/permohonan','BerkasController@generatePermohonanPengadaan')->name('doc.permohonan');
    Route::get('berkas/{id}/undangan','BerkasController@generateUndanganPengadaan')->name('doc.undangan');

    //Route::get('/paket/{id}/detail');
    #-------------------------------
    //Handling doc
    Route::get('/generate-docx', 'DokumenController@generateDocx');
    Route::get('/generate-temp', 'DokumenController@generateTemp');
    Route::get('/generate-excel', 'DokumenController@generateExcel');
    Route::post('/store_temp', 'DokumenController@storeTemplate')->name('temp.docx');
    Route::post('/hps/save','DokumenController@storeHps')->name('hps.save');

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
    Route::get('/table/bagian','UserController@tableBagian')->name('table.bagian');
    Route::get('/available/user/{project}','UserController@availableUser');
 
    
    #-------------------------------
    //Handling  Project
    Route::get('/project','ProjectController@index')->name('project.index');
    Route::get('/project/form','ProjectController@form')->name('project.form');
    Route::get('/project/{id}/enrollment','ProjectController@enroll')->name('project.enrollment');
    Route::get('/table/project','ProjectController@tableProject')->name('table.project');
    Route::get('/available/user/{id}/pp','ProjectController@pp_available');
    Route::get('/available/user/{id}/ppk','ProjectController@ppk_available');

    Route::post('/project/enrollment/{id}/store','ProjectController@store_Enrollment'); 
    Route::post('/project/store','ProjectController@store_Project');
    Route::post('/project/update_active','ProjectController@update_Project');
    Route::post('/project/enrollment/save','ProjectController@add_user_Project');
     
    

    //Route::get('/pejabat/setting','UserSettingController@getPejabatSetting');

    Route::view('/temp_hps', 'Document.hps_form');


 

});
