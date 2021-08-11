<?php

namespace Database\Seeders\Payments;

use App\Models\Auth\User;
use App\Models\Payment\Payment;
use App\Models\Payment\PaymentUser; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class PaymentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = $this->getRowCount(10); 

        for($i = 0; $i < $rows; $i++)
        {
            //! Ensure That user_id and payment_id key combination is unique
            do 
            {   
                $userId     =   User::all('id')->random()->id; 
                $paymentId  =   Payment::all('id')->random()->id;

                $uniqueRow  =   PaymentUser::where([['user_id', '=', $userId], ['payment_id', '=', $paymentId]])->count() === 0 ? true : false; 

                if(!$uniqueRow)
                {
                    $this->command->warn("Row Entry User-Payment : {$userId}-{$paymentId} already exists"); 
                    $this->command->warn("Recalculating combination...");
                }
            }
            while(!$uniqueRow); 

            //! Create Row 
            PaymentUser::factory()
                ->state(
                    [
                        'user_id'       =>  $userId, 
                        'payment_id'    =>  $paymentId,
                    ]    
                )
                ->create();  
        }     
    }

    private function getRowCount($rowCount) 
    {
        //! Max Row Count Depending on unique UserID and PaymentID combination
        $maxRows    =   User::count() * Payment::count();   

        //! Return maxRows instead to avoid infinite loops 
        if($rowCount > $maxRows)
        {
            $this->command->warn("Provided Row Count {$rowCount} exceeds the max combination of {$maxRows}!");
            $this->command->warn("Will insert {$maxRows} rows instead..."); 

            return $maxRows; 
        }

        return $rowCount; 
    }
}
