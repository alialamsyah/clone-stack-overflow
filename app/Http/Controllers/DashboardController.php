<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestModel;

class DashboardController extends Controller
{
    //
    public function __construct(){
        $this->quest = new QuestModel();
    }

    public function index(){
        $datas = $this->quest->get();
        return view ('index',compact('datas'));
    }
}
