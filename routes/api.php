<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CallbackController;

// route callback
Route::post('callback', CallbackController::class);
