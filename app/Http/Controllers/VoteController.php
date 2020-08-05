<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liquor;
use ErrorException;

class VoteController extends Controller
{
    public function voteForm(int $id)
    {
        $liquors = Liquor::all();

        return view('vote/liquorform' ,[
            'liquors' => $liquors,
            'available_code_id' => $id,
        ]);
    }

    public function votePopularLiquor(Request $request,int $id)
    {
        $liquor = new Liquor();
        $liquor->id = $request->input('liquor');
        $code_id = DB::table('votes')->whereIn('code_id',[$id])->exists();

        //何も選択されなかった場合のエラー
        try {
            if($liquor->id == null){
                throw new ErrorException("どれかひとつ選択してください");
            }
        }catch(ErrorException $e){
            return view('errorMessage',[
                'error_message' => $e->getMessage()
            ]);
        }

        //投票を登録
        if($code_id){
            return view('vote/voted');
        }

        if (!$code_id) {
            DB::table('votes')->insert([
                'code_id' => $id,
                'liquor_id' => $liquor->id
            ]);
            return redirect()->route('vote.result',[
                'id' => $id
            ]);
        }
    }

    public function aggregateResults()
    {
        //全投票数
        $total_votes = DB::table('votes')->count();

        //各お酒の投票数
        $liquors = DB::table('liquors');

        $liquor_votes = $liquors
            ->selectRaw('liquors.liquor_name AS name, COUNT(votes.liquor_id) AS liquor_subtotal')
            ->leftJoin('votes','liquors.id','=','votes.liquor_id')
            ->groupBy('liquors.liquor_name' , 'votes.liquor_id')
            ->orderByRaw('liquor_subtotal DESC')
            ->get();

        return view('vote/results' ,[
            'total' => $total_votes,
            'liquor_votes' => $liquor_votes,
        ]);
    }
}
