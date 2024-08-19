<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\Order;

use App\Application\Client\Resources\Order\ClientOrderItemResource;
use App\Domain\Order\Contracts\Services\ClientOrderServiceInterface;
use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Resources\PaginationResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientOrderLastController extends Controller
{
    public function __construct(
        private readonly ClientOrderServiceInterface $clientOrderService,
    ) {

    }

    public function __invoke(Request $request): JsonResponse
    {
        $orders = $this->clientOrderService->getLastOrdersWithCost($request->user()->getAuthIdentifier());

        return $this->success([
            'orders' => ClientOrderItemResource::collection($orders),
            'pagination' => new PaginationResource($orders),
        ]);
    }
}
