<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestModel extends Model
{
    protected $table = 'questions';

    protected $guarded = [];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\TagModel', 'question_tag', 'question_id', 'tag_id');
    }

    public function votes(){
        return $this->belongsToMany('App\User', 'question_user', 'question_id', 'user_id')->withPivot([
            'upvote',
            'downvote',
        ]);;
    }

    public function answer(){
        return $this->hasMany('App\AnswerModel', 'question_id', 'id');
    }

}
