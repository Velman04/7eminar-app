<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\User;

use App\Domain\User\Actions\Client\ClientUserLogoutAction;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ClientUserLogoutController extends Controller
{
    public function __invoke(ClientUserLogoutAction $action): JsonResponse
    {
        $action->execute();

        return $this->success();
    }
}
