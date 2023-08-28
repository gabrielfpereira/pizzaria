<?php

use App\Http\Controllers\{ClientController, ProfileController};
use Illuminate\Support\Facades\{Auth, Route};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if(app()->isLocal()) {
        Auth::loginUsingId(1);

        return to_route('dashboard');
    }

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
});

require __DIR__ . '/auth.php';
