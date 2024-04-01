@extends('layout.app')
@section('title', 'Tahun')
@section('content')
    <div class="page-inner">
        <!-- Page Heading -->
        <div class="page-header">
            <h4 class="page-title">Version</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ url('home') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('year') }}">Version</a>
                </li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal"><i
                        class="fas fa-plus"></i> Create</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>Year</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($year as $item)
                                <tr class="">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editModal-{{ $item->id }}"><i class="fas fa-edit"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal-{{ $item->id }}"><i class="fas fa-trash"></i>
                                            Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('year') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new version</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="year">Input year</label>
                        <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="year" id="year"
                            value="{{ old('year') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal-->
    @foreach ($year as $item)
        <div class="modal fade" id="editModal-{{ $item->id }}" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('year/' . $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update version</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="year">Input year</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="year" id="year"
                                value="{{ $item->year }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-warning" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete Modal-->
    @foreach ($year as $item)
        <div class="modal fade" id="deleteModal-{{ $item->id }}" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('year/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete version</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure want to delete <b>{{ $item->year }}</b> from table?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endsection
