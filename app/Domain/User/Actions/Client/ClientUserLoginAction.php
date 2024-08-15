<?php

declare(strict_types=1);

namespace App\Domain\User\Actions\Client;

use App\Domain\User\Data\Client\ClientUserLoginData;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientUserLoginAction
{
    public function execute(ClientUserLoginData $data): string
    {
        $user = User::query()->where('email', $data->email)->first();

        if (!$user || !Hash::check($data->password, $user->password)) {
            abort(401, 'Invalid credentials');
        }

        $token = $user->createToken($data->tokenName);

        return $token->plainTextToken;
    }
}
