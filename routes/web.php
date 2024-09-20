<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    
    Route::get('dashboard', [StoreController::class, 'index'])->name('dashboard');
    Route::get('add-store', [StoreController::class, 'create'])->name('create');
    Route::post('add-store', [StoreController::class, 'store'])->name('store');
    Route::get('edit-store/{id}', [StoreController::class, 'edit'])->name('edit');
    Route::post('update-store/{id}', [StoreController::class, 'update'])->name('update');
    Route::delete('delete-store/{id}', [StoreController::class, 'destroy'])->name('destroy');

});


require __DIR__.'/auth.php';
