<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [10001,
                  10002,
                  10003,
                  10004,
                  10005,
                  10006,
                  10007,
                  10008,
                  10009,
                  10010,
                  10011,
                  10012,
                  10013,
                  10014,
                  10015,
                  10016,
                  10017,
                  10018,
                  10019,
                  10020];

        foreach($codes as $c){
            DB::table('codes')->insert([
                'code' => $c
            ]);
        }
    }
}
