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
                                <form action="{{ route('admin.applicant.edit', $applicant) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group row {{ ! $errors->has('surname') ?: 'has-danger' }}">
                                        <label for="surname" class="col-sm-12 col-md-3 col-form-label">Surname</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="surname" name="surname" value="{{ old('surname') ? old('surname') : $applicant->surname }}">
                                            @if ($errors->has('surname'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('surname') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('name') ?: 'has-danger' }}">
                                        <label for="name" class="col-sm-12 col-md-3 col-form-label">Name</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') ? old('name') : $applicant->name }}">
                                            @if ($errors->has('name'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('name') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('email') ?: 'has-danger' }}">
                                        <label for="email" class="col-sm-12 col-md-3 col-form-label">Email</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') ? old('email') : $applicant->email }}" disabled>
                                            @if ($errors->has('email'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('email') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('gender') ?: 'has-danger' }}">
                                        <label for="gender" class="col-sm-12 col-md-3 col-form-label">Gender</label>
                                        <div class="col-sm-12 col-md-9">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value=""></option>
                                                <option value="M" {{ old('gender') == 'M' ? 'selected' : ($applicant->gender == 'M' ? 'selected' : '') }}>Male</option>
                                                <option value="F" {{ old('gender') == 'F' ? 'selected' : ($applicant->gender == 'F' ? 'selected' : '') }}>Female</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('gender') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('dob') ?: 'has-danger' }}">
                                        <label for="dob" class="col-sm-12 col-md-3 col-form-label">Date of Birth</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="dob" name="dob" value="{{ old('dob') ? old('dob') : $applicant->dob }}">
                                            @if ($errors->has('dob'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('dob') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('marital_status') ?: 'has-danger' }}">
                                        <label for="marital_status" class="col-sm-12 col-md-3 col-form-label">Marital Status</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="marital_status" name="marital_status" value="{{ old('marital_status') ? old('marital_status') : $applicant->marital_status }}">
                                            @if ($errors->has('marital_status'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('marital_status') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('phone_number') ?: 'has-danger' }}">
                                        <label for="phone_number" class="col-sm-12 col-md-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $applicant->phone_number }}">
                                            @if ($errors->has('phone_number'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('phone_number') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('address') ?: 'has-danger' }}">
                                        <label for="address" class="col-sm-12 col-md-3 col-form-label">Address</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="address" name="address" value="{{ old('address') ? old('address') : $applicant->address }}">
                                            @if ($errors->has('address'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('address') }}</small></div>
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