<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Locations::class, 'index'])->name('locations.index');
Route::get('/create', [\App\Http\Controllers\Locations::class, 'create'])->name('locations.create');
Route::get('/show/{location}', [\App\Http\Controllers\Locations::class, 'show'])->name('locations.show');
Route::get('/delete/{location}', [\App\Http\Controllers\Locations::class, 'delete'])->name('locations.delete');
Route::get('/edit/{location}', [\App\Http\Controllers\Locations::class, 'edit'])->name('locations.edit');
Route::get('/weather/{location}', [\App\Http\Controllers\Locations::class, 'show'])->name('locations.show');

Route::put('/update', [\App\Http\Controllers\Locations::class, 'store'])->name('locations.update');
Route::post('/store', [\App\Http\Controllers\Locations::class, 'store'])->name('locations.store');
