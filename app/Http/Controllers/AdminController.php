<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;
use App\Skill;
use App\Userdetail;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users =User::all();
        $userdetails = Userdetail::with('user','pos')->get();
        $countusers = DB::table('users')->where('role_as','user')->count();
        $countadmin = DB::table('users')->where('role_as','admin')->count();
        $countpositions = Position::withCount('usercount')->get();
        return view('admin.dashboard',compact(['countusers','countadmin']),['users' => $users,'userdetails' => $userdetails,'countpositions' => $countpositions]);
    }

    public function adminacc()
    {
        $users =User::all();
        $userdetails = Userdetail::with('user','pos')->get();
        return view('admin.accountview',['users' => $users,'userdetails' => $userdetails,]);
    }

    public function show($user)
    {
            //return "Done";
        $user=  User::find($user);
        return view('admin.userrole-edit')->with('user',$user);
    }



    public function modify(User $user)
    {

        request()->validate([
            'role_as' => 'required',

        ]);

        $user->update([
            'role_as'=>request('role_as'),
            'submit'=>request('submit'),


        ]);
        return redirect('admin.accountview')->with('success','Changes Succesfull');
    }





}
