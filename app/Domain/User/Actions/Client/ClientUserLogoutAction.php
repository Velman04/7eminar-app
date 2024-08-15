<?php

declare(strict_types=1);

namespace App\Domain\User\Actions\Client;

use Illuminate\Support\Facades\Auth;

class ClientUserLogoutAction
{
    public function execute(): void
    {
        Auth::user()?->currentAccessToken()?->delete();
    }
}
