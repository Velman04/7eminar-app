<?php

declare(strict_types=1);

namespace App\Domain\Product\Models;

use App\Domain\Order\Models\Order;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Override;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_item', 'product_id', 'order_id')
            ->withPivot('quantity');
    }
}
