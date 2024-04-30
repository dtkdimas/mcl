@extends('layout.app')
@section('title', 'Category')
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
            <h4 class="card-header">Categories</h4>
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
                                                </svg> Edit</a>
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
                                                </svg> Delete</a>
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

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('category') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new category</h1>
                        <a href="" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <label for="year_id" class="font-semibold">Year</label>
                        <span class="text-danger">*</span>
                        <select name="year_id" id="year_id" class="form-control">
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
        <div class="modal fade" id="editModal-{{ $categoryItem->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('category/' . $categoryItem->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update category</h1>
                            <a href="" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <label for="year_id" class="font-semibold">Year</label>
                            <span class="text-danger">*</span>
                            <select name="year_id" id="year_id" class="form-control">
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('category/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete category</h1>
                            <a href="" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
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
    <!-- End of Page Wrapper -->
@endsection

@section('js')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endsection
