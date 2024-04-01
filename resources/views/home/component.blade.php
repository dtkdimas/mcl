@extends('layout.app')
@section('title', 'Component')
@section('content')
    <div class="page-inner">
        <!-- Page Heading -->
        <div class="page-header">
            <h4 class="page-title">Components</h4>
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
                    <a href="{{ url('component') }}">Components</a>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="{{ route('component.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="">
                                        <th>No</th>
                                        <th>Year</th>
                                        <th>Category</th>
                                        <th>Component</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($component as $item)
                                        <tr class="">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->Year->year }}</td>
                                            <td>{{ $item->Category->category }}</td>
                                            <td>{{ $item->component }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('component.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $item->id }}"><i
                                                        class="fas fa-trash"></i>
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
        </div>
    </div>

    <!-- Delete Modal-->
    @foreach ($component as $item)
        <div class="modal fade" id="deleteModal-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('component/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete component</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure want to delete <b>{{ $item->component }}</b> from table?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
