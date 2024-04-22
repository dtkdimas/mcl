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
                <button type="button" class="search-btn d-flex justify-content-between align-items-center"
                    data-bs-toggle="modal" data-bs-target="#exampleModal"> <span class="search-title">Search</span>
                    <i class='bx bx-search bx-sm'></i>
                </button>
                <a href="/" class="introduction">
                    <h5 class="intro-title">Introduction</h5>
                </a>
                @foreach ($years as $year)
                    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item item-parent">
                            <h2 class="accordion-header header-parent">
                                <button
                                    class="accordion-button btn-parent{{ $yearId != $year->id ? ' collapsed' : '' }}"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-{{ $year->year }}"
                                    aria-expanded="{{ $yearId == $year->id ? 'true' : 'false' }}"
                                    aria-controls="panelsStayOpen-{{ $year->year }}">
                                    {{ $year->year }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-{{ $year->year }}"
                                class="accordion-collapse collapse{{ $yearId == $year->id ? ' show' : '' }}">
                                <div class="accordion-body body-parent">
                                    @foreach ($year->categories as $category)
                                        <div
                                            class="accordion-item item-child{{ $categoryId == $category->id ? ' show' : '' }}">
                                            <h2 class="accordion-header header-child">
                                                <button
                                                    class="accordion-button btn-child{{ $categoryId != $category->id ? ' collapsed' : '' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-{{ $category->id }}"
                                                    aria-expanded="{{ $categoryId == $category->id ? 'true' : 'false' }}"
                                                    aria-controls="panelsStayOpen-{{ $category->id }}">
                                                    {{ $category->category }}
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-{{ $category->id }}"
                                                class="accordion-collapse collapse{{ $categoryId == $category->id ? ' show' : '' }}">
                                                <div class="accordion-body body-child">
                                                    @foreach ($category->components as $component)
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('view.component', ['year' => $year->year, 'category' => $category->category, 'id' => $component->id, 'component' => $component->component]) }}"
                                                                    class="link{{ $componentId == $component->id ? ' active' : '' }}">{{ $component->component }}</a>
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
            <h1 id="iframe-header" class="fw-bold">{{ $componentName }}</h1>
            <div id="iframe-text" data-note="{{ $note }}"></div>
            <iframe id="iframe-content" src="{{ $iframe_src }}" width="100%" height="500"
                frameborder="0"></iframe>
        </main>
    </div>

    <footer>
        <div class="footer-wrapper">
            <h1>Component Library - Made for Detikcom Frontend Designer Team</h1>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // Mendapatkan nilai dari atribut data dan memasukkannya ke dalam innerHTML
        document.getElementById('iframe-text').innerHTML = document.getElementById('iframe-text').getAttribute('data-note');

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

        //untuk sidebar responsive
        document.addEventListener('DOMContentLoaded', function() {
            const menuIcon = document.querySelector('.bx-menu');
            const layoutContainer = document.querySelector('.bd-layout');
            const accordion = document.querySelectorAll('.accordion');
            const navigationWrapper = document.querySelector('.navigation-wrapper');
            const navigationTitle = document.querySelector('.nav-title');
            const searchBtn = document.querySelector('.search-btn');
            const searchTitle = document.querySelector('.search-title');
            const intro = document.querySelector('.introduction');

            menuIcon.addEventListener('click', function() {
                layoutContainer.classList.toggle('bd-layout-responsive');
                accordion.forEach(item => {
                    item.classList.toggle('accordion-responsive');
                });
                navigationWrapper.classList.toggle('nav-wrapper-responsive');
                navigationTitle.classList.toggle('nav-title-responsive');
                searchBtn.classList.toggle('searchBtn-responsive');
                searchTitle.classList.toggle('search-title-responsive');
                intro.classList.toggle('intro-responsive');
            });
        });
    </script>
</body>

</html>
