@extends('admin.layouts.app')
@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin.sections.navigation')
                @include('admin.sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">

                    <div class="title_left">
                        <div class="create_object">
                            {{-- <h1 class="h3">@yield('title')</h1> --}}
                            <button class="btn btn-primary" type="button">New User</button>
                        </div>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default">
                	<div class="panel-heading">New User </div>
                	<div class="panel-body">
                		<form action="{{ route('admin.user.store') }}" method="POST">
                			{{ csrf_field() }}
                			{{ method_field('PUT') }}
                    		<legend>New User</legend>
                    	
                    		<div class="form-group">
                    			<label for="">User Name</label>
                    			<input type="text" class="form-control" name="username" id="username" placeholder="Input field">
                    			@if ($errors->has('username'))
			                        <div class="form-control-feedback"><small>{{ $errors->first('username') }}</small></div>
			                    @endif
                    		</div>	

                    		<div class="form-group">
                    			<label>Password</label>
                    			<input type="Password" name="password" id="password" class="form-control">
                                @if ($errors->has('password'))
                                    <div class="form-control-feedback"><small>{{ $errors->first('password') }}</small></div>
                                @endif
                    		</div>

                    		<div class="form-group">
                    			<label>Confirm Password</label>
                    			<input type="Password" name="password_again" id="password_again" class="form-control">
                                @if ($errors->has('password_again'))
                                    <div class="form-control-feedback"><small>{{ $errors->first('password_again') }}</small></div>
                                @endif
                    		</div>

                    	
                    		<div class="form-group">
                    			<label>User role</label>
                    			<select name="role" id="role">
                                    @foreach($roles as $role)         
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                    		</div>

                    	
                    		<button type="submit" class="btn btn-primary">Submit</button>
                    	</form>
                	</div>
                </div>                    	
                        
                    

                @yield('content')
            </div>

            <footer>
                @include('admin.sections.footer')
            </footer>
        </div>
    </div>
@stop

