<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/** Аутентификация */
Route::prefix('user')->group(base_path('routes/client/user.php'));
