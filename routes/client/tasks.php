<?php

declare(strict_types=1);

use App\Application\Client\Controllers\Task\ClientTaskController;

Route::middleware('auth:client')->controller(ClientTaskController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{taskId}', 'show');
});
