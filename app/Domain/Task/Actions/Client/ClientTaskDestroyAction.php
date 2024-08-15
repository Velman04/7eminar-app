<?php

declare(strict_types=1);

namespace App\Domain\Task\Actions\Client;

use App\Domain\Task\Data\Client\ClientTaskDestroyData;
use App\Domain\Task\Models\Task;

class ClientTaskDestroyAction
{
    public function execute(ClientTaskDestroyData $data): void
    {
        $task = Task::query()
            ->where('user_id', $data->userId)
            ->findOrFail($data->taskId);

        $task->delete();
    }
}
