<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('employer.index') }}" class="site_title">
                <i class="fa fa-paw"></i> <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('employer.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Jobs <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="">
                            <li><a href="{{ route('employer.jobs')}}">All jobs</a></li>
                            <li><a href="{{ route('employer.job.post') }}">New Job</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
