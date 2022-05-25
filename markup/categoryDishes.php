<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category dishes</title>
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
                    <!-- <ion-icon name="exit"></ion-icon> -->
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
                                <a class="nav-link" href="#">ჩვენ შესახებ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">პროფილი</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">შეკვეთები</a>
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
                            <input class="form-control me-2" type="search" placeholder="აკრიფეთ სიტყვა"
                                aria-label="Search">
                            <button class="btn" style="background: #153a1e; color: #fff;" type="submit">ძებნა</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        ბერმუხა
                    </h2>
                    <a href="single_dish.html" class="text-decoration-none">
                        <div class="dishes d-flex align-items-center w-100 card mb-3 ps-3 shadow-sm flex-row">
                            <span>
                                <img src="images/mwadi.jpg" alt="" class="img-fluid" width="200">
                            </span>
                            <span class="menu_cat_name ms-3 fw-bold">
                                მწვადი
                                <span class="d-block fw-normal" style="font-size:14px;">ღორის ხორცი, ხახვი, რაღაც,
                                    რაღაც, კიდევ რაღაც</span>
                                <span class="dish_price mb-3 d-block">200₾</span>
                            </span>
                        </div>
                    </a>
                    <a href="single_dish.html" class="text-decoration-none">

                        <div class="dishes d-flex  align-items-center w-100 card mb-3 ps-3 shadow-sm flex-row">
                            <span>
                                <img src="images/6.jpg" alt="" class="img-fluid" width="200">
                            </span>
                            <span class="menu_cat_name ms-3 fw-bold">
                                ბურგერი
                                <span class="d-block fw-normal" style="font-size:14px;">ღორის ხორცი, ხახვი, რაღაც,
                                    რაღაც,
                                    კიდევ რაღაც</span>

                                <span class="dish_price mb-3 d-block">200₾</span>
                            </span>
                        </div>
                    </a>
                    <a href="single_dish.html" class="text-decoration-none">

                        <div class="dishes d-flex  align-items-center w-100 card mb-3 ps-3 shadow-sm flex-row">
                            <span>
                                <img src="images/აჭარული.jpg" alt="" class="img-fluid" width="200">
                            </span>
                            <span class="menu_cat_name ms-3 fw-bold">
                                აჭარული ხაჭაპური
                                <span class="d-block fw-normal" style="font-size:14px;">ღორის ხორცი, ხახვი, რაღაც,
                                    რაღაც,
                                    კიდევ რაღაც</span>

                                <span class="dish_price mb-3 d-block">200₾</span>
                            </span>
                        </div>
                    </a>
                    <a href="single_dish.html" class="text-decoration-none">

                        <div class="dishes d-flex  align-items-center w-100 card mb-3 ps-3 shadow-sm flex-row">
                            <span>
                                <img src="images/პიცა.jpg" alt="" class="img-fluid" width="200">
                            </span>
                            <span class="menu_cat_name ms-3 fw-bold">
                                პიცა პეპერონი
                                <span class="d-block fw-normal" style="font-size:14px;">ღორის ხორცი, ხახვი, რაღაც,
                                    რაღაც,
                                    კიდევ რაღაც</span>

                                <span class="dish_price mb-3 d-block">200₾</span>
                            </span>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </main>

    <!-- <footer class="text-center container-fluid">
        all rights reserved
    </footer> -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>