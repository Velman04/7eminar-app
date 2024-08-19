<?php

declare(strict_types=1);

namespace App\Domain\Order;

use Illuminate\Support\AggregateServiceProvider;

class OrderDomainServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        Providers\DomainServiceProvider::class,
        Providers\EventServiceProvider::class,
    ];
}
