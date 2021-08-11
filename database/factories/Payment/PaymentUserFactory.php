<?php

namespace Database\Factories\Payment;

use App\Models\Payment\PaymentUser;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class PaymentUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount_paid' => $this->faker->randomFloat(2, 100, 10000)
        ];
    }
}
