<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- bootstrap  --}}
    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

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
        </div>
    </nav>
    <!-- End of Topbar -->

    <div class="sidebar-nav-wrapper">
        <div class="sidebar-nav">
            <a href="{{ url('super-admin/dashboard') }}" class="login-btn">
                Dashboard
                <div class="d-flex align-items-center">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.9375 7.50833C0.9375 9.24881 1.6289 10.918 2.85961 12.1487C4.09032 13.3794 5.75952 14.0708 7.5 14.0708C9.24048 14.0708 10.9097 13.3794 12.1404 12.1487C13.3711 10.918 14.0625 9.24881 14.0625 7.50833C14.0625 5.76785 13.3711 4.09865 12.1404 2.86794C10.9097 1.63724 9.24048 0.945831 7.5 0.945831C5.75952 0.945831 4.09032 1.63724 2.85961 2.86794C1.6289 4.09865 0.9375 5.76785 0.9375 7.50833ZM15 7.50833C15 9.49745 14.2098 11.4051 12.8033 12.8116C11.3968 14.2182 9.48912 15.0083 7.5 15.0083C5.51088 15.0083 3.60322 14.2182 2.1967 12.8116C0.790176 11.4051 0 9.49745 0 7.50833C0 5.51921 0.790176 3.61155 2.1967 2.20503C3.60322 0.798508 5.51088 0.0083313 7.5 0.0083313C9.48912 0.0083313 11.3968 0.798508 12.8033 2.20503C14.2098 3.61155 15 5.51921 15 7.50833ZM4.21875 7.03958C4.09443 7.03958 3.9752 7.08897 3.88729 7.17688C3.79939 7.26478 3.75 7.38401 3.75 7.50833C3.75 7.63265 3.79939 7.75188 3.88729 7.83979C3.9752 7.9277 4.09443 7.97708 4.21875 7.97708H9.64969L7.63688 9.98896C7.59329 10.0325 7.55872 10.0843 7.53513 10.1412C7.51155 10.1982 7.49941 10.2592 7.49941 10.3208C7.49941 10.3825 7.51155 10.4435 7.53513 10.5004C7.55872 10.5574 7.59329 10.6091 7.63688 10.6527C7.68046 10.6963 7.7322 10.7309 7.78914 10.7544C7.84608 10.778 7.90711 10.7902 7.96875 10.7902C8.03039 10.7902 8.09142 10.778 8.14836 10.7544C8.2053 10.7309 8.25704 10.6963 8.30062 10.6527L11.1131 7.84021C11.1568 7.79666 11.1914 7.74494 11.215 7.68799C11.2387 7.63104 11.2508 7.56999 11.2508 7.50833C11.2508 7.44667 11.2387 7.38562 11.215 7.32867C11.1914 7.27173 11.1568 7.22 11.1131 7.17646L8.30062 4.36396C8.25704 4.32037 8.2053 4.2858 8.14836 4.26222C8.09142 4.23863 8.03039 4.22649 7.96875 4.22649C7.90711 4.22649 7.84608 4.23863 7.78914 4.26222C7.7322 4.2858 7.68046 4.32037 7.63688 4.36396C7.59329 4.40754 7.55872 4.45928 7.53513 4.51622C7.51155 4.57316 7.49941 4.6342 7.49941 4.69583C7.49941 4.75747 7.51155 4.8185 7.53513 4.87544C7.55872 4.93238 7.59329 4.98412 7.63688 5.02771L9.64969 7.03958H4.21875Z"
                            fill="white" />
                    </svg>
                </div>
            </a>
            <div class="divider"></div>
            <a href="/" class="introduction2">
                Getting Started
            </a>
            @foreach ($years as $year)
                <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item item-parent">
                        <h2 class="accordion-header header-parent">
                            <button class="accordion-button btn-parent{{ $yearId != $year->id ? ' collapsed' : '' }}"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-{{ $year->year }}"
                                aria-expanded="{{ $yearId == $year->id ? 'true' : 'false' }}"
                                aria-controls="panelsStayOpen-{{ $year->year }}">
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
                                                <span style="width: 100%;">{{ $category->category }}</span>
                                                <svg width="15" height="15" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0.970638 4.735C1.00777 4.66107 1.07271 4.60488 1.1512 4.57876C1.2297 4.55263 1.31536 4.5587 1.38939 4.59563L5.00001 6.4L8.61001 4.595C8.64674 4.57624 8.68682 4.56493 8.72793 4.56173C8.76905 4.55853 8.8104 4.5635 8.84958 4.57636C8.88877 4.58921 8.92503 4.6097 8.95626 4.63663C8.98749 4.66357 9.01308 4.69642 9.03156 4.73329C9.05004 4.77016 9.06103 4.81032 9.06391 4.85146C9.06679 4.8926 9.0615 4.93391 9.04834 4.97299C9.03519 5.01208 9.01442 5.04818 8.98725 5.0792C8.96007 5.11022 8.92703 5.13556 8.89001 5.15375L5.14001 7.02875C5.09656 7.05053 5.04862 7.06187 5.00001 7.06187C4.95141 7.06187 4.90347 7.05053 4.86001 7.02875L1.11001 5.15375C1.03608 5.11662 0.979894 5.05168 0.953767 4.97319C0.92764 4.89469 0.933707 4.80903 0.970638 4.735Z"
                                                        fill="#1E1E1E" />
                                                </svg>
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
    </div>

    <!-- Dark overlay -->
    <div class="overlay"></div>

    <!-- navbar navigation responsive -->
    <div class="navbar-nav">
        <div class="container-xxl bd-gutter d-flex align-items-center my-2">
            <i class='bx bx-menu bx-sm'></i>
            <div class="d-flex justify-content-end w-100">
                <button type="button" class="search-btn-nav justify-content-between align-items-center"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="search-title">Search</span>
                    <svg width="15" height="15" viewBox="0 0 10 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.36509 6.90099C7.96429 6.08334 8.23266 5.06961 8.11652 4.06259C8.00038 3.05557 7.50829 2.12954 6.73871 1.46976C5.96913 0.809974 4.9788 0.465099 3.96586 0.50413C2.95292 0.54316 1.99206 0.963217 1.27553 1.68026C0.559 2.39731 0.139631 3.35846 0.101325 4.37143C0.0630195 5.3844 0.408603 6.37448 1.06894 7.14359C1.72927 7.9127 2.65565 8.40413 3.66275 8.51954C4.66986 8.63496 5.6834 8.36586 6.50061 7.76609H6.49999C6.51815 7.79084 6.53836 7.81456 6.56064 7.83725L8.94306 10.2197C9.0591 10.3358 9.2165 10.4011 9.38065 10.4011C9.54481 10.4012 9.70226 10.336 9.81837 10.22C9.93449 10.104 9.99975 9.94655 9.99981 9.7824C9.99987 9.61824 9.93471 9.46079 9.81868 9.34468L7.43626 6.96225C7.41414 6.93984 7.39035 6.91978 7.36509 6.90099ZM7.52475 4.52228C7.52475 4.96922 7.43671 5.4118 7.26567 5.82473C7.09463 6.23765 6.84394 6.61285 6.5279 6.92889C6.21185 7.24493 5.83666 7.49563 5.42373 7.66667C5.0108 7.83771 4.56823 7.92574 4.12128 7.92574C3.67433 7.92574 3.23176 7.83771 2.81883 7.66667C2.40591 7.49563 2.03071 7.24493 1.71467 6.92889C1.39863 6.61285 1.14793 6.23765 0.976891 5.82473C0.80585 5.4118 0.717817 4.96922 0.717817 4.52228C0.717817 3.61962 1.0764 2.75394 1.71467 2.11566C2.35294 1.47739 3.21863 1.11881 4.12128 1.11881C5.02394 1.11881 5.88962 1.47739 6.5279 2.11566C7.16617 2.75394 7.52475 3.61962 7.52475 4.52228Z"
                            fill="#f0e9fe" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

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
                    <div class="navigation-btn d-flex align-items-center" onclick="changeIcon()">
                        <img src="{{ asset('assets/svg/minimize.svg') }}" alt="svg" id="svgImage">
                    </div>
                </div>
                <a href="{{ url('super-admin/dashboard') }}" id="login-btn" class="login-btn">
                    Dashboard
                    <div class="d-flex align-items-center">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.9375 7.50833C0.9375 9.24881 1.6289 10.918 2.85961 12.1487C4.09032 13.3794 5.75952 14.0708 7.5 14.0708C9.24048 14.0708 10.9097 13.3794 12.1404 12.1487C13.3711 10.918 14.0625 9.24881 14.0625 7.50833C14.0625 5.76785 13.3711 4.09865 12.1404 2.86794C10.9097 1.63724 9.24048 0.945831 7.5 0.945831C5.75952 0.945831 4.09032 1.63724 2.85961 2.86794C1.6289 4.09865 0.9375 5.76785 0.9375 7.50833ZM15 7.50833C15 9.49745 14.2098 11.4051 12.8033 12.8116C11.3968 14.2182 9.48912 15.0083 7.5 15.0083C5.51088 15.0083 3.60322 14.2182 2.1967 12.8116C0.790176 11.4051 0 9.49745 0 7.50833C0 5.51921 0.790176 3.61155 2.1967 2.20503C3.60322 0.798508 5.51088 0.0083313 7.5 0.0083313C9.48912 0.0083313 11.3968 0.798508 12.8033 2.20503C14.2098 3.61155 15 5.51921 15 7.50833ZM4.21875 7.03958C4.09443 7.03958 3.9752 7.08897 3.88729 7.17688C3.79939 7.26478 3.75 7.38401 3.75 7.50833C3.75 7.63265 3.79939 7.75188 3.88729 7.83979C3.9752 7.9277 4.09443 7.97708 4.21875 7.97708H9.64969L7.63688 9.98896C7.59329 10.0325 7.55872 10.0843 7.53513 10.1412C7.51155 10.1982 7.49941 10.2592 7.49941 10.3208C7.49941 10.3825 7.51155 10.4435 7.53513 10.5004C7.55872 10.5574 7.59329 10.6091 7.63688 10.6527C7.68046 10.6963 7.7322 10.7309 7.78914 10.7544C7.84608 10.778 7.90711 10.7902 7.96875 10.7902C8.03039 10.7902 8.09142 10.778 8.14836 10.7544C8.2053 10.7309 8.25704 10.6963 8.30062 10.6527L11.1131 7.84021C11.1568 7.79666 11.1914 7.74494 11.215 7.68799C11.2387 7.63104 11.2508 7.56999 11.2508 7.50833C11.2508 7.44667 11.2387 7.38562 11.215 7.32867C11.1914 7.27173 11.1568 7.22 11.1131 7.17646L8.30062 4.36396C8.25704 4.32037 8.2053 4.2858 8.14836 4.26222C8.09142 4.23863 8.03039 4.22649 7.96875 4.22649C7.90711 4.22649 7.84608 4.23863 7.78914 4.26222C7.7322 4.2858 7.68046 4.32037 7.63688 4.36396C7.59329 4.40754 7.55872 4.45928 7.53513 4.51622C7.51155 4.57316 7.49941 4.6342 7.49941 4.69583C7.49941 4.75747 7.51155 4.8185 7.53513 4.87544C7.55872 4.93238 7.59329 4.98412 7.63688 5.02771L9.64969 7.03958H4.21875Z"
                                fill="white" />
                        </svg>
                    </div>
                </a>
                <div id="divider" class="divider"></div>
                <a href="/" id="introduction2" class="introduction2">
                    Getting Started
                </a>
                @foreach ($years as $year)
                    <div class="accordion w-100" id="accordion-menu">
                        <div class="accordion-item item-parent">
                            <h2 class="accordion-header header-parent">
                                <button
                                    class="accordion-button btn-parent{{ $yearId != $year->id ? ' collapsed' : '' }}"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-{{ $year->year }}"
                                    aria-expanded="{{ $yearId == $year->id ? 'true' : 'false' }}"
                                    aria-controls="panelsStayOpen-{{ $year->year }}">
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
            <iframe id="iframe-content" src="{{ $iframe_src }}" width="100%" height="500" frameborder="0"
                loading="lazy"></iframe>
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
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}?v2"></script>

    <!-- Jquery -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

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

        function changeIcon() {
            var img = document.getElementById('svgImage');
            img.src = (img.src.includes('minimize.svg')) ? '{{ asset('assets/svg/maximize.svg') }}' :
                '{{ asset('assets/svg/minimize.svg') }}';
        }

        //untuk sidebar responsive
        document.addEventListener('DOMContentLoaded', function() {
            const menuIcon = document.querySelector('.navigation-btn');
            const layoutContainer = document.querySelector('.bd-layout');
            const accordion = document.querySelectorAll('#accordion-menu');
            const searchBtn = document.querySelector('.search-btn');
            const intro = document.getElementById('introduction2');
            const offcanvasBody = document.querySelector('.offcanvas-body');
            const navigationWrapper = document.querySelector('.navigation-wrapper');
            const loginBtn = document.getElementById('login-btn');
            const divider = document.getElementById('divider');

            menuIcon.addEventListener('click', function() {
                menuIcon.classList.toggle('navigationBtn-responsive');
                layoutContainer.classList.toggle('bd-layout-responsive');
                accordion.forEach(item => {
                    item.classList.toggle('accordion-responsive');
                });
                searchBtn.classList.toggle('searchBtn-responsive');
                intro.classList.toggle('intro-responsive');
                offcanvasBody.classList.toggle('offcanvasBody-responsive');
                navigationWrapper.classList.toggle('navigationWrapper-responsive');
                loginBtn.classList.toggle('loginBtn-responsive');
                divider.classList.toggle('divider-responsive');
            });
        });

        //untuk sidebar breakpoint 1000px 
        $(document).ready(function() {
            $('.navigation-btn, .overlay').on('click', function() {
                $('.sidebar-nav').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('.bx-menu').on('click', function(e) {
                e.preventDefault();
                $('.sidebar-nav').addClass('active');
                $('.overlay').addClass('active');
            });
        })
    </script>
</body>

</html>
