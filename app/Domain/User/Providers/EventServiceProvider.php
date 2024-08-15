<?php

declare(strict_types=1);

namespace App\Domain\User\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as AliasEventServiceProvider;

class EventServiceProvider extends AliasEventServiceProvider
{
    public function boot(): void
    {
    }
}
