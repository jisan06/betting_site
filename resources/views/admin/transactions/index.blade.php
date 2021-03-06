@extends('admin.layouts.masterIndex')

@section('card_body')
@php
    use App\Client;
@endphp
<style type="text/css">
    .addBtn{
        display: none;
    }
</style>
    <div class="card-body">

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                <thead>
                    <tr>
                        <th width="25px">SL</th>
                        <th width="100px">Time</th>
                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>For</th>
                        <th class="text-right">Debit(Out)</th>
                        <th class="text-right">Credit(In)</th>
                        <th class="text-right">Balance</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                        $sl = 0;
                        foreach ($customer_transaction_list as $customer_transaction) {
                            $client_info = Client::find($customer_transaction->client_id);
                    @endphp
                        <tr>
                            <td>{{++$sl}}</td>
                            <td>{{date('d M Y',strtotime($customer_transaction->date_time))}}</td>
                            <td>{{@$client_info->name}}</td>
                            <td>{{@$client_info->phone}}</td>
                            <td>{{$customer_transaction->transaction_for}}</td>
                            <td class="text-right">{{$customer_transaction->debit}}</td>
                            <td class="text-right">{{$customer_transaction->credit}}</td>
                            <td class="text-right">{{$customer_transaction->current_balance}}</td>
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

                transfer_id = $(this).parent().data('id');
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
                            url : "{{ route('transferRequest.delete') }}",
                            data : {transfer_id:transfer_id},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+transfer_id).remove();
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