@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
        <a href="{{ route('user.customerProfile') }}">
            Profile
        </a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
<style type="text/css">
    .select2-selection--single{
        height: 38px !important;
        padding: 3px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      top: 5px !important;
    }
</style>
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
                    <form action="{{ route('user.editProfile') }}" class="crud_from" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name 
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ $profile->name }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
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
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Club 
                                            </label>
                                            <select class="form-control select2" name="club_id">
                                                <option value="">Select Club</option>
                                                @foreach ($club_list as $club)
                                                @php
                                                    if($profile->club_id == $club->id){
                                                        $selected = 'selected';
                                                    }else{
                                                        $selected = '';
                                                    }
                                                @endphp
                                                    <option {{@$selected}} value="{{$club->id}}">{{$club->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Password 
                                            </label>
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection