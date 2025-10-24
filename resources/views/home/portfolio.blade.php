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

    <!-- Tema merah-hitam (override minimal, hanya menambah style) -->
    <style>
        :root {
            --cp-red: #c90000;
            --cp-red-dark: #9b0000;
            --cp-black: #0b0b0b;
            --cp-dark: #111111;
            --cp-white: #ffffff;
            --cp-muted: #bfbfbf;
        }

        /* Base */
        body {
            background-color: var(--cp-black);
            color: var(--cp-white);
        }

        /* Navbar */
        .navbar {
            background-color: var(--cp-black) !important;
            border-bottom: 1px solid rgba(201, 0, 0, 0.06);
        }

        .navbar-brand,
        .nav-link {
            color: var(--cp-white) !important;
        }

        .navbar-brand .primary {
            color: var(--cp-red);
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--cp-red) !important;
        }

        /* Breadcumbs / hero small bar */
        .breadcumbs {
            background-color: var(--cp-red);
        }

        .breadcumbs h2,
        .breadcumbs ol {
            color: var(--cp-white);
        }

        /* Sections */
        .services,
        .teams,
        .clients,
        .about-us,
        .portfolio-us {
            background-color: var(--cp-dark) !important;
            color: var(--cp-white);
        }

        /* Cards */
        .card {
            background-color: #0f0f0f;
            color: var(--cp-white);
            border: none;
        }

        .card .card-title,
        .card .card-text,
        .card .card-description {
            color: var(--cp-white);
        }

        /* Accent color usage */
        .primary {
            color: var(--cp-red) !important;
        }

        /* Subscribe button */
        .btn-subscribe {
            background-color: var(--cp-red);
            color: var(--cp-white);
            border: none;
        }

        .btn-subscribe:hover {
            background-color: var(--cp-red-dark);
        }

        /* Footer */
        footer .footer-top {
            background-color: var(--cp-black) !important;
            color: var(--cp-white);
        }

        footer .footer-down {
            background-color: #0f0f0f !important;
            color: var(--cp-white);
        }

        /* To-top */
        .btn-to-top {
            background-color: var(--cp-red);
            color: var(--cp-white);
        }

        .btn-to-top:hover {
            background-color: var(--cp-red-dark);
        }

        /* testimonial image border */
        .img-testimonial {
            border: 3px solid var(--cp-red);
        }

        /* links hover */
        a.text-decoration-none.text-white:hover {
            color: var(--cp-red) !important;
        }

        /* small responsive tweaks */
        @media (max-width: 768px) {
            .breadcumbs {
                padding: 1rem 0.5rem;
            }
        }

        /* keep portfolio filter readable */
        .portfolio-filters li {
            cursor: pointer;
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
            <a class="nav-link fw-bolder dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
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
                <h2>Portfolio</h2>
                <ol class="d-flex list-unstyled">
                    <li>Home</li>
                    <li>
                        <a href="portfolios">Portfolio</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end breadcumbs -->

    <!-- Portfolio -->
    <div class="portfolio-us mt-5">
    <div class="container">
      <div class="title-container">
        <h2 class="text-center fw-bold">PORTFOLIO</h2>
      </div>
      <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center">
          <ul class="list-unstyled d-flex portfolio-filters">
            <li data-filter="*" class="py-2 px-4 filter-active text-white">ALL</li>
          </ul>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="mansory portfolio-container">
            <div class="mansory-sizer"></div>
            @foreach($portfolios as $portfolio)

                  <div class="mansory-item m-2 portfolio-item filter-web">
                      <img src="/image/{{$portfolio->image}}" alt="" class="img-fluid" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- end Portfolio -->

    <!-- footer -->
    <footer class="mt-5">
    <div class="footer-top bg-dark text-white p-5 ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <h4 class="fw-bold">{{$contact->name}}</h2>
              <p>
                {{$contact->description}}
              </p>
              <strong>Phone</strong> : <span>{{$contact->telepon}} </span>
              <br />
              <strong>Email</strong> : <span>{{$contact->email}} </span>
          </div>
          <div class="col-md-2">
            <h4 class="fw-bold">Our Services</h2>
              <ul class="list-group list-unstyled">
                @foreach($services as $service)
                <li class="list-item">
                  <a href="" class="text-decoration-none text-white">
                    <i class="fa fa-chevron-right primary"></i>
                    {{$service->title}}
                  </a>
                </li>
                @endforeach
              </ul>
          </div>
          <div class="col-md-2">
            <h4 class="fw-bold">Useful Links</h2>
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
