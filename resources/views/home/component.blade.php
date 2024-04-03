<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Component</title>
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
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                aria-label="Close">
                                &times;
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
                                                                class="btn btn-warning btn-sm"><i
                                                                    class="fas fa-edit"></i>
                                                                Edit</a>
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal-{{ $item->id }}"><i
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
                    <div class="modal fade" id="deleteModal-{{ $item->id }}" data-backdrop="static"
                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ url('component/' . $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete component</h1>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete <b>{{ $item->component }}</b> from table?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    <script>
        $('#basic-datatables').DataTable();
    </script>

</body>

</html>
