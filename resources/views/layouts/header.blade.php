<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="header-top-right">

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                @auth
                    <li class="menu-item">
                        <a href="index.html" class='menu-link' style="text-decoration:none">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::user()->is_admin === 1)
                        <li class="menu-item">
                            <a href="index.html" class='menu-link' style="text-decoration:none">
                                <i class="bi bi-grid-fill"></i>
                                <span>All Files</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class='menu-link' style="text-decoration:none">
                                <i class="bi bi-grid-fill"></i>
                                <span>All Users</span>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item">
                        <a href="index.html" class='menu-link' style="text-decoration:none">
                            <i class="bi bi-grid-fill"></i>
                            <span>My Files</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="index.html" class='menu-link' style="text-decoration:none">
                            <i class="bi bi-grid-fill"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a class='menu-link' onclick="document.getElementById('logout').submit()" style="text-decoration:none;cursor: pointer">
                            <i class="bi bi-grid-fill"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                @else

                @endauth
            </ul>
        </div>
    </nav>
</header>
