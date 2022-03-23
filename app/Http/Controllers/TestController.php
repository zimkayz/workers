<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class TestController extends Controller
{
    public function index()
    {
        $users =User::all();

        return view('test/first',['users' => $users]);
    }
    public function view(User $user)
    {
        dd($user);
        return view('test.view',['user'=>$user]);
    }
}
