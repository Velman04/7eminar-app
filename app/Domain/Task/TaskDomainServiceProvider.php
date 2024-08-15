<?php

declare(strict_types=1);

namespace App\Domain\Task;

use Illuminate\Support\AggregateServiceProvider;

class TaskDomainServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        Providers\DomainServiceProvider::class,
        Providers\EventServiceProvider::class,
    ];
}
