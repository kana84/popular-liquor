<?php

namespace App\Http\Controllers;

use App\Code;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CodeRules;
use ErrorException;

class CodeController extends Controller
{
    //投稿コードチェックページの表示
    public function showCodeForm()
    {
        return view('codes/check');
    }


    //使用可能コードかチェック
    public function codeCheck(CodeRules $request)
    {
        //入力されたコードのデータを取得
        $match_code = DB::table('codes')->whereIn('code',[$request->code])->first();

        //入力されたコードが使用済みかどうか
        $used_code = DB::table('votes')->whereIn('code_id',[$match_code->id])->exists();

        //使用済みコードエラー
        try {
            if ($used_code) {
                throw new ErrorException("使用済みの投票コードです");
            }
        }catch(ErrorException $e){
            return view('errorMessage',[
                'error_message' => $e->getMessage()
            ]);
        }
         //使用可能コード入力時
        if (!$used_code){
            return redirect()->route('vote.liquor',[
                'id' => $match_code->id
            ]);
        }
    }
}