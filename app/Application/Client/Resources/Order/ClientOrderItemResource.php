<?php

declare(strict_types=1);

namespace App\Application\Client\Resources\Order;

use App\Domain\Order\Models\Order;
use App\Infrastructure\Resources\JsonResourceWithoutWrapper;
use Illuminate\Http\Request;
use Override;

class ClientOrderItemResource extends JsonResourceWithoutWrapper
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function toArray(Request $request): array
    {
        /** @var Order $order */
        $order = $this->resource;

        return [
            'id' => $order->id,
            'createdAt' => $order->created_at,
            'cost' => $order->cost,
            'products' => ClientOrderItemProductResource::collection($order->products),
        ];
    }
}
