<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
    <!-- aos -->
    <link rel="stylesheet" href="assets/vendor/aos/dist/aos.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>CV Critical Performance</title>

    <style>
        /* === THEME RED-BLACK === */
        body {
            background-color: #111;
            color: #fff;
        }

        .navbar {
            background-color: #000 !important;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .navbar-brand .primary {
            color: #e50914 !important;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #e50914 !important;
        }

        .breadcumbs {
            background-color: #e50914;
        }

        .btn-submit,
        .btn-subscribe,
        .btn-to-top {
            background-color: #e50914;
            color: #fff;
            border: none;
        }

        .btn-submit:hover,
        .btn-subscribe:hover,
        .btn-to-top:hover {
            background-color: #b0070f;
            color: #fff;
        }

        footer .footer-top {
            background-color: #000 !important;
        }

        footer .footer-down {
            background-color: #111 !important;
        }

        footer a {
            color: #e50914;
        }

        footer a:hover {
            color: #fff;
        }

        .primary {
            color: #e50914 !important;
        }

        /* Tambahan supaya tulisan dalam card contact muncul */
        .contact .card {
            color: #000 !important;
        }
    </style>
</head>

<body>
    <!-- navbar -->
           <nav class="navbar navbar-expand-lg navbar-dark shadow shadow-sm fixed-top fy-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><span class="primary">CV</span> Critical Performance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bolder dropdown-toggle active" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="about">About Us</a></li>
                            <li><a class="dropdown-item" href="team">Team</a></li>
                            <li>
                                <a class="dropdown-item" href="testimoni">Testimonials</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="/user/login">Ingin Booking?</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- breadcumbs  -->
    <div class="breadcumbs py-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center text-white">
                <h2>Contact</h2>
                <ol class="d-flex list-unstyled">
                    <li>Home</li>
                    <li>Contact</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end breadcumbs -->

    <!-- contact -->
    <div class="contact mb-5">
        <div class="maps">
            <iframe src="{{$contact->maps_emded}}" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow shadow-sm">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-4">
                                        <i class="fa fa-map-marker-alt fa-2x primary float-start me-4"></i>
                                        <h4 class="fw-bolder">Location</h4>
                                        <p class="ms-5">{{$contact->alamat}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa fa-envelope fa-2x primary float-start me-3"></i>
                                        <h4 class="fw-bolder">Email</h4>
                                        <p class="ms-5">{{$contact->email}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa fa-phone-alt fa-2x primary float-start me-3"></i>
                                        <h4 class="fw-bolder">Phone</h4>
                                        <p class="ms-5">{{$contact->telepon}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card border-0 shadow">
                        <div class="card-body px-4">
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <textarea name="" id="" cols="30" rows="10" class="form-control"
                                        placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-submit">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->

    <!-- footer -->
    <footer>
        <div class="footer-top bg-dark text-white p-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <h4 class="fw-bold">CV Critical Performance</h4>
                        <p>
                        <strong>Phone</strong> : <span>{{$contact->telepon}} </span>
                        <br />
                        <strong>Email</strong> : <span>{{$contact->email}} </span>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-2">
                        <h4 class="fw-bold">Useful Links</h4>
                        <ul class="list-group list-unstyled">
                            <li class="list-item">
                                <a href="/" class="text-decoration-none text-white">
                                    <i class="fa fa-chevron-right primary"></i>
                                    Home
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="about" class="text-decoration-none text-white">
                                    <i class="fa fa-chevron-right primary"></i>
                                    About Us
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="service" class="text-decoration-none text-white">
                                    <i class="fa fa-chevron-right primary"></i>
                                    Services
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="portfolio" class="text-decoration-none text-white">
                                    <i class="fa fa-chevron-right primary"></i>
                                    Portfolio
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="contact" class="text-decoration-none text-white">
                                    <i class="fa fa-chevron-right primary"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer  -->

    <!-- to top -->
    <a href="#" class="btn-to-top p-3">
        <i class="fa fa-chevron-up"></i>
    </a>
    <!-- end to top -->

    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome/js/all.min.js"></script>
    <script src="assets/vendor/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/vendor/aos/dist/aos.js"></script>
    <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
