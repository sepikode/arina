<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/guests', [WeddingController::class, 'index'])->name('admin.guests');

Route::get('/{code}', [WeddingController::class, 'show'])->name('invitation');
Route::post('/{code}/rsvp', [WeddingController::class, 'rsvp'])->name('rsvp');
Route::post('/admin/guests/import', [WeddingController::class, 'import'])->name('guests.import');
Route::get('/template-guest', function() {
    $file = public_path('templates/template_guest.xlsx');
    return response()->download($file);
})->name('template.download');