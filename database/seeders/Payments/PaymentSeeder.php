<?php

namespace Database\Seeders\Payments;

use App\Models\Auth\User; 
use App\Models\Payment\Payment; 
use App\Models\Payment\PaymentCategory; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::factory(15)
            ->state(new Sequence(
                fn ($sequence) =>
                [
                    'created_by_user_id' => User::all('id')->random()->id,
                    'updated_by_user_id' => User::all('id')->random()->id, 
                    'payment_category_id'=> PaymentCategory::all('id')->random()->id
                ]
            ))
            ->create();
    }
}
