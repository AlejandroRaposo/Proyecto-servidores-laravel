<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Novela>
 */
class novelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return ['nombre'=>$this->faker->paragraph(1),
        'descripcion'=>$this->faker->paragraph(1),
        'categoria'=>$this->faker->word(),
        'autores_autor_id'=>$this->faker->numberBetween(1,10),
        'estado'=>1,
        'edad_minima'=>$this->faker->numberBetween(1,50),
        
            //
        ];
    
    }
}
