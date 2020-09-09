<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Game;

class MatchesController extends Controller
{
    public function index()
    {
        $title = "Manage All Matches";

        $matches = Match::orderBy('id','asc')->get();

        return view('admin.match.index')->with(compact('title','matches'));
    }

    public function create()
    {
        $title = "Add New Match";
        $formLink = "match.store";
        $buttonName = "Save";
        $games = Game::orderBy('id','asc')->get();

        return view('admin.match.add')->with(compact('title','formLink','buttonName','games'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'game_id'=>'required',
            'name'=>'required|unique:tbl_matches',
            'team_one'=>'required',
            'team_two'=>'required',
            'league'=>'required',
            'date_time'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        $request->date_time = date('Y-m-d H:i:s',strtotime($request->date_time));
        Match::create([
            'game_id' => $request->game_id,
            'name' => $request->name,
            'team_one' => $request->team_one,
            'team_two' => $request->team_two,
            'league' => $request->league,
            'date_time' => $request->date_time,
            'icon' => $request->icon,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('match.index'))->with('msg','Match Added Successfully');
    }

    public function edit($id)
    {
        $title = "Edit Match";
        $buttonName = "Update";

        $match = Match::where('id',$id)->first();
        $games = Game::orderBy('id','asc')->get();

        return view('admin.match.edit')->with(compact('title','buttonName','match','games'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $match = Match::where('id',$id)->first();

        $this->validate($request,[
            'game_id'=>'required',
            'name'=>'required',
            'team_one'=>'required',
            'team_two'=>'required',
            'league'=>'required',
            'date_time'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);
        $request->date_time = date('Y-m-d H:i:s',strtotime($request->date_time));
        $match->update([
            'game_id' => $request->game_id,
            'name' => $request->name,
            'team_one' => $request->team_one,
            'team_two' => $request->team_two,
            'league' => $request->league,
            'date_time' => $request->date_time,
            'icon' => $request->icon,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('match.index'))->with('msg','Match Updated Successfully');

    }

    public function delete(Request $request)
    {
        Match::where('id',$request->matchId)->delete();
    }

    public function status(Request $request)
    {


        $match = Match::find($request->matchId);

        if ($match->status == 1)
        {
            $match->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $match->update( [               
                'status' => 1                
            ]);
        }
    }
}
