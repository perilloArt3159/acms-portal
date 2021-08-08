<?php

namespace Database\Factories\Member;

use App\Models\Member\MemberCategory;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name           =   Str::upper($this->faker->words(rand(1, 5), true)); 
        $slug           =   Str::slug($name); 
        $description    =   $this->faker->sentence(rand(10,25)); 

        return [
            'slug'          =>  $slug, 
            'name'          =>  $name, 
            'description'   =>  $description
        ];
    }
}
