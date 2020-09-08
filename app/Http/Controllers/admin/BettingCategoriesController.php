<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BettingCategory;
use App\Match;

class BettingCategoriesController extends Controller
{
    public function index($match_id)
    {
        $title = "Betting Categories";

        $bettingCategories = BettingCategory::select('tbl_betting_categories.*','tbl_matches.name as matchName')
            ->leftJoin('tbl_matches','tbl_matches.id','tbl_betting_categories.match_id')
            ->where('tbl_betting_categories.match_id',$match_id)
            ->orderBy('tbl_betting_categories.order_by','asc')
            ->get();

        return view('admin.betting_category.index')->with(compact('title','bettingCategories','match_id'));
    }
    
    public function add($match_id)
    {
        $match = Match::where('id',$match_id)->first();
        $bettingCategoryOrderBy = BettingCategory::where('match_id',$match_id)->max('order_by');

        $orderBy = $bettingCategoryOrderBy + 1;

        $title = "Add Betting Category ( ".$match->name." )";
        $formLink = "betting_category.save";
        $buttonName = "Save";

        return view('admin.betting_category.add')->with(compact('title','formLink','buttonName','orderBy','match_id'));
    }

    public function save(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'match_id'=>'required',
            'name'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);
        
        BettingCategory::create([
            'match_id' => $request->match_id,
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('betting_category.index',$request->match_id))->with('msg','Betting Category Added Successfully');
               
    }

    public function edit($betting_category_id)
    {
        $betting_category = BettingCategory::where('id',$betting_category_id)->first();

        $match = Match::where('id',$betting_category->match_id)->first();

        
        $title = "Add Betting Category ( ".$match->name." )";
        $formLink = "betting_category.update";
        $buttonName = "Update";

        return view('admin.betting_category.edit')->with(compact('title','formLink','buttonName','betting_category'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        
        $betting_category = BettingCategory::find($request->betting_category_id);

        $this->validate($request,[
            'match_id'=>'required',
            'name'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        $betting_category->update([
            'match_id' => $request->match_id,
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('betting_category.index',$request->match_id))->with('msg','Betting Category Updated Successfully');
                
    }

    public function delete(Request $request)
    {
        BettingCategory::where('id',$request->betting_category_id)->delete();
    }

    public function status(Request $request)
    {
        $betting_category = BettingCategory::find($request->betting_category_id);

        if ($betting_category->status == 1)
        {
            $betting_category->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $betting_category->update( [               
                'status' => 1                
            ]);
        }
    }

}