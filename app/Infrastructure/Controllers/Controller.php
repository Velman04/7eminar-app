<?php

declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    public function success(
        array|JsonSerializable $payload = [],
        int $code = Response::HTTP_OK
    ): JsonResponse {
        if ($payload instanceof JsonSerializable) {
            $payload = $payload->jsonSerialize();
        }

        if (!blank($payload)) {
            $payload = ['data' => $payload];
        }

        return response()->json(array_merge(['success' => true], $payload), $code);
    }

    public function error(
        string $message,
        array|JsonSerializable $payload = [],
        int $code = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        if ($payload instanceof JsonSerializable) {
            $payload = $payload->jsonSerialize();
        }

        if (!blank($payload)) {
            $payload = ['data' => $payload];
        }

        return response()->json(array_merge(['success' => false], ['message' => $message], $payload), $code);
    }
}
