<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Create new component</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    {{-- <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" /> --}}

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- import css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--
   Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->
        <div class="main-header" data-background-color="purple">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="index.html" class="logo">
                    {{-- <img src="../assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand"> --}}
                    <h1 class="navbar-brand text-white fw-bold mt-1">MICROSITE</h1>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="user-title">Hi, {{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#495057"
                                    class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </a>
                            {{-- <ul class="dropdown-menu animated fadeIn"> --}}
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('logout') }}"method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item logout-button" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <hr class="divider my-0">
                    <ul class="nav">
                        <li class="nav-item" id="dashboard">
                            <a href="{{ url('home') }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item active" id="components">
                            <a href="{{ url('component') }}">
                                <i class="fas fa-cog"></i>
                                <p>Components</p>
                            </a>
                        </li>
                        <li class="nav-item" id="categories">
                            <a href="{{ url('category') }}">
                                <i class="fas fa-folder-open"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item" id="version">
                            <a href="{{ url('year') }}">
                                <i class="fas fa-wrench"></i>
                                <p>Version</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        {{-- main  --}}
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <!-- Page Heading -->
                    <div class="page-header">
                        <h4 class="page-title">Create</h4>
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
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="">Create</a>
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Component Form</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('component.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="year_id" class="font-semibold">Input Year</label>
                                            <span class="text-danger">*</span>
                                            <select name="year_id" id="year_id" class="form-control">
                                                <option value="" hidden>Choose</option>
                                                @foreach ($year as $item)
                                                    <option value="{{ $item->id }}">{{ $item->year }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-3"></div>
                                            <label for="category_id" class="font-semibold">Input Category</label>
                                            <span class="text-danger">*</span>
                                            <select name="category_id" id="category_id"
                                                class="form-control"></select>
                                            <div class="mt-3"></div>
                                            <label for="component">Input component</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" class="form-control" name="component"
                                                id="component" value="{{ old('component') }}">
                                            <div class="mt-3"></div>
                                            <label for="iframe_src">Input Source iframe</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" class="form-control" name="iframe_src"
                                                id="iframe_src" value="{{ old('iframe_src') }}">
                                            <div class="mt-3"></div>
                                            <label for="note">Additional Note</label>
                                            <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url('component') }}" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Azzara JS -->
    <script src="{{ asset('assets/js/ready.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
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

        $(document).ready(function() {
            $('#note').summernote({
                height: 250
            });
        });
    </script>

</body>

</html>
