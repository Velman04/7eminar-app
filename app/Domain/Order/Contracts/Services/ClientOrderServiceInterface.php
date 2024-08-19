<?php

declare(strict_types=1);

namespace App\Domain\Order\Contracts\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Pagination\LengthAwarePaginator;

interface ClientOrderServiceInterface
{
    public function getLastOrdersWithCost(
        int $userId,
        int $subDays = 30,
        int $paginate = 10,
    ): LengthAwarePaginatorContract|LengthAwarePaginator|array;
}
