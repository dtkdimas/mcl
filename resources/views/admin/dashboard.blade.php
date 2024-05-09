@extends('admin.app')
@section('title', 'Admin - Dashboard')
@section('content')
    <div class="page-inner">
        <!-- Page Heading -->
        <div class="page-header">
        </div>

        {{-- page content  --}}
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <p class="card-header fw-semibold">Total Components</p>
                    <div class="card-body">
                        <h4 class="">{{ $component }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <p class="card-header fw-semibold">Total Categories</p>
                    <div class="card-body">
                        <h4 class="">{{ $category }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <p class="card-header fw-semibold">Total Version</p>
                    <div class="card-body">
                        <h4 class="">{{ $year }}</h4>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-3">
                <div class="card">
                    <p class="card-header fw-semibold">Total Admin</p>
                    <div class="card-body">
                        <h4 class="">{{ $user }}</h4>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Log Activity</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover w-100">
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
                                            <td>
                                                @if (@is_array($item->changes['old']))
                                                    @foreach ($item->changes['old'] as $key => $itemChange)
                                                        {{ $key }} : {{ $itemChange }} </br>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
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
