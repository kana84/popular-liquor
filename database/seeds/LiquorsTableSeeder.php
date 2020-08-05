<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiquorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liquors = ["ビール","ワイン","日本酒","焼酎","泡盛","ウイスキー","テキーラ","ブランデー","その他"];

        foreach($liquors as $l){
            DB::table('liquors')->insert([
                'liquor_name' => $l
            ]);
        }
    }
}
