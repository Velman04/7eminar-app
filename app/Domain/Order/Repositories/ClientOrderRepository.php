<?php

declare(strict_types=1);

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Contracts\Repositories\ClientOrderRepositoryInterface;
use App\Domain\Order\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ClientOrderRepository implements ClientOrderRepositoryInterface
{
    #[\Override]
    public function getLastOrdersByUserId(
        int $userId,
        int $subDays = 30,
        int $paginate = 10,
    ): LengthAwarePaginatorContract|LengthAwarePaginator|array {
        return Order::query()
            ->select(['id', 'created_at'])
            ->where('user_id', $userId)
            ->where('created_at', '>=', Carbon::now()->subDays($subDays))
            ->with('products:id,name,price')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }
}
