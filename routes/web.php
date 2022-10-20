<?php

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
    return view('front.home.index');
})->name('home');

Route::get('/contact-as', function () {
    return view('front.home.contact-as');
})->name('contact-as');

Route::get('/adex-market-place', function () {
    return view('front.home.adex-market-place');
})->name('adex-market-place');


// Route::get('/login', function () {
//     return view('front.layouts.login');
// })->name('login');
// Route::get('/signup', function () {
//     return view('front.layouts.signup');
// })->name('signup');

// Auth::routes();
// // Auth::routes(['verify' => true]);
// Route::get('/login',[AdminController::class, 'admintableshow']);

Route::middleware(['auth'])->group(function () {
    Route::get('/my-profile', [App\Http\Controllers\Front\DashboardController::class, 'myprofile'])->name('my-profile');
    Route::get('/profile', [App\Http\Controllers\Front\DashboardController::class, 'profile'])->name('profile');
    Route::get('/business', [App\Http\Controllers\Front\DashboardController::class, 'business'])->name('business');
    Route::get('/contract', [App\Http\Controllers\Front\DashboardController::class, 'contract'])->name('contract');
    Route::get('/user-dashboard', [App\Http\Controllers\Front\DashboardController::class, 'user_dashboard'])->name('user-dashboard');
    Route::get('/security', [App\Http\Controllers\Front\DashboardController::class, 'security'])->name('security');
    Route::get('/notification', [App\Http\Controllers\Front\DashboardController::class, 'notification'])->name('notification');
    Route::get('/my-adex', [App\Http\Controllers\Front\DashboardController::class, 'myadex'])->name('my-adex');
    Route::get('/my-wallet', [App\Http\Controllers\Front\DashboardController::class, 'mywallet'])->name('my-wallet');
    Route::post('/contact-as/store', [App\Http\Controllers\Front\ContactasController::class, 'contactasstore'])->name('contact-as-store');
    Route::get('/user/logout', [App\Http\Controllers\Front\DashboardController::class, 'userlogout'])->name('user-logout');


    Route::post('/profile/status', [App\Http\Controllers\Front\SecurityController::class, 'profile_status'])->name('profile-status');
    Route::post('/show-email', [App\Http\Controllers\Front\SecurityController::class, 'show_email'])->name('show-email');
    Route::post('/change/password', [App\Http\Controllers\Front\SecurityController::class, 'change_password'])->name('change_password');



    Route::post('/createbusiness', [App\Http\Controllers\Front\BusinessController::class, 'createbusiness'])->name('createbusiness');
    Route::post('/updatebusiness', [App\Http\Controllers\Front\BusinessController::class, 'updatebusiness'])->name('updatebusiness');
    Route::post('/get-businessdata', [App\Http\Controllers\Front\BusinessController::class, 'getbusinessdata'])->name('getbusinessdata');
    Route::post('/dropzone-image', [App\Http\Controllers\Front\BusinessController::class, 'dropimages'])->name('dropzone-image');
    Route::post('/drop-remove-images', [App\Http\Controllers\Front\BusinessController::class, 'dropremoveimages'])->name('dropremoveImages');
    Route::post('/editdropajax-remove-images', [App\Http\Controllers\Front\BusinessController::class,'editdropajaxRemoveImages'])->name('editajaxremoveImages');

    // Advertisement
    Route::get('/list-property', [App\Http\Controllers\Front\AdvertisementController::class, 'listproperty'])->name('list-property');
    Route::get('/add-list-property/{id}', [App\Http\Controllers\Front\AdvertisementController::class, 'addListProperty'])->name('addListProperty');
    Route::post('/getAttributeAsPerCategory',[App\Http\Controllers\Front\AdvertisementController::class, 'getAttributeAsPerCategory'])->name('getAttributeAsPerCategory');
    Route::post('/saveListProperty',[App\Http\Controllers\Front\AdvertisementController::class, 'saveListProperty'])->name('saveListProperty');
    Route::post('/ListingProperty',[App\Http\Controllers\Front\AdvertisementController::class, 'ListingProperty'])->name('ListingProperty');
    Route::post('/ajaxremoveImagesFront',[App\Http\Controllers\Front\AdvertisementController::class, 'ajaxremoveImagesFront'])->name('ajaxremoveImagesFront');

    Route::get('get-storage-path/{name}/{filename}', function($name, $filename) {
        $path = storage_path('app/public/'.$name.'/'.$filename);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    })->name('getStoragePath');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
