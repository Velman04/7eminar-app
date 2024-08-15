<?php

declare(strict_types=1);

namespace App\Domain\Task\Models;

use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\User\Models\User;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kalnoy\Nestedset\NodeTrait;
use Override;

class Task extends Model
{
    use NodeTrait;
    use HasFactory;

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

    #[Override]
    protected function casts(): array
    {
        return [
            'status' => TaskStatusEnum::class,
        ];
    }

    protected static function newFactory(): TaskFactory|Factory
    {
        return TaskFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
