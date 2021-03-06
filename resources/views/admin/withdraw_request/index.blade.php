@extends('admin.layouts.masterIndex')

@section('card_body')
@php
    use App\Game;
    use App\Client;
@endphp
<style type="text/css">
    .addBtn{
        display: none;
    }
</style>
    <div class="card-body">
        {{-- <div align='center'>
            <font size='7' text-align='center' color='green' face='Comic sans MS'>This Page Is Now Under Construction</font>
        </div> --}}

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                <thead>
                    <tr>
                        <th width="25px">SL</th>
                        <th width="90px">Date</th>
                        <th width="150px">Name</th>
                        <th>User Name</th>
                        <th width="40px">Phone No.</th>
                        <th width="100px">To</th>
                        <th width="80px">Payment Type</th>
                        <th width="40px">Status</th>
                        <th width="100px" class="text-right">Amount</th>                        
                        <th width="70px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                        $sl = 0;
                        foreach ($customer_withdraw_list as $customer_withdraw) {
                            $client = Client::find($customer_withdraw->client_id);
                    @endphp
                        <tr class="row_{{$customer_withdraw->id}}">
                            <td>{{++$sl}}</td>
                            <td>{{date('d M Y',strtotime($customer_withdraw->created_at))}}</td>
                            <td>{{$customer_withdraw->name}}</td>
                            <td>{{@$client->username}}</td>
                            <td>{{$customer_withdraw->phone_no}}</td>
                            <td>{{$customer_withdraw->withdraw_number}}</td>
                            <td>{{$customer_withdraw->payment_type}}</td>
                            <td>
                                @if($customer_withdraw->status == 0)
                                    <span class="badge badge-warning">Pending</span> 
                                @endif

                                @if($customer_withdraw->status == 1)
                                    <span class="badge badge-success">Withdrawed</span>
                                   
                                @endif
                            </td>
                            <td class="text-right">{{$customer_withdraw->withdraw_amount}}</td>
                            <td>
                                @php
                                    echo \App\Link::action($customer_withdraw->id);
                                @endphp                             
                            </td>
                        </tr>
                    @php
                        }
                    @endphp
                </tbody>
            </table>
        </div>
    </div>	
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            var updateThis ;       

            //ajax delete code
            $('#dataTable tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                withdraw_id = $(this).parent().data('id');
                var tableRow = this;
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this information!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                },
                function(isConfirm){   
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url : "{{ route('withdrawRequest.delete') }}",
                            data : {withdraw_id:withdraw_id},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+withdraw_id).remove();
                            },
                            error: function(response) {
                                error = "Failed.";
                                swal({
                                    title: "<small class='text-danger'>Error!</small>", 
                                    type: "error",
                                    text: error,
                                    timer: 1000,
                                    html: true,
                                });
                            }
                        });    
                    }
                    else
                    { 
                        swal({
                            title: "Cancelled", 
                            type: "error",
                            text: "This Data Is Safe :)",
                            timer: 1000,
                            html: true,
                        });    
                    } 
                });
            });
        });

        //ajax status change code
        function statusChange(withdraw_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('depositeRequest.status') }}",
                data: {withdraw_id:withdraw_id},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Deposite Updated!",
                        timer: 1000,
                        html: true,
                    });
                },
                error: function(response) {
                    error = "Failed.";
                    swal({
                        title: "<small class='text-danger'>Error!</small>", 
                        type: "error",
                        text: error,
                        timer: 2000,
                        html: true,
                    });
                }
            });
        }        
        
        
    </script>
@endsection