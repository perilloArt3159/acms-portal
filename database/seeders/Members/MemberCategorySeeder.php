<?php

namespace Database\Seeders\Members;

use App\Models\Member\MemberCategory; 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class MemberCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberCategory::factory(5)
            ->create();
    }
}
