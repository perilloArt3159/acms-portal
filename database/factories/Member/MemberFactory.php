<?php

namespace Database\Factories\Member;

use App\Models\Member\Member;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'    => Str::upper($this->faker->firstName()),             
            'last_name'     => Str::upper($this->faker->lastName()),
            'middle_name'   => rand(0, 1) ? Str::upper($this->faker->lastName()) : null, 
            'birth_date'    => $this->faker->date(),
        ];
    }
}
