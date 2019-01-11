@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#2bb3c0">5,6,9,4,9,5,3,5,9,15,3,2,2,3,9,11,9,7,20,9,7,6</p>

                        <p class="miniStats--label text-white bg-blue">
                            <i class="fa fa-level-up-alt"></i>
                            <span>{{ $total_employees/100 }}%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-user text-blue"></i>

                        <h3 class="miniStats--title h4">Total Employees</h3>
                        <p class="miniStats--num text-blue">{{ $total_employees }}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#e16123">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                        <p class="miniStats--label text-white bg-orange">
                            <i class="fa fa-level-down-alt"></i>
                            <span>{{ $total_transactions/100}}%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-rocket  text-orange"></i>


                        <h3 class="miniStats--title h4">Total Transactions</h3>
                        <p class="miniStats--num text-orange">{{ $total_transactions }}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#009378">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                        <p class="miniStats--label text-white bg-green">
                            <i class="fa fa-level-up-alt"></i>
                            <span>{{ $total_incomes/100 }}%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-dollar-sign text-green"></i>


                        <h3 class="miniStats--title h4">Total Incomes</h3>
                        <p class="miniStats--num text-green">{{ $total_incomes }}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-xl-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Incomes</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info">Transaction ID</th>
                                <th class="text-info">Head</th>
                                <th class="text-info">Client Name</th>
                                <th class="text-info">Date</th>
                                <th class="text-info">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($last_3_income as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>
                                        {{ $transaction->relTransactionHead->name }}
                                    </td>
                                    <td>
                                        @if(is_numeric($transaction->client))
                                            {{ $transaction->relUser->name }}
                                        @else
                                            {{ $transaction->client }}
                                        @endif
                                    </td>
                                    <td>{{ date('Y/m/d',strtotime($transaction->date)) }}</td>
                                    <td class="pull-right">
                                        {{ $transaction->amount }} /-
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('transaction.index','Income') }}" class= "btn btn-success">View All Incomes</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Expenses</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info">Transaction ID</th>
                                <th class="text-info">Head</th>
                                <th class="text-info">Client Name</th>
                                <th class="text-info">Date</th>
                                <th class="text-info">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($last_3_expense as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>
                                        {{ $transaction->relTransactionHead->name }}
                                    </td>
                                    <td>
                                        @if(is_numeric($transaction->client))
                                            {{ $transaction->relUser->name }}
                                        @else
                                            {{ $transaction->client }}
                                        @endif
                                    </td>
                                    <td>{{ date('Y/m/d',strtotime($transaction->date)) }}</td>
                                    <td class="pull-right">
                                        {{ $transaction->amount }} /-
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('transaction.index','Expense') }}" class= "btn btn-success">View All Expenses</a>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Employees</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info" style="min-width:200px;">Name</th>
                                <th class="text-info">Email</th>
                                <th class="text-info">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Table Row Start -->
                            @foreach($users as $user)

                                <tr>
                                    <td style="min-width:200px;">
                                        <a href="{{ route("user.show",$user->id) }}">{{ $user->name }} <span>{{ $user->relDesignation->name }}</span></a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="label label-success">{{ $user->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Table Row End -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <select name="filter" data-trigger="selectmenu" data-minimum-results-for-search="-1">
                            <option value="top-search">Recent Orders</option>
                            <option value="average-search">Latest Orders</option>
                        </select>
                    </h3>

                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product ID</th>
                                <th>Customer Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Tracking No.</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Table Row Start -->
                            <tr>
                                <td><img src="assets/img/products/thumb-01.jpg" alt=""></td>
                                <td>3BSD59</td>
                                <td><a href="#" class="btn-link">Leisure Suit Casual</a></td>
                                <td>$99</td>
                                <td>2</td>
                                <td><span class="text-muted">#BG6R9853lP</span></td>
                                <td><span class="label label-success">Paid</span></td>
                            </tr>
                            <!-- Table Row End -->

                            <!-- Table Row Start -->
                            <tr>
                                <td><img src="assets/img/products/thumb-02.jpg" alt=""></td>
                                <td>3BSD59</td>
                                <td><a href="#" class="btn-link">Leisure Suit Casual</a></td>
                                <td>$99</td>
                                <td>2</td>
                                <td><span class="text-muted">#BG6R9853lP</span></td>
                                <td><span class="label label-warning">Due</span></td>
                            </tr>
                            <!-- Table Row End -->

                            <!-- Table Row Start -->
                            <tr>
                                <td><img src="assets/img/products/thumb-03.jpg" alt=""></td>
                                <td>3BSD59</td>
                                <td><a href="#" class="btn-link">Leisure Suit Casual</a></td>
                                <td>$99</td>
                                <td>2</td>
                                <td><span class="text-muted">#BG6R9853lP</span></td>
                                <td><span class="label label-info">Rejected</span></td>
                            </tr>
                            <!-- Table Row End -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

