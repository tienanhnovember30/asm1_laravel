<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PassengerController;

Route::prefix('hanh-khach')->group(function(){
    Route::get('/', [PassengerController::class, 'index'])->name('passenger.index');
    // localhost:8000/admin/san-pham/remove/12
    Route::get('remove/{id}', [PassengerController::class, 'remove'])
    ->name('passenger.remove');

    Route::get('add', [PassengerController::class, 'addForm'])->name('passenger.add');
    Route::post('add', [PassengerController::class, 'saveAdd']);

    Route::get('edit/{id}', [PassengerController::class, 'editForm'])->name('passenger.edit');
    Route::post('edit/{id}', [PassengerController::class, 'saveEdit']);

});

Route::get('/', function () {
    return view('welcome');
});
