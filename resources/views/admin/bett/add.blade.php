@extends('admin.layouts.master')

@section('content')
    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
        {{ csrf_field() }}

        <div class="card">
            <div class="custom-card-header">
                <div class="row">
                    <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-outline-info btn-lg" href="{{ route('bett.index',$betting_category_id) }}">
                            <i class="fa fa-arrow-circle-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" type="hidden" name="betting_category_id" value="{{ $betting_category_id }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control form-control-danger" placeholder="Add" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="ratio">Ratio</label>
                        <div class="form-group {{ $errors->has('ratio') ? ' has-danger' : '' }}">
                            <input type="text" min="0" class="form-control form-control-danger" placeholder="ratio" name="ratio" value="{{ old('ratio') }}" required>
                            @if ($errors->has('ratio'))
                                @foreach($errors->get('ratio') as $error)
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