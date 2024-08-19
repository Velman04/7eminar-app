<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/** Authentication */
Route::prefix('user')->group(base_path('routes/client/user.php'));

/** Tasks */
Route::prefix('tasks')->group(base_path('routes/client/tasks.php'));

/** Orders */
Route::prefix('orders')->group(base_path('routes/client/orders.php'));
