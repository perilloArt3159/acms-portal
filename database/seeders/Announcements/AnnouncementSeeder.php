<?php

namespace Database\Seeders\Announcements;

use App\Models\Announcement\Announcement;
use App\Models\Auth\User; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::factory(15)
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
