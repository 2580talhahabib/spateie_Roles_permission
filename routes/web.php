<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // permission controller
    Route::get('/permission/index',[PermissionController::class,'index'])->name('permission.index');
    Route::get('/permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::post('/permission/store',[PermissionController::class,'store'])->name('permission.store');
    Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
    Route::Delete('/permission/Delete/{id}',[PermissionController::class,'Destroy'])->name('permission.destroy');


//  Roles Controller
Route::get('/Role/index',[RoleController::class,'index'])->name('Role.index');
Route::get('/Role/create',[RoleController::class,'create'])->name('Role.create');
Route::post('/Role/store',[RoleController::class,'store'])->name('Role.store');
Route::get('/Role/edit/{id}',[RoleController::class,'edit'])->name('Role.edit');
Route::Post('/Role/update/{id}',[RoleController::class,'update'])->name('Role.update');
Route::Delete('/Role/Destroy/{id}',[RoleController::class,'Destroy'])->name('Role.Destroy');
});

Route::resource('articles',ArticleController::class);
// Route::resource('roles', RoleController::class);

require __DIR__.'/auth.php';
