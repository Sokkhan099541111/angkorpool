<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <i class="fa fa-paw"></i> <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>



        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}"><i class="fa fa-users" aria-hidden="true"></i> User</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Role</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.permissions') }}"><i class="fa fa-users" aria-hidden="true"></i> Permission</a>
                    </li>
                    <li><a><i class="fa fa-address-card" aria-hidden="true"></i> Applicant <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="">
                            <li><a href="{{ route('employer.jobs')}}">All Applicant</a></li>
                            <li><a href="{{ route('employer.job.post') }}">New Applicant</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-building" aria-hidden="true"></i> Organization <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="">
                            <li><a href="{{ route('employer.jobs')}}">All Organization</a></li>
                            <li><a href="{{ route('employer.job.post') }}">New Organization</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Recruiter <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="">
                            <li><a href="{{ route('employer.jobs')}}">All Recruiter</a></li>
                            <li><a href="{{ route('employer.job.post') }}">New Recruiter</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-briefcase" aria-hidden="true"></i> Role </a></li>
                    <li><a><i class="fa fa-address-card" aria-hidden="true"></i> Applicant </a></li>
                    <li><a><i class="fa fa-building" aria-hidden="true"></i> Organization </a></li>
                    <li><a><i class="fa fa-edit"></i> Recruiter </a></li>
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li>
                    <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQ</a></li>
                    <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
