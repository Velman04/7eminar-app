<?php

declare(strict_types=1);

namespace App\Domain\Task\Actions\Client;

use App\Domain\Task\Data\Client\ClientTaskUpdateData;
use App\Domain\Task\Models\Task;

class ClientTaskUpdateAction
{
    public function execute(ClientTaskUpdateData $data): Task
    {
        $task = Task::query()->where('user_id', $data->userId)->findOrFail($data->taskId);

        $filterPayload = array_filter([
            'parent_id' => $data->parentId,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
        ]);

        $task->update($filterPayload);

        return $task;
    }
}
