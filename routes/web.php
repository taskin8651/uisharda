<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

     /*
    |--------------------------------------------------------------------------
    | About Page CMS
    |--------------------------------------------------------------------------
    */

    // Main About Page Content
    Route::get('about-page', 'AboutPageController@edit')->name('about-page.edit');
    Route::put('about-page', 'AboutPageController@update')->name('about-page.update');

    // About Story Features
    Route::delete('about-features/destroy', 'AboutFeatureController@massDestroy')->name('about-features.massDestroy');
    Route::resource('about-features', 'AboutFeatureController', ['except' => ['show']]);

    // About Tags
    Route::delete('about-tags/destroy', 'AboutTagController@massDestroy')->name('about-tags.massDestroy');
    Route::resource('about-tags', 'AboutTagController', ['except' => ['show']]);

    // About Values
    Route::delete('about-values/destroy', 'AboutValueController@massDestroy')->name('about-values.massDestroy');
    Route::resource('about-values', 'AboutValueController', ['except' => ['show']]);

    // About Processes
    Route::delete('about-processes/destroy', 'AboutProcessController@massDestroy')->name('about-processes.massDestroy');
    Route::resource('about-processes', 'AboutProcessController', ['except' => ['show']]);

    // Industries CMS
Route::get('industry-page', 'IndustryPageController@edit')->name('industry-page.edit');
Route::put('industry-page', 'IndustryPageController@update')->name('industry-page.update');

Route::resource('industries', 'IndustryController', ['except' => ['show']]);
Route::resource('industry-roles', 'IndustryRoleController', ['except' => ['show']]);
Route::resource('industry-processes', 'IndustryProcessController', ['except' => ['show']]);

    
// Services CMS
Route::get('service-page', 'ServicePageController@edit')->name('service-page.edit');
Route::put('service-page', 'ServicePageController@update')->name('service-page.update');

Route::resource('services', 'ServiceController', ['except' => ['show']]);
Route::resource('service-feature-points', 'ServiceFeaturePointController', ['except' => ['show']]);
Route::resource('service-processes', 'ServiceProcessController', ['except' => ['show']]);

// Jobs CMS
Route::get('job-page', 'JobPageController@edit')->name('job-page.edit');
Route::put('job-page', 'JobPageController@update')->name('job-page.update');

Route::resource('jobs', 'JobController', ['except' => ['show']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// Frontend Routes
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('frontend.about');
Route::get('/industries', [App\Http\Controllers\Frontend\IndustryController::class, 'index'])->name('frontend.industries');
Route::get('/services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('frontend.services'); 
Route::get('/jobs', [App\Http\Controllers\Frontend\JobController::class, 'index'])->name('frontend.jobs');   

 