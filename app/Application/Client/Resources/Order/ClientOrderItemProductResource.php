<?php

declare(strict_types=1);

namespace App\Application\Client\Resources\Order;

use App\Domain\Product\Models\Product;
use App\Infrastructure\Resources\JsonResourceWithoutWrapper;
use Illuminate\Http\Request;
use Override;

class ClientOrderItemProductResource extends JsonResourceWithoutWrapper
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function toArray(Request $request): array
    {
        /** @var Product $product */
        $product = $this->resource;

        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->pivot->quantity,
        ];
    }
}
