@extends('admin.layouts.master')

@push('css')
<link href="{{ asset('/public/admin-elite/assets/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<form class="form-horizontal" action="{{ route('match.update',$match->id) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
    {{ csrf_field() }}
    @method('PUT')

    <div class="card">
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-outline-info btn-lg" href="{{ route($goBackLink) }}">
                        <i class="fa fa-arrow-circle-left"></i> Go Back
                    </a>
                    <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group {{ $errors->has('game_id') ? ' has-danger' : '' }}">
                        <label for="game_id">Game</label>
                        <select class="form-control select2" name="game_id" required>
                            <option value=""> Select Game</option>
                            @foreach($games as $game)

                            @php
                                if ($game->id == $match->game_id)
                                {
                                    $select = 'selected';
                                }
                                else
                                {
                                    $select = '';
                                }
                            @endphp

                                <option value="{{$game->id}}" {{ $select }}>{{$game->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('game_id'))
                            @foreach($errors->get('game_id') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>                                       
                </div>
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Name of The Match" name="name" value="{{ $match->name }}" required>
                        @if ($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="team_one">Team One</label>
                    <div class="form-group {{ $errors->has('team_one') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Name of Team One" name="team_one" value="{{ $match->team_one }}" required>
                        @if ($errors->has('team_one'))
                            @foreach($errors->get('team_one') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="team_two">Team Two</label>
                    <div class="form-group {{ $errors->has('team_two') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Icon of The Match" name="team_two" value="{{ $match->team_two }}" required>
                        @if ($errors->has('team_two'))
                            @foreach($errors->get('team_two') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="league">League</label>
                    <div class="form-group {{ $errors->has('league') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Name of The League" name="league" value="{{ $match->league }}" required>
                        @if ($errors->has('league'))
                            @foreach($errors->get('league') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="date_time">Date & Time</label>
                    <div class="form-group {{ $errors->has('date_time') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control date_timepicker" placeholder="Date of The Match" name="date_time" value="{{ date('d-m-Y h:i a',strtotime($match->date_time)) }}" readonly required>
                        @if ($errors->has('date_time'))
                            @foreach($errors->get('date_time') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="icon">Icon</label>
                    <div class="form-group {{ $errors->has('icon') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Icon of The Match" name="icon" value="{{ $match->icon }}">
                        @if ($errors->has('icon'))
                            @foreach($errors->get('icon') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="order_by">Order By</label>
                    <div class="form-group {{ $errors->has('order_by') ? ' has-danger' : '' }}">
                        <input type="number" min="0" class="form-control" placeholder="Order By" name="order_by" value="{{ $match->order_by }}" required>
                        @if ($errors->has('order_by'))
                            @foreach($errors->get('order_by') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="publication-status">Publication Status</label>
                    <div class="form-group {{ $errors->has('status') ? ' has-danger' : '' }}" style="height: 40px; line-height: 40px;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="published" name="status" class="form-check-input" checked="" value="1" required>Published
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="unpublished" name="status" class="form-check-input" value="0">Unpublished
                            </label>
                        </div>                          
                    </div>
                </div>
                
            </div>
        </div>
        <div class="custom-card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                </div>
            </div>              
        </div>
    </div>
</form>
@endsection

@push('js')
    <script src="{{ asset('/public/admin-elite/assets/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            $('#datetimepicker1').datetimepicker({
                format: "dd MM yyyy - HH:ii p",
                showMeridian: true,
                autoClose:true,
                todayBtn: true
            });
        })
    </script>
@endpush