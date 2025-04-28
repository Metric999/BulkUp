<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\Andre;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TraineeProfileController;
use App\Http\Controllers\TrainerProfileController;


Route::get('/welcome', function () {
    return view('welcome');
 });

 Route::get('/user/{id}', function ($id){
    return 'User dengan ID '. $id;
 });

 Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard' ;
    });

    Route::get('/users', function () {
        return 'Admin Users' ;
    });
 });


 Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);
 Route::get('/', [HomeController::class, 'index']);
 Route::get('/contact', [HomeController::class, 'contact']);
 Route::get('/Andre_view', [Andre::class, 'tampilkan']);
 Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [AuthController::class, 'login']);
 Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
 Route::post('/register', [AuthController::class, 'register']);
 Route::get('/traineeprofile', [TraineeProfileController::class, 'showProfileForm'])->name('profile');
 Route::post('/traineeprofile', [TraineeProfileController::class, 'saveProfile']);
 Route::get('/trainerprofile', [TrainerProfileController::class, 'showProfileForm'])->name('trainer.profile');
Route::post('/trainerprofile', [TrainerProfileController::class, 'saveProfile']);