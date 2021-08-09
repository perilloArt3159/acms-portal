<?php

namespace Database\Factories\Payment;

use App\Models\Payment\PaymentCategory;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class PaymentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => Str::upper($this->faker->words(3, true)),
            'description' => $this->faker->sentence(),
        ];
    }
}
