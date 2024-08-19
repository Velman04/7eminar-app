<?php

declare(strict_types=1);

use App\Application\Client\Controllers\Product\ClientProductPopularController;

Route::get('/popular', ClientProductPopularController::class);
