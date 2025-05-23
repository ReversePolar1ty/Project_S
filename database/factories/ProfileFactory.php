<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => Worker::factory()->create(),
            'city'=> fake()-> city,
            'skill'=> fake()-> text(20),
            'experience'=> fake()-> numberBetween(2,15),
            'finished_study_at'=> fake()-> date,
        ];
    }
}
