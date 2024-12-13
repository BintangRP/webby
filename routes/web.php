<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessInsightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveInsightsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate', function () {
    return view('generate');
})->name('generate');

Route::get('/VnIpXHII39761Fu4aFvR', function () {
    return response()->json([
        'api_url' => env('MISTRAL_API_KEY'),
        'agent_id' => env('AGENT_API_ID')
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/insights', [SaveInsightsController::class, 'index'])->name('insights.index');
    Route::get('/insights/{insight}', [SaveInsightsController::class, 'show'])->name('insights.show');

    Route::post('/api/generate-insight', [BusinessInsightController::class, 'generate']);
    Route::post('/api/save-insight', [SaveInsightsController::class, 'save']);
    Route::delete('/api/delete-insight/{id}', [SaveInsightsController::class, 'delete']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
