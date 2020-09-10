@extends('admin.layouts.master')

@section('content')
@php
    use App\Game;
    use App\Bett;
    use App\BettingCategory;
    use App\Match;

        $betting_category = BettingCategory::find($bett->betting_category_id);
        $match = Match::find($betting_category->match_id);
        $game = Game::find($match->game_id);
@endphp
    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
        {{ csrf_field() }}

        <div class="card">
            <div class="custom-card-header">
                <div class="row">
                    <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-outline-info btn-lg" href="{{ route('bett.index',$bett->betting_category_id) }}">
                            <i class="fa fa-arrow-circle-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="hidden" name="betting_category_id" value="{{ $bett->betting_category_id }}">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="hidden" name="bett_id" value="{{ $bett->id }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Game</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-danger" value="{{ $game->name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="name">Match</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-danger" value="{{ $match->name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="name">Betting Category</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-danger" value="{{ $betting_category->name }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control form-control-danger" placeholder="Add" name="name" value="{{ $bett->name }}" required>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="ratio">Ratio</label>
                        <div class="form-group {{ $errors->has('ratio') ? ' has-danger' : '' }}">
                            <input type="text" min="0" class="form-control form-control-danger" placeholder="ratio" name="ratio" value="{{ $bett->ratio }}" required>
                            @if ($errors->has('ratio'))
                                @foreach($errors->get('ratio') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <label for="result">Result ?</label>
                            <div class="form-group" style="height: 15px; line-height: 40px;">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" id="win" name="result" class="form-check-input" value="1">Win
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" id="not_win" name="result" class="form-check-input" value="0">Not Win
                                    </label>
                                </div>                       
                            </div>
                            <span style="color: red">
                                /* Note: Please select carefully . When you update and select this it's connected with all user balance which are bet for this game */
                            </span>  
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
        document.forms['form'].elements['result'].value = "{{$bett->result}}";
        document.forms['form'].elements['status'].value = "{{$bett->status}}";
    </script>
@endsection