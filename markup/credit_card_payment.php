<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
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
                    <h2 class="login_form_heading text-center mb-5 text-warning">
                        Payment Details
                    </h2>
                    <form action="#" method="POST" class="w-100">
                        <div class="form-group mb-3 card_number_box">
                            <label for="card_number" class="form-label text-warning fw-bold">Card Number</label>
                            <p class="text-secondary">Enter the 16-digit card number on the card</p>
                            <input type="text" class="form-control" id="card_number"
                                placeholder="XXXX - XXXX - XXXX - XXXX">
                        </div>
                        <div class="form-group mb-3 card_name_box">
                            <label for="card_name" class="form-label text-warning fw-bold">Card Name Holder</label>
                            <p class="text-secondary">Enter name card holder on the card</p>
                            <input type="text" class="form-control" id="card_name" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3 card_cvv_box">
                            <label for="card_cvv" class="form-label text-warning fw-bold">CVV Number</label>
                            <p class="text-secondary">Enter the 3 or 4 digits number on the card</p>
                            <input type="number" data-maxlength="4" class="form-control" id="card_cvv" required>
                        </div>
                        <div class="form-group mb-3 card_expdate_box">
                            <label for="card_expdate" class="form-label text-warning fw-bold">Expire Date</label>
                            <p class="text-secondary">Enter the expiration date of the card</p>
                            <div class="d-flex" id="card_expdate">
                                <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_month"
                                    placeholder="MM" required>
                                <span class="fs-3 mx-3">/</span>
                                <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_year"
                                    placeholder="YY" required>
                            </div>
                        </div>
                        <div class="text-center w-100">
                            <button type="submit" class="btn btn-warning mt-2">Pay Now</button>
                        </div>
                    </form>
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