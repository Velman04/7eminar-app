<?php

declare(strict_types=1);

namespace App\Domain\Order\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Pagination\LengthAwarePaginator;

interface ClientOrderRepositoryInterface
{
    public function getLastOrdersByUserId(
        int $userId,
        int $subDays = 30,
        int $paginate = 10,
    ): LengthAwarePaginatorContract|LengthAwarePaginator|array;
}
