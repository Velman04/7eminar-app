<?php

declare(strict_types=1);

namespace App\Domain\User\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as AliasEventServiceProvider;
use Override;

class EventServiceProvider extends AliasEventServiceProvider implements DeferrableProvider
{
    #[Override]
    public function boot(): void
    {
    }

    #[Override]
    public function provides(): array
    {
        return [];
    }
}
