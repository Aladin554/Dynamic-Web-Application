<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePassController;
use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Multipic;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands=Brand::all();
    $about=HomeAbout::all()->first();
    $images=Multipic::all();
    return view('home',compact('brands','about','images'));
});
Route::get('category/add',[CatController::class,'alCat'])->name('add.category');

Route::post('category/store',[CatController::class,'stCat'])->name('store.category');

Route::post('category/update/{id}',[CatController::class,'Update']);

Route::get('category/tdelete/{id}',[CatController::class,'Tdelete']);

Route::get('category/restore/{id}',[CatController::class,'Restore']);

Route::get('category/pdelete/{id}',[CatController::class,'Pdelete']);




Route::get('all/brand',[BrandController::class,'alBrand'])->name('all.brand');

Route::post('store/brand',[BrandController::class,'stBrand'])->name('store.brand');

Route::get('brand/edit/{id}',[BrandController::class,'Edit']);

Route::post('brand/update/{id}',[BrandController::class,'Update']);

Route::get('brand/tdelete/{id}',[BrandController::class,'Tdelete']);

Route::get('multi/image',[BrandController::class,'Multipic'])->name('multi.image');

Route::post('store/image',[BrandController::class,'Storeimg'])->name('store.image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users=User::all();

    // $users=DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('user/logout',[BrandController::class,'Logout'])->name('user.logout');

// slider
Route::get('home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');
Route::get('slider/edit/{id}',[HomeController::class,'EditSlider']);
Route::post('slider/update/{id}',[HomeController::class,'UpdateSlider']);
Route::get('slider/delete/{id}',[HomeController::class,'DeleteSlider']);

// Home About Us
Route::get('home/about',[HomeAboutController::class,'HomeAbout'])->name('home.about');
Route::get('add/homeabout',[HomeAboutController::class,'Add'])->name('add.homeabout');
Route::post('store/homeabout',[HomeAboutController::class,'Store'])->name('store.homeabout');
Route::get('homeabout/edit/{id}',[HomeAboutController::class,'Edit']);
Route::post('homeabout/update/{id}',[HomeAboutController::class,'UpdateAbout']);
Route::get('homeabout/delete/{id}',[HomeAboutController::class,'Delete']);


// header component

Route::get('portfolio',[HomeAboutController::class,'Portfolio'])->name('portfolio');


// Admin Contact

Route::get('contact',[ContactController::class,'Contact'])->name('contact');

Route::get('add/contact',[ContactController::class,'AddContact'])->name('add.contact');

Route::post('store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
Route::get('contact/edit/{id}',[ContactController::class,'EditContact'])->name('edit.contact');
Route::post('contact/update/{id}',[ContactController::class,'UpdateContact']);
Route::get('contact/delete/{id}',[ContactController::class,'DeleteContact'])->name('delete.contact');

// layout Contact

Route::get('header/contact',[ContactController::class,'HeaderContact'])->name('header.contact');

// Admin Contact Message
Route::post('store/message',[ContactController::class,'StoreMessage'])->name('store.message');
Route::get('show/message',[ContactController::class,'ShowMessage'])->name('show.message');
Route::get('delete/message/{id}',[ContactController::class,'DeleteMessage'])->name('delete.message');


// change password
 Route::get('change/password',[ChangePassController::class,'ChangePass'])->name('change.password');
 Route::post('update/password',[ChangePassController::class,'UpdatePass'])->name('update.password');

//  profile update
Route::get('profile/get',[ChangePassController::class,'Pget'])->name('profile.get');
Route::post('profile/update',[ChangePassController::class,'PUpdate'])->name('profile.update');

