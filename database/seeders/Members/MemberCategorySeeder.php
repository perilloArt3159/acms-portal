<?php

namespace Database\Seeders\Members;

use App\Models\Member\MemberCategory; 

use Illuminate\Database\Seeder;

class MemberCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberCategory::factory(10)->create();
    }
}
