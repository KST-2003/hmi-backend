<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\MediaCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CareerOpptunityController;
use App\Http\Controllers\CoreTeamController;
use App\Http\Controllers\CurriculumsController;
use App\Http\Controllers\FrontendAuthController;
use App\Http\Middleware\FrontendAuth;

Route::middleware(['login_auth'])->group(function () {

    //admin login
    Route::get('frontend/login', [FrontendAuthController::class, 'index'])->name('frontend#login');
    Route::post('login/frontend', [FrontendAuthController::class, 'logIn'])->name('frontend#auth');
});

Route::middleware('frontend_auth')->group(function ()
{

Route::get('home', [homeController::class, 'index']);

Route::resource('/academic', AcademicYearController::class);
Route::resource('/year', YearController::class);
Route::resource('/class', AdminClassController::class);
Route::resource('/subject', SubjectController::class);

// kyawntharr
Route::resource('/mediacategories', MediaCategoryController::class);
Route::resource('/posts', PostController::class);
Route::resource('/careeropptunity', CareerOpptunityController::class);
// end



//saihtoolwin
Route::resource('/alert',AlertController::class);
Route::resource('/coreteam',CoreTeamController::class);
Route::resource('/curriculum',CurriculumsController::class);
Route::get('logout/frontend', [FrontendAuthController::class, 'logout'])->name('frontend#logout');

Route::get('/', function () {
    Session::flush();
    Auth::logout();
    return view('home');
});

});