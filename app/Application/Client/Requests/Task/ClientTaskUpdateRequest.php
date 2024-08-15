<?php

declare(strict_types=1);

namespace App\Application\Client\Requests\Task;

use App\Domain\Task\Data\Client\ClientTaskUpdateData;
use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\Task\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientTaskUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'integer', Rule::exists(Task::class, 'id')],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65535'],
            'status' => ['nullable', 'integer', Rule::in(TaskStatusEnum::values())],
        ];
    }

    public function getDTO(): ClientTaskUpdateData
    {
        return new ClientTaskUpdateData(
            taskId: (int) $this->route('taskId', 0),
            userId: $this->user()->getAuthIdentifier(),
            parentId: $this->integer('parent_id'),
            title: $this->input('title'),
            description: $this->input('description'),
            status: $this->integer('status'),
        );
    }
}
