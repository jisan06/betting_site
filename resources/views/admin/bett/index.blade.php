@extends('admin.layouts.master')

@section('content')
@php
    use App\Game;
    use App\Bett;
    use App\BettingCategory;
    use App\Match;
    use App\Client;
@endphp
    <div class="card">            
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                	<a class="btn btn-outline-info btn-lg" href="{{ route('betting_category.index',$betting_category->match_id) }}">
                		<i class="fa fa-arrow-circle-left"></i> Go Back
                	</a>
                    <a style="font-size: 16px;" class="btn btn-outline-info btn-lg" href="{{ route('bett.add',$betting_category_id) }}">
                        <i class="fa fa-plus-circle"></i> Add New
                    </a>                  
                </div>
            </div>
        </div>
    
	    <div class="card-body">
	        <div class="table-responsive">
	            @php
	                $sl = 0;
	            @endphp

	            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
	                <thead>
	                    <tr>
	                        <th width="20px">SL</th>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Betting Category</th>
	                        <th>Name</th>
	                        <th width="20px">Ratio</th>
	                        <th width="90px">result</th>
                            <th width="90px">status</th>
	                        <th width="40px">Action</th>
	                    </tr>
	                </thead>
	                <tbody id="">
	                	@php
	                		$sl = 1;
	                	@endphp
	                	@foreach ($bettings as $bett)
                        @php
                            $betting_category = BettingCategory::find($bett->betting_category_id);
                            $match = Match::find($betting_category->match_id);
                            $game = Game::find($match->game_id);
                        @endphp
	                		<tr class="row_{{ $bett->id }}">
	                			<td>{{ $sl++ }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $match->name }}</td>
	                			<td>{{ $bett->betting_category_name }}</td>
                                <td>{{ $bett->name }}</td>
	                            <td>{{ $bett->ratio }}</td>
	                			<td>
                                    @if($bett->result == 0 && $bett->result != NULL )
                                        Not Win
                                    @elseif($bett->result == 1 && $bett->result != NULL)
                                        Win
                                    @else
                                        Not Published
                                    @endif
                                </td>
                                <td>
                                    <span class="switchery-demo m-b-30" onclick="statusChange({{ $bett->id }})">
                                        <input type="checkbox" {{ $bett->status ? 'checked':'' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;" >
                                    </span>
                                </td>
	                			<td>
                                    <a href="{{ route('bett.edit',$bett->id) }}" data-toggle="tooltip" data-original-title="Edit" data-id="{{ $bett->id }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                    <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $bett->id }}"  data-token="{{ csrf_token() }}"> <i class="fa fa-trash text-danger"></i> </a>                				
	                			</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
    </div>	
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            var updateThis ;       

            //ajax delete code
            $('#dataTable tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                bett_id = $(this).parent().data('id');
                var tableRow = this;
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this information!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                },
                function(isConfirm){   
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url : "{{ route('bett.delete') }}",
                            data : {bett_id:bett_id},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+bett_id).remove();
                            },
                            error: function(response) {
                                error = "Failed.";
                                swal({
                                    title: "<small class='text-danger'>Error!</small>", 
                                    type: "error",
                                    text: error,
                                    timer: 1000,
                                    html: true,
                                });
                            }
                        });    
                    }
                    else
                    { 
                        swal({
                            title: "Cancelled", 
                            type: "error",
                            text: "This Data Is Safe :)",
                            timer: 1000,
                            html: true,
                        });    
                    } 
                });
            });
        });
                
        // ajax status change code
        function statusChange(bett_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('bett.status') }}",
                data: {bett_id:bett_id},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Status Successfully Updated!",
                        timer: 1000,
                        html: true,
                    });
                },
                error: function(response) {
                    error = "Failed.";
                    swal({
                        title: "<small class='text-danger'>Error!</small>", 
                        type: "error",
                        text: error,
                        timer: 2000,
                        html: true,
                    });
                }
            });
        }
    </script>
@endsection