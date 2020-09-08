<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bett;
use App\BettingCategory;
use App\Client;
use App\CustomerBett;

class BettsController extends Controller
{
    public function index($betting_category_id)
    {
        $title = "Betts";

        $bettings = Bett::select('tbl_betts.*','tbl_betting_categories.name as betting_category_name')
            ->leftJoin('tbl_betting_categories','tbl_betting_categories.id','tbl_betts.betting_category_id')
            ->where('tbl_betts.betting_category_id',$betting_category_id)
            ->orderBy('tbl_betting_categories.order_by','asc')
            ->orderBy('tbl_betts.result','asc')
            ->get();

        $betting_category = BettingCategory::where('id',$betting_category_id)->first();

        return view('admin.bett.index')->with(compact('title','bettings','betting_category_id','betting_category'));
    }

    public function add($betting_category_id)
    {
        $beingCategory = BettingCategory::where('id',$betting_category_id)->first();

        $title = "Add Bett ( ".$beingCategory->name." )";
        $formLink = "bett.save";
        $buttonName = "Save";

        return view('admin.bett.add')->with(compact('title','formLink','buttonName','betting_category_id'));
    }

    public function save(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'betting_category_id'=>'required',
            'name'=>'required|unique:tbl_betts',
            'ratio'=>'required',
        ]);
        
        Bett::create([
            'betting_category_id' => $request->betting_category_id,
            'name' => $request->name,
            'ratio' => $request->ratio
        ]);

        return redirect(route('bett.index',$request->betting_category_id))->with('msg','Bett Added Successfully');
               
    }

    public function edit($bett_id)
    {
        $bett = Bett::where('id',$bett_id)->first();

        $betting_category = BettingCategory::where('id',$bett->betting_category_id)->first();

        
        $title = "Edit Bett ( ".$betting_category->name." )";
        $formLink = "bett.update";
        $buttonName = "Update";

        return view('admin.bett.edit')->with(compact('title','formLink','buttonName','bett'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        
        $bett = Bett::find($request->bett_id);
        $this->validate($request,[
            'betting_category_id'=>'required',
            'name'=>'required',
            'ratio'=>'required',
        ]);

        $bett->update([
            'betting_category_id' => $request->betting_category_id,
            'name' => $request->name,
            'ratio' => $request->ratio,
            'result' => $request->result,
        ]);

        if($bett->is_published == 0 && $bett->result == 1){
            $customer_bet = CustomerBett::where('betting_id',$bett->id)
                                ->update([
                                    'winning_status' => 1,
                                ]);

            $customer_winning_bet_list = CustomerBett::where('betting_id',$bett->id)
                                        ->where('winning_status',1)
                                        ->get();
            foreach ($customer_winning_bet_list as $customer_winning_bet) {
               $client = Client::find($customer_winning_bet->client_id);
               $client->update([
                'balance' => $client->balance + $customer_winning_bet->wining_amount,
               ]);
            }

            $bett->update([
                'is_published' => 1
            ]);
        }

        return redirect(route('bett.index',$request->betting_category_id))->with('msg','Bett Updated Successfully');
                
    }

    public function delete(Request $request)
    {
        Bett::where('id',$request->bett_id)->delete();
    }

    public function result(Request $request)
    {
        $bett = Bett::find($request->bett_id);

        if ($bett->result == 1)
        {
            $bett->update( [               
                'result' => 0                
            ]);
        }
        else
        {
            $bett->update( [               
                'result' => 1                
            ]);
        }
    }


}
