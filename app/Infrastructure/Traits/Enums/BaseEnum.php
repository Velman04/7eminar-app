<?php

declare(strict_types=1);

namespace App\Infrastructure\Traits\Enums;

trait BaseEnum
{
    public static function select(): array
    {
        return array_map(function ($value, $label) {
            return ['value' => $value, 'label' => $label];
        }, array_keys(self::options()), self::options());
    }

    public static function array(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        $options = self::options();

        return $options[$this->value] ?? 'N/A';
    }
}
