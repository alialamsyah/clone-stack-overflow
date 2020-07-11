<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerModel;
use Auth;

class AnswerController extends Controller
{
    public function __construct(){
        $auth = $this->middleware('auth')->except(['ShowAnswer', 'DetilAnswer']);
        if($auth){
            $this->answer = new AnswerModel();
        }
    }

    public function ShowCreate($id){
        return view ('pages.answers.create', ["id" => $id]);
    }

    public function CreateAnswer(Request $request){
        $data = $this->answer;
        $data->user_id = Auth::user()->id;
        $data->question_id = $request->question_id;
        $data->isi = $request->isi;
        $data->save();
        return redirect('/question/'.$request->question_id);
    }

    public function ShowEdit($id){
        $data = $this->answer
        ->where('id',$id)
        ->first();
        return view ('pages.answers.edit',compact('data'));
    }

    public function EditAnswer(Request $request,$id){
        $data = $this->answer
        ->where('id',$id)
        ->first();
        $data->isi = $request->isi;
        $data->save();
        return redirect ('/question');
    }

    public function DeleteAnswer($id){
        $data = $this->answer
        ->where('id',$id);

        $data->delete();
        return redirect ('/question');
    }
}
