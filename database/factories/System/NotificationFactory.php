<?php

namespace Database\Factories\System;

use App\Models\System\Notification;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => Str::upper($this->faker->words(3, true)), 
            'content'     => $this->faker->sentence(4),
        ];
    }
}
