<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\ParametroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\LogController;
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

    Route::get('students/{id}/assists', [StudentController::class, 'showAssists'])->name('students.assists');

Route::get('students/assist', [StudentController::class, 'assist'])->name('students.assist');
Route::post('students/assist', [StudentController::class, 'assistDni'])->name('students.assistDni');
Route::post('students/assist2', [StudentController::class, 'storeAssist'])->name('students.storeAssist');




Route::get('/parametro', [ParametroController::class, 'parametro'])->name('students.parametro');
Route::post('/parametro', [ParametroController::class, 'update'])->name('students.parametro1');


Route::get('exportPDF/{id}', [StudentController::class, 'exportPDF'])->name('students.exportPDF');
Route::resource('students', StudentController::class);
Route::resource('logs', LogController::class);
});







require __DIR__.'/auth.php';
