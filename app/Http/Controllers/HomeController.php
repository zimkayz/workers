<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;
use App\Skill;
use App\Userdetail;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $users =User::with('userd')->get();
        $positions = Position::all();
        $skills = Skill::all();
        $userdetails = Userdetail::with('user','pos')->get();
        return view('home',['user' => $user,'positions' => $positions, 'skills' => $skills,'users' => $users,'userdetails'=>$userdetails]);
    }




}
