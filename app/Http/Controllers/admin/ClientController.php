<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Client;
use App\Admin;
use App\Club;

class ClientController extends Controller
{
    public function index()
    {
    	$title = "Client Setup";

    	$clients = Client::orderBy('name','asc')->get();

    	return view('admin.client.index')->with(compact('title','clients'));
    }


    public function edit($clientId)
    {
    	$title = "Edit Client";
    	$formLink = "client.update";
    	$buttonName = "Update";

    	$client = Client::where('id',$clientId)->first();
        $club_list = Club::all();
    	return view('admin.client.edit')->with(compact('title','formLink','buttonName','client','club_list'));
    }

    public function update(Request $request)
    {

    	$client = Client::find($request->clientId);

        $client->update([
            'club_id' => $request->club_id,
            'club_owner_id' => $request->club_owner_id,
        ]);

        return redirect(route('client.index'))->with('msg','Client Updated Successfully');
    }

    public function delete(Request $request)
    {
        $client = Client::find($request->clientId);

        Admin::where('id',$client->user_id)->delete();

    	Client::where('id',$client->id)->delete();
    }

    public function status(Request $request)
    {
        $client = Client::find($request->clientId);

        if ($client->status == 1)
        {
            $client->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $client->update( [               
                'status' => 1                
            ]);
        }
    }
}
