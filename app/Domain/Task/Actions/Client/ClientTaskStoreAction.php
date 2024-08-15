<?php

declare(strict_types=1);

namespace App\Domain\Task\Actions\Client;

use App\Domain\Task\Data\Client\ClientTaskStoreData;
use App\Domain\Task\Models\Task;

class ClientTaskStoreAction
{
    public function execute(ClientTaskStoreData $data): Task
    {
        return Task::query()->create([
            'user_id' => $data->userId,
            'parent_id' => $data->parentId,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
        ]);
    }
}
