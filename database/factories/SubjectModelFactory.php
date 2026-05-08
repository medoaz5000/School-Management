<?php

namespace Database\Factories;

use App\Models\SubjectModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectModel>
 */
class SubjectModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SubjectModel::class;
    
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['PHYSIQUE', 'BASIC TECHNOLOGY', 'HOME ECONOMICS', 'SOCIAL STIDIES', 'ENGLISH LANGUAGE', 'MATHEMATIC']),
            'type' => fake()->randomElement(['Theory', 'Pratical']),
            'created_by' => 1,
            'created_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
