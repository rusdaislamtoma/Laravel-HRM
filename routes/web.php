<?php


Route::get('/', 'LoginController@index')->name('login.form');
Route::Post('/login', 'LoginController@login')->name('login');

Route::middleware('auth')->group(function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('department','DepartmentController');
    Route::resource('designation','DesignationController');
    Route::resource('transaction-head','TransactionHeadController');
    Route::resource('user','UserController');

    Route::get('user/{user_id}/payroll','PayrollController@manage')->name('payroll.manage');
    Route::put('user/{user_id}/payroll','PayrollController@update')->name('payroll.update');

    // Ajax route
    Route::get('ajax_designation_by_id/{id}','SettingController@ajaxDesignationByDepartmentId')->name('ajaxDesignationByDepartmentId');

    Route::post('logout',function (){
        auth()->logout();
        return redirect()->to('/');
    })->name('logout');


});






