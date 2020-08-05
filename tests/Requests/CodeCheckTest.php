<?php

namespace Tests\Requests;
require_once('app/Http/Controllers/CodeController.php');

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use ErrorException;

class CodeCheckTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp():void
     {
         parent::setUp();

         //データベースマイグレーション
         $this->artisan('migrate');

         //テストデータ挿入
         $this->seed('CodesTableSeeder');
         $this->seed('VotesTableSeeder');

     }

    /**
     * @dataProvider codeCheckProvider
     */
    public function testCodeCheckException($data,$expected)
    {
        $this->expectException(get_class($expected));
        $this->expectExceptionMessage($this->expected->getMessage());

        $this->CodeController::codeCheck($data);
    }

    public function codeCheckProvider()
    {
        return[
            [10004, new ErrorException("使用済みの投票コードです")],
            [10005, new ErrorException("使用済みの投票コードです")],
            [10006, new ErrorException("使用済みの投票コードです")],
            [10007, new ErrorException("使用済みの投票コードです")],
            [10008, new ErrorException("使用済みの投票コードです")],
            [10009, new ErrorException("使用済みの投票コードです")],
            [10010, new ErrorException("使用済みの投票コードです")],
        ];
    }
}
