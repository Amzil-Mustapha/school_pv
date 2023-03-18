<?php

use App\Http\Controllers\AspeetController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\UserController;
use App\Models\Comments;
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

//route home page
Route::get('/', [HomeController::class,"GetDataAndDisplayIt"])->middleware("loginMiddleware")->name("home");

//route login page
Route::get("/login",function(){
    return view("pages.login");
})->name("login");

//route upload page
Route::get("/upload",function(){
    return view("pages.upload");
})->middleware("uploadMiddleware")->name("upload");

//controller login when user logs in
Route::post("/Onlogin",[UserController::class,"login"])->name("Onlogin");
Route::get("/Onlogout",[UserController::class,"logout"])->name("Onlogout");

//controller upload when user upload a file
Route::post("/Onupload",[uploadController::class,"Onupload"])->name("Onupload");

//resource controller of comment
Route::resource('/Comments',CommentsController::class)->names([
    
]);


