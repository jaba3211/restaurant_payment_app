<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>app for restaurant payments</title>
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
                                <a class="nav-link" href="orders.php">შეკვეთები</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">რესტორნის დამატება</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="orders.php">მენიუში კერძის დამატება</a>
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
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5">
                        კერძის დამატება მენიუში
                    </h2>
                    <form action="#" method="POST" class="w-100">
                        <div class="form-group mb-3">
                            <label for="dish_name" class="form-label">კერძის დასახელება</label>
                            <input type="text" name="dish_name" id="dish_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dish_category" class="form-label">კერძის კატეგორია</label>
                            <select class="form-select" aria-label="Default select example" name="dish_category" id="dish_category">
                                <option></option>
                                <option value="1">ცხელი კერძები</option>
                                <option value="2">ცივი კერძები</option>
                                <option value="3">სოუსები</option>
                                <option value="3">დესერტები</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_dish" class="form-label">კერძის აღწერა</label>
                            <textarea name="about_dish" id="about_dish" rows="5" class="form-control">
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dish_price" class="form-label">ფასი</label>
                            <input type="number" name="dish_price" id="dish_price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dish_image" class="form-label">ატვირთეთ კერძის ფოტო</label>
                            <input class="form-control" type="file" id="dish_image" name="dish_image">
                        </div>

                        <button type="submit" class="btn" style="background:#153a1e; color:#fff">დამატება</button>
                        <!-- <div class="my-3">
                            უკვე დარეგისტრირებული ხართ?
                            <a href="login.html" style="color: #ee9f4a;">შესვლა</a>
                        </div> -->
                    </form>
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
