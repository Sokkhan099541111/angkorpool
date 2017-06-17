@if(auth()->guard('web.employees')->check())
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-search"></i><span>Search Jobs</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-file-o"></i><span>Applied Jobs</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-newspaper-o"></i><span>Daily Job alerts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link clearfix" href="#">
                <i class="fa fa-user"></i>
                <span>My Profile</span>
                <span class="arrow"><i class="fa fa-chevron-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link ">CV</a>
                    <a href="#" class="nav-link ">Education</a>
                    <a href="#" class="nav-link ">Experience</a>
                    <a href="#" class="nav-link ">Change Password</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-envelope-o"></i><span>Messages</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-question-circle"></i><span>FAQ</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a>
        </li>
    </ul>
@elseif(auth()->guard('web.employers')->check())
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-bolt"></i><span>Jobs Posted</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-file-o"></i><span>Applied Candidates</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-envelope-o"></i><span>Messages</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-question-circle"></i><span>FAQ</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a>
        </li>
    </ul>
@endif