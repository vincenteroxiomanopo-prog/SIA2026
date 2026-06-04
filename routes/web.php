<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrskhsController;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome');
});


// Halaman Dashboard Utama setelah Login 
//Halaman dosen
//Bawaan breze
// Route::get('/dashboard', function () {
//     return view('dashboard'); 
// })->middleware(['auth', 'verified'])->name('dashboard');

// Halaman Dashboard Utama setelah Login 
Route::get('/dashboard', function () {
    return view('dash'); // Diubah dari 'dashboard' menjadi 'dash'
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('Dashboard'); 
// });

// Grup Rute yang Membutuhkan Autentikasi (Harus Login)
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/krskhs/pdf', [KrskhsController::class, 'pdf'])->name('krskhs.pdf');
    Route::get('/jadwal/presensi/{id}', [JadwalController::class, 'cetakPresensi'])->name('jadwal.presensi');

    // Rute Manajemen Profil (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTE SISTEM INFORMASI AKADEMIK (SIA2026)
    // 1. CRUD MHS
    Route::resource('mahasiswa', MahasiswaController::class);

    // 2. CRUD DOSEN
    Route::resource('dosen', DosenController::class);

    // 3. Mata Kuliah
    Route::resource('matakuliah', MatakuliahController::class);

    // 4. Jadwal
    Route::resource('jadwal', JadwalController::class);

    // 5. KRSKHS
    Route::resource('krskhs', KrskhsController::class);

    // 6. Registrasi
    //Halaman mahasiswa
    Route::resource('registrasi', RegistrasiController::class);



});
Route::middleware(['auth', 'role:dosen,mahasiswa'])->group(function () {
    Route::get('/krskhs/pdf', [KrskhsController::class, 'pdf'])->name('krskhs.pdf');
    Route::get('/jadwal/presensi/{id}', [JadwalController::class, 'cetakPresensi'])->name('jadwal.presensi');

    
    // Rute Manajemen Profil (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTE SISTEM INFORMASI AKADEMIK (SIA2026)
    // 1. CRUD MHS
    Route::resource('mahasiswa', MahasiswaController::class);

    // 2. CRUD DOSEN
    Route::resource('dosen', DosenController::class);

    // 3. Mata Kuliah
    Route::resource('matakuliah', MatakuliahController::class);

    // 4. Jadwal
    Route::resource('jadwal', JadwalController::class);

    // 5. KRSKHS
    Route::resource('krskhs', KrskhsController::class);

    // 6. Registrasi
    //Halaman mahasiswa
    Route::resource('registrasi', RegistrasiController::class);

});




Route::middleware(['auth'])->group(function () {
    
    Route::get('/krskhs/pdf', [KrskhsController::class, 'pdf'])->name('krskhs.pdf');
    
    // Rute Manajemen Profil (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTE SISTEM INFORMASI AKADEMIK (SIA2026)
    // 1. CRUD MHS
    Route::resource('mahasiswa', MahasiswaController::class);

    // 2. CRUD DOSEN
    Route::resource('dosen', DosenController::class);

    // 3. Mata Kuliah
    Route::resource('matakuliah', MatakuliahController::class);

    // 4. Jadwal
    Route::resource('jadwal', JadwalController::class);

    // 5. KRSKHS
    Route::resource('krskhs', KrskhsController::class);

    // 6. Registrasi
    //Halaman mahasiswa
    Route::resource('registrasi', RegistrasiController::class);

});

// //Mahasiswa
// Route::get('/registrasi',function(){
//     return view('registrasi');
// })->middleware(['auth','veriied'])->name('registrasi.index');

// Route::middleware(['auth','role:mahasiswa'])->group(function(){
//     Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
//     Route::get('/profile',[ProfileController::class,'update'])->name('profile.update');
//     Route::get('/profile',[ProfileController::class,'destory'])->name('profile.destory');
// });


// //dosen
// Route::get('/dashboard',function(){
//     return view('dash');
// })->middleware(['auth','veriied'])->name('dashboard');

// Route::middleware(['auth','role:dosen'])->group(function(){
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::resource('mahasiswa', MahasiswaController::class);
//     Route::resource('dosen', DosenController::class);
//     Route::resource('matakuliah', MatakuliahController::class);
//     Route::resource('jadwal', JadwalController::class);
//     Route::resource('krskhs', KrskhsController::class);
//     Route::resource('registrasi', RegistrasiController::class);
// });







require __DIR__.'/auth.php';