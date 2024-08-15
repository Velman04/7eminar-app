<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\Status;

use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ClientStatusController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->success();
    }
}
