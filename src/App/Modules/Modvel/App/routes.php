<?php

Route::group(array('module' => 'Modvel', 'middleware' =>  ['web', 'auth'], 'namespace' => 'App\Modules\Modvel\App\Http\Controllers'), function() {

    // Modvel - Settings
    Route::put('/admin/modules/Modvel/settings/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminSettingsController@update', 'as' => 'admin.Modvel.settings.update'));
    Route::post('/admin/modules/Modvel/settings/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminSettingsController@store', 'as' => 'admin.Modvel.settings.store'));

    Route::get('/admin/modules/Modvel/settings/{id}/delete', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminSettingsController@destroy', 'as' => 'admin.Modvel.settings.destroy'));
    Route::get('/admin/modules/Modvel/settings/create', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminSettingsController@create', 'as' => 'admin.Modvel.settings.create'));
    Route::get('/admin/modules/Modvel/settings/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminSettingsController@index', 'as' => 'admin.Modvel.settings.index'));


    // Modvel - Informations
    Route::put('/admin/modules/Modvel/informations/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelInformationsAdminController@update', 'as' => 'admin.Modvel.informations.update'));
    Route::post('/admin/modules/Modvel/informations/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelInformationsAdminController@store', 'as' => 'admin.Modvel.informations.store'));

    Route::get('/admin/modules/Modvel/informations/{id}/delete', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelInformationsAdminController@destroy', 'as' => 'admin.Modvel.informations.destroy'));
    Route::get('/admin/modules/Modvel/informations/create', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelInformationsAdminController@create', 'as' => 'admin.Modvel.informations.create'));
    Route::get('/admin/modules/Modvel/informations/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelInformationsAdminController@index', 'as' => 'admin.Modvel.informations.index'));

    // Modvel - Modules
    Route::put('/admin/modules/Modvel/modules/{id}', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelModulesAdminController@update', 'as' => 'admin.Modvel.modules.update'));
    Route::post('/admin/modules/Modvel/modules/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelModulesAdminController@store', 'as' => 'admin.Modvel.modules.store'));

    Route::get('/admin/modules/Modvel/modules/{id}/delete', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelModulesAdminController@destroy', 'as' => 'admin.Modvel.modules.destroy'));
    Route::get('/admin/modules/Modvel/modules/create', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelModulesAdminController@create', 'as' => 'admin.Modvel.modules.create'));
    Route::get('/admin/modules/Modvel/modules/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelModulesAdminController@index', 'as' => 'admin.Modvel.modules.index'));

    // Modvel - Config
    Route::put('/admin/modules/Modvel/files/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@update', 'as' => 'admin.Modvel.files.update'));
    Route::post('/admin/modules/Modvel/files/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@store', 'as' => 'admin.Modvel.files.store'));

    Route::get('/admin/modules/Modvel/files/{id}/delete', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@destroy', 'as' => 'admin.Modvel.files.destroy'));
    Route::get('/admin/modules/Modvel/files/{id}/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@show', 'as' => 'admin.Modvel.files.show'));
    Route::get('/admin/modules/Modvel/files/create', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@create', 'as' => 'admin.Modvel.files.create'));
    Route::get('/admin/modules/Modvel/files/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelFilesAdminController@index', 'as' => 'admin.Modvel.files.index'));

    // Modvel - Config
    Route::put('/admin/modules/Modvel/config/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelConfigAdminController@update', 'as' => 'admin.Modvel.config.update'));
    Route::post('/admin/modules/Modvel/config/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelConfigAdminController@store', 'as' => 'admin.Modvel.config.store'));

    Route::get('/admin/modules/Modvel/config/{id}/delete', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelConfigAdminController@destroy', 'as' => 'admin.Modvel.config.destroy'));
    Route::get('/admin/modules/Modvel/config/create', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelConfigAdminController@create', 'as' => 'admin.Modvel.config.create'));
    Route::get('/admin/modules/Modvel/config/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelConfigAdminController@index', 'as' => 'admin.Modvel.config.index'));

    // Modvel - Admin
    Route::get('/admin/modules/Modvel/', array('uses' => '\App\Modules\Modvel\App\Http\Controllers\ModvelAdminController@index', 'as' => 'admin.Modvel.index'));
});	

Route::group(array('module' => 'Modvel', 'middleware' =>  ['web', 'api'], 'namespace' => 'App\Modules\Modvel\App\Http\Controllers'), function() {
    Route::resource('ModvelAPI', '\App\Modules\Modvel\App\Http\Controllers\ModvelApiController');
});
/*
Route::group(array('module' => 'Modvel', 'middleware' =>  ['web'], 'namespace' => 'App\Modules\Modvel\App\Http\Controllers'), function() {

	// Modvel - Visitor
    Route::resource('Modvel', '\App\Modules\Modvel\App\Http\Controllers\ModvelController');
});	
*/