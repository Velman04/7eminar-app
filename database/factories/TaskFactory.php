<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Task\Enums\TaskStatusEnum;
use App\Domain\Task\Models\Task;
use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Override;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([TaskStatusEnum::OPEN, TaskStatusEnum::CLOSED]),
        ];
    }

    public function withParent(Task $parentTask): Factory
    {
        return $this->state(function (array $attributes) use ($parentTask) {
            return [
                'parent_id' => $parentTask->id,
            ];
        });
    }
}
