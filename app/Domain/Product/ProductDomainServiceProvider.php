<?php

declare(strict_types=1);

namespace App\Domain\Product;

use Illuminate\Support\AggregateServiceProvider;

class ProductDomainServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        Providers\DomainServiceProvider::class,
        Providers\EventServiceProvider::class,
    ];
}
