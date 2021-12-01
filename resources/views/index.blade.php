<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <script>
        const load = () => {
            @if ($file = Session::get('file'))
                return window.open("{{ asset('/storage/files/' . $file->file_url) }}", "_blank");
            @else
                return false;
            @endif
        }
    </script>
</head>

<body onload="load()">
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

                <div class="my-4">
                    @include('layouts.partials.alerts')
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>
                                            Name <br/>
                                            <small class="text-muted" style="font-size:11px">Author</small>
                                        </th>
                                        <th>Upload At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @if ($files->isEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @else
                                        @foreach ($files as $file)
                                            <tr>
                                                <td>
                                                    {{ $file->name }} <br/>
                                                    <small class="text-muted" style="font-size:11px">{{ $file->user->name }}</small>
                                                </td>
                                                <td>{{ $file->created_at->diffForHumans() }}</td>
                                                <td class="text-end">
                                                    @if ($file->password)
                                                        <a onclick="confirmPassword('{{ route('file.confirmPassword', $file->id) }}')" class="btn btn-sm btn-primary">Download</a>
                                                        <br/>
                                                        <small class="form-text text-danger">Need password</small>
                                                    @else
                                                        <a href="{{ asset('/storage/files/' . $file->file_url) }}" class="btn btn-sm btn-primary">Download</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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

        <form id="confirmPassword" class="d-none" action="" method="post">
            @csrf
            <input type="text" name="password" id="password">
        </form>

    </div>

    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1, {
            sortable: false,
        });

        const confirmPassword = (url) => {
            let password = prompt('Enter password');
            if (password) {
                document.querySelector('#password').value = password;
                document.querySelector('#confirmPassword').action = url;
                document.querySelector('#confirmPassword').submit();
            } else {
                alert('Password is required');
            }
        }
    </script>
</body>

</html>
