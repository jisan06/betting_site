@extends('admin.layouts.master')

@section('content')
    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
        {{ csrf_field() }}

        <div class="card">
            <div class="custom-card-header">
                <div class="row">
                    <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-outline-info btn-lg" href="{{ route('betting_category.index',$betting_category->match_id) }}">
                            <i class="fa fa-arrow-circle-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="hidden" name="match_id" value="{{ $betting_category->match_id }}">
                    </div>

                    <div class="col-md-6">
                        <input class="form-control" type="hidden" name="betting_category_id" value="{{ $betting_category->id }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control form-control-danger" placeholder="Add" name="name" value="{{ $betting_category->name }}" required>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="order_by">Order By</label>
                        <div class="form-group {{ $errors->has('order_by') ? ' has-danger' : '' }}">
                            <input type="number" class="form-control form-control-danger" placeholder="order by" name="order_by" value="{{ $betting_category->order_by }}" required>
                            @if ($errors->has('order_by'))
                                @foreach($errors->get('order_by') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="publication-status">Publication Status</label>
                        <div class="form-group {{ $errors->has('status') ? ' has-danger' : '' }}" style="height: 40px; line-height: 40px;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="published" name="status" class="form-check-input" value="1" required>Published
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

    <script type="text/javascript">
    document.forms['form'].elements['status'].value = "{{$betting_category->status}}";
</script>
@endsection

