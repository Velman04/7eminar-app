<?php

declare(strict_types=1);

namespace App\Domain\Product\Services;

use App\Domain\Product\Contracts\Repositories\ClientProductRepositoryInterface;
use App\Domain\Product\Contracts\Services\ClientProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

readonly class ClientProductService implements ClientProductServiceInterface
{
    public function __construct(
        private ClientProductRepositoryInterface $clientProductRepository,
    ) {

    }

    public function getCachedPopularProducts(int $limit = 10): Collection|array
    {
        return Cache::remember('popular_products', 60 * 60, function () use ($limit) {
            return $this->clientProductRepository->getPopularProducts($limit);
        });
    }
}
