@extends('admin.layouts.master')

@section('content')
    <div class="card">            
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                	<a class="btn btn-outline-info btn-lg" href="{{ route($goBackLink) }}">
                		<i class="fa fa-arrow-circle-left"></i> Go Back
                	</a>
                    <a style="font-size: 16px;" class="btn btn-outline-info btn-lg" href="{{ route('post.add',$pageId) }}">
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
	                        <th>Name</th>
	                        <th width="20px">ID</th>
                            <th width="20px">Order</th>
	                        <th width="20px">Status</th>
	                        <th width="80px">Action</th>
	                    </tr>
	                </thead>
	                <tbody id="">
	                	@php
	                		$sl = 1;
	                	@endphp
	                	@foreach ($posts as $post)
	                		<tr class="row_{{ $post->id }}">
	                			<td>{{ $sl++ }}</td>
	                			<td>{{ $post->post_name }}</td>
	                            <td>{{ $post->id }}</td>
                                <td>{{ $post->order_by }}</td>
	                			<td>
                                    <span class="switchery-demo m-b-30" onclick="statusChange({{ $post->id }})">
                                        <input type="checkbox" {{ $post->status ? 'checked':'' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;" >
                                    </span>
	                			</td>
	                			<td>
                                    <a href="{{ route('post.edit',$post->id) }}" data-toggle="tooltip" data-original-title="Edit" data-id="{{ $post->id }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                    <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $post->id }}"  data-token="{{ csrf_token() }}"> <i class="fa fa-trash text-danger"></i> </a>                				
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

                postId = $(this).parent().data('id');
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
                            url : "{{ route('post.delete') }}",
                            data : {postId:postId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+postId).remove();
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
        function statusChange(postId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('post.status') }}",
                data: {postId:postId},
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