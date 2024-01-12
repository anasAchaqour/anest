<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <title> @yield('title', 'index') </title>
    <livewire:styles />

</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">AnestImport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end top navigation bar -->

    <!-- offcanvas sidebar -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="/" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Manage
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-bag-dash"></i></span>
                            <span>Products</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="/products" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-calculator-fill"></i></i></span>
                                        <span>Manage Products</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-flower1"></i></i></span>
                                        <span>test</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-shop-window"></i></i></span>
                                        <span>Inventory</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#cats">
                            <span class="me-2"><i class="bi bi-flower1"></i></span>
                            <span>Categories</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="cats">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="/categories" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-calculator-fill"></i></i></span>
                                        <span>List of Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-list-ol"></i></i></span>
                                        <span>Product per Category</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-shop-window"></i></i></span>
                                        <span>Inventory</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#sups">
                            <span class="me-2"><i class="bi bi-shop-window"></i></span>
                            <span>Suppliers</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="sups">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="/suppliers" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-calculator-fill"></i></i></span>
                                        <span>List of Suppliers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/suppliers-products" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-list-ol"></i></i></span>
                                        <span>Suppliers products</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-shop-window"></i></i></span>
                                        <span>Inventory</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    {{-- <li>
                        <a href="/suppliers" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-box-seam"></i></span>
                            <span>Suppliers</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/clients" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-receipt"></i></span>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layout">
                            <span class="me-2"><i class="bi bi-bag-plus"></i></span>
                            <span>Orders</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layout">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        {{-- <span class="me-2"><i class="bi bi-speedometer2"></i></span> --}}
                                        <span>My Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        {{-- <span class="me-2"><i class="bi bi-speedometer2"></i></span> --}}
                                        <span>Customers Orders</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Addons
                        </div>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-person-bounding-box"></i></span>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-box-arrow-left"></i></span>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end offcanvas sidebar -->

    <!-- main -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <!-- end main -->

    <div id="scrollToTopElement" title="Go to top">&#9650; Top</div>




    {{-- /* spinner */ --}}

   <!-- Overlay for Opacity -->
   <div id="overlay"></div>
   <!-- Loading Spinner -->
   <div id="loading-spinner" class="spinner"></div>




    <script src="assets/js/bootstrap-jq/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

    <script src="assets/js/script.js"></script>

    <livewire:scripts />
    <script src="{{ asset('vendor/livewire/livewire.js') }}" defer></script>
    {{-- //_________________________________ popovers --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        //_________________________________ popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>


</body>

</html>
