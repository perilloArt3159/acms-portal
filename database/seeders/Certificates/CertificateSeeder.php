<?php

namespace Database\Seeders\Certificates;

use App\Models\Auth\User; 
use App\Models\Certificate\Certificate; 
use App\Models\Certificate\CertificateSignee; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificate::factory(3)
            ->state(new Sequence(
                fn ($sequence) =>
                [
                    'created_by_user_id' => User::all('id')->random()->id,
                    'updated_by_user_id' => User::all('id')->random()->id, 
                    'signee_id'          => CertificateSignee::all('id')->random()->id 
                ]
            ))
            ->create();
    }
}
