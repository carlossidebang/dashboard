<?php

namespace Database\Factories;

use App\Models\Outcome;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutcomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Outcome::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nominal' => $this->faker->randomDigitNotNull,
        'outcome_date' => $this->faker->word,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
