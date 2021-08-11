<?php

namespace Database\Factories\Certificate;

use App\Models\Certificate\Certificate;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  =>  $this->faker->words(rand(1, 3), true),
            'file_image_template'   =>  $this->faker->unique()->imageUrl()
        ];
    }
}
