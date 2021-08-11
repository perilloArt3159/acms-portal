<?php

namespace Database\Factories\Announcement;

use App\Models\Announcement\Announcement;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => Str::upper($this->faker->words(3, true)),
            'content'     => $this->faker->paragraph(rand(5, 50)),
        ];
    }
}
