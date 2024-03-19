<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- bootstrap  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- import css --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body data-theme="light">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light topbar fixed-top static-top shadow px-0">
        <div class="container-xxl bd-gutter">
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars text-white"></i>
                </button>
            </form>

            <a class="d-flex align-items-center justify-content-center" href="">
                <div class="text-white fw-bold text-uppercase">Microsite</div>
            </a>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="toggle-container" onClick="toggleDarkMode()">
                    <div class="toggle-circle" id="darkModeToggle">
                        <i class="bx bx-sun change-theme"></i>
                    </div>
                </div>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <a class="">
                    <form action="{{ route('login') }}">
                        <button class="btn btn-outline-light fw-semibold" type="submit">Login</button>
                    </form>
                </a>

            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->

    <div class="container-xxl bd-gutter bd-layout">
        <aside class="bd-sidebar">
            <div class="offcanvas-body flex-column">
                {{-- <ul>
                    @foreach ($years as $year)
                        <li>
                            <h4 class="fw-bold">{{ $year->year }}</h4>
                            <ul>
                                @foreach ($year->categories as $category)
                                    <li>
                                        <h5 class="fw-semibold">{{ $category->category }}</h5>
                                        <ul>
                                            @foreach ($category->components as $component)
                                                <li>
                                                    <a href="#"
                                                        onclick="loadIframe('{{ $component->iframe_src }}','{{ $component->component }}')">{{ $component->component }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <div class="mb-3"></div>
                                @endforeach
                            </ul>
                        </li>
                        <div class="mb-4"></div>
                    @endforeach
                </ul> --}}
                @foreach ($years as $year)
                    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item item-parent">
                            <h2 class="accordion-header header-parent">
                                <button class="accordion-button btn-parent fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $year->year }}"
                                    aria-expanded="true" aria-controls="panelsStayOpen-{{ $year->year }}">
                                    {{ $year->year }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-{{ $year->year }}"
                                class="accordion-collapse collapse collapse-parent">
                                <div class="accordion-body body-parent">
                                    @foreach ($year->categories as $category)
                                        <div class="accordion-item item-child">
                                            <h2 class="accordion-header header-child">
                                                <button class="accordion-button collapsed btn-child fw-bold"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-{{ $category->id }}"
                                                    aria-expanded="true"
                                                    aria-controls="panelsStayOpen-{{ $category->id }}">
                                                    {{ $category->category }}
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-{{ $category->id }}"
                                                class="accordion-collapse collapse">
                                                <div class="accordion-body body-child">
                                                    @foreach ($category->components as $component)
                                                        <ul>
                                                            <li>
                                                                <a href="#" class="link"
                                                                    onclick="loadIframe('{{ $component->iframe_src }}','{{ $component->component }}')">{{ $component->component }}</a>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
        <main class="bd-main order-1 iframe-container">
            <h1 id="iframe-header" class="fw-bold">Get started with Microsite Component Library</h1>
            <iframe id="iframe-content"
                src="https://codepen.io/Dimas-Septiandi-the-solid/embed/xxQebeX?default-tab=html%2Cresult"
                width="100%" height="500" frameborder="0"></iframe>
        </main>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

    <script>
        function toggleDarkMode() {
            var body = document.querySelector("body");
            var darkmode = body.getAttribute("data-theme") === "dark";

            if (darkmode) {
                body.setAttribute("data-theme", "light");
                document.getElementById("darkModeToggle").innerHTML = '<i class="bx bx-sun change-theme"></i>';
            } else {
                body.setAttribute("data-theme", "dark");
                document.getElementById("darkModeToggle").innerHTML = '<i class="bx bx-moon change-theme"></i>';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil semua elemen accordion
            var accordionItems = document.querySelectorAll('.item-parent');

            accordionItems.forEach(function(item, index) {
                // Mengambil elemen collapse pada setiap accordion
                var collapse = item.querySelector('.collapse-parent');

                // Jika ada elemen collapse dan ini adalah iterasi pertama
                if (collapse && index === 0) {
                    collapse.classList.add('show'); // Tambahkan kelas 'show'
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil semua elemen button accordion
            var accordionButtons = document.querySelectorAll('.btn-parent');

            // Menambahkan kelas 'collapsed' pada button di iterasi terakhir
            var lastAccordionButton = accordionButtons[accordionButtons.length - 1];
            if (lastAccordionButton) {
                lastAccordionButton.classList.add('collapsed');
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var links = document.querySelectorAll(
                '.link'); // Mengambil semua elemen tautan dengan kelas 'fw-semibold'

            // Menambahkan event listener untuk setiap tautan
            links.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    // Menghapus kelas 'active' dari semua tautan
                    links.forEach(function(link) {
                        link.classList.remove('active');
                    });

                    // Menambahkan kelas 'active' pada tautan yang diklik
                    this.classList.add('active');
                });
            });
        });

        function loadIframe(src, componentName) {
            document.getElementById('iframe-content').src = src;
            document.getElementById('iframe-header').innerText = componentName;
        }
    </script>
</body>

</html>
