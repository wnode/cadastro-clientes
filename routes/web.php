<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

// Route to list customers
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

// Route to show the create form
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

// Route to store a new customer
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

// Route to show the edit form
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Route to update a customer
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

// Route to delete a customer
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
