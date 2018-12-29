<div class="sidebar--profile">
    <div class="profile--img">
        <a href="profile.html">
            <img src={{ asset("assets/img/avatars/01_80x80.png") }} alt="" class="rounded-circle">
        </a>
    </div>

    <div class="profile--name">
        <a href="profile.html" class="btn-link">{{ auth()->user()->name }}</a>
    </div>

    <div class="profile--nav">
        <ul class="nav">
            <li class="nav-item">
                <a href="profile.html" class="nav-link" title="User Profile">
                    <i class="fa fa-user"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="lock-screen.html" class="nav-link" title="Lock Screen">
                    <i class="fa fa-lock"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="mailbox_inbox.html" class="nav-link" title="Messages">
                    <i class="fa fa-envelope"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" title="Logout">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Sidebar Profile End -->

<!-- Sidebar Navigation Start -->
<div class="sidebar--nav">
    <ul>
        <li>
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Settings</span>
                    </a>

                    <ul>
                        <li><a href="{{ route('department.index') }}">Departments</a></li>
                        <li><a href="{{ route('designation.index') }}">Designations</a></li>

                    </ul>
                </li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar Navigation End -->

<!-- Sidebar Widgets Start -->

