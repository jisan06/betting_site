<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Game;

class GamesController extends Controller
{
    public function index()
    {
        $title = "Manage All Games";

        $games = Game::orderBy('name','asc')->get();

        return view('admin.game.index')->with(compact('title','games'));
    }

    public function create()
    {
        $title = "Add New Game";
        $formLink = "game.store";
        $buttonName = "Save";

        return view('admin.game.add')->with(compact('title','formLink','buttonName'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:tbl_games',
            'icon'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        Game::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'order_by' => $request->order_by,
            'status' => $request->status
        ]);

        return redirect(route('game.index'))->with('msg','Game Added Successfully');
    }

    public function edit($id)
    {
        $title = "Edit Game";
        $buttonName = "Update";

        $game = Game::where('id',$id)->first();

        return view('admin.game.edit')->with(compact('title','buttonName','game'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $game = Game::find($id);

        $this->validate($request,[
            'name'=>'required',
            'icon'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        $game->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('game.index'))->with('msg','Game Updated Successfully');

    }

    public function delete(Request $request)
    {
        Game::where('id',$request->gameId)->delete();
    }

    public function status(Request $request){


        $game = Game::find($request->gameId);

        if ($game->status == 1)
        {
            $game->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $game->update( [               
                'status' => 1                
            ]);
        }
    }
}
