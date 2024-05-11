@extends('super-admin.app')
@section('title', 'Super Admin - Admin Account')
@section('content')
    <div class="page-inner">
        <!-- Page Heading -->
        <div class="page-header">
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
                {{ session('success') }}
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                {{ session('error') }}
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        <div class="card shadow mb-4">
            <h4 class="card-header">Accounts</h4>
            <div class="card-body">
                <div class="card-title">
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                        <svg class="align-top" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                            <path d="M13.5 6.5l4 4" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg> Create</a>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-striped table-hover w-100">
                            <thead>
                                <tr class="">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($admin as $item)
                                    <tr class="">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->active == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="#" class="btn btn-sm d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg> Edit
                                            </a>
                                            <a href="#" class="btn btn-sm d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
