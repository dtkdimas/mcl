@extends('layout.app')
@section('title', 'Update Component')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Component</h1>

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

    <form action="{{ route('component.update', $component->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="">
            <label for="year_id" class="font-semibold">Input Year</label>
            <span class="text-danger">*</span>
            <select name="year_id" id="year_id" class="form-select">
                @foreach ($year as $yearItem)
                    <option value="{{ $yearItem->id }}" {{ $yearItem->id == $component->year_id ? 'selected' : '' }}>
                        {{ $yearItem->year }}</option>
                @endforeach
            </select>
            <div class="mt-3"></div>
            <label for="category_id" class="font-semibold">Input Category</label>
            <span class="text-danger">*</span>
            <select name="category_id" id="category_id" class="form-select">
                @foreach ($categoriesByYear[$component->year_id] as $categoryItem)
                    <option value="{{ $categoryItem->id }}"
                        {{ $categoryItem->id == $component->category_id ? 'selected' : '' }}>
                        {{ $categoryItem->category }}</option>
                @endforeach
            </select>
            <div class="mt-3"></div>
            <label for="component">Input component</label>
            <span class="text-danger">*</span>
            <input type="text" class="form-control" name="component" id="component" value="{{ $component->component }}">
            <div class="mt-3"></div>
            <label for="iframe_src">Input Source iframe</label>
            <span class="text-danger">*</span>
            <input type="text" class="form-control" name="iframe_src" id="iframe_src"
                value="{{ $component->iframe_src }}">
            <div class="mt-3"></div>
            <label for="note">Additional Note</label>
            <textarea class="form-control" name="note" id="note">{{ $component->note }}</textarea>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#category_id").select2({})

            $("#year_id").change(function() {
                let id = $("#year_id").val();

                $("#category_id").select2({
                    placeholder: 'Choose',
                    ajax: {
                        url: "{{ url('getCategory') }}/" + id,
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
    </script>
@endsection
