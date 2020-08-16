@extends('frontend.layouts.master') 

@section('content')
    @section('header_link')
        <ul class="breadcrumb-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('user.customerProfile') }}">Profile</a></li>
            <li>Edit Profile</li>
        </ul>
    @endsection
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
    <div class="login-register-area mb-60px mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab">
                                <h4>{{$title}}</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('user.editProfile') }}" class="quotation-form" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <input type="hidden" name="activeTab" value="registration">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Name 
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ $profile->name }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone No 
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ $profile->phone }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Email Address</label>
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $profile->email }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="identification_type">Identification Type</label>
                                                                <select class="form-control" name="identification_type" id="identification_type">
                                                                    <option>Select Identification Type</option>
                                                                    @foreach ($identification_type as $key=>$value)
                                                                    @php
                                                                        if($profile->identification_type == $key){
                                                                            $selected = 'selected';
                                                                        }else{
                                                                            $selected = '';
                                                                        }
                                                                    @endphp
                                                                        <option {{$selected }} value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 col-sm-8">
                                                            <div class="form-group">
                                                                <label for="identification_no" id="identification_no">Identification No</label>
                                                                <input type="identification_no" name="identification_no" class="form-control" id="identification_no" placeholder="" value="{{ $profile->identification_no    }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="password">Password 
                                                                </label>
                                                                <input type="password" name="password" class="form-control" id="password">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="email">Profile Picture
                                                                    <span class="required">*</span> 
                                                                    (<span style="color: red;font-size:15px">Image size 600*600 px</span>)
                                                                </label>
                                                                <input type="file" name="image" class="form-control" id="image" style="padding: 10px;">
                                                                @if (file_exists($profile->image))
                                                                    <img src="{{ asset($profile->image) }}" height="100px">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address">Address 
                                                            <span class="required">*</span>
                                                        </label>
                                                        <textarea name="address" class="form-control" id="address" rows="6">{{ $profile->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script type="text/javascript">
        var identification_type = $('#identification_type').find(":selected").val();
        if(identification_type == 'nid'){
            $('#identification_no').text('NID No');
        }else if(identification_type == 'birth_registration'){
            $('#identification_no').text('Birth Registration No');
        }else if(identification_type == 'passport'){
            $('#identification_no').text('Passport No');
        }else if(identification_type == 'driving_licence'){
            $('#identification_no').text('Driving Licence');
        }

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