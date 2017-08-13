@extends('admin.layouts.admin')

@section('content')
<section class="section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-7">
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-key mr-2"></i>Administrator Login</h5>
                    <div class="card-block">
                        @if(session()->has('msg_success'))
                            <div class="alert alert-success">{{ session('msg_success') }}</div>
                        @endif
                        @if($errors->has('msg_error'))
                            <div class="alert alert-danger" id="alert">{{ $errors->first('msg_error') }}</div>
                        @endif
                        <form action="{{ route('admin.login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row {{ ! $errors->has('username') ?: 'has-danger' }}">
                              <label for="username" class="col-sm-12 col-md-3 col-form-label">User name</label>
                              <div class="col-sm-12 col-md-9">
                                <input class="form-control" type="username" id="username" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <div class="form-control-feedback"><small>{{ $errors->first('username') }}</small></div>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row {{ ! $errors->has('password') ?: 'has-danger' }}">
                              <label for="password" class="col-sm-12 col-md-3 col-form-label">Password</label>
                              <div class="col-sm-12 col-md-9">
                                <input class="form-control" type="password" id="password" name="password">
                                @if ($errors->has('password'))
                                    <div class="form-control-feedback"><small>{{ $errors->first('password') }}</small></div>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-9 offset-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="remember">
                                          Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-12 col-md-9 offset-md-3 d-flex flex-column flex-md-row">
                                    <button class="btn btn-secondary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
