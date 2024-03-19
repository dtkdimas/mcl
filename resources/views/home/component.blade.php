@extends('layout.app')
@section('title', 'Component')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Component</h1>

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
                        <tr class="text-center">
                            <th>No</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Component</th>
                            {{-- <th>Iframe src</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($component as $item)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->Year->year }}</td>
                                <td>{{ $item->Category->category }}</td>
                                <td>{{ $item->component }}</td>
                                {{-- <td style="max-width: 100px;">{{ $item->iframe_src }}</td> --}}
                                <td>
                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#viewModal-{{ $item->id }}"><i class="fas fa-eye"></i>
                                        View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $item->id }}"><i class="fas fa-edit"></i>
                                        Edit</a>
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
                <form action="{{ url('component') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new component</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="year_id" class="font-semibold">Input Year</label>
                        {{-- <span class="text-danger">*</span> --}}
                        <select name="year_id" id="year_id" class="form-select" onclick="enableCategory()">
                            <option value="" hidden>Choose</option>
                            @foreach ($year as $item)
                                <option value="{{ $item->id }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                        <div class="mt-3"></div>
                        <label for="category_id" class="font-semibold">Input Category</label>
                        <select name="category_id" id="category_id" class="form-select" disabled></select>
                        <div class="mt-3"></div>
                        <label for="component">Input component</label>
                        <input type="text" class="form-control" name="component" id="component"
                            value="{{ old('component') }}">
                        {{-- @error('component')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                        @enderror --}}
                        <div class="mt-3"></div>
                        <label for="iframe_src">Input Source iframe</label>
                        <input type="text" class="form-control" name="iframe_src" id="iframe_src"
                            value="{{ old('iframe_src') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- View Modal --}}
    @foreach ($component as $componentItem)
        <div class="modal fade" id="viewModal-{{ $componentItem->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Component</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="year_id" class="font-semibold">Year</label>
                        <input type="text" class="form-control" name="year" id="year"
                            value="{{ $componentItem->year->year }}" readonly>
                        <div class="mt-3"></div>
                        <label for="category" class="font-semibold">Category</label>
                        <input type="text" class="form-control" name="category" id="category"
                            value="{{ $componentItem->category->category }}" readonly>
                        <div class="mt-3"></div>
                        <label for="component">Component</label>
                        <input type="text" class="form-control" name="component" id="component"
                            value="{{ $componentItem->component }}" readonly>
                        <div class="mt-3"></div>
                        <label for="created_at">Created at</label>
                        <input type="text" class="form-control" name="created_at" id="created_at"
                            value="{{ $componentItem->created_at }}" readonly>
                        <div class="mt-3"></div>
                        <label for="updated_at">Updated at</label>
                        <input type="text" class="form-control" name="updated_at" id="updated_at"
                            value="{{ $componentItem->updated_at }}" readonly>
                        <div class="mt-3"></div>
                        <label for="iframe_src">Source iframe</label>
                        <textarea class="form-control" name="iframe_src" id="iframe_src" readonly>{{ $componentItem->iframe_src }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Update Modal-->
    @foreach ($component as $componentItem)
        <div class="modal fade" id="editModal-{{ $componentItem->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('component/' . $componentItem->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update component</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="year_id" class="font-semibold">Input Year</label>
                            <select name="year_id" id="year_{{ $componentItem->id }}" class="form-select">
                                @foreach ($year as $yearItem)
                                    <option value="{{ $yearItem->id }}"
                                        {{ $yearItem->id == $componentItem->year_id ? 'selected' : '' }}>
                                        {{ $yearItem->year }}</option>
                                @endforeach
                            </select>
                            <div class="mt-3"></div>
                            <label for="category_id" class="font-semibold">Input Category
                            </label>
                            <select name="category_id" id="category_{{ $componentItem->id }}" class="form-select">
                                @foreach ($categoriesByYear[$componentItem->year_id] as $categoryItem)
                                    <option value="{{ $categoryItem->id }}"
                                        {{ $categoryItem->id == $componentItem->category_id ? 'selected' : '' }}>
                                        {{ $categoryItem->category }}</option>
                                @endforeach
                            </select>
                            <div class="mt-3"></div>
                            <label for="component">Input component</label>
                            <input type="text" class="form-control" name="component" id="component"
                                value="{{ $componentItem->component }}">
                            <div class="mt-3"></div>
                            <label for="iframe_src">Input Source iframe</label>
                            <input type="text" class="form-control" name="iframe_src" id="iframe_src"
                                value="{{ $componentItem->iframe_src }}">
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
        $(document).ready(function() {
            $('#year_id').change(function() {
                var year_id = $(this).val();
                $.ajax({
                    url: '{{ route('get.categories') }}',
                    method: 'GET',
                    data: {
                        year_id: year_id
                    },
                    success: function(response) {
                        $('#category_id').html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            @foreach ($component as $componentItem)
                $('#year_{{ $componentItem->id }}').change(function() {
                    var year_id = $(this).val();
                    $.ajax({
                        url: '{{ route('get.categories') }}',
                        method: 'GET',
                        data: {
                            year_id: year_id
                        },
                        success: function(response) {
                            $('#category_{{ $componentItem->id }}').html(response);
                        }
                    });
                });
            @endforeach
        });

        function enableCategory() {
            var yearSelect = document.getElementById('year_id');
            var categorySelect = document.getElementById('category_id');

            // Jika tahun telah dipilih
            if (yearSelect.value !== '') {
                categorySelect.removeAttribute('disabled');
            } else {
                categorySelect.disabled = true;
            }
        }
    </script>
@endsection
