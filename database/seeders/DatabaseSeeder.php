<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Task\Models\Task;
use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /** Seed the application's database. */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $tasks = Task::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);

        $tasks->each(function (Task $task) use ($user) {
            if (rand(0, 1)) {
                Task::factory()->count(rand(1, 3))->withParent($task)->create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
