<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\SettingController;
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
})->name('home');
Route::get('/about', [AboutController::class, 'showAbout'])->name('show.about');
Route::get('/contact', [SettingController::class, 'FormContact'])->name('contact');
Route::post('/contact/message', [SettingController::class, 'MessageStore'])->name('contact.message');
Route::get('/portfolio', [PortfolioController::class, 'ShowPorto'])->name('show.porto');
Route::get('/portfolio/detail/{id}', [PortfolioController::class, 'ShowPortoDetail'])->name('show.porto.detail');
Route::get('/blog', [BlogController::class, 'ShowBlog'])->name('show.blog');
Route::get('/blog/detail/{id}', [BlogController::class, 'BlogDetail'])->name('blog.detail');
Route::get('/blog/category/{id}', [BlogController::class, 'ShowCategory'])->name('show.category');


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
      Route::get('/admin/about/multi-image/edit/{id}', [AboutController::class, 'EditMulti'])->name('edit.multi.image');
      Route::post('/admin/about/image/update/{id}', [AboutController::class, 'MultiUpdate'])->name('update.multi.image');
      Route::get('/admin/about/multi-image/delete/{id}', [AboutController::class, 'DeleteMulti'])->name('delete.multi.image');


      
      //porftolio
      Route::get('/admin/portfolio', [PortfolioController::class, 'AllPorto'])->name('all.porto');
      Route::get('/admin/portfolio/add', [PortfolioController::class, 'AddPorto'])->name('add.porto');
      Route::post('/admin/portofolio/store', [PortfolioController::class, 'StorePorto'])->name('admin.porto.store');
      Route::get('/admin/portofolio/edit/{id}', [PortfolioController::class, 'EditPorto'])->name('admin.porto.edit');
      Route::post('/admin/portofolio/update/{id}', [PortfolioController::class, 'UpdatePorto'])->name('admin.porto.update');
      Route::get('/admin/portofolio/delete/{id}', [PortfolioController::class, 'DeletePorto'])->name('delete.porto.delete');


       //Blog
       Route::get('/admin/category', [BlogController::class, 'ListCategory'])->name('all.category');
       Route::get('/admin/category/add', [BlogController::class, 'AddCategory'])->name('add.category');
       Route::post('/admin/category/store', [BlogController::class, 'StoreCategory'])->name('admin.category.store');
       Route::get('/admin/category/edit/{id}', [BlogController::class, 'EditCategory'])->name('admin.category.edit');
       Route::post('/admin/category/update/{id}', [BlogController::class, 'UpdateCategory'])->name('admin.category.update');
       Route::get('/admin/category/delete/{id}', [BlogController::class, 'DeleteCategory'])->name('delete.category.delete');

       Route::get('/admin/blog', [BlogController::class, 'ListBlog'])->name('all.blog');
       Route::get('/admin/blog/add', [BlogController::class, 'AddBlog'])->name('add.blog');
       Route::post('/admin/blog/store', [BlogController::class, 'StoreBlog'])->name('admin.blog.store');
       Route::get('/admin/blog/edit/{id}', [BlogController::class, 'EditBlog'])->name('admin.blog.edit');
       Route::post('/admin/blog/update/{id}', [BlogController::class, 'UpdateBlog'])->name('admin.blog.update');
       Route::get('/admin/blog/delete/{id}', [BlogController::class, 'DeleteBlog'])->name('delete.blog.delete');


       //footer
    Route::get('/admin/footer', [SettingController::class, 'Setting'])->name('home.setting');
    Route::post('/admin/footer/update', [SettingController::class, 'SettingUpdate'])->name('admin.setting.update');

    
       //message
       Route::get('/admin/message', [SettingController::class, 'ShowMessage'])->name('show.message');
       Route::get('/admin/message/delete/{id}', [SettingController::class, 'MessageDelete'])->name('delete.message');
}); 





  
Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
