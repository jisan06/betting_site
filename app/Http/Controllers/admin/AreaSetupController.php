<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\AreaSetup;

class AreaSetupController extends Controller
{
    public function index()
    {
    	$title = "Manage All Location";

    	$areas = AreaSetup::orderBy('name','asc')->get();

    	return view('admin.location.index')->with(compact('title','areas'));
    }

    public function add()
    {
    	$title = "Add New Location";
    	$formLink = "location.save";
    	$buttonName = "Save";

    	return view('admin.location.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        AreaSetup::create([
            'name' => $request->name,
            'charge' => $request->charge,
            'root_plan' => $request->root_plan,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('location.index'))->with('msg','Area Added Successfully');
    }

    public function edit($areaId)
    {
    	$title = "Edit Location";
    	$formLink = "location.update";
    	$buttonName = "Update";

    	$area = AreaSetup::where('id',$areaId)->first();

    	return view('admin.location.edit')->with(compact('title','formLink','buttonName','area'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$area = AreaSetup::find($request->areaId);

        $area->update([
            'name' => $request->name,
            'charge' => $request->charge,
            'root_plan' => $request->root_plan,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('location.index'))->with('msg','Area Updated Successfully');
    }

    public function delete(Request $request)
    {
    	AreaSetup::where('id',$request->areaId)->delete();
    }

    public function status(Request $request)
    {
        $area = AreaSetup::find($request->areaId);

        if ($area->status == 1)
        {
            $area->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $area->update( [               
                'status' => 1                
            ]);
        }
    }
}
