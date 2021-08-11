<?php

namespace Database\Factories\Certificate;

use App\Models\Certificate\CertificateSignee;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class CertificateSigneeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CertificateSignee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  =>  $this->faker->words(rand(1, 3), true),
            'file_image_signature'  =>  $this->faker->unique()->imageUrl()
        ];
    }
}
