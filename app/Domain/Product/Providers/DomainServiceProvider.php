<?php

declare(strict_types=1);

namespace App\Domain\Product\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Override;

class DomainServiceProvider extends ServiceProvider implements DeferrableProvider
{
    #[Override]
    public function register(): void
    {
    }

    #[Override]
    public function provides(): array
    {
        return [
        ];
    }
}
