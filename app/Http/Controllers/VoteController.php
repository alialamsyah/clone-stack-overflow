<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestModel;
use App\User;
use Auth;

class VoteController extends Controller
{
    public function questionVote($id){
        $user_id = Auth::user()->id;
        $vote = QuestModel::find($id);
        $cek = false;
        if( count($vote->votes) != null){
            foreach($vote->votes as $data){
                // dd($user_id);
                if($data->id == $user_id){
                    $cek = true;
                }
            }
            if($cek == false){
                $vote->votes()->attach($id);
            }
            // return redirect('/');
        }else{
            // return redirect('/');
        }
    }
    public function questionDownVote($id){

    }
}
