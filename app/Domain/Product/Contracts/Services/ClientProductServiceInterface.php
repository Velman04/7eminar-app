<?php

declare(strict_types=1);

namespace App\Domain\Product\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface ClientProductServiceInterface
{
    public function getCachedPopularProducts(int $limit = 10): Collection|array;
}
