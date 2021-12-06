<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PassengerController;
use App\Models\Car;

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
Route::prefix('xe')->group(function(){
    Route::get('/', [CarController::class, 'index'])->name('car.index');
    // localhost:8000/admin/san-pham/remove/12
    Route::get('remove/{id}', [CarController::class, 'remove'])
    ->name('car.remove');

    Route::get('add', [CarController::class, 'addFormC'])->name('car.add');
    Route::post('add', [CarController::class, 'saveAddC']);

    Route::get('edit/{id}', [CarController::class, 'editFormC'])->name('car.edit');
    Route::post('edit/{id}', [CarController::class, 'saveEditC']);

});


?>