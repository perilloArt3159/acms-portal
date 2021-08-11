<?php

namespace Database\Seeders\System;

use App\Models\Auth\User; 
use App\Models\System\Notification;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::factory(30)
            ->state( new Sequence(
                fn ($sequence) =>
                [
                    'user_id' => User::all('id')->random()->id,
                ] 
            ))
            ->state( new Sequence(
                ['is_read' => true],
                ['is_read' => false]
            )
            )
            ->create(); 
    }
}
