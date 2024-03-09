<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <title>@yield('title', 'Online Store')</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" >GAMER ZONE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- End Header -->

    <!-- Masthead -->
    <header class="masthead bg-dark text-white d-flex justify-content-center align-items-center py-4">
        <div class="container text-center">
            <h3 class="mb-0">CHALLENGE YOURSELF</h3>
        </div>
    </header>
    <!-- End Masthead -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer py-4 text-center text-white bg-dark">
        <div class="container">
            <small>
                &copy; 2024 GamingWorld. All rights reserved. | 
                Follow us: 
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://twitter.com/">
                    Twitter
                </a> | 
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://www.instagram.com/">
                    Instagram
                </a> | 
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://www.facebook.com/">
                    Facebook
                </a>
            </small>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
