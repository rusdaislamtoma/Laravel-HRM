@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-lg-8">
            <!-- Panel Start -->
            <div class="panel profile-cover">
                <div class="profile-cover__img">
                    <img src="{{ asset('user_images/'.$user->id.'.jpg') }}" alt="">

                </div>

                <div class="profile-cover__action" data-bg-img="assets/img/covers/01_800x150.jpg" data-overlay="0.3">
                    <button class="btn btn-rounded btn-info">
                        <span>{{$user->name }}</span>
                    </button>

                    <button class="btn btn-rounded btn-info">
                        <span>{{$user->type}}</span>
                    </button>
                </div>

                <div class="profile-cover__info">
                    <ul class="nav">
                        <li><strong>Designation</strong>
                        <p>{{ $user->relDesignation->name }}</p>
                        </li>
                        <li><strong>Department</strong>
                            <p>{{ $user->relDepartment->name }}</p>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Payroll &nbsp; &nbsp; &nbsp;</h3>
                    <a href="{{ route('payroll.manage',$user->id) }}" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Payroll</a>
                </div>
                <div class="panel-content panel-about">

                    <table>
                        <tr>
                            <th>Basic</th>
                            <td> {{ $user->relPayroll->basic }} </td>
                        </tr>

                        <tr>
                            <th>House Rent</th>
                            <td>{{ $user->relPayroll->house_rent }}</td>
                        </tr>

                        <tr>
                            <th>Medical</th>
                            <td>{{ $user->relPayroll->medical }}</td>
                        </tr>

                        <tr>
                            <th>Travel Allowance</th>
                            <td>{{ $user->relPayroll->travel_allowance }}</td>
                        </tr>
                        <tr>
                            <th>Daily Allowance</th>
                            <td>{{ $user->relPayroll->daily_allowance }}</td>
                        </tr>
                        <tr>
                            <th>Provident Fund</th>
                            <td>{{ $user->relPayroll->provident_fund }}</td>
                        </tr>
                        <tr>
                            <th>Gross</th>
                            <td><b>{{ $user->relPayroll->gross }}</b></td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>

        <div class="col-lg-4">
            <!-- Panel Start -->
            <div>
                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary rounded mb-2"><i class="fa fa-plus"></i> Edit Profile</a>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">About Me</h3>
                </div>

                <div class="panel-content panel-about">

                    <table>
                        <tr>
                            <th><i class="fas fa-briefcase"></i>Employee ID</th>
                            <td>{{ $user->employee_id }}</td>
                        </tr>

                        <tr>
                            <th><i class="fas fa-envelope"></i>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th><i class="fas fa-mobile-alt"></i>Contact No.</th>
                            <td>{{ $user->contact_no }}</td>
                        </tr>

                        <tr>
                            <th><i class="fas fa-birthday-cake"></i>Date of Birth</th>
                            <td>{{ date('d M Y',strtotime($user->dob)) }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-map-marker-alt"></i>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-globe"></i>Status</th>
                            <td>{{ $user->status }}</td>
                        </tr>
                    </table>
                </div>

                <div class="panel-social">
                    <ul class="nav">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- Panel End -->

            <!-- Panel Start -->
            <div class="panel">
                <div class="weather--panel text-white bg-blue">
                    <div class="weather--title">
                        <i class="fa fa-map-marker-alt"></i>
                        <span>Dhaka, Bangladesh</span>
                    </div>

                    <div class="weather--info">
                        <i class="wi wi-rain-wind"></i>
                        <span>33°C</span>
                    </div>
                </div>
            </div>
            <!-- Panel End -->

            <!-- Panel Start -->
            <div class="panel">
                <div class="weather--panel text-white bg-orange">
                    <div class="weather--title">
                        <i class="fa fa-map-marker-alt"></i>
                        <span>Melbourne, Autoria</span>
                    </div>

                    <div class="weather--info">
                        <i class="wi wi-hot"></i>
                        <span>35°C</span>
                    </div>
                </div>
            </div>
            <!-- Panel End -->

            <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">To-Do List</h3>

                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="todo--panel">
                    <form action="#">
                        <ul class="list-group" data-trigger="scrollbar">
                            <li class="list-group-item">
                                <label class="todo--label">
                                    <input type="checkbox" name="checkbox" value="1" class="todo--input" checked>
                                    <span class="todo--text">Schedule Meeting</span>
                                </label>

                                <a href="#" class="todo--remove">&times;</a>
                            </li>
                            <li class="list-group-item">
                                <label class="todo--label">
                                    <input type="checkbox" name="checkbox" value="2" class="todo--input">
                                    <span class="todo--text">Call Clients To Follow-Up</span>
                                </label>

                                <a href="#" class="todo--remove">&times;</a>
                            </li>
                            <li class="list-group-item">
                                <label class="todo--label">
                                    <input type="checkbox" name="checkbox" value="3" class="todo--input" checked>
                                    <span class="todo--text">Book Flight For Holiday</span>
                                </label>

                                <a href="#" class="todo--remove">&times;</a>
                            </li>
                            <li class="list-group-item">
                                <label class="todo--label">
                                    <input type="checkbox" name="checkbox" value="4" class="todo--input">
                                    <span class="todo--text">Forward Important Tasks</span>
                                </label>

                                <a href="#" class="todo--remove">&times;</a>
                            </li>
                            <li class="list-group-item">
                                <label class="todo--label">
                                    <input type="checkbox" name="checkbox" value="6" class="todo--input">
                                    <span class="todo--text">Important Tasks</span>
                                </label>

                                <a href="#" class="todo--remove">&times;</a>
                            </li>
                        </ul>

                        <div class="input-group">
                            <input type="text" name="todo" placeholder="Add New Task" class="form-control" autocomplete="off" required>

                            <div class="input-group-btn">
                                <button type="submit" class="btn-link">+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Panel End -->

            <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Feeds &amp; Activities</h3>

                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="feeds-panel">
                    <ul class="nav">
                        <li>
                            <span class="time">2 mins</span>
                            <i class="fa fa-shopping-cart text-white bg-blue"></i>
                            <span class="text">New Order Received</span>
                        </li>
                        <li>
                            <span class="time">10 mins</span>
                            <i class="fa fa-user text-white bg-orange"></i>
                            <span class="text">Updated Profile Picture</span>
                        </li>
                        <li>
                            <span class="time">20 mins</span>
                            <i class="fa fa-comment text-white bg-red"></i>
                            <span class="text"><a href="#">John Doe</a> Commented on <a href="#">News #123</a></span>
                        </li>
                        <li>
                            <span class="time">21 mins</span>
                            <i class="fa fa-shopping-cart text-white bg-blue"></i>
                            <span class="text">New Order Received</span>
                        </li>
                        <li>
                            <span class="time">25 mins</span>
                            <i class="fa fa-user text-white bg-green"></i>
                            <span class="text">New User Registered</span>
                        </li>
                        <li>
                            <span class="time">25 mins</span>
                            <i class="fa fa-times text-white bg-dark"></i>
                            <span class="text">Order <a href="#">#24DP01</a> Rejected</span>
                        </li>
                        <li>
                            <span class="time">2 hours</span>
                            <i class="fa fa-comment text-white bg-red"></i>
                            <span class="text"><a href="#">John Doe</a> Commented on <a href="#">News #123</a></span>
                        </li>
                        <li>
                            <span class="time">3 hours</span>
                            <i class="fa fa-user text-white bg-orange"></i>
                            <span class="text">You Uploaded A Image</span>
                        </li>
                        <li>
                            <span class="time">4 hours</span>
                            <i class="fa fa-shopping-cart text-white bg-blue"></i>
                            <span class="text">New Order Received</span>
                        </li>
                        <li>
                            <span class="time">8 hours</span>
                            <i class="fa fa-user text-white bg-green"></i>
                            <span class="text">New User Registered</span>
                        </li>
                        <li>
                            <span class="time">22 hours</span>
                            <i class="fa fa-shopping-cart text-white bg-blue"></i>
                            <span class="text">New Order Received</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Panel End -->
        </div>
    </div>
@endsection