<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Auth;

class ProfileController extends Controller
{
    //
    public function __construct(){
        $auth = $this->middleware('auth')->except(['ShowList', 'DetailQuest']);
        if($auth){
            $this->user = new User();
        }
    }

    public function index(){
        $data = Auth::user();
        // dd($data);
        return view('pages.profile', compact('data'));
    }
}
