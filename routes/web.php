<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangPasswordController;

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

// Route::get('/', function () {
//     return "Hello World";
// });

// Route::get('/', function () {
//     return "<h1>สวัสดีชาวโลก</h1>";
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return "<a href='admin/student/pissanu/chonakorn'>Login</a>";
// });

// Route::get('/', function () {
//     return "<a href='".route('student')."'>Login</a>";
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', [AdminController::class, 'contact'])->name('contact');

// Route::get('/contact', function () {
//     return "<h2>ติดต่อเรา</h2>";
// });

// Route::get('student', [AdminController::class, 'student'])->name('student');
// Route::get('/create', [AdminController::class, 'create']);
// // Route::post('/insert', [AdminController::class,'insert']);
// Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
// Route::get('/updateStatus/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');
// Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
// Route::get('/deleteImages/{id}', [AdminController::class, 'deleteImages'])->name('deleteImages');
// Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
// Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
// Route::get('/pdf', [AdminController::class, 'generatePdf'])->name('pdf');

// Route::get('studentForm', function () { /// callback function 
//     return view('studentForm');
// })->name('studentForm');

Route::get('student/total', function(){/// callback function 
    return "นักเรียนทั้งหมด";
})->name('student');

Route::get('student/{name}', function ($name) { /// callback function 
    return "สวัสดี คุณ $name เข้าสู่เว็บไซต์";
});

Route::get('admin/student/{name}/{surname}', function ($name, $surname) { /// callback function 
    return "สวัสดี คุณ $name  $surname เข้าสู่เว็บไซต์";
});

Route::fallback(function () {
    return "ไม่มีหน้าเว็บนี้";
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('changePassword', [ChangPasswordController::class, 'changePassword'])->name('changePassword');
    Route::post('updatePassword', [ChangPasswordController::class, 'updatePassword'])->name('updatePassword');
    Route::get('student', [AdminController::class, 'student'])->name('student');
    Route::get('/create', [AdminController::class, 'create']);
    // Route::post('/insert', [AdminController::class,'insert']);
    Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
    Route::get('/updateStatus/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/deleteImages/{id}', [AdminController::class, 'deleteImages'])->name('deleteImages');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/pdf', [AdminController::class, 'generatePdf'])->name('pdf');
    Route::get('/getQrcode/{id}', [AdminController::class, 'getQrcode'])->name('getQrcode');


});
