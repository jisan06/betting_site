<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\PaymentNumber;
use App\PaymentMethod;

class PaymentNumberController extends Controller
{
    public function index()
    {
        $title = "Manage Payment Number";

        $payment_numbers = PaymentNumber::orderBy('id','asc')->get();

        return view('admin.payment-number.index')->with(compact('title','payment_numbers'));
    }

    public function create()
    {
        $title = "Add New Payment Number";
        $formLink = "payment-number.store";
        $buttonName = "Save";

        $payment_methods = PaymentMethod::orderBy('name','asc')->get();

        return view('admin.payment-number.add')->with(compact('title','formLink','buttonName','payment_methods'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'payment_method_id'=>'required',
            'number'=>'required|unique:tbl_payment_number',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        PaymentNumber::create([
            'payment_method_id' => $request->payment_method_id,
            'number' => $request->number,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('payment-number.index'))->with('msg','Payment Number Added Successfully');
    }

    public function edit($id)
    {
        $title = "Edit Match";
        $buttonName = "Update";

        $payment_number = PaymentNumber::where('id',$id)->first();
        $payment_methods = PaymentMethod::orderBy('name','asc')->get();

        return view('admin.payment-number.edit')->with(compact('title','buttonName','payment_number','payment_methods'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $payment_number = PaymentNumber::where('id',$id)->first();

        $this->validate($request,[
            'payment_method_id'=>'required',
            'number'=>'required',
            'order_by'=>'required',
            'status'=>'required'
        ]);

        $payment_number->update([
            'payment_method_id' => $request->payment_method_id,
            'number' => $request->number,
            'order_by' => $request->order_by,
            'status' => $request->status,
        ]);

        return redirect(route('payment-number.index'))->with('msg','Number Updated Successfully');

    }
    public function delete(Request $request)
    {
        PaymentNumber::where('id',$request->payment_number_id)->delete();
    }

    public function status(Request $request)
    {


        $payment_number_id = PaymentNumber::find($request->payment_number_id);

        if ($payment_number_id->status == 1)
        {
            $payment_number_id->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $payment_number_id->update( [               
                'status' => 1                
            ]);
        }
    }

}
