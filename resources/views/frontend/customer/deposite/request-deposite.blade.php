@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.deposite') }}">My Deposit</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')

    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    @if( count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong style="font-weight: bold;color: #e4280a;font-size: 16px;">
                                Sorry !
                            </strong> 
                            <strong style="font-weight: bold;color: #ca0c0c;;">
                                {{ $errors->first() }}
                            </strong>
                        </div>
                    @endif
                    <form action="{{ route('user.depositeRequest') }}" class="crud_from" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="payment_method_id">Payment Method
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-control" id="payment_method" name="payment_method_id" required>
                                                <option value="">Select Method</option>
                                                @foreach ($payment_methods as $key => $payment_method)
                                                    <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="deposite_to">To
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-control" id="deposite_to" name="deposite_to" required>
                                                <option value="">Select Number</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="deposite_from">Deposte From
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="deposite_from" class="form-control" placeholder="from" value="{{old('deposite_from')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="transaction_no">Transaction No
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="transaction_no" class="form-control" placeholder="write your transaction no" value="{{old('transaction_no')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="deposite_amount">Deposite Amount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" name="deposite_amount" class="form-control" placeholder="write your deposite amount" value="{{old('deposite_amount')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script type="text/javascript">
        $('#payment_method').click(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            var payment_method_id = $('#payment_method').val();
            
             $.ajax({
                type: "POST",
                url : "{{ route('user.getPaymentNo') }}",
                data : 
                    {
                        payment_method_id:payment_method_id,
                    },
                success: function(response) {
                    var deposite_to = $("#deposite_to").html('');
                        deposite_to.append(response.payment_number_html);
                },
                error: function(response) {
                }
            }); 
        });
        
    </script>
@endsection