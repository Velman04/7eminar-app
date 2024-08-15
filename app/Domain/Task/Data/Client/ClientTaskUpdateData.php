<?php

declare(strict_types=1);

namespace App\Domain\Task\Data\Client;

use Spatie\LaravelData\Data;

class ClientTaskUpdateData extends Data
{
    public function __construct(
        public int $taskId,
        public int $userId,
        public ?int $parentId,
        public ?string $title,
        public ?string $description,
        public ?int $status,
    ) {

    }
}
