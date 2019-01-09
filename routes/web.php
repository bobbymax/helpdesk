<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('login/microsoft/callback', 'OfficialAccountController@handleProviderCallback');
Route::get('graph/users/callback', 'OfficialAccountController@handleGraphCallback');

Route::prefix('admin')->group(function() {

	Route::resource('directorates', 'DirectorateController');
	Route::resource('departments', 'DepartmentController');
	Route::resource('categories', 'CategoryController');
	Route::get('{ticket}/report', 'ReportController@create')->name('ticket.report');
	Route::post('{ticket}/report', 'ReportController@store')->name('admin.report.store');

	
	Route::get('/tickets', 'AdminTicketController@index')->name('admin.tickets.index');
	Route::get('/tickets/create', 'AdminTicketController@create')->name('admin.create.ticket');
	Route::post('/tickets/create', 'AdminTicketController@store')->name('admin.store.ticket');
	Route::post('/users/fetch', 'AdminTicketController@fetch')->name('users.list.fetch');
	Route::get('/tickets/{ticket}/edit', 'AdminTicketController@edit')->name('admin.ticket.edit');
	Route::patch('/tickets/{ticket}/assign', 'AdminTicketController@assign')->name('admin.ticket.assign');
	Route::get('/tickets/{ticket}/update', 'AdminTicketController@update')->name('admin.ticket.update');

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('dashboard')->group(function() {

	Route::resource('tickets', 'TicketController');
	Route::get('/', 'HomeController@index')->name('user.dashboard');
});
