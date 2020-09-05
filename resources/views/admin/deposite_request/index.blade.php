@extends('admin.layouts.masterIndex')

@section('card_body')
@php
    use App\Game;
    use App\PaymentMethod;
    use App\PaymentNumber;
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
                        <th width="110px">Method</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Transaction No</th>
                        <th width="100px" class="text-right">Amount</th> 
                        <th width="100px">Satus</th> 
                        <th width="70px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                        $sl = 0;
                        foreach ($customer_deposite_list as $customer_deposite) {
                            $payment_method = PaymentMethod::find($customer_deposite->payment_method_id);
                            $payment_to = PaymentNumber::find($customer_deposite->deposite_to);
                            if($customer_deposite->is_deposited == 0){
                                $color = "red";
                            }elseif($customer_deposite->is_deposited == 1){
                                $color = "green";
                            }
                    @endphp
                        <tr class="row_{{$customer_deposite->id}}" style="color:{{$color}}">
                            <td>{{++$sl}}</td>
                            <td>{{date('d M Y',strtotime($customer_deposite->created_at))}}</td>
                            <td>{{@$payment_method->name}}</td>
                            <td>{{$customer_deposite->deposite_from}}</td>
                            <td>{{@$payment_to->number}}</td>
                            <td>{{$customer_deposite->transaction_no}}</td>
                            <td class="text-right">{{$customer_deposite->deposite_amount}}</td>
                            <td>
                                @if($customer_deposite->is_deposited == 0)
                                    Pending
                                @elseif($customer_deposite->is_deposited == 1)
                                    Deposited
                                @endif
                            </td>
                            <td>
                                @php
                                    echo \App\Link::action($customer_deposite->id);
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

                deposite_id = $(this).parent().data('id');
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
                            url : "{{ route('depositeRequest.delete') }}",
                            data : {deposite_id:deposite_id},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+deposite_id).remove();
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
        function statusChange(deposite_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('depositeRequest.status') }}",
                data: {deposite_id:deposite_id},
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