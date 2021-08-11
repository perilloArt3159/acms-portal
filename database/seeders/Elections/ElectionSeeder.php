<?php

namespace Database\Seeders\Elections;

use App\Models\Auth\User;
use App\Models\Election\Election;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Election::factory(5)
            ->state(new Sequence(
                fn ($sequence) =>
                [
                    'created_by_user_id' => User::all('id')->random()->id,
                    'updated_by_user_id' => User::all('id')->random()->id
                ]
            ))
            ->create(); 
    }
}
