<?php

declare(strict_types=1);

namespace App\Application\Client\Resources\Task;

use App\Domain\Task\Models\Task;
use App\Infrastructure\Resources\JsonResourceWithoutWrapper;
use Illuminate\Http\Request;
use Override;

class ClientTaskIndexResource extends JsonResourceWithoutWrapper
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
        ];
    }
}
