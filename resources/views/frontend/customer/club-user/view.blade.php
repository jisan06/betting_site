@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.clubUser') }}">Club User Details</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
    <div class="statics-result-map">
        <div class="round-set one">

            <div class="table-responsive">
                <table class="table table-bordered table-sm details_table">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Details of ( {{$client->username}} )</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Name</th>
                            <td>{{$client->name}}</td>
                            
                            <th class="head_name">User Name</th>
                            <td>{{$client->username}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Phone No</th>
                            <td>{{$client->phone}}</td>
                            <th class="head_name">Email Address</th>
                            <td>{{$client->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection