<?php

declare(strict_types=1);

use App\Application\Client\Controllers\User\ClientUserLoginController;
use App\Application\Client\Controllers\User\ClientUserLogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:client')->post('login', ClientUserLoginController::class);
Route::middleware('auth:client')->post('logout', ClientUserLogoutController::class);
