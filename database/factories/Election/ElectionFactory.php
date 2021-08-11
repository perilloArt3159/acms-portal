<?php

namespace Database\Factories\Election;

use App\Models\Election\Election;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class ElectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Election::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => Str::upper($this->faker->words(3, true)),
            'description' => $this->faker->sentence(),
            'open_at'   =>  $this->faker->dateTimeBetween('+2 months', '+3 months'), 
            'close_at'  => $this->faker->dateTimeBetween('+4 months', '+5 months') 
        ];
    }
}
