<?php

declare(strict_types=1);

use App\Domain\Product\Models\Product;
use App\Domain\User\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained();
            $table->datetimes();
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('quantity');
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_item');
    }
};
