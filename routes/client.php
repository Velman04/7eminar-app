<?php

declare(strict_types=1);

use App\Application\Client\Controllers\Status\ClientStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/status', ClientStatusController::class);
