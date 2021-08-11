<?php

namespace Database\Factories\Election;

use App\Models\Election\ElectionCandidate;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class ElectionCandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ElectionCandidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
