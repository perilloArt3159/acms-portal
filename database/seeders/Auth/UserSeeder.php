<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\User; 
use App\Models\Member\Member;

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
        $members = Member::all('id'); 

        foreach($members as $member)
        {
            User::factory()->state((['member_id' => $member]))->create();
        }       
    }
}
