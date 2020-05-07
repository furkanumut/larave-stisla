<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth
Auth::routes();

// Redirect to dashboard if user in '/' route
Route::get('/', function() {
  return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    
});
Route::group(['prefix' => 'admin', 'as' =>'admin.', 'middleware' => 'auth'], function () {
  // Dashboard

  Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

  Route::resource('user', 'Admin\UserController'); // User
  Route::resource('role', 'Admin\RoleController'); // Role
  Route::resource('permissions', 'Admin\PermissionController'); // Permission
  
  // Permission
  Route::put('role/permissions/{id}', 'Admin\RoleController@setPermissions')->name('setRolePermissions');

  // Profile
  Route::get('profile', 'Admin\UserController@profile')->name('profile');
  Route::post('profile', 'Admin\UserController@changeProfile')->name('changeProfile');
  Route::post('profile/image', 'Admin\UserController@changeProfileImage')->name('changeProfileImage');
  Route::put('profile/password', 'Admin\UserController@changePassword')->name('changePassword');
});