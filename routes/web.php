<?php

use App\Http\Controllers\IndustryController;
use Illuminate\Support\Facades\Route;

Route::get('/industries/{slug}', [IndustryController::class, 'view'])->name('industry.view');
