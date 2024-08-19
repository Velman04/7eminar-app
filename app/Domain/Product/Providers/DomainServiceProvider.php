<?php

declare(strict_types=1);

namespace App\Domain\Product\Providers;

use App\Domain\Product\Contracts\Repositories\ClientProductRepositoryInterface;
use App\Domain\Product\Contracts\Services\ClientProductServiceInterface;
use App\Domain\Product\Repositories\ClientProductRepository;
use App\Domain\Product\Services\ClientProductService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Override;

class DomainServiceProvider extends ServiceProvider implements DeferrableProvider
{
    #[Override]
    public function register(): void
    {
        $this->app->bind(ClientProductRepositoryInterface::class, ClientProductRepository::class);
        $this->app->bind(ClientProductServiceInterface::class, ClientProductService::class);
    }

    #[Override]
    public function provides(): array
    {
        return [
            ClientProductRepositoryInterface::class,
            ClientProductServiceInterface::class,
        ];
    }
}
