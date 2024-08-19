<?php

declare(strict_types=1);

use App\Application\Client\Controllers\Order\ClientOrderLastController;

Route::middleware('auth:client')->group(function () {
    Route::get('/last', ClientOrderLastController::class);
});
