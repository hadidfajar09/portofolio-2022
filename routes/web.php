<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\SliderController;
use App\Models\HomeSlide;
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
    return view('frontend.index');
});
Route::get('/about', [AboutController::class, 'showAbout'])->name('show.about');

//admin route
Route::middleware(['auth'])->group(function(){
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminController::class, 'profileStore'])->name('admin.profile.store');
    Route::get('/admin/profile/password', [AdminController::class, 'passwordEdit'])->name('admin.password.edit');
    Route::post('/admin/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');

    //homeslide
    Route::get('/admin/homeslider', [SliderController::class, 'HomeSlider'])->name('home.slider');
    Route::post('/admin/homeslider/update', [SliderController::class, 'HomeSliderUpdate'])->name('admin.homeslide.update');

     //about
     Route::get('/admin/about', [AboutController::class, 'HomeAbout'])->name('home.about');
     Route::post('/admin/about/update', [AboutController::class, 'HomeAboutUpdate'])->name('admin.about.update');

      //multi image
      Route::get('/admin/about/multi-image', [AboutController::class, 'MultiImage'])->name('home.multi');
      Route::post('/admin/about/image/store', [AboutController::class, 'MultiStore'])->name('store.multi.image');
      Route::get('/admin/about/all/multi', [AboutController::class, 'AllMultiImage'])->name('all.multi');


      
     
    
}); 





  
Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
