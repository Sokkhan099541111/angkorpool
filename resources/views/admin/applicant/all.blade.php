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

                    <div class="title_left">
                        <div class="create_object">
                            <!-- {{-- <a href="{{ route('admin.applicant.create') }}" class="btn btn-primary">New Applicant</a> --}} -->
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" applicant="menu">
                                            <li><a href="#">Settings 1</a></li>
                                            <li><a href="#">Settings 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                 <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Surname</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Created Date</th>
                                            <th>Updated Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applicants as $applicant)
                                        <tr>
                                            <td>{{ $applicant->surname }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            <td>{{ $applicant->email }}</td>
                                            <td>{{ $applicant->gender }}</td>
                                            <td>{{ $applicant->dob }}</td>
                                            <td>{{ $applicant->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $applicant->updated_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.applicant.edit', $applicant) }}" data-toggle="tooltip" data-placement="top" data-title="Edit User">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form method="post" action="{{ route('admin.applicant.delete', $applicant) }}" style="display: inline;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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