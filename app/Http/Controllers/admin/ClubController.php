<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club;

class ClubController extends Controller
{
    
    public function index()
    {
        $title = "Manage All Club";

        $clubs = Club::orderBy('name','asc')->get();

        return view('admin.club.index')->with(compact('title','clubs'));
    }

    public function create()
    {
        $title = "Add New Club";
        $formLink = "club.store";
        $buttonName = "Save";

        return view('admin.club.add')->with(compact('title','formLink','buttonName'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Club::create([
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('club.index'))->with('msg','Club Added Successfully');
    }

    public function show($id)
    {
        //    
    }

    public function edit($id)
    {
        $title = "Edit Club";
        $buttonName = "Update";

        $club = Club::where('id',$id)->first();

        return view('admin.club.edit')->with(compact('title','buttonName','club'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $club = Club::find($id);

        $club->update([
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('club.index'))->with('msg','Club Updated Successfully');

    }

    public function delete(Request $request)
    {
        Club::where('id',$request->clubId)->delete();
    }

    public function status(Request $request){

        

        $club = Club::find($request->clubId);

        if ($club->status == 1)
        {
            $club->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $club->update( [               
                'status' => 1                
            ]);
        }
    }


}
