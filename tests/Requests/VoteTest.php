<?php

namespace Tests\Requests;
require_once('app/Http/Controllers/VoteController.php');

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use ErrorException;

class VoteTest extends TestCase
{
   use RefreshDatabase;

   protected function setUp():void
   {
       parent::setUp();

       $this->artisan('migrate');

       $this->seed('LiquorsTableSeeder');
       $this->seed('VotesTableSeeder');
   }

   public function testUnselected()
   {
       $request = null;
       $id = 1;
       $expected = new ErrorException("どれかひとつ選択してください");

       $this->expectException(get_class($expected));
       $this->expectExceptionMessage($this->expected->getMessage());

       $this->VoteController::votePopularLiquor($request,$id);
   }

   //ここはあとで修正する
   public function testRegistrationSuccess()
   {
      // $liquor_id = 1;
       $expected_liquor = 1;
     //  $code_id = 5;
       $expected_code = 5;

    
       $this->VoteController::votePopularLiquor(1,5);

       $this->assertDatabaseHas('votes',['liquor_id' => $expected_liquor]);
       $this->assertDatabaseHas('votes',['code_id' => $expected_code]);
   }

   /*
   public function VotingDataProvider()
   {
       return[
           [4, 4, 4, 4],
           [5, 5],
           [6, 6],
           [7, 7],
           [8, 8],
           [9, 9],
       ];
   }
   */
}
