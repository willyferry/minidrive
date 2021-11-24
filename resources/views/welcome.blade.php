<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/main.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pages/auth.css') }}">


    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-wrapper container my-4">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Files Public</h3>
                            <p class="text-subtitle text-muted">Files that can be downloaded by all people's</p>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-top">
                                    <div class="dataTable-dropdown"><select class="dataTable-selector form-select">
                                            <option value="5">5</option>
                                            <option value="10" selected="">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                        </select><label>entries per page</label></div>
                                    <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..."
                                            type="text"></div>
                                </div>
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table1">
                                        <thead>
                                            <tr>
                                                <th data-sortable="" style="width: 11.8386%;"><a href="#"
                                                        class="dataTable-sorter">Name</a></th>
                                                <th data-sortable="" style="width: 41.8834%;"><a href="#"
                                                        class="dataTable-sorter">Email</a></th>
                                                <th data-sortable="" style="width: 18.8341%;"><a href="#"
                                                        class="dataTable-sorter">Phone</a></th>
                                                <th data-sortable="" style="width: 16.3229%;"><a href="#"
                                                        class="dataTable-sorter">City</a></th>
                                                <th data-sortable="" style="width: 11.1211%;"><a href="#"
                                                        class="dataTable-sorter">Status</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Graiden</td>
                                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                                <td>076 4820 8838</td>
                                                <td>Offenburg</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dale</td>
                                                <td>fringilla.euismod.enim@quam.ca</td>
                                                <td>0500 527693</td>
                                                <td>New Quay</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nathaniel</td>
                                                <td>mi.Duis@diam.edu</td>
                                                <td>(012165) 76278</td>
                                                <td>Grumo Appula</td>
                                                <td>
                                                    <span class="badge bg-danger">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Darius</td>
                                                <td>velit@nec.com</td>
                                                <td>0309 690 7871</td>
                                                <td>Ways</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oleg</td>
                                                <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                                <td>0500 441046</td>
                                                <td>Rossignol</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kermit</td>
                                                <td>diam.Sed.diam@anteVivamusnon.org</td>
                                                <td>(01653) 27844</td>
                                                <td>Patna</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jermaine</td>
                                                <td>sodales@nuncsit.org</td>
                                                <td>0800 528324</td>
                                                <td>Mold</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ferdinand</td>
                                                <td>gravida.molestie@tinciduntadipiscing.org</td>
                                                <td>(016977) 4107</td>
                                                <td>Marlborough</td>
                                                <td>
                                                    <span class="badge bg-danger">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kuame</td>
                                                <td>Quisque.purus@mauris.org</td>
                                                <td>(0151) 561 8896</td>
                                                <td>Tresigallo</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deacon</td>
                                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                                <td>07740 599321</td>
                                                <td>Karapınar</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="dataTable-bottom">
                                    <div class="dataTable-info">Showing 1 to 10 of 26 entries</div>
                                    <ul class="pagination pagination-primary float-end dataTable-pagination">
                                        <li class="page-item pager"><a href="#" class="page-link"
                                                data-page="1">‹</a>
                                        </li>
                                        <li class="page-item active"><a href="#" class="page-link"
                                                data-page="1">1</a>
                                        </li>
                                        <li class="page-item"><a href="#" class="page-link"
                                                data-page="2">2</a>
                                        </li>
                                        <li class="page-item"><a href="#" class="page-link"
                                                data-page="3">3</a>
                                        </li>
                                        <li class="page-item pager"><a href="#" class="page-link"
                                                data-page="2">›</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 © Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>
