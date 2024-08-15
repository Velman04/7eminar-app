<?php

declare(strict_types=1);

namespace App\Domain\Task\Providers;

use App\Domain\Task\Contracts\Repositories\ClientTaskRepositoryInterface;
use App\Domain\Task\Repositories\ClientTaskRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ClientTaskRepositoryInterface::class, ClientTaskRepository::class);
    }
}
