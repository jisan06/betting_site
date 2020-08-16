@php
	$identification_type = array(
								'nid'=>'NID',
								'birth_registration'=>'Birth Registration',
								'passport'=>'Passport',
								'driving_licence'=>'Driving Licence'
							);
@endphp

<style type="text/css">
	.nice-select{
		height: 44px;
	}
</style>
<div class="login-form-container">
    <div class="login-register-form">
        <form action="{{ route('user.registration') }}" class="quotation-form" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
			<input type="hidden" name="activeTab" value="registration">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<label for="name">Name 
							<span class="required">*</span>
						</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="phone">Phone No 
							<span class="required">*</span>
						</label>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ old('phone') }}" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<label for="email">Profile Picture
							<span class="required">*</span> 
							(<span style="color: red;font-size:15px">Image size 600*600 px</span>)
						</label>
						<input type="file" name="image" class="form-control" id="image" style="padding: 10px;">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<label for="identification_type">Identification Type</label>
						<select class="form-control" name="identification_type" id="identification_type">
							<option>Select Identification Type</option>
							@foreach ($identification_type as $key=>$value)
								<option value="{{$key}}">{{$value}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<label for="identification_no" id="identification_no">Identification No</label>
						<input type="identification_no" name="identification_no" class="form-control" id="identification_no" placeholder="" value="{{ old('identification_no') }}">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="password">Password 
									<span class="required">*</span>
								</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="confirm_password">Confirm Password 
									<span class="required">*</span>
								</label>
								<input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="address">Address 
							<span class="required">*</span>
						</label>
						<textarea name="address" class="form-control" id="address" rows="6">{{ old('address') }}</textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 text-right">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</div>
		</form>
    </div>
</div>

@section('custom_js')
	<script type="text/javascript">
		$('#identification_type').on('change', function() {
			var identification_type = this.value;
			if(identification_type == 'nid'){
				$('#identification_no').text('NID No');
			}else if(identification_type == 'birth_registration'){
				$('#identification_no').text('Birth Registration No');
			}else if(identification_type == 'passport'){
				$('#identification_no').text('Passport No');
			}else if(identification_type == 'driving_licence'){
				$('#identification_no').text('Driving Licence');
			}
		});
	</script>
@endsection