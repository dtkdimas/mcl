@extends('layout.app')
@section('title', 'dashboard')
@section('content')
    <div class="page-inner">
        <!-- Page Heading -->
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
        </div>

        {{-- page content  --}}
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-settings"></i>
                                </div>
                            </div>
                            <div class="col col-stats">
                                <div class="numbers">
                                    <p class="card-category">Components</p>
                                    <h4 class="card-title">{{ $component }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-folder"></i>
                                </div>
                            </div>
                            <div class="col col-stats">
                                <div class="numbers">
                                    <p class="card-category">Categories</p>
                                    <h4 class="card-title">{{ $category }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-suitcase"></i>
                                </div>
                            </div>
                            <div class="col col-stats">
                                <div class="numbers">
                                    <p class="card-category">Version</p>
                                    <h4 class="card-title">{{ $year }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-success"></i>
                                </div>
                            </div>
                            <div class="col col-stats">
                                <div class="numbers">
                                    <p class="card-category">Admin</p>
                                    <h4 class="card-title">{{ $user }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Log Activity</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endsection
