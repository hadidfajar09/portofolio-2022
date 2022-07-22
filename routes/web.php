<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

//admin route
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminController::class, 'profileStore'])->name('admin.profile.store');
Route::get('/admin/profile/password', [AdminController::class, 'passwordEdit'])->name('admin.password.edit');

Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
