<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
//SYSADMIN CONTROLLER
use App\Http\Controllers\sysadmin\users;
use App\Http\Controllers\sysadmin\menus;
use App\Http\Controllers\sysadmin\permissions;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

#Route::group(['middleware' => 'auth', 'check.permission'], function () {
#Route::middleware(['auth', 'check.permission'])->group(function () {
Route::middleware(['auth','check.permission'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Users
    Route::get('/sysadmin/users', [users::class, 'index'])->name('sysadmin.users.index');
    Route::post('/sysadmin/users/add', [users::class, 'add'])->name('sysadmin.users.add');
    Route::post('/sysadmin/users/update', [users::class, 'update'])->name('sysadmin.users.update');
    Route::post('/sysadmin/users/delete/{id}', [users::class, 'delete'])->name('sysadmin.users.delete');

    // Menus
    Route::get('/sysadmin/menus', [menus::class, 'index'])->name('sysadmin.menus.index');
    Route::post('/sysadmin/menus/add', [menus::class, 'add'])->name('sysadmin.menus.add');
    Route::post('/sysadmin/menus/update', [menus::class, 'update'])->name('sysadmin.menus.update');
    Route::post('/sysadmin/menus/delete/{id}', [menus::class, 'delete'])->name('sysadmin.menus.delete');
    
    // Permission
    Route::get('/sysadmin/permissions', [permissions::class, 'index'])->name('sysadmin.permissions.index');
    Route::get('/sysadmin/permissions/{id}', [permissions::class, 'detail'])->name('sysadmin.permissions.detail');
    Route::post('/sysadmin/updatepermission', [permissions::class, 'update'])->name('sysadmin.permissions.update');

    ###########################################################################################
    
    // HR
    Route::get('/hr/employee/worker', [permissions::class, 'index'])->name('hr.employee.worker.index');
    Route::get('/hr/employee/worker/add', [permissions::class, 'detail'])->name('hr.employee.worker.add');
    Route::post('/hr/employee/worker/update', [permissions::class, 'update'])->name('hr.employee.worker.update');
    Route::post('/hr/employee/worker/delete/{id}', [menus::class, 'delete'])->name('hr.employee.worker.delete');
});