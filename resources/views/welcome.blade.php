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
                                <button class="accordion-button btn-parent collapsed" type="button"
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
                                                                <a href="{{ route('view.component', ['year' => $year->year, 'category' => $category->category, 'id' => $component->id, 'component' => $component->component]) }}"
                                                                    class="link">{{ $component->component }}</a>
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
            <div id="iframe-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores ipsam totam sequi
                facilis dolores, dolorem dolore nostrum ab velit, quibusdam sed voluptatibus, aliquid praesentium cum
                ullam explicabo culpa. Reiciendis deleniti ab alias optio fuga libero molestias eos. Velit explicabo
                distinctio, laborum aspernatur iusto, odio eius ad delectus vero magnam itaque?</div>
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
                <div class="modal-body">
                    <div class="search-box">
                        <div class="search-wrapper">
                            <i class='bx bx-search bx-md'></i>
                            <input type="text" id="input-box" class="search-input" placeholder="Search..."
                                autocomplete="off">
                        </div>
                        <div class="result-box">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $availableKeywords = [];
        foreach ($years as $year) {
            foreach ($year->categories as $category) {
                foreach ($category->components as $component) {
                    $availableKeywords[] = [
                        'component' => $component->component,
                        'year' => $year->year,
                        'category' => $category->category,
                        'id' => $component->id,
                    ];
                }
            }
        }
    @endphp

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // search 
        let availableKeyword = @json($availableKeywords);

        const resultBox = document.querySelector(".result-box");
        const inputBox = document.getElementById("input-box");

        inputBox.onkeyup = function() {
            let result = [];
            let input = inputBox.value;
            if (input.length) {
                result = availableKeyword.filter((keyword) => {
                    return keyword.component.toLowerCase().includes(input.toLowerCase());
                });
                console.log(result);
            }
            display(result);

            if (!result.length) {
                resultBox.innerHTML = "";
            }
        }

        function display(result) {
            // Menggunakan objek untuk mengelompokkan komponen berdasarkan tahun
            const groupedByYear = result.reduce((acc, item) => {
                if (!acc[item.year]) {
                    acc[item.year] = [];
                }
                acc[item.year].push(item);
                return acc;
            }, {});

            // Membuat konten HTML untuk setiap tahun dan komponennya
            const content = Object.keys(groupedByYear).map(year => {
                const components = groupedByYear[year].map(component => {
                    return `<li onclick="selectInput('${component.year}', '${component.category}', '${component.id}', '${component.component}')">${component.component}</li>`;
                }).join('');

                return `<div class="groupYear">${year}</div>
                <ul>${components}</ul>`;
            });

            resultBox.innerHTML = content.join("");
        }

        function selectInput(year, category, id, component) {
            window.location.href =
                "{{ route('view.component', ['year' => ':year', 'category' => ':category', 'id' => ':id', 'component' => ':component']) }}"
                .replace(':year', year)
                .replace(':category', category)
                .replace(':id', id)
                .replace(':component', component);
        }

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
