@extends('layout.app')
@section('title', 'dashboard')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">
        <!-- Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Component
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $component }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Category
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Version
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $year }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wrench fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Admin
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Log Activity</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>User</th>
                                <th>Event</th>
                                <th>Before</th>
                                <th>After</th>
                                <th>Description</th>
                                <th>Log At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($log as $item)
                                <tr class="">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->causer->name }}</td>
                                    <td>{{ $item->event }}</td>
                                    <td style="max-width: 300px">
                                        @if (@is_array($item->changes['old']))
                                            @foreach ($item->changes['old'] as $key => $itemChange)
                                                {{ $key }} : {{ $itemChange }} </br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td style="max-width: 300px">
                                        @if (@is_array($item->changes['attributes']))
                                            @foreach ($item->changes['attributes'] as $key => $itemChange)
                                                {{ $key }} : {{ $itemChange }} </br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <h4 class="small font-weight-bold">
                        Server Migration <span class="float-right">20%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Sales Tracking <span class="float-right">40%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Customer Database <span class="float-right">60%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Payout Details <span class="float-right">80%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        Account Setup <span class="float-right">Complete!</span>
                    </h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
