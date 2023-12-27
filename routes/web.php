<?php

use App\Livewire\Homepage;
use App\Livewire\HomepageLaundry;
use App\Livewire\HomepageMahasiswa;
use App\Livewire\PesananMahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', Homepage::class)->name('homepage');

  // Mahasiswa User
  Route::group(['middleware' => ['can:isMahasiswa']], function () {
    Route::get('/user', HomepageMahasiswa::class)->name('homepageMahasiswa');
  });

  // Laundry Admin
  Route::group(['middleware' => ['can:isLaundry']], function () {
    Route::get('/admin', HomepageLaundry::class)->name('homepageLaundry');

    Route::get('/pesanan/{name_slug:user}', PesananMahasiswa::class)->name('pesanan');
  });
});
