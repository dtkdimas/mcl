@extends('layout.app')
@section('title', 'Category')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>

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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal"><i
                    class="fas fa-plus"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="">
                            <th>No</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($category as $item)
                            <tr class="">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->Year->year }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $item->id }}"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $item->id }}"><i class="fas fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('category') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="year_id" class="font-semibold">Year</label>
                        <span class="text-danger">*</span>
                        <select name="year_id" id="year_id" class="form-select">
                            <option value="" hidden>Choose</option>
                            @foreach ($year as $item)
                                <option value="{{ $item->id }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                        <div class="mt-3"></div>
                        <label for="category">Input category</label>
                        <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="category" id="category"
                            value="{{ old('category') }}">
                        {{-- @error('category')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal-->
    @foreach ($category as $categoryItem)
        <div class="modal fade" id="editModal-{{ $categoryItem->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('category/' . $categoryItem->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="year_id" class="font-semibold">Year</label>
                            <span class="text-danger">*</span>
                            <select name="year_id" id="year_id" class="form-select">
                                {{-- <option value="" hidden>Choose</option> --}}
                                @foreach ($year as $yearItem)
                                    <option value="{{ $yearItem->id }}"
                                        {{ $yearItem->id == $categoryItem->year_id ? 'selected' : '' }}>
                                        {{ $yearItem->year }}</option>
                                @endforeach
                            </select>
                            <div class="mt-3"></div>
                            <label for="category">Input category</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="category" id="category"
                                value="{{ $categoryItem->category }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-warning" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete Modal-->
    @foreach ($category as $item)
        <div class="modal fade" id="deleteModal-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('category/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure want to delete <b>{{ $item->category }}</b> from table?
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
