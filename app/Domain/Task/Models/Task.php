<?php

declare(strict_types=1);

namespace App\Domain\Task\Models;

use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kalnoy\Nestedset\NodeTrait;

class Task extends Model
{
    use NodeTrait;

    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'user_id',
        'parent_id',
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
