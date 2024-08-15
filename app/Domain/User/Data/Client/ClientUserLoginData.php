<?php

declare(strict_types=1);

namespace App\Domain\User\Data\Client;

use Spatie\LaravelData\Data;

class ClientUserLoginData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public string $tokenName = 'api-client',
    ) {

    }
}
