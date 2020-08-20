@extends('admin.layouts.master')

@section('content')
<form class="form-horizontal" action="{{ route('club.update',$club->id) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
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
                <div class="col-md-12">
                    <input type="hidden" class="form-control" name="areaId" value="{{ $club->id }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Club Name" name="name" value="{{ $club->name }}">
                        @if ($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="order-by">Order By</label>
                            <div class="form-group {{ $errors->has('orderBy') ? ' has-danger' : '' }}">
                                <input type="number" class="form-control" placeholder="Order By" name="order_by" value="{{ $club->order_by }}">
                                @if ($errors->has('orderBy'))
                                    @foreach($errors->get('orderBy') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
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