<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class autorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        
        
        return ['nombre'=>$this->faker->firstName(),
        'apellidos'=>$this->faker->lastName(),
        'user_id'=>$this->faker->numberBetween(1,50),
        'estado'=>1,
        
            //
        ];
    }
}
