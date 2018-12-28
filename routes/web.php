<?php


Route::get('/', 'LoginController@index')->name('login.form');
Route::Post('/login', 'LoginController@login')->name('login');

Route::middleware('auth')->group(function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('department','DepartmentController');

    Route::post('logout',function (){
        auth()->logout();
        return redirect()->to('/');
    })->name('logout');


});






