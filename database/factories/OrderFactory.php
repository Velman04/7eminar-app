<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Order\Models\Order;
use App\Domain\Product\Models\Product;
use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Override;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    #[Override]
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
        ];
    }

    #[\Override]
    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $createdAt = now()->subMinutes(rand(1, 10000));

            $order->update([
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        });
    }

    public function withProducts(int $productCount = 6): Factory
    {
        return $this->afterCreating(function (Order $order) use ($productCount) {
            $productCount = $this->faker->numberBetween(1, $productCount);
            $products = Product::query()->inRandomOrder()->limit($productCount)->get();

            $products->each(function (Product $product) use ($order) {
                $order->products()->attach($product->id, ['quantity' => $this->faker->numberBetween(1, 5)]);
            });
        });
    }
}
