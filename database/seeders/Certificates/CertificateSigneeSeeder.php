<?php

namespace Database\Seeders\Certificates;

use App\Models\Auth\User;
use App\Models\Certificate\CertificateSignee;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class CertificateSigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CertificateSignee::factory(5)
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
