<?php

declare(strict_types=1);

namespace App\Domain\Task\Contracts\Repositories;

use App\Domain\Task\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface ClientTaskRepositoryInterface
{
    public function getRootTasksByUserId(int $userId): Collection;

    public function getTaskWithChildrenByUserIdAndTaskId(int $userId, int $taskId): Task;
}
