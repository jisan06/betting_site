<option value="">Select Number</option>
@foreach ($payment_numbers as $payment_number)
	<option value="{{$payment_number->id}}">{{$payment_number->number}}</option>
@endforeach