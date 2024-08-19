<?php

declare(strict_types=1);

namespace App\Domain\Product\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ClientProductRepositoryInterface
{
    public function getPopularProducts(int $limit = 10, int $subDays = 30): Collection|array;
}
