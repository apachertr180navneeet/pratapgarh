<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\StudentInfoController;

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


Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/submit', [HomeController::class, 'submitStudent'])->name('submit.student');
Route::get('/search', [HomeController::class, 'searchStudent'])->name('search.student');
Route::get("show/{id}", [HomeController::class, 'show'])->name('show');



Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index']);

    Route::get('login', [AdminAuthController::class, 'login'])->name('login');

    Route::post('login', [AdminAuthController::class, 'postLogin'])->name('login.post');

    Route::get('forget-password', [AdminAuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');

    Route::post('forget-password', [AdminAuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

    Route::get('reset-password/{token}', [AdminAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');

    Route::post('reset-password', [AdminAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::middleware(['admin'])->group(function () {
    	Route::get('dashboard', [AdminAuthController::class, 'adminDashboard'])->name('dashboard');

        Route::get('change-password', [AdminAuthController::class, 'changePassword'])->name('change.password');

        Route::post('update-password', [AdminAuthController::class, 'updatePassword'])->name('update.password');

        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('profile', [AdminAuthController::class, 'adminProfile'])->name('profile');

        Route::post('profile', [AdminAuthController::class, 'updateAdminProfile'])->name('update.profile');

        Route::name('student.info.')->group(function () {

            Route::get("list", [StudentInfoController::class, 'index'])->name('list');

            Route::get("show/{id}", [StudentInfoController::class, 'show'])->name('show');

            Route::get("search", [StudentInfoController::class, 'search'])->name('search');

            Route::get("student-import", [StudentInfoController::class, 'import'])->name('import');

            Route::post("student-import-post", [StudentInfoController::class, 'importpost'])->name('import.post');

            Route::post('/student/generate-cc', [StudentInfoController::class, 'generateCC'])->name('generate.cc');

            Route::post('/student/generate-tc', [StudentInfoController::class, 'generateTC'])->name('generate.tc');

            Route::get("/student/application-list", [StudentInfoController::class, 'studentApplicationList'])->name('application.list');


        });
    });

});

Route::middleware(['auth'])->group(function () {

});



