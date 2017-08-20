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
                                <form action="{{ route('admin.organization.edit', $organization) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group row {{ ! $errors->has('name') ?: 'has-danger' }}">
                                        <label for="name" class="col-sm-12 col-md-3 col-form-label">Name</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="name" name="name" value="{{ !$errors->isEmpty() ? old('name') : $organization->name }}">
                                            @if ($errors->has('name'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('name') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('email') ?: 'has-danger' }}">
                                        <label for="email" class="col-sm-12 col-md-3 col-form-label">Email</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="email" name="email" value="{{ !$errors->isEmpty() ? old('email') : $organization->email }}">
                                            @if ($errors->has('email'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('email') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('contact_number') ?: 'has-danger' }}">
                                        <label for="contact_number" class="col-sm-12 col-md-3 col-form-label">Contact number</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="contact_number" name="contact_number" value="{{ !$errors->isEmpty() ? old('contact_number') : $organization->contact_number }}">
                                            @if ($errors->has('contact_number'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('contact_number') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('fax') ?: 'has-danger' }}">
                                        <label for="fax" class="col-sm-12 col-md-3 col-form-label">Contact number</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="fax" name="fax" value="{{ !$errors->isEmpty() ? old('fax') : $organization->fax }}">
                                            @if ($errors->has('fax'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('fax') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('industry_id') ?: 'has-danger' }}">
                                        <label for="industry_id" class="col-sm-12 col-md-3 col-form-label">Industry</label>
                                        <div class="col-sm-12 col-md-9">
                                            <select class="form-control" id="industry_id" name="industry_id">
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}"
                                                    {{ !$errors->isEmpty() ?
                                                        (old('industry_id') == $industry->id ? 'selected' : '') :
                                                        ( $organization->industry_id == $industry->id ? 'selected' : '') }}>
                                                    {{ $industry->name }}
                                                </option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('industry_id'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('industry_id') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('website') ?: 'has-danger' }}">
                                        <label for="website" class="col-sm-12 col-md-3 col-form-label">Website</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="website" name="website" value="{{ !$errors->isEmpty() ? old('website') : $organization->website }}">
                                            @if ($errors->has('website'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('website') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('street') ?: 'has-danger' }}">
                                        <label for="street" class="col-sm-12 col-md-3 col-form-label">Street</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="street" name="street" value="{{ !$errors->isEmpty() ? old('street') : $organization->street }}">
                                            @if ($errors->has('street'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('street') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('city') ?: 'has-danger' }}">
                                        <label for="city" class="col-sm-12 col-md-3 col-form-label">City</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="city" name="city" value="{{ !$errors->isEmpty() ? old('city') : $organization->city }}">
                                            @if ($errors->has('city'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('city') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('province') ?: 'has-danger' }}">
                                        <label for="province" class="col-sm-12 col-md-3 col-form-label">Province</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="province" name="province" value="{{ !$errors->isEmpty() ? old('province') : $organization->province }}">
                                            @if ($errors->has('province'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('province') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('post_code') ?: 'has-danger' }}">
                                        <label for="post_code" class="col-sm-12 col-md-3 col-form-label">Post code</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input class="form-control" type="text" id="post_code" name="post_code" value="{{ !$errors->isEmpty() ? old('post_code') : $organization->post_code }}">
                                            @if ($errors->has('post_code'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('post_code') }}</small></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ ! $errors->has('about') ?: 'has-danger' }}">
                                        <label for="about" class="col-sm-12 col-md-3 col-form-label">About</label>
                                        <div class="col-sm-12 col-md-9">
                                            <textarea class="form-control" id="about" name="about">{{ !$errors->isEmpty() ? old('about') : $organization->about }}</textarea>
                                            @if ($errors->has('about'))
                                                <div class="form-control-feedback"><small>{{ $errors->first('about') }}</small></div>
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