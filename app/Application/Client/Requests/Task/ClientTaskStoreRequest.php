<?php

declare(strict_types=1);

namespace App\Application\Client\Requests\Task;

use App\Domain\Task\Data\Client\ClientTaskStoreData;
use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\Task\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientTaskStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'integer', Rule::exists(Task::class, 'id')],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65535'],
            'status' => ['required', 'integer', Rule::in(TaskStatusEnum::values())],
        ];
    }

    public function getDTO(): ClientTaskStoreData
    {
        return new ClientTaskStoreData(
            userId: $this->user()->getAuthIdentifier(),
            parentId: $this->input('parent_id'),
            title: $this->input('title'),
            description: $this->input('description'),
            status: $this->input('status'),
        );
    }
}
