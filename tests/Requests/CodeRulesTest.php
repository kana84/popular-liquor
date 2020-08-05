<?php

namespace Tests\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\CodeRules;
use Illuminate\Support\Facades\Validator;

class CodeRulesTest extends TestCase
{
    use RefreshDatabase;

     protected function setUp():void
     {
         parent::setUp();

         //データベースマイグレーション
         $this->artisan('migrate');

         //テストデータ挿入
         $this->seed('CodesTableSeeder');
     }

     /**
     *投票コードのバリデーションテスト
     *
     * @param string 項目名
     * @param string 値
     * @param boolean 期待値(バリデーションOKならtrue)
     * @dataProvider codeProviderExample
     */

     public function testCodeVaridate($item, $data, $expect)
    {
        $dataList = [$item => $data];

        $request = new CodeRules();
        //フォームリクエストで定義したルールを取得
        $rules = $request->rules();
        $validator = Validator::make($dataList, $rules);
        //入力値がバリデーションルールを満たしている場合はtrueが返る
        $result = $validator->passes();
        $this->assertEquals($expect, $result);
    }

    public function codeProviderExample()
    {
        return[
            ['code','10001',true],
            ['code','10002',true],
            ['code','10003',true],
            ['code','10004',true],
            ['code','10005',true],
            ['code','10006',true],
            ['code','10007',true],
            ['code','10008',true],
            ['code','10009',true],
            ['code','10010',true],
            ['code','10000',false],
            ['code','20000',false],
            ['code','30000',false],
            ['code','40000',false],
            ['code','50000',false],
            ['code','60000',false],
            ['code','70000',false],
            ['code','80000',false],
            ['code','90000',false],
            ['code','99999',false],
            ['code','',false],
            ['code','aaaaa',false],
            ['code','1000a',false],
            ['code','あああああ',false],
            ['code','1000あ',false],
            ['code','1',false],
            ['code','10',false],
            ['code','100',false],
            ['code','1000',false],
            ['code','100000',false],
            ['code','1000000',false],
            ['code','00001',false],
        ];
    }
}