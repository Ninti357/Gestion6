<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/asignacion/{id}', [PdfController::class, 'asignacion'])->name('pdf.asignacion');

