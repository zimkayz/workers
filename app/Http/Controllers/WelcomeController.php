<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;
use App\Skill;
use App\Userdetail;

class WelcomeController extends Controller
{

    public function welcome()
    {
        $users = User::with('userd')->get();
        $positions = Position::all();
        $skills = Skill::all();
        $userdetails = Userdetail::with('user')->get();

        return view('welcome',['positions' => $positions, 'skills' => $skills,'users'=>$users,'userdetails'=>$userdetails]);
    }
}
