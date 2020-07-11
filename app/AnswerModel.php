<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerModel extends Model
{
    protected $table='answers';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function vote(){
        return $this->belongsToMany('App\User', 'answer_user', 'answer_id', 'user_id');
    }
}
