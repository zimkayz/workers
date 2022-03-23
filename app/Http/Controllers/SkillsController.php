<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills',['skills'=>$skills]);
    }

    public function create()
    {
        $skills = Skill::all();
       return view('admin.skills-create',['skills' => $skills]);
    }

    public function store()
    {
        request()->validate([
            'skills' => 'required|unique:skills,skills',

        ]);

        Skill::create([
            'skills'=>request('skills'),
            'submit'=>request('submit'),
        ]);

        return redirect('admin.skills-create')->with('success','Creation Succesfull');;
    }

    public function edit(Skill $skill)
    {
        return view('admin.skill-edit',['skill'=>$skill]);
    }
    public function view(Skill $skill)
    {
        $skills = Skill::all();
        return view('admin.skills',['skill'=>$skill,'skills'=>$skills]);
    }

    public function modify(Skill $skill)
    {
        request()->validate([
            'skills' => 'required|unique:skills,skills',

        ]);

        $skill->update([
            'skills'=>request('skills'),
            'submit'=>request('submit'),


        ]);

        return redirect('admin.skills')->with('success','Update Succesfull');;

    }

    public function remove(Request $request)
    {
        $skill_id = $request->skid;
        Skill::where('id', $skill_id)->delete();
      //  $position->delete();
        return redirect('admin.skills')->with('success','Deletion Succesfull');;
    }

}
