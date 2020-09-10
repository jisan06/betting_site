<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Game;
use Carbon\Carbon;
use App\Bett;
use App\BettingCategory;
use App\CustomerBett;
use App\Client;

class MatchesController extends Controller
{
    public function index()
    {
        $title = "Manage All Matches";

        Match::whereDate('date_time','>', Carbon::today())
            ->update([
                'live' => 0
            ]);

            //change status for which match are live today
            Match::whereDate('date_time', Carbon::today())
            ->update([
                'live' => 1
            ]);

            //change status for which match are continuous long time manual
            Match::whereDate('date_time','<', Carbon::today())
                ->where('continuing_status',1)
                ->update([
                    'live' => 1
                ]);

            //change status for which match are closed
            Match::whereDate('date_time','<', Carbon::today())
                ->where(function($query){
                    $query->where('continuing_status',0)->orWhere('continuing_status',NULL);
                })
                ->update([
                    'live' => 2
                ]);
        $matches = Match::orderBy('id','desc')->get();

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
            'continuing_status' => $request->continuing_status,
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
            'continuing_status' => $request->continuing_status,
            'status' => $request->status,
        ]);

        return redirect(route('match.index'))->with('msg','Match Updated Successfully');

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

    public function delete(Request $request)
    {   $match = Match::find($request->matchId);
        if($match->live == 0 || $match->live == 1){
            $client_betting_list = \DB::table('tbl_clients')
                            ->select('tbl_clients.id','tbl_client_betts.client_id','tbl_client_betts.betting_id','tbl_client_betts.betting_stack','tbl_betts.id as bet_id','tbl_betts.betting_category_id','tbl_betting_categories.id as category_id','tbl_betting_categories.match_id')
                            ->join('tbl_client_betts','tbl_client_betts.client_id','tbl_clients.id')
                            ->join('tbl_betts','tbl_client_betts.betting_id','tbl_betts.id')
                            ->join('tbl_betting_categories','tbl_betting_categories.id','tbl_betts.betting_category_id')
                            ->where('tbl_betting_categories.match_id',$match->id)
                            ->get();
            foreach ($client_betting_list as $client_betting) {
                $client = Client::find($client_betting->client_id);
                $client->update([
                    'balance' => $client->balance + $client_betting->betting_stack,
                ]);

                CustomerBett::where('betting_id',$client_betting->betting_id)->delete();
                Bett::where('betting_category_id',$client_betting->betting_category_id)->delete();
            }
        }
        BettingCategory::where('match_id',$request->matchId)->delete();
        Match::where('id',$request->matchId)->delete();
    }
}
