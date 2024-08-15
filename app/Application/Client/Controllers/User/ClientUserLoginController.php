<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\User;

use App\Application\Client\Requests\User\ClientUserLoginRequest;
use App\Domain\User\Actions\Client\ClientUserLoginAction;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ClientUserLoginController extends Controller
{
    public function __invoke(ClientUserLoginRequest $request, ClientUserLoginAction $action): JsonResponse
    {
        return response()->json(['token' => $action->execute($request->getDTO())]);
    }
}
