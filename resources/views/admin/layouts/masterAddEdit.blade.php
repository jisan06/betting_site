<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($adminInformation->fav_icon) }}">

        <title>{{ $adminInformation->website_name }} {{ $adminInformation->prefix_title }} Admin {{ $adminInformation->prefix_title }}  {{ $title }}</title>
        <link href="{{ asset('/public/admin-elite/assets/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">

        @include('admin.partials.header-assets')
        
        @yield('custom_css')

        
    </head>

    <body class="skin-default fixed-layout">
        <!-- Preloader - style you can find in spinners.css -->
        @include('admin.partials.preloader')

        <!-- Main wrapper - style you can find in pages.scss -->
        <div id="main-wrapper">
            <!-- Topbar header - style you can find in pages.scss -->
            <header class="topbar">
                @include('admin.partials.top-navbar')
            </header>
            <!-- End Topbar header -->

            <!-- Left Sidebar - style you can find in sidebar.scss  -->  
            @include('admin.partials.menu')
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->

            <!-- Page wrapper  -->
            <div class="page-wrapper">
                <!-- Container fluid  -->
                <div class="container-fluid">
    	            <!-- Bread crumb and right sidebar toggle -->
    	            @yield('bread-crumb')
    	            <!-- End Bread crumb and right sidebar toggle -->

        			<div style="padding-bottom: 10px;"></div>

    			    @php
    			        $message = Session::get('msg');
                        $error = Session::get('error');
    			    @endphp

    			    @if (isset($message))
    					<div class="alert alert-success alert-dismissible">
    						<button type="button" class="close" data-dismiss="alert">&times;</button>
    						<strong>Success!</strong> {{ $message }}
    					</div>
    			    @endif

                    @if (isset($error))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oops!</strong> {{ $error }}
                        </div>
                    @endif

    			    @php
    			        Session::forget('msg');
                        Session::forget('error');
    			    @endphp

    		    	@if( count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oops!</strong> {{ $errors->first() }}
                        </div>
    		    	@endif

    			    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
    			    	{{ csrf_field() }}

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

                            <!-- Card Body Content -->
                            @yield('card_body')
                            <!-- End Card Body Content -->

    				        <div class="custom-card-footer">
    				            <div class="row">
    				                <div class="col-md-12 text-right">
    				                	<button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
    				                </div>
    				            </div>	        	
    				        </div>
    				    </div>
    				</form>

                    <div class="card-pad"></div>

                    <!-- Right sidebar -->
                    @include('admin.partials.right-sidebar')
                    <!-- End Right sidebar -->
                </div>
                <!-- End Container fluid  -->
            </div>
            <!-- End Page wrapper  -->

            <!-- footer -->
            {{-- <footer class="footer">
                © {{ date('Y') }} Developed by <a target="_blank" href="{{ $adminInformation->developer_website_link }}">{{ $adminInformation->developed_by }}</a>
            </footer> --}}
            <!-- End footer -->

        </div>
        <!-- End Wrapper -->



        @include('admin.partials.footer-assets')

        <!-- This page plugins -->
        @yield('custom-js')

        
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
    </body>
</html>