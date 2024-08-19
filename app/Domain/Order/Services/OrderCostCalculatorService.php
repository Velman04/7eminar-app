<?php

declare(strict_types=1);

namespace App\Domain\Order\Services;

use App\Domain\Order\Contracts\Services\OrderCostCalculatorServiceInterface;
use App\Domain\Order\Models\Order;
use Closure;

class OrderCostCalculatorService implements OrderCostCalculatorServiceInterface
{
    #[\Override]
    public function calculate(Order $order): Closure|int|null
    {
        return $order->products
            ->reduce(fn (int $carry, $product) => $carry + $product->price * $product->pivot->quantity, 0);
    }
}
