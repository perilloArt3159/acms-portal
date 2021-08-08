<?php

namespace Database\Seeders\Members;

use App\Models\Member\Member;
use App\Models\Member\MemberCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence; 

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory(10)
            ->state(new Sequence(
                fn ($sequence) => ['member_category_id' => MemberCategory::all('id')->random()->id]
            ))
            ->create();
    }
}
