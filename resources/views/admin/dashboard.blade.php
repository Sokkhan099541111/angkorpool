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
                {{-- {{ dd($model) }} --}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="x_panel">
                            <div class="x_title">
                               {{--  <h2><i class="fa fa-users" aria-hidden="true"></i> All Users</h2> --}}
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
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
                                            @foreach($columns as $column)
                                                <th>{{ $column }}</th>
                                            @endforeach
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($model as $users)
                                        <tr>                            
                                            <td>{{ $users->username }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>@if($users->user_type=='EMP')Employer @else Applicant @endif</td>
                                            <td>{{ $users->created_at }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="#" data-toggle="tooltip" data-placement="top" data-title="View User">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-xs btn-info" href="#" data-toggle="tooltip" data-placement="top" data-title="Edit User">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button class="btn btn-xs btn-danger user_destroy"
                                                        data-url="{{ route('admin.dashboard.user.show',$users) }}" data-toggle="tooltip" data-placement="top" data-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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
                @include('admin.sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{ Html::style('assets/admin/css/admin.css') }}
@endsection

@section('scripts')
    {{ Html::script('assets/admin/js/admin.js') }}
    <script src="https://unpkg.com/vue"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('button').click(function(event) {
                event.preventDefault();
                console.log($(this).attr('data-url'));
            });
        });
    </script>
    <script type="text/javascript">
        var app5 = new Vue({
          el: '#editor',
          data: {
            message: 'Hello Vue.js!'
          },
          methods: {
            reverseMessage: function () {
              this.message = this.message.split('').reverse().join('')
            }
          }
        })
    </script>
@endsection