<?php

namespace App\Domain\User;

use Illuminate\Support\AggregateServiceProvider;

class UserDomainServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        Providers\DomainServiceProvider::class,
        Providers\EventServiceProvider::class,
    ];
}
