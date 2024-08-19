<?php

declare(strict_types=1);

namespace App\Domain\Order\Providers;

use App\Domain\Order\Contracts\Repositories\ClientOrderRepositoryInterface;
use App\Domain\Order\Contracts\Services\ClientOrderServiceInterface;
use App\Domain\Order\Contracts\Services\OrderCostCalculatorServiceInterface;
use App\Domain\Order\Repositories\ClientOrderRepository;
use App\Domain\Order\Services\ClientOrderService;
use App\Domain\Order\Services\OrderCostCalculatorService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Override;

class DomainServiceProvider extends ServiceProvider implements DeferrableProvider
{
    #[Override]
    public function register(): void
    {
        $this->app->bind(ClientOrderRepositoryInterface::class, ClientOrderRepository::class);
        $this->app->bind(ClientOrderServiceInterface::class, ClientOrderService::class);
        $this->app->bind(OrderCostCalculatorServiceInterface::class, OrderCostCalculatorService::class);
    }

    #[Override]
    public function provides(): array
    {
        return [
            ClientOrderRepositoryInterface::class,
            ClientOrderServiceInterface::class,
            OrderCostCalculatorServiceInterface::class,
        ];
    }
}
