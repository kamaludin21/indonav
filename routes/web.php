<?php
use App\Http\Controllers\IndustryController;
use Illuminate\Support\Facades\Route;

Route::get('/industries/{slug}', [IndustryController::class, 'view'])->name('industry.view');

Route::get('foo', function(){
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
    return 'success';
});
