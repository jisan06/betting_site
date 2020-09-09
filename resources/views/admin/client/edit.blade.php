@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="clientId" value="{{ $client->id }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="client-name">Client Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ $client->name }}" readonly>
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="username">User Name</label>
                <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="username" value="{{ $client->username }}" readonly>
                    @if ($errors->has('username'))
                        @foreach($errors->get('username') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="sponsor_username">Sponsor User Name</label>
                <div class="form-group {{ $errors->has('sponsor_username') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="sponsor_username" value="{{ $client->sponsor_username }}" readonly>
                    @if ($errors->has('sponsor_username'))
                        @foreach($errors->get('sponsor_username') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="Phone">Phone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $client->phone }}" readonly>
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="email">Email</label>
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $client->email }}" readonly>
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="balance">Balance</label>
                <div class="form-group {{ $errors->has('balance') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Balance" name="balance" value="৳ {{number_format($client->balance,2,'.','') }}" readonly>
                    @if ($errors->has('balance'))
                        @foreach($errors->get('balance') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="club_id">Club</label>
                <div class="form-group {{ $errors->has('club_id') ? ' has-danger' : '' }}">
                    <select class="form-control select2" name="club_id">
                        <option value=""> Select Club</option>
                        @foreach($club_list as $club)
                            @php
                                if ($club->id == $client->club_id){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                            @endphp
                            <option value="{{$club->id}}" {{ $selected }}>{{$club->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('club_id'))
                        @foreach($errors->get('club_id') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="club_owner_id">Club of Owner</label>
                <div class="form-group {{ $errors->has('club_owner_id') ? ' has-danger' : '' }}">
                    <select class="form-control select2" name="club_owner_id">
                        <option value=""> Select Club</option>
                        @foreach($club_list as $club)
                            @php
                                if ($club->id == $client->club_owner_id){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                            @endphp
                            <option value="{{$club->id}}" {{ $selected }}>{{$club->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('club_owner_id'))
                        @foreach($errors->get('club_owner_id') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection