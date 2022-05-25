<header>
    <nav class="navbar navbar-light bg-light main_menu">
        <div class="container-fluid">
            @if(!auth()->check())
                <a class="navbar-brand profile-icon" href="{{ route('authorization') }}">
                    <ion-icon name="person" size="large"></ion-icon>
                </a>
            @else
                <a href="{{ route('log_out') }}" class="navbar-brand profile-icon ">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">E-PAY</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @if(auth()->check() and isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('restaurants.beck') }}">რესტორნები</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.beck') }}">კატეგორიები</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ 'register' }}">რეგისტრაცია</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">მთავარი</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about_us') }}">ჩვენ შესახებ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">პროფილი</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">შეკვეთები</a>
                            </li>
                        @endif

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="background: #153a1e; color:#fff;">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
