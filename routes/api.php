<?php

use App\Http\Controllers\Api\ClientController;
use Illuminate\Support\Facades\Route;

Route::apiResource('clients', ClientController::class)->only('store');
