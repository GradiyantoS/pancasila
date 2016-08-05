<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::any('php_info', function () {
    return phpinfo();
});

// Filter

// Filter Insert Menu
Route::get('filter/filterInputMenu/{idaplikasi}', 'FilterController@filterInputMenu');

// Aplikasi
Route::get('filter/getAllDataAplikasi', 'FilterController@getAllDataAplikasi');
// Menu
Route::get('filter/getAllDataMenu', 'FilterController@getAllDataMenu');
// Level Jabatan
Route::get('filter/getAllDataLevelJabatan', 'FilterController@getAllDataLevelJabatan');
// Jabatan
Route::get('filter/getAllDataJabatan/{idLevelJabatan}', 'FilterController@getAllDataJabatan');
// Status
Route::get('filter/getAllDataStatus', 'FilterController@getAllDataStatus');



// Aplikasi
Route::any('aplikasi', function () {
    return view('pages.usermanagement.aplikasi');
});
Route::get('aplikasi/getAllData/{page}', 'AplikasiController@getAllData');
Route::get('aplikasi/getAllDataUpdate/{id}', 'AplikasiController@getAllDataUpdate');
Route::post('aplikasi/action','AplikasiController@action');

// Menu
Route::any('menu', function () {
    return view('pages.usermanagement.menu');
});
Route::get('menu/getAllData/{idaplikasi}', 'MenuController@getAllData');
Route::get('menu/getAllDataUpdate/{id}', 'MenuController@getAllDataUpdate');
Route::get('menu/delete/{id}', 'MenuController@deleteData');
Route::get('menu/up/{id}', 'MenuController@moveUp');
Route::get('menu/down/{id}', 'MenuController@moveDown');
Route::post('menu/action','MenuController@action');

// Widget
Route::any('widget', function () {
    return view('pages.usermanagement.widget');
});
Route::get('widget/getAllData/{idaplikasi}', 'WidgetController@getAllData');
Route::get('widget/getAllDataUpdate/{id}', 'WidgetController@getAllDataUpdate');
Route::get('widget/delete/{id}', 'WidgetController@deleteData');
Route::get('widget/up/{id}', 'WidgetController@moveUp');
Route::get('widget/down/{id}', 'WidgetController@moveDown');
Route::post('widget/action','WidgetController@action');

// Jabatan
Route::any('jabatan', function () {
    return view('pages.usermanagement.jabatan');
});
Route::post('jabatan/getAllData', 'JabatanController@getAllData');
Route::get('jabatan/getMenuChild/{id}', 'JabatanController@getMenuChild');
Route::get('jabatan/getAllDataUpdate/{id}', 'JabatanController@getAllDataUpdate');
Route::get('jabatan/getAllDataUpdateHakAkses/{id}', 'JabatanController@getAllDataUpdateHakAkses');
Route::post('jabatan/action','JabatanController@action');
Route::post('jabatan/actionHakAkses','JabatanController@actionHakAkses');

// Karyawan
Route::any('karyawan', function () {
    return view('pages.usermanagement.karyawan');
});
Route::post('karyawan/getAllData/', 'KaryawanController@getAllData');
Route::get('karyawan/getAllDataUpdate/{id}', 'KaryawanController@getAllDataUpdate');
Route::get('karyawan/getAllDataUpdateHistoriJabatan/{id}', 'KaryawanController@getAllDataUpdateHistoriJabatan');
Route::post('karyawan/action','KaryawanController@action');

// Program Studi
Route::any('program-studi', function () {
    return view('pages.program-studi');
});
Route::get('ProgramStudi/getAllData/{page}', 'ProgramStudiController@getAllData');
Route::get('ProgramStudi/getAllDataUpdate/{id}', 'ProgramStudiController@getAllDataUpdate');
Route::post('ProgramStudi/action','ProgramStudiController@action');

// change password
Route::any('change-password', function () {
    return view('pages.usermanagement.change-password');
});







//Route::get('user/profile', ['as' => 'profile','uses' => 'ProductController@index']);
//Route::get('profileku' , 'ProductController@show')->name('profileku');

Route::resource('photo', 'PhotoController');

/*$url = route('profile');

Route::get('profileku', function () {
    return redirect()->route('profile');
});*/