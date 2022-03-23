<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;

class PositionController extends Controller
{
  public function index()
  {
      $positions = Position::all();
      return view('admin.position',['positions' => $positions]);
  }

  public function create()
    {
        $positions = Position::all();
       return view('admin.position-create',['positions' => $positions]);
    }

    public function store()
    {
        request()->validate([
            'position' => 'required|unique:positions,position',

        ]);

        Position::create([
            'position'=>request('position'),
            'submit'=>request('submit'),
        ]);

        return redirect('admin.position-create')->with('success','Creation Succesfull');;
    }

    public function view(Position $position)
    {
        $positions = Position::all();
        return view('admin.position',['position'=>$position,'positions'=>$positions]);
    }


    public function edit(Position $position)
    {
        return view('admin.position-edit',['position'=>$position]);
    }

    public function modify(Position $position)
    {

        request()->validate([
            'position' => 'required|unique:positions,position',

        ]);

        $position->update([
            'position'=>request('position'),
            'submit'=>request('submit'),


        ]);
        return redirect('admin.position-create')->with('success','Update Succesfull');

    }



    public function remove(Request $request)
    {
        $position_id = $request->pid;
        Position::where('id', $position_id)->delete();
      //  $position->delete();
        return redirect('admin.position')->with('success','Deletion Succesfull');
    }



}
