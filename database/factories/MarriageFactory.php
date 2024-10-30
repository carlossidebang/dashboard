<?php

namespace Database\Factories;

use App\Models\Marriage;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarriageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marriage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'husband_name' => $this->faker->word,
        'wife_name' => $this->faker->word,
        'marriage_date' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
