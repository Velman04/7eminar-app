<?php

declare(strict_types=1);

namespace App\Domain\Task\Enums;

use App\Infrastructure\Traits\Enums\BaseEnum;

enum TaskStatusEnum: int
{
    use BaseEnum;

    case OPEN = 1;
    case CLOSED = 2;

    public static function options(): array
    {
        return [
            self::OPEN->value => 'Открыта',
            self::CLOSED->value => 'Закрыта',
        ];
    }
}
