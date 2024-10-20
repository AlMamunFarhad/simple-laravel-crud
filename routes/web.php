<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/user', [PostController::class,'index'])->name('user');

Route::get("/", [StudentController::class, "showStudents"])->name("home");
Route::get("/chunk", [StudentController::class,"chunkMethod"]);
Route::get("/allstudents", [StudentController::class,"allStudents"]);
Route::get("/checkStudents", [StudentController::class,"allStudents"]);
Route::resource('/users',  UserController::class);
// Route::get("/viewUser/{id}", [UserController::class,"show"])->name("view.user");




