<?php

declare(strict_types=1);

namespace App\Domain\User;

use Illuminate\Support\AggregateServiceProvider;

class UserDomainServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        Providers\DomainServiceProvider::class,
        Providers\EventServiceProvider::class,
    ];
}
