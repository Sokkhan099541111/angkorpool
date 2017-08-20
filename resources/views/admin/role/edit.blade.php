@extends('admin._layouts.app')

@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin._sections.navigation')
                @include('admin._sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="{{ route('admin.role.edit', $role) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group row {{ ! $errors->has('name') ?: 'has-danger' }}">
                                        <label for="name" class="col-sm-12 col-md-3 col-form-label">Name</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') ? old('name') : $role->name }}">
                                            @if ($errors->has('name'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('name') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('guard_name') ?: 'has-danger' }}">
                                        <label for="guard_name" class="col-sm-12 col-md-3 col-form-label">Guard</label>
                                        <div class="col-sm-12 col-md-9">
                                            <select class="form-control" type="text" id="guard_name" name="guard_name">
                                                <option value=""></option>
                                                <option {{ old('guard_name') == 'admin' ? 'selected' : ($role->guard_name == 'admin' ? 'selected' : '') }}>admin</option>
                                            </select>
                                            @if ($errors->has('guard_name'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('guard_name') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 col-md-9 offset-md-3 d-flex flex-column flex-md-row">
                                            <button class="btn btn-secondary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </div>

            <footer>
                @include('admin._sections.footer')
            </footer>
        </div>
    </div>
@stop