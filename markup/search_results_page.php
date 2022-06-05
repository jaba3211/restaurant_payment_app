<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light main_menu">
            <div class="container-fluid">
                <a class="navbar-brand profile-icon" href="login.html">
                    <ion-icon name="person" size="large"></ion-icon>
                </a>
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">მთავარი</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutUs.htm">ჩვენ შესახებ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registration.html">რეგისტრაცია</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.html">შეკვეთები</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.html">რესტორნის დამატება</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.html">მენიუში კერძის დამატება</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li> -->
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="ძებნა" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"
                                style="background: #153a1e; color:#fff;">ძებნა</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">


            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    Search Results
                </h2>

                <div class="cards-group w-100">

                    <div class="card w-100 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Name: Khachapuri</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Category: cold dishes</h6>
                            <p class="card-text">Description-------------------------------------------</p>
                            <a href="single_dish.html" class="card-link fw-bold" style="color:#f4c553;">READ MORE</a>
                        </div>
                    </div>
                    <div class="card w-100 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Name:</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Category:</h6>
                            <p class="card-text">Description:</p>
                            <a href="single_dish.html" class="card-link fw-bold" style="color:#f4c553;">READ MORE</a>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </main>

    <footer class="text-center container-fluid py-5" style="background: #dfeddc;">
        <strong class="me-3 text-warning">E-PAY</strong>ყველა უფლება დაცულია
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>