<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;

Route::view('/','index')->name('index');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');
