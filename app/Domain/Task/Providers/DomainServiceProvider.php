<?php

declare(strict_types=1);

namespace App\Domain\Task\Providers;

use App\Domain\Task\Contracts\Repositories\ClientTaskRepositoryInterface;
use App\Domain\Task\Repositories\ClientTaskRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Override;

class DomainServiceProvider extends ServiceProvider implements DeferrableProvider
{
    #[Override]
    public function register(): void
    {
        $this->app->bind(ClientTaskRepositoryInterface::class, ClientTaskRepository::class);
    }

    #[Override]
    public function provides(): array
    {
        return [
            ClientTaskRepositoryInterface::class,
        ];
    }
}
