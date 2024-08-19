<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Override;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    #[Override]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(2, 100) * 100,
        ];
    }
}
