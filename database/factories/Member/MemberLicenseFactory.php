<?php

namespace Database\Factories\Member;

use App\Models\Member\MemberLicense;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberLicenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberLicense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pma_number'        => $this->faker->numberBetween(1000000, 9999999), 
            'prc_number'        => $this->faker->numberBetween(1000000, 9999999),
            'field_of_practice' => $this->faker->words(rand(1, 5), true), 
            'expiration_date'   => $this->faker->dateTimeBetween('-3 years', '+5 years'),
        ];
    }
}
