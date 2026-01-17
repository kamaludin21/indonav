<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::post('/temp/upload', [TicketController::class, 'upload'])->name('temp.upload');
Route::delete('/temp/revert', [TicketController::class, 'revert'])->name('temp.revert');

Route::get('/check-version-db', function () {
  $db_cechk = DB::select('select version() as version');
  return $db_cechk;
});
