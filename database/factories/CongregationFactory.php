<?php

namespace Database\Factories;

use App\Models\Congregation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CongregationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Congregation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'place_of_birth' => $this->faker->word,
        'birthday_date' => $this->faker->word,
        'address' => $this->faker->text,
        'gender' => $this->faker->randomElement(['pria', 'wanita']),
        'occupation' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
