<div class="sidebar--profile">
    <div class="profile--img">
        <a href="#">
            <img src="{{asset('user_images/'.auth()->id().'.jpg') }}" alt="" class="rounded-circle">
        </a>
    </div>

    <div class="profile--name">
        <a href="#" class="btn-link">{{ auth()->user()->name }}</a>
    </div>

    <div class="profile--nav">
        <ul class="nav">
            <li class="nav-item">
                <a href="profile.html" class="nav-link" title="User Profile">
                    <i class="fa fa-user"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" title="Lock Screen">
                    <i class="fa fa-lock"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" title="Messages">
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
                @if(auth()->user()->type=='Admin')
                <li class="active">
                    <a href="{{ route('user.index') }}">
                        <i class="fa fa-home"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transactions</span>
                    </a>

                    <ul>

                        <li><a href="{{ route('transaction.index','Income') }}">Income</a></li>
                        <li><a href="{{ route('transaction.index','Expense') }}">Expense</a></li>

                    </ul>
                </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Attendances</span>
                        </a>

                        <ul>

                            <li><a href="{{ route('attendance.index') }}">List</a></li>
                            <li><a href="{{ route('attendance.upload') }}">Bulk Upload</a></li>

                        </ul>
                    </li>

                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Settings</span>
                    </a>

                    <ul>
                        <li><a href="{{ route('department.index') }}">Departments</a></li>
                        <li><a href="{{ route('designation.index') }}">Designations</a></li>
                        <li><a href="{{ route('transaction-head.index') }}">Transaction Heads</a></li>
                        <li><a href="{{ route('application_settings') }}">Application Settings</a></li>

                    </ul>
                </li>
                @endif
            </ul>
        </li>

        <li>

        </li>

        <li>

        </li>

    </ul>
</div>

