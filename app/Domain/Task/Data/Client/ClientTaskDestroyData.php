<?php

declare(strict_types=1);

namespace App\Domain\Task\Data\Client;

use Spatie\LaravelData\Data;

class ClientTaskDestroyData extends Data
{
    public function __construct(
        public int $taskId,
        public int $userId,
    ) {

    }
}
