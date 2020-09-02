<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\PaymentMethod;

class PaymentMethodController extends Controller
{
	public function index()
    {
        $title = "Manage Payment Method";

        $payment_methods = PaymentMethod::orderBy('name','asc')->get();

        return view('admin.payment-method.index')->with(compact('title','payment_methods'));
    }

    public function create()
    {
        $title = "Add New Payment Method";
        $formLink = "payment-method.store";
        $buttonName = "Save";

        return view('admin.payment-method.add')->with(compact('title','formLink','buttonName'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:tbl_payment_method',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        PaymentMethod::create([
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status
        ]);

        return redirect(route('payment-method.index'))->with('msg','Payment Method Added Successfully');
    }

    public function edit($id)
    {
        $title = "Edit Payment Method";
        $buttonName = "Update";

        $payment_method = PaymentMethod::where('id',$id)->first();

        return view('admin.payment-method.edit')->with(compact('title','buttonName','payment_method'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $payment_method = PaymentMethod::find($id);

        $this->validate($request,[
            'name'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        $payment_method->update([
            'name' => $request->name,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);
        return redirect(route('payment-method.index'))->with('msg','Payment Method Updated Successfully');
    }

    public function delete(Request $request)
    {
        PaymentMethod::where('id',$request->payment_method_Id)->delete();
    }

    public function status(Request $request){

        $payment_method = PaymentMethod::find($request->payment_method_Id);

        if ($payment_method->status == 1)
        {
            $payment_method->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $payment_method->update( [               
                'status' => 1                
            ]);
        }
    }

}
