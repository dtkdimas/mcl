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
                <div class="navigation-wrapper d-flex justify-content-between gap-2">
                    <button type="button" class="search-btn justify-content-between align-items-center"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="search-title">Search</span>
                        <svg width="15" height="15" viewBox="0 0 10 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.36509 6.90099C7.96429 6.08334 8.23266 5.06961 8.11652 4.06259C8.00038 3.05557 7.50829 2.12954 6.73871 1.46976C5.96913 0.809974 4.9788 0.465099 3.96586 0.50413C2.95292 0.54316 1.99206 0.963217 1.27553 1.68026C0.559 2.39731 0.139631 3.35846 0.101325 4.37143C0.0630195 5.3844 0.408603 6.37448 1.06894 7.14359C1.72927 7.9127 2.65565 8.40413 3.66275 8.51954C4.66986 8.63496 5.6834 8.36586 6.50061 7.76609H6.49999C6.51815 7.79084 6.53836 7.81456 6.56064 7.83725L8.94306 10.2197C9.0591 10.3358 9.2165 10.4011 9.38065 10.4011C9.54481 10.4012 9.70226 10.336 9.81837 10.22C9.93449 10.104 9.99975 9.94655 9.99981 9.7824C9.99987 9.61824 9.93471 9.46079 9.81868 9.34468L7.43626 6.96225C7.41414 6.93984 7.39035 6.91978 7.36509 6.90099ZM7.52475 4.52228C7.52475 4.96922 7.43671 5.4118 7.26567 5.82473C7.09463 6.23765 6.84394 6.61285 6.5279 6.92889C6.21185 7.24493 5.83666 7.49563 5.42373 7.66667C5.0108 7.83771 4.56823 7.92574 4.12128 7.92574C3.67433 7.92574 3.23176 7.83771 2.81883 7.66667C2.40591 7.49563 2.03071 7.24493 1.71467 6.92889C1.39863 6.61285 1.14793 6.23765 0.976891 5.82473C0.80585 5.4118 0.717817 4.96922 0.717817 4.52228C0.717817 3.61962 1.0764 2.75394 1.71467 2.11566C2.35294 1.47739 3.21863 1.11881 4.12128 1.11881C5.02394 1.11881 5.88962 1.47739 6.5279 2.11566C7.16617 2.75394 7.52475 3.61962 7.52475 4.52228Z"
                                fill="#A3A3A3" />
                        </svg>
                    </button>
                    <div class="navigation-btn d-flex align-items-center">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_239_212)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.04263 2.04263H7.5C7.89964 2.04263 8.22824 1.71403 8.22824 1.31439V0.728242C8.22824 0.328597 7.89964 0 7.5 0H1.27886C0.572824 0 0 0.572824 0 1.27886V13.7211C0 14.4272 0.572824 15 1.27886 15H13.7211C14.4272 15 15 14.4272 15 13.7211V7.5C15 7.10036 14.6714 6.77176 14.2718 6.77176H13.6856C13.286 6.77176 12.9574 7.10036 12.9574 7.5V12.9574H2.04263V2.04263Z"
                                    fill="#6e2cf3" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.91385 2.96187C6.5142 2.96187 6.18561 3.29047 6.18561 3.69011V7.50006C6.18561 8.22386 6.77619 8.81445 7.49999 8.81445H11.3099C11.7096 8.81445 12.0382 8.48585 12.0382 8.0862V7.50006C12.0382 7.10041 11.7096 6.77182 11.3099 6.77182H9.68472L14.698 1.75849C15.1021 1.35441 15.1021 0.701656 14.698 0.297571C14.294 -0.106514 13.6412 -0.106514 13.2371 0.297571L8.2238 5.31089V3.68567C8.2238 3.28603 7.8952 2.95743 7.49555 2.95743H6.90941L6.91385 2.96187Z"
                                    fill="#6e2cf3" />
                            </g>
                            <defs>
                                <clipPath id="clip0_239_212">
                                    <rect width="15" height="15" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <a href="/" class="introduction">
                    <h5 class="intro-title">Getting Started</h5>
                </a>
                @foreach ($years as $year)
                    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item item-parent">
                            <h2 class="accordion-header header-parent">
                                <button class="accordion-button btn-parent collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $year->year }}"
                                    aria-expanded="true" aria-controls="panelsStayOpen-{{ $year->year }}">
                                    <span style="width: 100%;">{{ $year->year }}</span>
                                    <svg width="15" height="15" viewBox="0 0 10 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.970638 4.735C1.00777 4.66107 1.07271 4.60488 1.1512 4.57876C1.2297 4.55263 1.31536 4.5587 1.38939 4.59563L5.00001 6.4L8.61001 4.595C8.64674 4.57624 8.68682 4.56493 8.72793 4.56173C8.76905 4.55853 8.8104 4.5635 8.84958 4.57636C8.88877 4.58921 8.92503 4.6097 8.95626 4.63663C8.98749 4.66357 9.01308 4.69642 9.03156 4.73329C9.05004 4.77016 9.06103 4.81032 9.06391 4.85146C9.06679 4.8926 9.0615 4.93391 9.04834 4.97299C9.03519 5.01208 9.01442 5.04818 8.98725 5.0792C8.96007 5.11022 8.92703 5.13556 8.89001 5.15375L5.14001 7.02875C5.09656 7.05053 5.04862 7.06187 5.00001 7.06187C4.95141 7.06187 4.90347 7.05053 4.86001 7.02875L1.11001 5.15375C1.03608 5.11662 0.979894 5.05168 0.953767 4.97319C0.92764 4.89469 0.933707 4.80903 0.970638 4.735Z"
                                            fill="#1E1E1E" />
                                    </svg>
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
                                                    <span style="width: 100%;">{{ $category->category }}</span>
                                                    <svg width="15" height="15" viewBox="0 0 10 11"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0.970638 4.735C1.00777 4.66107 1.07271 4.60488 1.1512 4.57876C1.2297 4.55263 1.31536 4.5587 1.38939 4.59563L5.00001 6.4L8.61001 4.595C8.64674 4.57624 8.68682 4.56493 8.72793 4.56173C8.76905 4.55853 8.8104 4.5635 8.84958 4.57636C8.88877 4.58921 8.92503 4.6097 8.95626 4.63663C8.98749 4.66357 9.01308 4.69642 9.03156 4.73329C9.05004 4.77016 9.06103 4.81032 9.06391 4.85146C9.06679 4.8926 9.0615 4.93391 9.04834 4.97299C9.03519 5.01208 9.01442 5.04818 8.98725 5.0792C8.96007 5.11022 8.92703 5.13556 8.89001 5.15375L5.14001 7.02875C5.09656 7.05053 5.04862 7.06187 5.00001 7.06187C4.95141 7.06187 4.90347 7.05053 4.86001 7.02875L1.11001 5.15375C1.03608 5.11662 0.979894 5.05168 0.953767 4.97319C0.92764 4.89469 0.933707 4.80903 0.970638 4.735Z"
                                                            fill="#1E1E1E" />
                                                    </svg>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
            const menuIcon = document.querySelector('.navigation-btn');
            const layoutContainer = document.querySelector('.bd-layout');
            const accordion = document.querySelectorAll('.accordion');
            const searchBtn = document.querySelector('.search-btn');
            const intro = document.querySelector('.introduction');
            const offcanvasBody = document.querySelector('.offcanvas-body');
            const navigationWrapper = document.querySelector('.navigation-wrapper');

            menuIcon.addEventListener('click', function() {
                layoutContainer.classList.toggle('bd-layout-responsive');
                accordion.forEach(item => {
                    item.classList.toggle('accordion-responsive');
                });
                searchBtn.classList.toggle('searchBtn-responsive');
                intro.classList.toggle('intro-responsive');
                offcanvasBody.classList.toggle('offcanvasBody-responsive');
                navigationWrapper.classList.toggle('navigationWrapper-responsive');
            });
        });
    </script>
</body>

</html>
