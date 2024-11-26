<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use App\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
        
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'user_id' => $user->random(),
            'client_id' => $client->random(),
            'status' => fake()->randomElement(ProjectStatus::cases())->value,
            'project_cost' => fake()->randomFloat(2, 1000, 100000),
            'deadline_at' => now()->addDays(rand(1, 30))->format('Y-m-d'),
        ];
    }
}
