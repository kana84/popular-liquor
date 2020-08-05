<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("votes")->insert([
            [
             'code_id' => 1,
             'liquor_id' => 1,
            ],
            [
             'code_id' => 2,
             'liquor_id' => 2,
            ],
            [
             'code_id' => 3,
             'liquor_id' => 3,
            ],
        ]);
    }
}
