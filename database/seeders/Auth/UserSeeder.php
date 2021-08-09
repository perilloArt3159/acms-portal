<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\User; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->create();
    }
}
