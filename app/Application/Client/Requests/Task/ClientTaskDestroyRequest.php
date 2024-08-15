<?php

declare(strict_types=1);

namespace App\Application\Client\Requests\Task;

use App\Domain\Task\Data\Client\ClientTaskDestroyData;
use Illuminate\Foundation\Http\FormRequest;

class ClientTaskDestroyRequest extends FormRequest
{
    public function getDTO(): ClientTaskDestroyData
    {
        return new ClientTaskDestroyData(
            taskId: (int) $this->route('taskId', 0),
            userId: $this->user()->getAuthIdentifier(),
        );
    }
}
