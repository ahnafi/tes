<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;

Route::get('/', function () {
<<<<<<< HEAD
    return view('pages.welcome');
});
=======
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/{id}', function ($id) {
        return redirect()->back();
    })->name('evaluations.show');
});
>>>>>>> 92638be51e0e6e685294170c2c7d2478197695cd
