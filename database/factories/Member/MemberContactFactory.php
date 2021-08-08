<?php

namespace Database\Factories\Member;

use App\Models\Member\MemberContact;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mailing_address' => Str::upper($this->faker->address()), 
            'contact_number'  => $this->faker->phoneNumber(), 
        ];
    }
}
