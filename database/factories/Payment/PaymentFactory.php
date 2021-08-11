<?php

namespace Database\Factories\Payment;

use App\Models\Payment\Payment;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'        => Str::upper($this->faker->unique()->word()),
            'name'        => Str::upper($this->faker->unique()->words(3, true)),
            'description' => $this->faker->sentence(),
            'amount'      => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
