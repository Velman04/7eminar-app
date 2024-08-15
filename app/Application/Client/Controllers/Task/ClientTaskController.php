<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\Task;

use App\Application\Client\Requests\Task\ClientTaskDestroyRequest;
use App\Application\Client\Requests\Task\ClientTaskStoreRequest;
use App\Application\Client\Requests\Task\ClientTaskUpdateRequest;
use App\Application\Client\Resources\Task\ClientTaskIndexResource;
use App\Application\Client\Resources\Task\ClientTaskShowResource;
use App\Domain\Task\Actions\Client\ClientTaskDestroyAction;
use App\Domain\Task\Actions\Client\ClientTaskStoreAction;
use App\Domain\Task\Actions\Client\ClientTaskUpdateAction;
use App\Domain\Task\Contracts\Repositories\ClientTaskRepositoryInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientTaskController extends Controller
{
    public function __construct(
        private readonly ClientTaskRepositoryInterface $clientTaskRepository,
    ) {

    }

    public function index(Request $request): JsonResponse
    {
        $tasks = $this->clientTaskRepository->getRootTasksByUserId($request->user()->getAuthIdentifier());

        return $this->success(ClientTaskIndexResource::collection($tasks));
    }

    public function show(Request $request, int $taskId): JsonResponse
    {
        $task = $this->clientTaskRepository->getTaskWithChildrenByUserIdAndTaskId(
            $request->user()->getAuthIdentifier(),
            $taskId
        );

        return $this->success(new ClientTaskShowResource($task));
    }

    public function store(ClientTaskStoreRequest $request, ClientTaskStoreAction $action): JsonResponse
    {
        $task = $action->execute($request->getDTO());

        return $this->success(new ClientTaskIndexResource($task));
    }

    public function update(ClientTaskUpdateRequest $request, ClientTaskUpdateAction $action): JsonResponse
    {
        $task = $action->execute($request->getDTO());

        return $this->success(new ClientTaskIndexResource($task));
    }

    public function destroy(ClientTaskDestroyRequest $request, ClientTaskDestroyAction $action): JsonResponse
    {
        $action->execute($request->getDTO());

        return $this->success();
    }
}
