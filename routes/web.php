<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentEkskulController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\UserController;

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

Route::get('/mainlayout', function () {
    return view('mainlayout');
})->middleware('auth');


Route::get('/teacherlayout', function () {
    return view('teacherlayout');
})->middleware('auth');

Route::get('/', [HomeController::class, 'home'])->middleware('auth');

// Route::get('/login-student', [studentController::class, 'loginStudent'])->name('login')->middleware('guest');
// Route::post('/login-student', [studentController::class, 'authenticatingStudent'])->middleware('guest');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['CekUserLogin']]);
// });

Route::middleware(['auth'])->group(function () {
    Route::middleware(['CekUserLogin:1'])->group(function () {
        Route::controller(studentController::class)->group(function () {
            Route::get('/students', 'index');
            Route::get('/student/{id}', 'show');
            Route::get('/student-add', 'create');
            Route::post('/student', 'store');
            Route::get('/student-ubah/{id}', 'ubah');
            Route::put('/student/{id}', 'update');
            // Route::get('/student-delete/{id}', 'delete');
            Route::get('/student-destroy/{id}', 'destroy');
            // });

            Route::controller(ClassController::class)->group(function () {
                Route::get('/classroom', 'index');
                Route::get('/classroom-detail/{id}', 'show');
                Route::get('/classroom-add', 'create');
                Route::post('/class', 'store');
                Route::get('/classroom-ubah/{id}', 'ubah');
                Route::put('/class/{id}', 'update');
                // Route::get('/classroom-delete/{id}', 'delete');
                Route::get('/classroom-destroy/{id}', 'destroy');
            });

            Route::controller(ExtracurricularController::class)->group(function () {
                Route::get('/extracurricular', 'index');
                Route::get('/ekskul-detail/{id}', 'show');
                Route::get('/ekskul-add', 'create');
                Route::post('/ekskul', 'store');
                Route::get('/ekskul-ubah/{id}', 'ubah');
                Route::put('/ekskul/{id}', 'update');
                Route::get('/ekskul-destroy/{id}', 'destroy');
            });

            Route::controller(StudentEkskulController::class)->group(function () {
                Route::get('/student-ekskul-add', 'create');
                Route::post('/student-ekskul', 'store');
                Route::get('/member-destroy/{id}', 'destroy');
            });

            Route::controller(UserController::class)->group(function () {
                Route::get('/user', 'index');
                Route::get('/user-detail/{id}', 'show');
                Route::get('/user-add', 'create');
                Route::post('/user', 'store');
                Route::get('/user-ubah/{id}', 'ubah');
                Route::put('/user/{id}', 'update');
                Route::get('/user-destroy/{id}', 'destroy');
            });
        });
    });
    Route::middleware(['auth'])->group(function () {
        Route::middleware(['CekUserLogin:2'])->group(function () {
            Route::controller(TeacherController::class)->group(function () {
                Route::get('/dashboard-teacher', 'indexTeacher');
                Route::get('/teacher', 'index');
                Route::get('/teacher-detail/{id}', 'show');
                Route::get('/teacher-add', 'create');
                Route::post('/teacher', 'store');
                Route::get('/teacher-ubah/{id}', 'ubah');
                Route::put('/teacher/{id}', 'update');
                Route::get('/teacher-destroy/{id}', 'destroy');
            });
            Route::controller(MatkulController::class)->group(function () {
                Route::get('/matkul', 'index');
                Route::get('/matkul-detail/{id}', 'show');
                Route::get('/matkul-add', 'create');
                Route::post('/matkul', 'store');
                Route::get('/matkul-ubah/{id}', 'ubah');
                Route::put('/matkul/{id}', 'update');
                Route::get('/matkul-destroy/{id}', 'destroy');
            });
        });
    });
});
