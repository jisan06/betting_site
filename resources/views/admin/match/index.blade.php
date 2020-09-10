@extends('admin.layouts.masterIndex')

@section('card_body')
@php
    use App\Game;
@endphp
    <div class="card-body">
        {{-- <div align='center'>
            <font size='7' text-align='center' color='green' face='Comic sans MS'>This Page Is Now Under Construction</font>
        </div> --}}

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                <thead>
                    <tr>
                        <th width="10px">SL</th>
                        <th width="80px">Game</th>
                        <th>Name</th>
                        <th>Team One</th>
                        <th>Team Two</th>
                        <th width="140px">Date & Time</th>
                        <th width="110px" class="text-center">Match Status</th>
                        <th width="40px" class="text-center">Order</th>
                        <th width="20px">Status</th>
                        <th width="20px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                	@foreach ($matches as $match)
                    @php
                        $game = Game::find($match->game_id);
                    @endphp
                		<tr class="row_{{ $match->id }}">
                			<td>{{ $sl++ }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $match->name }}</td>
                            <td>{{ $match->team_one }}</td>
                            <td>{{ $match->team_two }}</td>
                            <td>{{ date('d-m-Y h:i a',strtotime($match->date_time)) }}</td>
                            <td class="text-center">
                                @if($match->live == 0)
                                    Upcoming
                                @elseif($match->live == 1)
                                    Live
                                @elseif($match->live == 2)
                                    Closed
                                @endif
                            </td>
                            <td class="text-center">{{ $match->order_by }}</td>
                			<td>
                                @php
                                    echo \App\Link::status($match->id,$match->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($match->id);
                    			@endphp                				
                			</td>
                		</tr>
                	@endforeach
                </tbody>
            </table>
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

                matchId = $(this).parent().data('id');
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
                            url : "{{ route('match.delete') }}",
                            data : {matchId:matchId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+matchId).remove();
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

        //ajax status change code
        function statusChange(matchId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('match.status') }}",
                data: {matchId:matchId},
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