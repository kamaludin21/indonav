<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::post('/temp/upload', [TicketController::class, 'upload'])->name('temp.upload');
Route::delete('/temp/revert', [TicketController::class, 'revert'])->name('temp.revert');
