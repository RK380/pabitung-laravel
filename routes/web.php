<?php

use App\Http\Controllers\BerkasPerkaraController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HalamanController::class, 'index'])->name('home');
Route::get('/monperkara', [HalamanController::class, 'monperkara']);
Route::get('/monipendis', [HalamanController::class, 'monipendis']);
Route::get('/monpihakmed', [HalamanController::class, 'monpihakmed']);
Route::get('/pendistribusian', [HalamanController::class, 'pendistribusian']);
Route::resource('berkas', BerkasPerkaraController::class);
Route::get('/statistik-pengunjung', [VisitorController::class, 'index'])->name('visitors.index');

    //LOGIN & LOGOUT
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

    //ROLE OPERATOR
Route::middleware(['auth', 'role:operator'])
    ->group(function () {

        Route::get('/operator', [HalamanController::class, 'operator'])
            ->name('operator');

        Route::post('/operator/store', [PerkaraController::class, 'store'])
            ->name('perkara.store');

        Route::get('/operatorshow/show', [PerkaraController::class, 'show'])
            ->name('perkara.show');

        Route::delete('/operatorshow/{id}', [PerkaraController::class, 'destroy'])
            ->name('perkara.destroy');

        Route::get('/perkara/report/pdf', [PerkaraController::class, 'downloadPdf'])
            ->name('perkara.report.pdf');

        Route::get('/pendistribusian/download-pdf', [PerkaraController::class, 'downloadPdfPen'])
            ->name('pendistribusian.download.pdf');

        Route::get('/daftarhadir/download-pdf', [DaftarHadirController::class, 'downloadPdfHad'])
            ->name('daftarhadir.laporan.pdf');

        Route::get('/daftarhadir', [DaftarHadirController::class, 'index'])
            ->name('daftarhadir.index');

        Route::get('/daftarhadirshow/show', [DaftarHadirController::class, 'show'])
            ->name('daftarhadir.show');

        Route::post('/daftarhadir/store', [DaftarHadirController::class, 'store'])
            ->name('daftarhadir.store');

        Route::get('/hakim', [HalamanController::class, 'hakim'])
            ->name('hakim');

        Route::get('/hakim/edit/{id}', [PerkaraController::class, 'edit'])
            ->name('perkara.edit');

        Route::put('/hakim/update/{id}', [PerkaraController::class, 'update'])
            ->name('perkara.update');

        Route::get('/hakim2', [HalamanController::class, 'hakim2'])
            ->name('hakim2');

        Route::get('/hakim2/edit2/{id}', [PerkaraController::class, 'edit2'])
            ->name('perkara.edit2');

        Route::put('/hakim2/update2/{id}', [PerkaraController::class, 'update2'])
            ->name('perkara.update2');

        Route::get('/panitera', [HalamanController::class, 'panitera'])
            ->name('panitera');

        Route::get('/panitera/edit/{id}', [PerkaraController::class, 'editpanitera'])
            ->name('perkara.editpanitera');

        Route::put('/panitera/update/{id}', [PerkaraController::class, 'updatepanitera'])
            ->name('perkara.updatepanitera');

    });

    //ROLE KETUA MAJELIS
Route::middleware(['auth', 'role:ketua_majelis'])
    ->group(function () {

        Route::get('/hakim', [HalamanController::class, 'hakim'])
            ->name('hakim');

        Route::get('/hakim/edit/{id}', [PerkaraController::class, 'edit'])
            ->name('perkara.edit');

        Route::put('/hakim/update/{id}', [PerkaraController::class, 'update'])
            ->name('perkara.update');

    });

    //ROLE HAKIM TUNGGAL
Route::middleware(['auth', 'role:hakim_tunggal'])
    ->group(function () {

        Route::get('/hakim2', [HalamanController::class, 'hakim2'])
            ->name('hakim2');

        Route::get('/hakim2/edit2/{id}', [PerkaraController::class, 'edit2'])
            ->name('perkara.edit2');

        Route::put('/hakim2/update2/{id}', [PerkaraController::class, 'update2'])
            ->name('perkara.update2');

    });

    //ROLE PANITERA
Route::middleware(['auth', 'role:panitera'])
    ->group(function () {

        Route::get('/panitera', [HalamanController::class, 'panitera'])
            ->name('panitera');

        Route::get('/panitera/edit/{id}', [PerkaraController::class, 'editpanitera'])
            ->name('perkara.editpanitera');

        Route::put('/panitera/update/{id}', [PerkaraController::class, 'updatepanitera'])
            ->name('perkara.updatepanitera');

    });

    //ROLE SEMUA
// Route::middleware(['auth'])->group(function () {
// });