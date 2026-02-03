<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WatermarkController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ArchiveController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'));

/*
|--------------------------------------------------------------------------
| AUTH DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.admin.dashboard')
        : view('user.dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard',
    [App\Http\Controllers\AdminDashboardController::class, 'index']
    )->name('admin.dashboard');


    // PDF LOCKER
        Route::get('/pdf-locker', function () {
            return view('admin.pdf-locker');
        })->name('pdf.locker');

        Route::get('/arsip-dokumen', 
            [ArchiveController::class, 'index'])
            ->name('archives.index');

        Route::get('/admin/arsip-dokumen/{archive}/download',
            [ArchiveController::class, 'download'])
            ->name('archives.download');

        Route::get('/admin/arsip-dokumen/{archive}/preview', 
            [ArchiveController::class, 'preview'])
            ->name('archives.preview');

        Route::delete('/admin/arsip-dokumen/{archive}',
            [ArchiveController::class, 'destroy'])
            ->name('archives.destroy');



        // Proses Watermark (POST)
        Route::post('/watermark-process', 
            [App\Http\Controllers\WatermarkController::class, 'process'])
            ->name('watermark.process');

    // USER
    Route::get('/users', 
        [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', 
        [UserController::class, 'create'])
        ->name('users.create');

    Route::post('/users', 
        [UserController::class, 'store'])
        ->name('users.store');

    Route::get('/users/{user}/edit', 
        [UserController::class, 'edit'])
        ->name('users.edit');

    Route::put('/users/{user}', 
        [UserController::class, 'update'])
        ->name('users.update');

    Route::delete('/users/{user}', 
        [UserController::class, 'destroy'])
        ->name('users.destroy');

    // NEWS
    Route::get('/news', 
        [NewsController::class, 'index'])
            ->name('news.index');
    Route::get('/news/create',
        [NewsController::class, 'create'])
        ->name('news.create');
    Route::post('/news',
        [NewsController::class, 'store'])
        ->name('news.store');
    
    Route::get('/news/{news}/edit', 
        [NewsController::class, 'edit'])
        ->name('news.edit');
    Route::put('/news/{news}', 
        [NewsController::class, 'update'])
        ->name('news.update');
    Route::delete('/news/{news}', 
        [NewsController::class, 'destroy'])
        ->name('news.destroy');
});

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

    Route::get('/dashboard', fn () => view('user.dashboard'))
        ->name('dashboard');

    // PROFILE
    Route::get('/profile', 
        [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profile', 
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/password', 
        [ProfileController::class, 'password'])
        ->name('profile.password');
    Route::post('/users', 
        [UserController::class, 'store'])
        ->name('users.store');

    route::get('/users/{user}/edit', 
        [UserController::class, 'edit'])
        ->name('users.edit');

    Route::put('/users/{user}', 
        [UserController::class, 'update'])
        ->name('users.update');

    // PDF LOCKER
        Route::get('/pdf-locker', function () {
            return view('user.pdf-locker');
        })->name('pdf.locker');
        Route::post('/watermark-process', 
            [App\Http\Controllers\WatermarkController::class, 'process'])
            ->name('watermark.process');
    // NEWS
    Route::get('/news', 
        [NewsController::class, 'index'])
            ->name('news.index');
    Route::get('/news/{news}', 
        [NewsController::class, 'show'])
        ->name('news.show');

    // PDF VERIFY
    Route::get('/verifikasi-dokumen', 
        [UserDashboardController::class, 'verifikasiDokumen'])
        ->name('verifikasi.dokumen');
    
    // ARSIP DOKUMEN
    Route::get('/arsip-dokumen', 
        [ArchiveController::class, 'index'])
        ->name('archives.index');

    Route::get('/arsip-dokumen/{archive}/download', [ArchiveController::class, 'download'])
        ->name('archives.download');

    Route::delete('/arsip-dokumen/{archive}', [ArchiveController::class, 'destroy'])
        ->name('archives.destroy');
    
});



/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/phpinfo', function() {
    phpinfo();
});


require __DIR__.'/auth.php';
