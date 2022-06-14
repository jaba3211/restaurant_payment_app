@php
    $categoriesUrl = session('table') !== null && session('restaurant_id') !== null ? route('categories.front',['table' => session('table'), 'restaurant_id' => session('restaurant_id')]) : route('scan.QR');
    $bucketUrl = auth()->check() ? route('bucket') : route('authorization');
    $profileUrl = auth()->check() ? route('profile') : route('authorization');
    $orderUrl = auth()->check() ? route('orders') : route('authorization');
@endphp
<header>
    <nav class="navbar navbar-light bg-light main_menu">
        <div class="container-fluid">
            @if(!auth()->check())
                <a class="navbar-brand profile-icon" href="{{ route('authorization') }}">
                    <ion-icon name="person" size="large"></ion-icon>
                </a>
            @else
                <a href="{{ route('log_out') }}" class="navbar-brand profile-icon ">
                <ion-icon name="exit" size="large"></ion-icon>
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
                                <a class="nav-link" href="{{ route('restaurants') }}">Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('staff.list') }}">Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.list') }}">Users</a>
                            </li>
                        @elseif(auth()->check() and isStaff())
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('staff.new.orders') }}">New orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('staff.old.orders') }}">Orders</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $profileUrl }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $categoriesUrl }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $bucketUrl }}">Busket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $orderUrl }}">Orders</a>
                            </li>
                            <li class="nav-item">
                            </li>
                        @endif
                    </ul>
                    @if(!isStaff() && !isAdmin())
                        @include('widgets.search.forms')
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
