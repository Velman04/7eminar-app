<?php

declare(strict_types=1);

namespace App\Domain\Order\Contracts\Services;

use App\Domain\Order\Models\Order;
use Closure;

interface OrderCostCalculatorServiceInterface
{
    public function calculate(Order $order): Closure|int|null;
}
