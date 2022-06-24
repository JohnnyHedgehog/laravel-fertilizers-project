<?php

namespace Database\Factories;

use App\Models\Culture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class FertilizerFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->sentence(2),
            'nitrogen_rate' => $this->faker->randomFloat(2, 0, 50),
            'phosphorus_rate' => $this->faker->randomFloat(2, 0, 50),
            'potassium_rate' => $this->faker->randomFloat(2, 0, 50),
            'culture_id' => Culture::get()->random()->id,
            'region' => $this->faker->state,
            'price' =>  $this->faker->randomFloat(2, 100, 100000),
            'description' => $this->faker->text(200),
            'purpose' => $this->faker->sentence(5)
        ];
    }
}
