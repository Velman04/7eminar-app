<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->domainRegistrars();
    }

    private function domainRegistrars(): void
    {
        foreach (config('domains', []) as $domain) {
            if (!class_exists($domain)) {
                abort(500, "The registrar of the domain {$domain} could not be found.");
            }

            $this->app->register($domain);
        }
    }
}
