<?php

declare(strict_types=1);

namespace App\Domain\Task\Models;

use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'status',
    ];

    protected $attributes = [
        'status' => TaskStatusEnum::OPEN,
    ];

    protected function casts(): array
    {
        return [
            'status' => TaskStatusEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
