<?php

namespace Database\Seeders\Elections;

use App\Models\Auth\User; 
use App\Models\Election\ElectionCandidate;
use App\Models\Election\ElectionTally; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class ElectionTallySeeder extends Seeder
{
    public function run()
    {
        $rows = $this->getRowCount(10);

        for ($i = 0; $i < $rows; $i++) 
        {
            //! Ensure That candidate_id and user_id is unique combination is unique
            do 
            {
                $candidateId = ElectionCandidate::all('id')->random()->id;
                $userId      = User::all('id')->random()->id;

                $uniqueRow   =   ElectionTally::where([['candidate_id', '=', $candidateId], ['user_id', '=', $userId]])->count() === 0 ? true : false;

                if (!$uniqueRow) 
                {
                    $this->command->warn("Row Entry User-ElectionCandidate : {$candidateId}-{$userId} already exists");
                    $this->command->warn("Recalculating combination...");
                }
            } 
            while (!$uniqueRow);

            //! Create Row 
            ElectionTally::factory()
                ->state(
                    [
                        'candidate_id' => $candidateId,
                        'user_id'      => $userId,
                    ]
                )
                ->create();
        }
    }

    private function getRowCount($rowCount)
    {
        //! Max Row Count Depending on unique UserID and PaymentID combination
        $maxRows    =   ElectionCandidate::count() * User::count();

        //! Return maxRows instead to avoid infinite loops 
        if ($rowCount > $maxRows) 
        {
            $this->command->warn("Provided Row Count {$rowCount} exceeds the max combination of {$maxRows}!");
            $this->command->warn("Will insert {$maxRows} rows instead...");

            return $maxRows;
        }

        return $rowCount;
    }
}
