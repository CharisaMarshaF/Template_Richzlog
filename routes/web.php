<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/login', function(){
    return view('auth.login');
});
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('sistem')->name('sistem.')->group(function () {
    Route::get('/menu', function () {
        return view('sistem.menu');
    })->name('menu');
});
Route::prefix('master')->name('master.')->group(function () {
    Route::get('/pegawai', function () {
        return view('master.pegawai');
    })->name('pegawai');

    Route::get('/client', function () {
        return view('master.client');
    })->name('client');

    Route::get('/project', function () {
        return view('master.project');
    })->name('project');

    Route::get('/modul', function () {
        return view('master.modul');
    })->name('modul');

    Route::get('/menu', function () {
        return view('master.menu');
    })->name('menu');

    Route::get('/urgensi', function () {
        return view('master.urgensi');
    })->name('urgensi');
});

// Support group
Route::prefix('support')->name('support.')->group(function () {
    Route::get('/bantuan', function () {
        return view('support.bantuan');
    })->name('bantuan');

    Route::get('/faq', function () {
        return view('support.faq');
    })->name('faq');
});

// Tasklists group
Route::prefix('tasklist')->name('tasklist.')->group(function () {
    Route::get('/all', function () {
        return view('tasklist.tasklist_all');
    })->name('all');

    Route::get('/saya', function () {
        return view('tasklist.saya');
    })->name('saya');
    Route::get('/approval_task', function () {
        return view('tasklist.approval_task');
    })->name('approval_task');
    Route::get('/late', function () {
        return view('tasklist.tasklist_late');
    })->name('late');
    Route::get('/recap', function () {
        return view('tasklist.recap');
    })->name('recap');
    Route::get('/real', function () {
        return view('tasklist.real');
    })->name('real');

    Route::get('/detail', function(){
        return view('tasklist.tasklist_detail');
    })->name('detail');
});

// Reports group
Route::prefix('report')->name('report.')->group(function () {
    Route::get('/durasi_task', function () {
        return view('report.durasi_task');
    })->name('durasi_task');

    Route::get('/task_pegawai', function () {
        return view('report.task_pegawai');
    })->name('task_pegawai');
});

// Settings
Route::get('/settings', function () {
    return view('settings');
})->name('settings');
