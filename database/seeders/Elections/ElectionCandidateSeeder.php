<?php

namespace Database\Seeders\Elections;

use App\Models\Election\Election; 
use App\Models\Election\ElectionCandidate;
use App\Models\Member\Member; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class ElectionCandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = $this->getRowCount(10);

        for ($i = 0; $i < $rows; $i++) 
        {
            //! Ensure That member_id and election_id is unique combination is unique
            do 
            {
                $memberId   = Member::all('id')->random()->id;
                $electionId = Election::all('id')->random()->id;

                $uniqueRow  =   ElectionCandidate::where([['member_id', '=', $memberId], ['election_id', '=', $electionId]])->count() === 0 ? true : false;

                if (!$uniqueRow) 
                {
                    $this->command->warn("Row Entry Election-Member : {$memberId}-{$electionId} already exists");
                    $this->command->warn("Recalculating combination...");
                }
            } 
            while (!$uniqueRow);

            //! Create Row 
            ElectionCandidate::factory()
                ->state(
                    [
                        'member_id'       =>  $memberId,
                        'election_id'    =>  $electionId,
                    ]
                )
                ->create();
        }
    }

    private function getRowCount($rowCount)
    {
        //! Max Row Count Depending on unique UserID and PaymentID combination
        $maxRows    =   Member::count() * Election::count();

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
