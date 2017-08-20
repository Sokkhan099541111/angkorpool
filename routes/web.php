<?php

Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin' ], function(){
    Route::get('/login', 'Auth\LoginController@index')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group([ 'middleware' => 'auth:admin' ], function(){
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/dashboard/{users}/user/','DashboardController@show')->name('admin.dashboard.user.show');

        Route::get('/users', 'UserController@index')->name('admin.users');
        Route::get('/user/create', 'UserController@create')->name('admin.user.create');
        Route::post('/user/create', 'UserController@store');
        Route::get('/user/edit/{user}', 'UserController@edit')->name('admin.user.edit');
        Route::put('/user/edit/{user}', 'UserController@update');
        Route::delete('/user/delete/{user}', 'UserController@delete')->name('admin.user.delete');
        Route::get('/user/{user}', 'UserController@show')->name('admin.user.show');

        Route::get('/roles', 'RoleController@index')->name('admin.roles');
        Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
        Route::post('/role/create', 'RoleController@store');
        Route::get('/role/edit/{role}', 'RoleController@edit')->name('admin.role.edit');
        Route::put('/role/edit/{role}', 'RoleController@update');
        Route::delete('/role/delete/{role}', 'RoleController@delete')->name('admin.role.delete');
        Route::get('/role/{role}', 'RoleController@show')->name('admin.role.show');

        Route::get('/permissions', 'PermissionController@index')->name('admin.permissions');
        Route::get('/permission/create', 'PermissionController@create')->name('admin.permission.create');
        Route::post('/permission/create', 'PermissionController@store');
        Route::get('/permission/edit/{permission}', 'PermissionController@edit')->name('admin.permission.edit');
        Route::put('/permission/edit/{permission}', 'PermissionController@update');
        Route::delete('/permission/delete/{permission}', 'PermissionController@delete')->name('admin.permission.delete');
        Route::get('/permission/{permission}', 'PermissionController@show')->name('admin.permission.show');

        Route::get('/applicants', 'ApplicantController@index')->name('admin.applicants');
        Route::get('/applicant/create', 'ApplicantController@create')->name('admin.applicant.create');
        Route::post('/applicant/create', 'ApplicantController@store');
        Route::get('/applicant/edit/{applicant}', 'ApplicantController@edit')->name('admin.applicant.edit');
        Route::put('/applicant/edit/{applicant}', 'ApplicantController@update');
        Route::delete('/applicant/delete/{applicant}', 'ApplicantController@delete')->name('admin.applicant.delete');
        Route::get('/applicant/{applicant}', 'ApplicantController@show')->name('admin.applicant.show');

        Route::get('/organizations', 'OrganizationController@index')->name('admin.organizations');
        // Route::get('/organization/create', 'OrganizationController@create')->name('admin.organization.create');
        // Route::post('/organization/create', 'OrganizationController@store');
        Route::get('/organization/edit/{organization}', 'OrganizationController@edit')->name('admin.organization.edit');
        Route::put('/organization/edit/{organization}', 'OrganizationController@update');
        Route::delete('/organization/delete/{organization}', 'OrganizationController@delete')->name('admin.organization.delete');
        Route::get('/organization/{organization}', 'OrganizationController@show')->name('admin.organization.show');
    });
});

Route::group(['middleware' => 'auth.employer'], function(){
    Route::get('/admin','Employer\JobController@admin')->name('employer.index');
    Route::get('/jobs/posted', 'Employer\JobController@index')->name('employer.jobs');
    Route::get('/job/posted/{id}', 'Employer\JobController@show')->name('employer.job.show')->where('id', '[0-9]+');
    Route::get('/job/post', 'Employer\JobController@create')->name('employer.job.post');
    Route::post('/job/post', 'Employer\JobController@save');
    Route::get('/job/post/{id}/edit', 'Employer\JobController@edit')->name('employer.job.edit');
    Route::put('/job/post/{id}/edit', 'Employer\JobController@update');
    Route::get('/job/{id}/publish', 'Employer\JobController@publish')->name('employer.job.publish');
    Route::get('/job/{id}/delete', 'Employer\JobController@delete')->name('employer.job.delete');
});

Route::group(['middleware' => 'auth.employee'], function(){
	Route::get('/profile', 'Employee\ProfileController@showProfile')->name('employee.profile');
    Route::get('/dashboard', 'Employee\DashboardController@index')->name('employee.dashboard');

    Route::get('/applied/jobs', 'Employee\ApplyJobController@index')->name('employee.applied.jobs');
    Route::post('/apply/{job}', 'Employee\ApplyJobController@save')->name('employee.apply.job');

    Route::get('/job/alert', 'Employee\JobAlertController@index')->name('job.alert');
    Route::get('/job/alert/create', 'Employee\JobAlertController@create')->name('job.alert.create');
    Route::post('/job/alert/create', 'Employee\JobAlertController@save');
    Route::get('/job/alert/delete/{id}', 'Employee\JobAlertController@delete')->name('job.alert.delete');
});

Route::get('/jobs', 'JobController@index')->name('jobs');
Route::get('/job/search', 'Employee\JobController@search')->name('job.search');
Route::get('/job/{id}', 'Employee\JobController@show')->name('job.show')->where('id', '[0-9]+');


Route::get('/', 'HomeController@index');

Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('user.login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('zoho', 'Test\ZohoController@fetchData');
Route::get('zoho/insert', 'Test\ZohoController@insert');
Route::get('zoho/job-opening', 'Test\ZohoController@fetchJobOpening');
Route::get('zoho/job-opening/insert', 'Test\ZohoController@createJobOpening');
