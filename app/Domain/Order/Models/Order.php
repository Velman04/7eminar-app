<?php

declare(strict_types=1);

namespace App\Domain\Order\Models;

use App\Domain\Product\Models\Product;
use App\Domain\User\Models\User;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
    ];

    protected static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_item')->withPivot('quantity');
    }
}
