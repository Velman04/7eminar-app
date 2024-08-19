<?php

declare(strict_types=1);

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Contracts\Repositories\ClientProductRepositoryInterface;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class ClientProductRepository implements ClientProductRepositoryInterface
{
    public function getPopularProducts(int $limit = 10, int $subDays = 30): Collection|array
    {
        return Product::query()
            ->where('created_at', '>=', Carbon::now()->subDays($subDays))
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take($limit)
            ->get();
    }
}
