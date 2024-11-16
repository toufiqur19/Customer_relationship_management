<?php

namespace Database\Factories;

use App\TaskStatus;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::pluck('id');
        $client = Client::pluck('id');
        $project = Project::pluck('id');
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => $user->random(),
            'client_id' => $client->random(),
            'project_id' => $project->random(),
            'status' => fake()->randomElement(TaskStatus::cases())->value,
            'deadline_at' => fake()->dateTimeBetween('+1 month', '+6 months'),
        ];
    }
}
