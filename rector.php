<?php

declare(strict_types=1);

use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        SetList::PHP_83,
        LaravelSetList::LARAVEL_110,
    ]);
};
