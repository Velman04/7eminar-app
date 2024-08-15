<?php

declare(strict_types=1);

namespace App\Domain\Task\Repositories;

use App\Domain\Task\Contracts\Repositories\ClientTaskRepositoryInterface;
use App\Domain\Task\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class ClientTaskRepository implements ClientTaskRepositoryInterface
{
    public function getRootTasksByUserId(int $userId): Collection
    {
        return Task::query()
            ->where('user_id', $userId)
            ->whereIsRoot()
            ->with('user:id,name')
            ->get(['id', 'user_id', 'parent_id', 'title', 'description', 'status']);
    }

    public function getTaskWithChildrenByUserIdAndTaskId(int $userId, int $taskId): Task
    {
        return Task::query()
            ->where('user_id', $userId)
            ->whereIsRoot()->with([
                'user:id,name',
                'children' => fn($query) => $query->select(
                    ['id', 'user_id', 'parent_id', 'title', 'description', 'status']
                )->with('user:id,name'),
            ])
            ->findOrFail($taskId, ['id', 'user_id', 'parent_id', 'title', 'description', 'status']);
    }
}
