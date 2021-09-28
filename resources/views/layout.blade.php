<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Book Shop</title>

</head>
<body>

<header>

    <div class="d-flex justify-content-center align-items-center">
        <div class="me-5">
            Yardım / SSS
        </div>
        <div class="me-5">
            Contact
        </div>
        <div class="me-5">
            +90 (850) 266 4343
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand me-5" href="#">
                <img style="width: 70px; height: 70px;" src="{{ asset('images/book-shop-logo.jpeg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-5">
                        <input style="margin-right: 300px" class="form-control" type="search" placeholder="Search"
                               aria-label="Search">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex justify-content-center align-items-center">
                    @auth()
                        <a href="" class="text-decoration-none me-4">
                            <i class="fas fa-sign-out-alt fs-4"> Merhaba {{ auth()->user()->name }}</i>
                        </a>

                    @endauth
                    @guest()
                        <a href="{{route('login')}}" class="text-dark me-4 fs-2"><i class="fas fa-user"></i></a>
                    @endguest

                    <a href="#" class="text-dark  fs-2"><i class="fas fa-shopping-bag"></i></a>
                </form>
            </div>
        </div>
    </nav>
    <div class="nav-highlights">
        <ul class="nav justify-content-between">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Novel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Philosophy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Comic Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Science</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> literature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Children Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Self Improvement</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Best Sellers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">New Releases</a>
            </li>


        </ul>
    </div>
</header>
<div>
    @yield('content')
</div>

<footer>
</footer>

</body>
</html>
