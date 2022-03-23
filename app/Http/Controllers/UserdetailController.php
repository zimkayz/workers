<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Userdetail;
use App\User;
use App\Position;
use App\Skill;

class UserdetailController extends Controller
{
    public function index()
    {
        if(Auth::user())
        $positions = Position::all();
        $skills = Skill::all();
        $userdetails = Userdetail::all();
        return view('userdetail',['userdetails'=>$userdetails,'positions'=>$positions,'skills'=>$skills]);
    }

    public function create()
    {
        $positions = Position::all();
        $skills = Skill::all();
        $userdetails = Userdetail::all();
        return view('userdetail',['userdetails'=>$userdetails,'positions'=>$positions,'skills'=>$skills]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
       $input['skill'] = $request->input('skill');
       Userdetail::create($input);
        return redirect('home');
     }






}
