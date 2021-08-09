<?php

namespace Database\Seeders\Payments;

use App\Models\Auth\User;
use App\Models\Payment\PaymentCategory; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class PaymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentCategory::factory(5) 
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
