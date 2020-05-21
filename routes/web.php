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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/Admin/index', function () {
        return view('Admin/index');
    });
    Route::get('/Admin/Customers/view_customers', function () {
        return view('Admin/Customers/view_customers');
    });
    Route::get('/Admin/Diseases/view_diseases', function () {
        return view('Admin/Diseases/view_diseases');
    });
    Route::get('/Admin/Farmers/view_farmers', 'FarmersController@index');

    Route::get('/Admin/Farms/view_farms', function () {
        return view('Admin/Farms/view_farms');
    });
    Route::get('/Admin/Fertilizers/view_fertilizers', function () {
        return view('Admin/Fertilizers/view_fertilizers');
    });
    Route::get('/Admin/Plants/view_plants', function () {
        return view('Admin/Plants/view_plants');
    });
    Route::get('/Admin/Tools/view_tools', function () {
        return view('Admin/Tools/view_tools');
    });
    Route::get('/Admin/Treatments/view_treatments', function () {
        return view('Admin/Treatments/view_treatments');
    });
    Route::get('/Admin/Roles/user_roles', function () {
        return view('Admin/Roles/user_roles');
    });
    Route::get('/Admin/Settings/system_settings', function () {
        return view('Admin/Settings/system_settings');
    });
    Route::get('/Admin/Permissions/view_permissions', function () {
        return view('Admin/Permissions/view_permissions');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Customers/view_customers', 'CustomersController');
Route::resource('Diseases/view_diseases', 'DiseasesController');
Route::resource('Farmers/view_farmers', 'FarmersController');
Route::resource('Farms/view_farms', 'FarmsController');
Route::resource('Fertilizers/view_fertilizers', 'FertilizersController');
Route::resource('Permissions/view_permissions', 'PermissionsController');
Route::resource('Plants/view_plants', 'PlantsController');
Route::resource('Roles/user_roles', 'RolesController');
Route::resource('Settings/system_settings', 'SettingsController');
Route::resource('Tools/view_tools', 'ToolsController');
Route::resource('Treatments/view_treatments', 'TreatmentsController');
