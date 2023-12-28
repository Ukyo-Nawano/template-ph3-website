<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/top', [TopController::class, 'toppage'])->name('top.toppage');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');

Route::get('/make-admin/{userId}', [AdminController::class, 'makeAdmin']);
// URL にユーザーIDを含めてアクセスすることで、対象のユーザーを管理者に設定できる


// ログインできるかどうかを判定してからルートをつける
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
});

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::get('/admin/questionCreate', [AdminController::class, 'questionCreate'])->name('admin.questionCreate');

Route::get('/admin/{quiz}', [AdminController::class, 'show'])->name('admin.show');

Route::post('/admin/quizStore', [AdminController::class, 'store'])->name('admin.store');

Route::post('/admin/questionStore', [AdminController::class, 'questionStore'])->name('admin.questionStore');

Route::get('/admin/{quiz}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/{id}/questionEdit', [AdminController::class, 'questionEdit'])->name('admin.questionEdit');

Route::patch('/admin/{quiz}', [AdminController::class, 'update'])->name('admin.update');

Route::patch('/admin/question/{question}', [AdminController::class, 'questionUpdate'])->name('admin.questionUpdate');

Route::delete('/admin/{quiz}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::delete('/admin/question/{question}', [AdminController::class, 'questionDestroy'])->name('admin.questionDestroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
