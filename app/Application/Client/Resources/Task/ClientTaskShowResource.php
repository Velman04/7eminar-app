<?php

declare(strict_types=1);

namespace App\Application\Client\Resources\Task;

use App\Domain\Task\Models\Task;
use Illuminate\Http\Request;
use Override;

class ClientTaskShowResource extends ClientTaskIndexResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function toArray(Request $request): array
    {
        /** @var Task $task */
        $task = $this->resource;

        return [
            'id' => $task->id,
            'user' => [
                'id' => $task->user->id,
                'name' => $task->user->name,
            ],
            'title' => $task->title,
            'description' => $task->description,
            'status' => [
                'value' => $task->status->value,
                'name' => $task->status->name,
                'label' => $task->status->label(),
            ],
            'children' => ClientTaskIndexResource::collection($task->children),
            'createdAt' => $task->created_at,
        ];
    }
}
