<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestModel;
use App\CategoryModel;
use App\TagModel;
use App\AnswerModel;
use Illuminate\Support\Facades\DB;
use Auth;

class QuestController extends Controller
{
    public function __construct(){
        $auth = $this->middleware('auth')->except(['ShowList', 'DetailQuest']);
        if($auth){
            $this->quest = new QuestModel();
        }
    }

    public function ShowList(){
        $data = $this->quest->get();
        return view ('pages.questions.index',compact('data'));
    }

    public function ShowCreate(){
        return view ('pages.questions.create');
    }

    public function CreateQuest(Request $request){

        $data = $this->quest;
        $data->user_id = Auth::user()->id;
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();

        $tagArr = explode(',', $request->tags);
        $tagsMulti = [];
        foreach ($tagArr as $key) {
            $tagArrAssc['tag_name'] = $key;
            $tagsMulti[] = $tagArrAssc;
        }
        foreach($tagsMulti as $tagCheck){
            $tags = TagModel::firstOrCreate($tagCheck);
            $data->tags()->attach($tags->id);
        }
        // dd($tags);

        return redirect('/question');
    }

    public function DetailQuest($id){
        $data = $this->quest
        ->where('id',$id)
        ->first();
        
        $answers = DB::table('questions')
                ->select('answers.id as answer_id', 'answers.*', 'users.*')
                ->join('answers', 'answers.question_id', 'questions.id')
                ->join('users', 'users.id', 'answers.user_id')
                ->where('questions.id', '=', $id)
                ->get();

        // dd($answers);
        return view ('pages.questions.detail',compact('data', 'answers'));
    }

    public function ShowEdit($id){
        $data = $this->quest
        ->where('id',$id)
        ->first();
        return view ('pages.questions.edit',compact('data'));
    }

    public function EditQuest(Request $request,$id){
        $data = $this->quest
        ->where('id',$id)
        ->first();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();
        return redirect ('/question');
    }

    public function DeleteQuest($id){
        $data = $this->quest
        ->where('id',$id);

        $data->delete();
        return redirect ('/question');
    }
}
