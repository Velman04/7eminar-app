<?php

declare(strict_types=1);

use App\Application\Client\Controllers\User\ClientUserLoginController;
use App\Application\Client\Controllers\User\ClientUserLogoutController;
use Illuminate\Support\Facades\Route;

Route::post('login', ClientUserLoginController::class)->middleware(['guest:sanctum']);
Route::post('logout', ClientUserLogoutController::class)->middleware(['auth:sanctum']);
