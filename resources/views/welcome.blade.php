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

</head>

<body data-theme="light">
    <!-- Topbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-xxl bd-gutter">

            <div class="d-flex align-items-center justify-content-center">
                <div class="container mycontainer">
                    <div class="row">
                        <div class="col-12">
                            <h1>Microsite Component Library</h1>
                            <p>Standards microsite component sets used in projects</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                <!-- Nav Item - User Information -->
                {{-- <a class="">
                    <form action="{{ route('login') }}">
                        <button class="btn btn-outline-light fw-semibold" type="submit">Login</button>
                    </form>
                </a> --}}

            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->

    <div class="container-xxl bd-gutter bd-layout">
        <aside class="bd-sidebar">
            <div class="offcanvas-body flex-column">
                <div class="navigation-wrapper d-flex justify-content-between align-items-center">
                    <h5 class="nav-title">Navigation</h5><i class='bx bx-menu bx-sm'></i>
                </div>
                @foreach ($years as $year)
                    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item item-parent">
                            <h2 class="accordion-header header-parent">
                                <button class="accordion-button btn-parent" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-{{ $year->year }}" aria-expanded="true"
                                    aria-controls="panelsStayOpen-{{ $year->year }}">
                                    {{ $year->year }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-{{ $year->year }}"
                                class="accordion-collapse collapse collapse-parent">
                                <div class="accordion-body body-parent">
                                    @foreach ($year->categories as $category)
                                        <div class="accordion-item item-child">
                                            <h2 class="accordion-header header-child">
                                                <button class="accordion-button collapsed btn-child" type="button"
                                                    data-bs-toggle="collapse"
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
                                                                    onclick="loadIframe('{{ $component->iframe_src }}','{{ $component->component }}','{{ $component->note }}')">{{ $component->component }}</a>
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
            <p id="iframe-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores ipsam totam sequi
                facilis dolores, dolorem dolore nostrum ab velit, quibusdam sed voluptatibus, aliquid praesentium cum
                ullam explicabo culpa. Reiciendis deleniti ab alias optio fuga libero molestias eos. Velit explicabo
                distinctio, laborum aspernatur iusto, odio eius ad delectus vero magnam itaque?</p>
            <iframe id="iframe-content"
                src="https://codepen.io/Dimas-Septiandi-the-solid/embed/xxQebeX?default-tab=html%2Cresult"
                width="100%" height="500" frameborder="0"></iframe>
        </main>
    </div>

    <footer>
        <div class="footer-wrapper">
            <h1>Component Library - Made for Detikcom Frontend Designer Team</h1>
        </div>
    </footer>

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

        // Penanganan jika kolom kategori tidak memiliki komponen maka akan tidak didisplay
        document.addEventListener("DOMContentLoaded", function() {
            var itemChildren = document.querySelectorAll('.item-child');
            itemChildren.forEach(function(itemChild) {
                var components = itemChild.querySelectorAll('.link');
                var isEmpty = true;
                components.forEach(function(component) {
                    if (component.innerText.trim() !== '') {
                        isEmpty = false;
                    }
                });
                if (isEmpty) {
                    itemChild.classList.add('none');
                }
            });
        });

        //untuk load halaman dengan source component yang dipilih
        function loadIframe(src, componentName, note) {
            document.getElementById('iframe-content').src = src;
            document.getElementById('iframe-header').innerText = componentName;
            document.getElementById('iframe-text').innerText = note || '';
        }

        //untuk sidebar responsive
        document.addEventListener('DOMContentLoaded', function() {
            const menuIcon = document.querySelector('.bx-menu');
            const layoutContainer = document.querySelector('.bd-layout');
            const accordion = document.querySelectorAll('.accordion');
            const navigationWrapper = document.querySelector('.navigation-wrapper');
            const navigationTitle = document.querySelector('.nav-title');

            menuIcon.addEventListener('click', function() {
                layoutContainer.classList.toggle('bd-layout-responsive');
                accordion.forEach(item => {
                    item.classList.toggle('accordion-responsive');
                });
                navigationWrapper.classList.toggle('nav-wrapper-responsive')
                navigationTitle.classList.toggle('nav-title-responsive');

            });
        });
    </script>
</body>

</html>
