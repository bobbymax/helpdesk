<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::prefix('dashboard')->group(function() {
	Route::resource('tickets', 'TicketController');
	Route::post('/dependency/fetch', 'TicketController@fetch')->name('dependencies.fetch');
	Route::get('/', 'HomeController@index')->name('user.dashboard');
});

Route::prefix('admin')->group(function() {

	Route::resource('directorates', 'DirectorateController');
	Route::resource('divisions', 'DivisionController');
	Route::resource('departments', 'DepartmentController');
	Route::resource('categories', 'CategoryController');
	Route::resource('issues', 'IssueController');
	Route::resource('locations', 'LocationController'); 
	Route::resource('types', 'TypeController');
	Route::resource('services', 'ServiceController');
	Route::resource('projects', 'ProjectController');
	Route::resource('roles', 'RoleController');
	Route::resource('permissions', 'PermissionController');
	Route::resource('menus', 'MenuController');

	// Manage Users
	Route::resource('users', 'AdminUserController');

	Route::get('monthly/report', 'ProjectController@monthlyReport')->name('monthly.report.print');
	Route::get('{ticket}/report', 'ReportController@create')->name('ticket.report');
	Route::post('{ticket}/report', 'ReportController@store')->name('admin.report.store');
	Route::get('{ticket}/report/show', 'ReportController@show')->name('show.report');
	Route::get('{ticket}/close/ticket', 'AdminTicketController@close')->name('close.ticket');
	Route::get('closed/tickets', 'ReportController@index')->name('archived.tickets');

	
	Route::get('/tickets', 'AdminTicketController@index')->name('admin.tickets.index');

	Route::get('/tickets/approval', 'AdminTicketController@approvals')->name('admin.tickets.approval');
	Route::get('/tickets/create', 'AdminTicketController@create')->name('admin.create.ticket');
	Route::post('/tickets/create', 'AdminTicketController@store')->name('admin.store.ticket');
	Route::post('/users/fetch', 'AdminTicketController@fetch')->name('users.list.fetch');
	Route::get('/tickets/{ticket}/edit', 'AdminTicketController@edit')->name('admin.ticket.edit');


	Route::patch('/tickets/{ticket}/assign', 'AdminTicketController@assign')->name('admin.ticket.assign');
	Route::get('/tickets/{ticket}/update', 'AdminTicketController@update')->name('admin.ticket.update');

	Route::get('/admins/display', 'AdminController@display')->name('admins.index');
	Route::get('/admins/create', 'AdminController@create')->name('admins.create');
	Route::get('/admins/{admin}/edit', 'AdminController@edit')->name('admins.edit');
	Route::patch('/admins/{admin}', 'AdminController@update')->name('admins.update');
	Route::post('/admin/destroy', 'AdminController@destroy')->name('admins.destroy');
	Route::get('assign/{admin}/role', 'AdminController@assign')->name('admins.roles');
	Route::post('/admins/{admin}/assign', 'AdminController@assignRole')->name('assign.role');

	Route::post('/register', 'AdminController@registerAdmin')->name('register.admin');

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


