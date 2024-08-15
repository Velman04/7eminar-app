<?php

declare(strict_types=1);

namespace App\Application\Client\Requests\User;

use App\Domain\User\Data\Client\ClientUserLoginData;
use Illuminate\Foundation\Http\FormRequest;

class ClientUserLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }

    public function getDTO(): ClientUserLoginData
    {
        return new ClientUserLoginData(
            email: $this->input('email'),
            password: $this->input('password'),
        );
    }
}
