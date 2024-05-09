@extends('super-admin.app')
@section('title', 'Super Admin - Create Component')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header fw-semibold">Create Component Form</h4>
                    <div class="card-body">
                        <form action="{{ route('super-admin.component.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="year_id" class="font-semibold">Input Year</label>
                                <span class="text-danger">*</span>
                                <select name="year_id" id="year_id" class="form-control">
                                    <option value="" hidden>Choose</option>
                                    @foreach ($year->sortBy('year') as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-3"></div>
                                <label for="category_id" class="font-semibold">Input Category</label>
                                <span class="text-danger">*</span>
                                <select name="category_id" id="category_id" class="form-control"></select>
                                <div class="mt-3"></div>
                                <label for="component">Input component</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="component" id="component"
                                    value="{{ old('component') }}">
                                <div class="mt-3"></div>
                                <label for="iframe_src">Input Source iframe</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="iframe_src" id="iframe_src"
                                    value="{{ old('iframe_src') }}">
                                <div class="mt-3"></div>
                                <label for="note">Additional Note</label>
                                <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url('super-admin/component') }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#year_id").change(function() {
                let id = $("#year_id").val();

                // Hapus opsi yang sudah ada sebelum menginisialisasi ulang Select2
                $("#category_id").empty();

                // Kembalikan ke placeholder terlebih dahulu
                $("#category_id").append('<option value="" selected>Choose</option>');

                $("#category_id").select2({
                    placeholder: 'Choose',
                    minimumInputLength: 0, // Menetapkan minimumInputLength ke 0 untuk kembali ke placeholder
                    ajax: {
                        url: "{{ url('super-admin/getCategory') }}/" + id,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.category,
                                    }
                                })
                            }
                        }
                    }
                })
            })
        });

        $(document).ready(function() {
            $('#note').summernote({
                height: 250
            });
        });
    </script>
@endsection
